@extends('frontend/layouts/master')
@section('content')

   <div class="site-blocks-cover" data-aos="fade">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-5 text-center">
            <div class="featured-hero-product w-100">
              <h1 class="mb-2">Madewell</h1>
              <h4>Summer Collection</h4>
              <div class="price mt-3 mb-5"><strong>1,499</strong> <del>$1,999</del></div>
              <p><a href="#" class="btn btn-outline-primary rounded-0">Shop Now</a> <a href="#" class="btn btn-primary rounded-0">Shop Now</a></p>
            </div>  
          </div>
          <div class="col-lg-7 align-self-end text-center text-lg-right">
            <img src="{{asset('ui/frontend')}}/images/model_woman_1.png" alt="Image" class="img-fluid img-1">
          </div>
          
        </div>
      </div>
      
    </div>


<div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Dealers Clothing</h2>
          </div>

          <div class="col-md-12 col-lg-12 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                @foreach($categories as $category)

            <div class="icon mr-5 align-self-start">
               <a href="{{ route('products.list', $category->id) }}" class="item">
                    @if(file_exists(storage_path().'/app/public/categories/'.$category->image ) && (!is_null($category->image)))
                     <img src="{{ asset('storage/categories/'.$category->image) }}" alt="img"  class="card-img-top" style="width:300px;height:250px">
                     @else
                     
                      <img src="{{ asset('/default-avatar.png') }}">
                  @endif
                              <div class="text">
                               <p>{!!  $category->description !!}</p>

                          </div>
               
                </a>
            </div>
              @endforeach

            
          </div>
         
          
        </div>
      </div>
    </div>


  
    <div class="products-wrap border-top-0">
            @foreach($categories as $count => $category)

      <div class="container-fluid">
        @foreach($category->products as $product)

        <div class="row no-gutters products">

          <div class="col-10 col-md-6 col-lg-6">

            <a href="{{ route('product.details', $product->id) }}" class="item">
              
              @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
              <img src="{{ asset('storage/products/'.$product->image) }}"  alt="Image" class="img-fluid" style="width:500px;height:600px">  
               @endif
              <div class="item-info">
                <h3>{{$product->title}}</h3>
                <span class="collection d-block">Summer Collection</span>
                <strong class="price">{{$product->unit_price}}</strong>
              </div>
            </a>
                               

          </div>
          <div class="col-10 col-md-6 col-lg-6">
            <a href="{{ route('product.details', $product->id) }}" class="item">
              <span class="tag">Sale</span>
             @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
              <img src="{{ asset('storage/products/'.$product->image) }}"  alt="Image" class="img-fluid" style="width:500px;height:600px"> 
 @endif
              <div class="item-info">
                <h3>{{$product->title}}</h3>
                <span class="collection d-block">Summer Collection</span>
                <strong class="price">{{$product->unit_price}}</del></strong>
              </div>
            </a>
          </div>
         


        </div>
        @endforeach
      </div>
      @endforeach
    </div>
  </div>

    

    <div class="site-blocks-cover inner-page py-5"  data-aos="fade">
              @foreach($products as $product)

      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 ml-auto order-lg-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>{{$product->title}}</h1>
            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
            </div>
          </div>
          <div class="col-lg-8 order-1 align-self-end">
           
            @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
             <img src="{{ asset('storage/products/'.$product->image) }}" alt="Image"
              style="width:500px;height:600px" class="img-fluid">
             @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>

   
<div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Shop on Instra</h2>
          </div>

          <div class="col-md-12 col-lg-12 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                                    @foreach($products as $product)

            <div class="icon mr-6 align-self-start">
               @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                        <a href="{{ route('product.details', $product->id) }}"><img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="card-img-top"></a>
                    @endif
            </div>
                           @endforeach

            
          </div>
         
          
        </div>
      </div>
    </div>




@endsection