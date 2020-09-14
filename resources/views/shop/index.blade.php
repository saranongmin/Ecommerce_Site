@extends('frontend.layouts.master')

@section('title', 'Products')
@section('content')

    @foreach($products->chunk(4) as $productChunk)
        <div class="row">
        @foreach($productChunk as $product)
            <div class="col-md-3">
                <div class="thumbnail">
 @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
    <img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="card-img-top">
    @endif                    <div class="caption">
                        <h3>{{ $product->title }}</h3>
                        <p class="description">{{ $product->description }}</p>
                    </div>
                         <div id="addToCart{{$product->id}}">
                                                <span class="hub-cart phub-cart btn"
                                                        onclick="addToCart('{{ $product->id }}')">
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </span>
                                            </div>
                    </div>
                </div>

            </div>
        @endforeach
        </div>
    @endforeach

@endsection