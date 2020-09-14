
 @extends('frontend/layouts/master')
 @section('title', 'Checkout')

@push('ssl_script')
    <script>

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };
            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);

    </script>
@endpush
@section('content')
  
    
    <div class="bg-light py-3" style="margin-top: 60px">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <h4 class="mt-sm-0 mt-3">Your shopping cart contains:
                    <span>{{ count($products) }} Products</span>
                </h4>
        <div class="row mb-5">
           @if(session()->has('status'))
                    <div class="alert alert-success">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif
 <form action="{{ route('place_order') }}" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                    @csrf

              <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-number">
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                   @if(count($products)>0)
                    @foreach($products as $product)

                    <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
                  <tr class="rem{{$product->id}}">
                    <td class="product-number">{{ $loop->iteration }}</td>
                    <td class="product-thumbnail">
                     <!--  <img src="images/product_1.jpg" alt="Image" class="img-fluid"> -->
                      <a href="{{ route('product.details', $product->id) }}">
                                @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                                    <img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="img-fluid">
                                @else
                                    <img src="{{ asset('/default-avatar.png') }}">
                                @endif
                            </a>
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{ $product->title }}</h2>
                    </td>
                    <td>{{ $product->unit_price }} TK</td>
                    <td>
                      <div class="input-group mb-4">
                        
                       <input type="number" id="quantity{{ $product->id }}" name="quantity[]" value="">
                        
                      </div>

                    </td>
                    <td>
                      <div class="rem">
                      <div class="close{{ $product->id }}" 
                                    onclick="removeFromCart({{ $product->id }})"></div>
                            </div>

                          </td>
                  </tr>
                   @endforeach
                    @endif

                </tbody>
              </table>
            </div>
          </form>
        </div>

        
      </div>
    </div>

  </div>
@endsection

    @push('css')
    <link href="{{ asset('ui/frontend') }}/css/checkout.css" type="text/css" rel="stylesheet" media="all">
    @endpush
@push('script')

<script>
    hub.render();

    hub.cart.on('new_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->
<!--quantity-->
<script>
    $('.value-plus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) + 1;
        divUpd.text(newVal);
    });

    $('.value-minus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) - 1;
        if (newVal >= 1) divUpd.text(newVal);
    });
</script>
<!--quantity-->
<!-- FadeOut-Script -->
<script>
    $(document).ready(function (c) {
        $('.close1').on('click', function (c) {
            $('.rem1').fadeOut('slow', function (c) {
                $('.rem1').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function (c) {
        $('.close2').on('click', function (c) {
            $('.rem2').fadeOut('slow', function (c) {
                $('.rem2').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function (c) {
        $('.close3').on('click', function (c) {
            $('.rem3').fadeOut('slow', function (c) {
                $('.rem3').remove();
            });
        });
    });
</script>
<!--// FadeOut-Script -->
@endpush