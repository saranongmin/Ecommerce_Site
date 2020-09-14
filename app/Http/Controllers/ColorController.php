<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;
        $colors = Color::orderBy('created_at', 'desc')->get();
        return view('backend.colors.index', compact('colors', 'sl'));
    }

    public function create()
    {
        return view('backend.colors.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            Color::create($data);
            return redirect()->route('colors.index')->withStatus('Created Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Color $color)
    {
        return view('backend.colors.show', compact('color'));
    }
    public function edit(Color $color)
    {
        return view('backend.colors.edit', compact('color'));
    }
    public function update(Request $request, Color $color)
    {
        try{
            $data = $request->all();
            $color->update($data);
            return redirect()->route('colors.index')->withStatus('Updated Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function destroy(Color $color)
    {
        try{
            $color->delete();
            return redirect()->route('colors.index')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
