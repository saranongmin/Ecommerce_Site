<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('backend.tags.index', compact('tags', 'sl'));
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            Tag::create($data);
            return redirect()->route('tags.index')->withStatus('Created Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Tag $tag)
    {
        return view('backend.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(Request $request,Tag $tag)
    {
        try{
            $data = $request->all();
            $tag->update($data);
            return redirect()->route('tags.index')->withStatus('Updated Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Tag $tag)
    {
        try{
            $tag->delete();
            return redirect()->route('tags.index')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
