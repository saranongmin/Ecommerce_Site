<?php


namespace App\Http\View\Composers;

use App\Blog;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;


class FrontendComposer
{

    public function compose(View $view)
    {
        $categories = Category::with('subCategories')->get();
        $blogs  = Blog::latest()->take(3)->get();

        $productIds = Cookie::get('productIds');

        if(!is_null($productIds)){
            $productIds = unserialize($productIds);
        }else{
            $productIds = [];
        }

        $view->with(compact('categories', 'blogs','productIds'));
    }

}
