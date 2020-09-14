<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{

    public function index()
    {
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;
        $orders = Order::all();
        return view('backend.orders.index',compact('orders','sl'));
    }

    public function show(Order $order)
    {
        $productInfo = unserialize($order->product_info);
        return view('backend.orders.show',compact('order','productInfo'));
    }

    public function store(Request $request, Product $product)
    {

        $data = [];
        $amount = 0;
        for($i = 0; $i<count($request->product_ids); $i++) {

            $product = Product::findOrFail($request->product_ids[$i]);
            $quantity = $request->quantity[$i];
            $unitPrice = $product->unit_price;
            $data[] = [
                'product_id' => $request->product_ids[$i],
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'discount_amount' => $product->discount_amount,
                'product_info' => serialize($product->toArray())
            ];

            $amount += ($unitPrice * $quantity);

        }


        $orderData = [
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'shipping_address' => $request->shipping_address,
            'total_amount' => $amount
        ];


        $order = Order::create($orderData);
        $order->details()->createMany($data);
        Cookie::queue(Cookie::forget('productIds'));

        return redirect()->back()->withStatus('Order Place Successfully !. Order Id: '.$order->id);

    }

    public function destroy(Order $order)
    {
        try{
            $order->delete();
            return redirect()->route('orders.index')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
