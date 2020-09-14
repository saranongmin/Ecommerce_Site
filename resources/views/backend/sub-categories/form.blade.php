<div class="form-row">
    <div class="col-md-12 mb-3">
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
        {{ Form::label('image', 'Sub Category Image') }}<br>

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

@push('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endpush




