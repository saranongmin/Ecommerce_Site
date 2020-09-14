<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Collection;
class CartController extends Controller
{

    public function addToCart(Request $request)
    {

        $productIds = Cookie::get('productIds');

        if(!is_null($productIds)){
            $productIds = unserialize($productIds);
        }

        if(is_array($productIds) && (count($productIds)>0)){
            array_push($productIds, $request->productId);
            $data = serialize($productIds);
        }else{
            $data = serialize([$request->productId]);
        }

         Cookie::queue('productIds', $data , 3600*10);

     return response()->json($productIds);
    }


    public function removeFromCart(Request $request)
    {

        $productIds = Cookie::get('productIds');
        $data = [];
        if(!is_null($productIds)){
            $productIds = unserialize($productIds);
            if (($key = array_search($request->productId, $productIds)) !== false) {
                unset($productIds[$key]);
            }
            $data = serialize($productIds);
        }

         Cookie::queue(Cookie::forget('productIds'));

         Cookie::queue('productIds', $data , 3600*10);

        return response()->json($productIds);
    }

    public function getProductsFromCart(){

        $productIds = Cookie::get('productIds');

        if(!is_null($productIds)){
            $productIds = unserialize($productIds);
            $uniqueProducts = array_unique($productIds);
            $products = Product::whereIn('id', $uniqueProducts)->get();
        }

        return view('frontend.checkout', compact('products'));

    }

    ##Pondit##321
    public function sslTest()
    {
        return view('frontend.ssl-commerz');
    }

    public function success()
    {
        dd('success');
    }

    public function failed()
    {
        dd('failed');
    }

    public function canceled()
    {
        dd('canceled');
    }


    public function checkout(Request $request)
    {
        dd($request->all());
    }

}
