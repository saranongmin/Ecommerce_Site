<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class FrontendController extends Controller
{


    public function welcome(Category $category)
    {
        $categories = Category::all();
        $products  = Product::latest()->take(7)->get();
        return view('welcome',compact('categories','products'));
    }

    public function products(Category $category, SubCategory $subCategory=null)
    {

        if (!$subCategory) {
           $products = $category->products;
        }else{
            $products = $subCategory->products;
        }
       

        return view('frontend.products', compact('products'));
    }
    public function productDetails(Product $product)
    {
        $products  = Product::latest()->take(3)->get();
        return view('frontend.product-details', compact('categories','product','products'));
    }
    public function blog()
    {
        $blog = Blog::all();
        return view('frontend.blogs',compact('blog'));
    }
    public function about()
    {
        $users = User::all();
        return view('frontend.about',compact('users'));
    }



}
