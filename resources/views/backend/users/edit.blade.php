@extends('backend.layouts.master')

@section('title', 'Profile Edit')

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
                    <div class="col-md-6">Edit Profile</div>
                    <div class="col-md-6 text-right">
{{--                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">List</a>--}}
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
                    {{ Form::model($user, [
                        'route' => ['users.update', $user->id],
                        'method' => 'put',
                        'files' => true
                    ]) }}
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            {{--        <label for="title">Title</label>--}}
                            {{ Form::label('name', 'Name') }}

                            {{ Form::text('name', null, [
                                'class' => $errors->has('name') ?  'form-control is-invalid': 'form-control',
                                'placeholder' => 'Enter Name Here.....',
                                'id' => 'name'
                            ]) }}
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            {{--        <label for="title">Title</label>--}}
                            {{ Form::label('picture', 'Profile Picture') }}<br>

                            {{ Form::file('picture', null, [
                                'class' => $errors->has('picture') ?  'form-control is-invalid': 'form-control',
                                'id' => 'picture'
                            ]) }}
                            @error('picture')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        {{ Form::label('bio', 'Bio') }}
                            {{--        <textarea name="description" id="description" class="form-control">{{ isset($category) ? $category->description : null }}</textarea>--}}
                            {{ Form::textarea('bio', $user->profile->bio, [
                                'class' => $errors->has('bio') ?  'form-control is-invalid': 'form-control',
                                'id' => 'bio',
                                'rows' => '2',
                            ]) }}
                        </div>
                        @error('bio')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{--title, description, category_id, is_active--}}

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
