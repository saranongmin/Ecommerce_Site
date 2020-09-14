@extends('backend.layouts.master')

@section('title', 'Category Create')

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
                <div class="col-md-6">Create Category</div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(['route'=> 'categories.store','files'=>true]) }}
{{--            <form action="{{ route('categories.store') }}" method="post">--}}
{{--                @csrf--}}
                @include('backend.categories.form')
{{--                <button class="btn btn-primary" type="submit">Submit form</button>--}}
                {{ Form::button('Submit form', [
                    'class' => 'btn btn-primary',
                    'type' => 'submit',
                ]) }}
                {{--            </form>--}}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
