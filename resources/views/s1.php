    @extends('frontend/layouts/master')
@section('content')

    

    <div class="site-section">
      <div class="bg-light py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{route('welcome')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

<!--     @foreach($products->chunk(4) as $productChunk)
 -->        <div class="row">
<!--         @foreach($productChunk as $product)
 -->            <div class="col-md-3">
                    @foreach($products as $product)

                <div class="thumbnail">
       <a href= "{{route('product.details', $product->id) }}">
        @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
           <img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="img-responsive">
            @else
            <img src="{{ asset('/default-avatar.png') }}">
                                    @endif
                                  </a>
                    <div class="caption">
                        <h3>{{ $product->title }}</h3>
                               <strong class="price"> TK {{ $product->discount }}<del> TK {{ $product->unit_price }}</del></strong>

                   <div class="product-icon-container">
 <form action="#" method="post">
                                         <input type="hidden" name="cmd" value="_cart">
                                        <input type="hidden" name="add" value="1">
                                        <input type="hidden" name="hub_item" value="Blue Wedding Formal Blazer">
                                        <input type="hidden" name="amount" value="13.00">
                   @if(in_array($product->id, $productIds))
                                            <span type="submit" class="hub-cart phub-cart btn">
                           <i class="fas fa-shopping-bag" aria-hidden="true"></i> Already In Cart
                                            </span>
                                        @else
                                            <div id="addToCart{{$product->id}}">
    <span class="btn-holder"><a href="#" onclick="addToCart('{{ $product->id }}')" class="btn btn-warning btn-block text-center">Add to Cart
                                                </a>  </span>                                        
                                          </div>
                                        @endif
                                      </form>

                                       </div>

                        
                    </div>
                </div>
        @endforeach

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

              <div class="product">
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

              

            </div>
            @endforeach
          </div>
        </div>
         @endforeach
      </div>
    </div>
 
    



  @endsection
@push('script')
    <script src="{{ asset('ui/frontend') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('ui/frontend') }}/js/add-to-cart.js"></script>

    <script>
        //<![CDATA[
        $(window).load(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 9000,
                values: [50, 6000],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

        }); 



    </script>
@endpush


@push('css')
    <!-- flexslider-css -->
    <link rel="stylesheet" href="{{ asset('ui/frontend') }}/css/flexslider.css" type="text/css" media="screen" />
@endpush

