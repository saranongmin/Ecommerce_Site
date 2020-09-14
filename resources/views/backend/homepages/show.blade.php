@extends('backend.layouts.master')

@section('title', 'Colors Details')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">Show Color</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('brands.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>{{ $brand->name }}</th>
                        </tr>
                        <tr>
                            <th> Image</th>
                            <th>
                            @if(file_exists(storage_path().'/app/public/brands/'.$brand->image ) && (!is_null($brand->image)))
                                <img src="{{ asset('storage/brands/'.$brand->image) }}" height="100">
                            @else
                                <img src="{{ asset('/default-avatar.png') }}">
                            @endif
                            </th>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

