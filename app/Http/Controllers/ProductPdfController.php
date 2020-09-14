<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use PDF;

class ProductPdfController extends Controller
{
     public function products()
    {

        $products = Product::orderBy('created_at', 'desc')->get();

        $pdf = PDF::loadView('backend.products.pdf', compact('products'));
        return $pdf->download('products.pdf');
    }
}
