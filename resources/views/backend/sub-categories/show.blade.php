@extends('backend.layouts.master')

@section('title', 'Category Details')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">Show Sub Category</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('sub-categories.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                    </div>
                </div>
            </div>

            <div class="p-3">
                @if(file_exists(storage_path().'/app/public/categories/sub-categories/'.$subCategory->image ) && (!is_null($subCategory->image)))
                    <img src="{{ asset('storage/categories/sub-categories/'.$subCategory->image) }}" height="100">
                @else
                    <img src="{{ asset('/default-avatar.png') }}">
                @endif

            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>{{ $subCategory->title }}</th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th>{{ $subCategory->description }}</th>
                        </tr>
                        <tr>
                            <th> Category Name </th>
                            <th>{{ $subCategory->category->title }} </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

