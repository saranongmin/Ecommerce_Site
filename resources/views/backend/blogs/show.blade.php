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
                    <div class="col-md-6">Show Blog</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                    </div>
                </div>
            </div>
            <div class="p-4">
                @if(file_exists(storage_path().'/app/public/blogs/'.$blog->image ) && (!is_null($blog->image)))
                    <img src="{{ asset('storage/blogs/'.$blog->image) }}" height="100">
                @else
                    <img src="{{ asset('/default-avatar.png') }}">
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>{{ $blog->title }}</th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th>{{ $blog->description }}</th>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <th>
                                @foreach($blog->tags as $tag)
                                    <li>{{ $tag->name }}</li>
                                @endforeach
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

