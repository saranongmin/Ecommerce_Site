@extends('backend.layouts.master')

@section('title', 'Category Details')

@section('content')
    <div class="container-fluid"style="margin-top:20px;
margin-right:00px;
width: 80%;
    padding-right: 15px;
    padding-left: 15px;">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">Show Product</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary">List</a>
                    </div>
                </div>
            </div>

            <div class="p-4">
                <h5> Product Image : </h5>
                @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                    <img src="{{ asset('storage/products/'.$product->image) }}" height="100">
                @else
                    <img src="{{ asset('/default-avatar.png') }}">
                @endif
            </div>

            <div class="p-3">
            <h6> Product Multiple Images : </h6>
                @foreach($product->pictures as $img)
                    @if(file_exists(storage_path().'/app/public/products/'.$img->picture ) && (!is_null($img->picture)))
                        <img src="{{ asset('storage/products/'.$img->picture) }}" height="100">
                    @endif
                @endforeach
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>{{ $product->title }}</th>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <th>{{ $product->description }}</th>
                        </tr>
                        <tr>
                            <th>Colors : </th>
                            <th>
                                @foreach($product->colors as $color)
                                    <li>{{ $color->name }}</li>
                                @endforeach
                            </th>
                        </tr>
                        <tr>
                            <th>Tags : </th>
                            <th>
                                @foreach($product->tags as $tag)
                                    <li>{{ $tag->name }}</li>
                                @endforeach
                            </th>
                        </tr>
                        <tr>
                            <th>Size : </th>
                            <th>
                                @foreach($product->sizes as $size)
                                    <li> {{$size->name}} </li>
                                    @endforeach
                            </th>
                        </tr>

                    </tbody>
                </table>


                @if(count($product->comments)>0)
                <h3>Comments</h3>
                    <ol>
                      @foreach($product->comments as $comment)
                         <li>
                             {{ $comment->body }}
                            Commented At <mark>{{ $comment->created_at->toFormattedDateString()  }}   {{ $comment->created_at->diffForHumans()  }}</mark>
                            By <mark>{{ $comment->commentedBy->name  }}</mark>
                         </li>
                      @endforeach
                    </ol>
                @endif


                {!! Form::open([
                 'route' => ['products.comment', $product->id]
                ]) !!}

                {!! Form::label('body', 'Write Your Comment...') !!}

                {!! Form::textarea('body', null, [
                   'class' => 'form-control',
                   'id' => 'body'
                ]) !!}

                {!! Form::button('Post Comment', [
                    'class' => 'btn btn-primary',
                    'type' => 'submit'
                ]) !!}

                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection

