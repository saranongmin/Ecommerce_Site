<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Color;
use App\Product;
use App\Size;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Tag;
use Image;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = DB::table('products')->get();
//        $products = Product::all();

        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;
        $products = Product::with('category', 'createdBy')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.products.index', compact('products', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->toArray();
        $subCategories = SubCategory::pluck('title', 'id')->toArray();

        $brands = Brand::pluck('name', 'id')->toArray();
        $colors = Color::pluck('name', 'id')->toArray();
        $sizes = Size::pluck('name','id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();
        $selectedBrands = [];
        $selectedSizes = [];
        $selectedColors = [];
        $selectedTags = [];

        return view('backend.products.create', compact('categories', 'colors', 'selectedColors', 'tags', 'selectedTags','sizes','selectedSizes','brands','selectedBrands','subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $request->validate([
                    'title' => ['required','min:3','max:255'],
                    'category_id' => 'required|exists:categories,id'
                ]
            );


            $data = $request->all();
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->image, $request->title);
            }

            $data['created_by'] = auth()->user()->id;



           $brands = $request->brand;
           $sizes = $request->size;
           $colors = $request->color;
           $tags = $request->tag;
           $product =Product::create($data);


            if($request->hasFile('picture')){
                foreach ($request->picture as $pic){
                   $product->pictures()->create([
                        'picture' => $this->uploadMultipleImage($pic),
                   ]);
                }
            }
           $product->brands()->attach($brands);
           $product->sizes()->attach($sizes);
           $product->colors()->attach($colors);
           $product->tags()->attach($tags);

            return redirect()->route('products.index')->withStatus('Created Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $notificationId = '') //route model model binding/ dependency injection
    {
        // $this->authorize('products.view', $product);


        // if(!is_null($notificationId)){
        //     DB::table('notifications')
        //         ->where('id', $notificationId)
        //         ->update(['read_at'=>Carbon::now()]);
        // }


        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('title', 'id')->toArray();
        $subCategories = Category::pluck('title', 'id')->toArray();
        $brands = Brand::pluck('name', 'id')->toArray();
        $colors = Color::pluck('name', 'id')->toArray();
        $sizes = Size::pluck('name', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();
        $selectedBrands = $product->brands()->pluck('id')->toArray();
        $selectedSizes = $product->sizes()->pluck('id')->toArray();
        $selectedColors = $product->colors->pluck('id')->toArray();
        $selectedTags = $product->tags->pluck('id')->toArray();
        return view('backend.products.edit', compact('product', 'categories', 'colors','tags' ,'selectedTags','selectedColors','sizes','selectedSizes','brands','selectedBrands','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{
//            $product = Product::findOrFail($id);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $this->unlink($product->image);
                $data['image'] = $this->uploadImage($request->image, $request->title);
            }
            $product->update($data);
            $sizes = $request->size;
            $colors = $request->color;
            $tags = $request->tag;
            $product->sizes()->sync($sizes);
            $product->colors()->sync($colors);
            $product->tags()->sync($tags);

            return redirect()->route('products.index')->withStatus('Updated Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try{
            // $product->colors()->detach();
            $product->delete();
            return redirect()->route('products.index')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    private function uploadImage($file, $name)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $file_name = $timestamp .'-'.$name. '.' . $file->getClientOriginalExtension();
        $pathToUpload = storage_path().'/app/public/products/';
        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/products/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

    private function uploadMultipleImage($file)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $name = $file->getClientOriginalName();
        $file_name = $timestamp .'-' . $name;
        $pathToUpload = storage_path().'/app/public/products/';
        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
    }

    
}
