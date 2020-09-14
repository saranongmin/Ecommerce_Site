@extends('backend.layouts.master')

@section('title', 'Categories')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">Categories (Trash)</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{--                id="dataTable"--}}
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th style="width: 230px; text-align: center;">Action</th>
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
                                <td>{{ $category->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('categories.show_trash', $category->id) }}" class="btn btn-sm btn-outline-info">Show</a>

                                    {!! Form::open([
                                           'route' => ['categories.restore_trash', $category->id],
                                           'method' => 'put',
                                           'style' => 'display:inline'
                                    ]) !!}
                                        <button type="submit" class="btn btn-sm btn-outline-warning" onclick="return confirm('Are You Sure Want To Restore?')">Restore</button>
                                    {!! Form::close() !!}

                                    {!! Form::open([
                                           'route' => ['categories.delete_trash', $category->id],
                                           'method' => 'delete',
                                           'style' => 'display:inline'
                                    ]) !!}
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure Want To Delete Permanently?')">Delete</button>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
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
