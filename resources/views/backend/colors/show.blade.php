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
                        <a href="{{ route('colors.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>{{ $color->name }}</th>
                        </tr>

                        <tr>
                            <th>Products</th>
                            <th>
                                <ul>
                                @foreach($color->products as $product)
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

