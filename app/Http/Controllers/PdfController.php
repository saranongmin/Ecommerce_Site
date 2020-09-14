<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
     public function categories()
    {

        $categories = Category::orderBy('created_at', 'desc')->get();

        $pdf = PDF::loadView('backend.categories.pdf', compact('categories'));
        return $pdf->download('categories.pdf');
    }
}
