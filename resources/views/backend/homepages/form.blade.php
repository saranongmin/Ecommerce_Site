<div class="form-row">
    <div class="col-md-12 mb-3">
{{--        <label for="title">Title</label>--}}
        {{ Form::label('name', 'Name') }}

{{--        <input name="title" type="text" class="form-control" value="--}}
{{--            @if(old('title') == '')--}}
{{--                {{  isset($category) ? $category->title : null }}--}}
{{--            @else--}}
{{--             {{ old('title') }}--}}
{{--            @endif--}}
{{--            " placeholder="Title">--}}
        {{ Form::text('name', null, [
            'class' => $errors->has('name') ?  'form-control is-invalid': 'form-control',
            'placeholder' => 'Enter Brand Name.....',
            'id' => 'name'
        ]) }}
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-row">
        <div class="col-md-12 mb-3">
            {{--        <label for="title">Title</label>--}}
            {{ Form::label('image', 'Brand Image') }}<br>

            {{ Form::file('image', null, [
                'class' => $errors->has('image') ?  'form-control is-invalid': 'form-control',
                'id' => 'image'
            ]) }}
            @error('picture')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>



{{--title, description, category_id, is_active--}}
