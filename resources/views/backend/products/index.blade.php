@extends('backend.layouts.master')

@section('title', 'Products')

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
                <div class="col-md-6">Products</div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="dataTable">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th style="width: 150px; text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif
                    @foreach($products as $product)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $product->title }}</td>
                        <td>
                            @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                                <img src="{{ asset('storage/products/'.$product->image) }}" height="100">
                            @else
                                <img src="{{ asset('/default-avatar.png') }}">
                            @endif
                        </td>
                        <td>{{ isset($product->category) ? $product->category->title : '' }}</td>
                        <td>{{ $product->is_active ? 'Active' : 'Inactive' }}</td>
 <td>{{ $product->createdBy->name??null  }}</td>
 <td>
                             <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-info">Show</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
      <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
            {{ $products->links() }}
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

