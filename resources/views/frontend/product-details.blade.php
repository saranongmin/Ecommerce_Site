@extends('frontend.layouts.master')

@section('title', 'Product Details')

@section('content')

<div class="site-section">

       <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{route('welcome')}}">Home</a> <span class="mx-2 mb-0">/</span> <a href="#">Product</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Product Details</strong></div>
        </div>
      </div>
    </div>  
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="border">                            
     @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
    <img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="card-img-top">
                                    @else
                 <img src="{{ asset('/default-avatar.png') }}">
                                    @endif

                               
          @foreach($product->pictures as $img)
       @if(file_exists(storage_path().'/app/public/products/'.$img->picture ) && (!is_null($img->picture)))

                                 
                                @endif

                            @endforeach
                        </div>
                    </div>
                
           
           <div class="col-md-6">
                <h2 class="text-black">{{ $product->title }}</h2>

                <p><strong class="text-primary">{!! $product->description !!}</p>
<p class="mb-4">{!! $product->description !!}</p>
                    
                                        <strong class="price"> TK {{ $product->discount}}<del>  TK {{$product->unit_price}}</del></strong>

         
             {!! Form::open([
                                        'route'=>['place_order', $product->id]
                                ]) !!}

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            {!! Form::number('quantity', 1, ['class'=>'form-control']) !!}
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            {{ Form::label('size', 'Sizes : ',['class'=>'pr-3']) }}
                            @foreach($product->sizes as $key=>$size)
                                {!! Form::radio('size', $size->name) !!}{{ $size->name }}
                            @endforeach
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            {{ Form::label('color', 'Colors : ',['class'=>'pr-3']) }}
                            @foreach($product->colors as $key=>$color)
                                {!! Form::radio('color', $color->name) !!}{{ $color->name }}
                            @endforeach
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            {{ Form::label('shipping_address', 'Shipping Address : ', ['class'=>'pr-3']) }}
                            {!! Form::textarea('shipping_address', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>



                    <button class="btn btn-info" type="submit">Place Order</button>
                    {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
    


 <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">More Products</h2>
          </div>
        </div>
                    @foreach($products->chunk(4) as $items)

        <div class="row">
                          @foreach($items as $product)

          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              
              <div class="product">
                <a href="{{ route('product.details', $product->id) }}" class="item">
                   @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="Image" class="img-fluid"/>
                            @endif

                  <div class="item-info">
                    <h3>{{$product->title}}</h3>
                                <strong class="price">Tk {{$product->discount}} <del>Tk {{ $product->unit_price }}</del></strong>

                 
                  </div>
                </a>
              </div>

             <!--  <div class="product">
                <a href="shop-single.html" class="item">

                  <span class="tag">Sale</span>
                  @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="card-img-top"/>
                            @endif
                  <div class="item-info">
                    <h3>{{$product->title}}</h3>
                    <span class="collection d-block">Tk {{ $product->unit_price }}</span>
                    <strong class="price">Tk {{$product->discount}}</strong>
                  </div>
                </a>
              </div>
 -->
             

              

            </div>
            @endforeach
          </div>
        </div>
         @endforeach
      </div>
    </div>

    
  @endsection
