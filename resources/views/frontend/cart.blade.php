 @extends('frontend/layouts/master')
@section('content')
    
  

    <div class="site-section">
        <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{route('welcome')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="row mb-5">
<h4>review your order
                </h4>
                <h4 class="mt-sm-0 mt-3">Your shopping cart contains:
                    <span>{{ count($errors) }} Products</span>
                </h4>
            </div>
            <div class="checkout-right">

                @if(session()->has('status'))
                    <div class="alert alert-success">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <form action="{{ route('place_order') }}" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                    @csrf            <div class="site-blocks-table">
              
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th class="product">ID</th>

                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>

                <tbody>
                    @if(count($errors)>0)
                    @foreach($errors as $product)

                    <input type="hidden" name="product_ids[]" value="{{ $product->id }}">

                  <tr class="rem{{$product->id}}">
                   <td class="product">{{ $loop->iteration }}</td>

                    <td class="product-thumbnail">
                     <a href="{{ route('product.details', $product->id) }}">
                                @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))
                                    <img src="{{ asset('storage/products/'.$product->image) }}" alt="img" class="card-img-top">
                                @else
                                    <img src="{{ asset('/default-avatar.png') }}">
                                @endif
                            </a>
                    </td>
                    
                    <td class="product-name">
                      <h2 class="h5 text-black">{{ $product->title }}</h2>
                    </td>
                    <td class="product-price">
                      <h2 class="h5 text-black">{{ $product->unit_price }}</h2>
                    </td>
                    <td class="product-quantity">
                            <div class="quantity">
                                <div class="quantity-select">

                                        <input type="number" id="quantity{{ $product->id }}" name="quantity[]" value="">
                                    </div>

                            </div>
                        </td>
                    
                    <td>

                      <div class="product-remove">
                        <div class="rem">
                                <div class="close{{ $product->id }}" 
                                    onclick="removeFromCart({{ $product->id }})"> 
                                </div>
                            </div>
                          </div>

                    </td>
                  </tr>
                      @endforeach


                </tbody>
                @endif
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          
         
        
 <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Returning customer? <a href="{{route('welcome')}}">Click here</a> to back to Shopping
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
             <form action="{{ route('payment_test') }}" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                        @csrf
            <div class="p-3 p-lg-5 border">
             
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                
              </div>

             

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Street address">
                </div>
              </div>

             

              <div class="form-group row mb-5">
                <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                </div>
              </div>        


            

             
            </div>
          </div>

        </div>
        <!-- </form> -->
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