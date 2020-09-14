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
        {{ Form::label('image', 'Category Image') }}<br>

        {{ Form::file('image', null, [
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

        {{ Form::textarea('description', null, [
            'class' => $errors->has('description') ?  'form-control is-invalid': 'form-control',
            'id' => 'description',
            'rows' => '2',
        ]) }}
    </div>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
{{ Form::label('is_active', 'Status') }}
</div>
        {{ Form::radio('is_active', '1', [
            'class' => $errors->has('is_active') ?  'form-control is-invalid': 'form-control',
            'id' => 'is_active',
            
        ]) }} Active
        {{ Form::radio('is_active', '0', [
            'class' => $errors->has('is_active') ?  'form-control is-invalid': 'form-control',
            'id' => 'is_active',
            
        ]) }} Inactive
    </div>
    @error('is_active')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>