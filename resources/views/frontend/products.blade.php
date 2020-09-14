@extends('frontend.layouts.master')

@section('title', 'Products')

@section('content')

    <!-- inner banner -->

    <div class="site-section">
      <div class="bg-light py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{route('welcome')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

            <div class="col-lg-12 mt-lg-0 mt-6 right-product-grid">
                <div class="card-group">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-sm-6 p-0">
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">


                                    @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                                        <img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="card-img-top">
                                    @else
                                        <img src="{{ asset('/default-avatar.png') }}">
                                    @endif


                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{ route('product.details', $product->id) }}" class="link-product-add-cart">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize">{{ $product->title}}</h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold">TK {{ $product->discount_price }}</p>
                                        <p class="line-through">TK {{ $product->unit_price }}</p>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
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
             <span class="hub-cart phub-cart btn" onclick="addToCart({{ $product->id }})">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script src="{{ asset('ui/frontend') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('ui/frontend') }}/js/add-to-cart.js"></script>
    <script>
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
