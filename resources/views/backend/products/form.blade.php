
<div class="form-row">
    <div class="col-md-12 mb-3">
        {{--        <label for="title">Title</label>--}}
        {{ Form::label('category', 'Category') }}
        {{ Form::select('category_id', $categories, null, [
            'class' => $errors->has('category') ?  'form-control is-invalid': 'form-control',
            'placeholder' => 'Select One',
            'id' => 'category'
        ]) }}
        @error('category')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('sub_category_id', 'Sub Category') }}
        {{ Form::select('sub_category_id', $subCategories, null, [
            'class' => $errors->has('sub_category_id') ?  'form-control is-invalid': 'form-control',
            'placeholder' => 'Select One',
            'id' => 'sub_category_id'
        ]) }}
        @error('sub_category_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
{{--        <label for="title">Title</label>--}}
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, [
            'class' => $errors->has('title') ?  'form-control is-invalid': 'form-control',
            'placeholder' => 'Enter Title Here.....',
            'id' => 'title'
        ]) }}
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
{{--        <label for="title">Title</label>--}}
        {{ Form::label('unit_price', 'Unit Price') }}
        {{ Form::number('unit_price', null, [
            'class' => $errors->has('unit_price') ?  'form-control is-invalid': 'form-control',
            'placeholder' => 'Enter Unit Price .....',
            'id' => 'unit_price'
        ]) }}
        @error('unit_price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
{{--        <label for="title">Title</label>--}}
        {{ Form::label('discount', 'Discount') }}
        {{ Form::number('discount', null, [
            'class' => $errors->has('discount') ?  'form-control is-invalid': 'form-control',
            'placeholder' => 'Enter Discount Price .....',
            'id' => 'discount'
        ]) }}
        @error('discount')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
{{--        <label for="title">Title</label>--}}
        {{ Form::label('code', 'Code') }}
        {{ Form::text('code', null, [
            'class' => $errors->has('code') ?  'form-control is-invalid': 'form-control',
            'placeholder' => 'Enter Discount Price .....',
            'id' => 'code'
        ]) }}
        @error('code')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('image', 'Product Image') }}<br>

        {{ Form::file('image', ['accept'=>'image/*'], [
            'class' => $errors->has('image') ?  'form-control is-invalid': 'form-control',
            'id' => 'image'
        ]) }}
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('picture', 'Multiple Product Image') }}<br>
        {!! Form::file('picture[]',
        ['multiple'=>true,'class'=>'form-control']) !!}
        @error('picture')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, [
            'class' => $errors->has('description') ?  'form-control is-invalid': 'form-control',
            'id' => 'ckeditor',
            'rows' => '2',
        ]) }}
    </div>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-row">
    <div class="col-md-12 mt-2">
            {!! Form::label('is_active', 'Is Active : ', ['class'=>'pr-3 col-form-label text-right ']) !!}
            <strong> Active : </strong>
            {{ Form::radio('is_active', '1' , true) }}
            <strong class="ml-2"> Inactive : </strong>
            {{ Form::radio('is_active', '0' , false) }}

            @if ($errors->has('is_active'))
                <span class="help-block text-danger">
                     <strong>{{ $errors->first('is_active') }}</strong>
                </span>
            @endif
        </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('brand', 'Brands : ',['class'=>'pr-3']) }}
        @foreach($brands as $key=>$brand)
            {!! Form::checkbox('brand[]', $key, in_array($key, $selectedBrands)) !!}{{ $brand }}
        @endforeach
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('size', 'Sizes : ',['class'=>'pr-3']) }}
        @foreach($sizes as $key=>$size)
            {!! Form::checkbox('size[]', $key, in_array($key, $selectedSizes)) !!}{{ $size }}
        @endforeach
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('color', 'Colors : ',['class'=>'pr-3']) }}
        @foreach($colors as $key=>$color)
            {!! Form::checkbox('color[]', $key, in_array($key, $selectedColors)) !!}{{ $color }}
        @endforeach
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        {{ Form::label('tag', 'Tag : ',['class'=>'pr-4']) }}
        @foreach($tags as $key=>$tag)
            {!! Form::checkbox('tag[]', $key, in_array($key, $selectedTags)) !!}{{ $tag }}
        @endforeach
    </div>
</div>

@push('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endpush
