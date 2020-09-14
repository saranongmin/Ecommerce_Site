<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;

use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function index()
    {
        // $this->authorize('blogs.viewAny');
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('backend.blogs.index', compact('blogs', 'sl'));
    }

    public function create()
    {
        $tags = Tag::pluck('name','id')->toArray();
        $selectedTags = [];
        return view('backend.blogs.create',compact('tags','selectedTags'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            $tags = $request->tag;
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->image, $request->title);
            }
            $blog = Blog::create($data);
            if($request->hasFile('picture')){
                foreach ($request->picture as $pic){
                    $blog->pictures()->create([
                        'picture' => $this->uploadMultipleImage($pic),
                    ]);
                }
            }
            $blog->tags()->attach($tags);
            return redirect()->route('blogs.index')->withStatus('Created Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Blog $blog) //route model model binding/ dependency injection
    {
        return view('backend.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {

        $tags = Tag::pluck('name','id')->toArray();
        $selectedTags = $blog->tags->pluck('id')->toArray();
        return view('backend.blogs.edit', compact('blog','tags','selectedTags'));
    }

    public function update(Request $request, Blog $blog)
    {
        try{
            $data = $request->all();
            $tags = $request->tag;
            if ($request->hasFile('image')) {
                $this->unlink($blog->image);
                $data['image'] = $this->uploadImage($request->image, $request->title);
            }
            $blog->update($data);
            $blog->tags()->sync($tags);
            return redirect()->route('blogs.index')->withStatus('Updated Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Blog $blog)
    {
        try{
            $blog->delete();
            return redirect()->route('blogs.index')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    private function uploadImage($file, $name)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $file_name = $timestamp .'-'.$name. '.' . $file->getClientOriginalExtension();
        $pathToUpload = storage_path().'/app/public/blogs/';
        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/blogs/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }
    private function uploadMultipleImage($file)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $name = $file->getClientOriginalName();
        $file_name = $timestamp .'-' . $name;
        $pathToUpload = storage_path().'/app/public/blogs/';
        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
    }
}
