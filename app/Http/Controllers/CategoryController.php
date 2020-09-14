<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exports\CategoriesExport;
use App\Http\Requests\CategoryRequest;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = DB::table('categories')->get();
//        $categories = Category::all();

        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;

//        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('backend.categories.index', compact('categories', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
//            $request->validate(
//                ['title' => ['required','min:3','max:5']],
//                ['title.min' => 'this is my custom error message for minimum character']
//            );

//            $validator = Validator::make($request->all(), [
//                'title' => 'required|min:10',
//            ]);
//
//            if ($validator->fails()) {
//                return 'Validation failed';
////                return redirect('post/create')
////                    ->withErrors($validator)
////                    ->withInput();
//            }
            $data = $request->all();
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->image, $request->title);
            }
            Category::create($data);

//        session(['status' => 'Created Successfully !']);

//        session()->flash('status', 'Created Successfully !');

            return redirect()->route('categories.index')->withStatus('Created Successfully !');
        }catch (QueryException $e){
//            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) //route model model binding/ dependency injection
    {
//        $category = Category::find(3000);
//        $category = Category::findOrFail($id);

//        $category = Category::where('id', 3000)->first();

//        $category = Category::where('id', 3000)->get();

//        dd($category);
        return view('backend.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//        $category = Category::findOrFail($id);

        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try{
//            $category = Category::findOrFail($id);
            $data = $request->all();
            if ($request->hasFile('image')) {
                $this->unlink($category->image);
                $data['image'] = $this->uploadImage($request->image, $request->title);
            }
            $category->update($data);
            return redirect()->route('categories.index')->withStatus('Updated Successfully !');
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
    public function destroy(Category $category)
    {
        try{
//            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('categories.index')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function trash()
    {
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 10 : 0;

        $categories = Category::onlyTrashed()->paginate(10);
        return view('backend.categories.trash', compact('categories', 'sl'));
    }

    public function showTrash($id) //route model model binding/ dependency injection
    {
//        $category = Category::find(3000);
//        $category = Category::findOrFail($id);

        $category = Category::onlyTrashed()
                            ->where('id', $id)
                            ->first();

//        $category = Category::where('id', 3000)->get();

//        dd($category);
        return view('backend.categories.show', compact('category'));
    }

    public function restoreTrash($id)
    {
        try{

            $category = Category::onlyTrashed()
                ->where('id', $id)
                ->first();

            $category->restore();

            return redirect()->route('categories.trash')->withStatus('Updated Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function deleteTrash($id)
    {
        try{
            $category = Category::onlyTrashed()
                ->where('id', $id)
                ->first();

            $category->forceDelete();

            return redirect()->route('categories.trash')->withStatus('Deleted Successfully !');
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    private function uploadImage($file, $name)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $file_name = $timestamp .'-'.$name. '.' . $file->getClientOriginalExtension();
        $pathToUpload = storage_path().'/app/public/categories/';
        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/categories/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}
