@extends('backend.layouts.master')

@section('title', 'Blogs')

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
                <div class="col-md-6">Blog</div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
{{--                id="dataTable"--}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Title</th>
                        <th>Blog Image </th>
                        <th>Description</th>
                        <th style="width: 150px; text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>
                            @if(file_exists(storage_path().'/app/public/blogs/'.$blog->image ) && (!is_null($blog->image)))
                                <img src="{{ asset('storage/blogs/'.$blog->image) }}" height="100">
                            @else
                                <img src="{{ asset('/default-avatar.png') }}">
                            @endif
                        </td>
                        <td>{{ $blog->description }}</td>
                        <td>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-outline-info">Show</a>

                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>

{{--                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>--}}
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are You Sure Want To Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--{{ $blogs->links() }}--}}
        </div>
        <div class="card-footer text-right">
            <a href="" class="btn btn-sm btn-outline-info">Download Excel</a>
            <a href="" class="btn btn-sm btn-outline-danger">Download Pdf</a>
        </div>
    </div>

</div>
@endsection

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('ui/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('ui/backend') }}/js/demo/datatables-demo.js"></script>
@endpush
