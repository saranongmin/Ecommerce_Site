@extends('backend.layouts.master')

@section('title', 'Category Details')

@section('content')
    <div class="container-fluid" style="margin-top:20px;
margin-right:00px;
width: 80%;
    padding-right: 15px;
    padding-left: 15px;">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">Show Category</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                    </div>
                </div>
            </div>

            <div class="p-3">
                @if(file_exists(storage_path().'/app/public/categories/'.$category->image ) && (!is_null($category->image)))
                    <img src="{{ asset('storage/categories/'.$category->image) }}" height="100">
                @else
                    <img src="{{ asset('/default-avatar.png') }}">
                @endif

            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>{{ $category->title }}</th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th>{{ $category->description }}</th>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>{{ $category->is_active ? 'Active' : 'Inactive' }}</th>
                        </tr>

                        <tr>
                            <th>Products</th>
                            <th>
                                <ul>
                                @foreach($category->products as $product)
                                    <li>{{ $product->title }}</li>
                                @endforeach
                                </ul>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

