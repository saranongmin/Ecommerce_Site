<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;
        $sizes = Size::orderBy('created_at', 'desc')->get();
        return view('backend.Sizes.index', compact('sizes', 'sl'));
    }

    public function create()
    {
        return view('backend.Sizes.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            Size::create($data);
            return redirect()->route('sizes.index')->withStatus('Created Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Size $size)
    {
        return view('backend.sizes.show', compact('size'));
    }
    public function edit(Size $size)
    {
        return view('backend.sizes.edit', compact('size'));
    }
    public function update(Request $request, Size $size)
    {
        try{
            $data = $request->all();
            $size->update($data);
            return redirect()->route('sizes.index')->withStatus('Updated Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function destroy(Size $size)
    {
        try{
            $size->delete();
            return redirect()->route('sizes.index')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
