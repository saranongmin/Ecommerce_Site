<?php

namespace App\Http\Controllers;

use App\Notifications\ProductComment;
use App\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function productComment(Request $request, Product $product)
    {
        $product->comments()->create([
            'body' => $request->body,
            'commented_by' => auth()->user()->id,
        ]);

        if(!is_null( $product->createdBy)){
            $product->createdBy->notify(new ProductComment($product, auth()->user(), $request->body));;
        }


        return redirect()->back();
    }
}
