@extends('backend.layouts.master')

@section('title', 'Brands')

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
                <div class="col-md-6">Brands</div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('brands.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
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
                        <th>Name</th>
                        <th>Image</th>
                        <th style="width: 150px; text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            @if(file_exists(storage_path().'/app/public/brands/'.$brand->image ) && (!is_null($brand->image)))
                                <img src="{{ asset('storage/brands/'.$brand->image) }}" height="100">
                            @else
                                <img src="{{ asset('/default-avatar.png') }}">
                            @endif


                        </td>
                        <td>
                            <a href="{{ route('brands.show', $brand->id) }}" class="btn btn-sm btn-outline-info">Show</a>
                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>

{{--                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>--}}

                            <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
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
            {{--{{ $brands->links() }}--}}
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
