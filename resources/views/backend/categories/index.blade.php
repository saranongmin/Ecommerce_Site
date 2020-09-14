@extends('backend.layouts.master')

@section('title', 'Categories')

@section('content')
<div class="container-fluid"style="margin-top:20px;
margin-right:00px;
width: 80%;
    padding-right: 15px;
    padding-left: 15px;">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">Categories</div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
                    <a href="{{ route('categories.trash') }}" class="btn btn-sm btn-outline-danger">Trash List</a>
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
                        <th>Image</th>
                        <th>Status</th>
                        <th style="width: 150px; text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            @if(file_exists(storage_path().'/app/public/categories/'.$category->image ) && (!is_null($category->image)))
                                <img src="{{ asset('storage/categories/'.$category->image) }}" height="100">
                            @else
                                <img src="{{ asset('/default-avatar.png') }}">
                            @endif
                        </td>
                        <td>{{ $category->is_active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-outline-info">Show</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>

{{--                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>--}}

                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
{{--{{ $categories->links() }}--}}
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('categories.excel') }}" class="btn btn-sm btn-outline-info">Download Excel</a>
            <a href="{{ route('categories.pdf') }}" class="btn btn-sm btn-outline-danger">Download Pdf</a>
        </div>
    </div>

</div>
@endsection

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
