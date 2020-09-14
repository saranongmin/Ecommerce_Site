<?php

namespace App\Http\Controllers;

use App\Brand;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function index()
    {
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('backend.brands.index', compact('brands', 'sl'));
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(Request $request)
    {
        try{
            $data  = $request->all();
            if($request->hasFile('image')){
                $data['image'] = $this->uploadImage($request->image, $request->name);
            }
            Brand::create($data);
            return redirect()->route('brands.index')->withStatus('Created Successfully !');
         }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }

    }
    public function show(Brand $brand)
    {
        return view('backend.brands.show',compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('backend.brands.edit',compact('brand'));
    }

    public function update(Request $request , Brand $brand)
    {
        try {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $this->unlink($brand->image);
                $data['image'] = $this->uploadImage($request->image, $request->name);
            }
            $brand->update($data);
            return redirect()->route('brands.index')->withStatus('Updated  Successfully !');
        }catch (QueryException $e){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->getMessage());
        }
    }
    public function destroy(Brand $brand)
    {
        try{
            $brand->delete();
            return redirect()->route('brands.index')->withStatus('Delete  Successfully !');
        }catch (QueryException $e){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->getMessage());
        }
    }

    private function uploadImage($file, $name)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $file_name = $timestamp .'-'.$name. '.' . $file->getClientOriginalExtension();
        $pathToUpload = storage_path().'/app/public/brands/';
        Image::make($file)->resize(80,100)->save($pathToUpload.$file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/brands/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }
}
