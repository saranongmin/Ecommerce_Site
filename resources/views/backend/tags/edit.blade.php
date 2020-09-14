@extends('backend.layouts.master')

@section('title', 'Tag Edit')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">Edit Tag</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('tags.index') }}" class="btn btn-sm btn-outline-primary">List</a>
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
                {{ Form::model($tag, [
                    'route' => ['tags.update', $tag->id],
                    'method' => 'put'
                ]) }}
{{--                <form action="{{ route('tags.update', $tag->id) }}" method="post">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
                    @include('backend.tags.form')
{{--                    <button class="btn btn-primary" type="submit">Submit form</button>--}}
                    {{ Form::button('Submit form', [
                        'type' => 'submit',
                        'class' => 'btn btn-primary'
                    ]) }}
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
