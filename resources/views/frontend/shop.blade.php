    @extends('frontend/layouts/master')
@section('content')

    

    <div class="site-section">
      <div class="bg-light py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>
      <div class="container">

        <div class="row mb-5">

          <div class="col-lg-9 order-2 order-lg-1">

            <div class="row align">
              <div class="col-md-12 mb-5">
                <div class="float-md-left"><h2 class="text-black h5">Shop All</h2></div>
               


                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Latest
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Men</a>
                      <a class="dropdown-item" href="#">Women</a>
                      <a class="dropdown-item" href="#">Children</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevance</a>
                      <a class="dropdown-item" href="#">Name, A to Z</a>
                      <a class="dropdown-item" href="#">Name, Z to A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Price, low to high</a>
                      <a class="dropdown-item" href="#">Price, high to low</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <div class="products-wrap border-top-0">
  <div class="container-fluid">
    <div class="row no-gutters products">
      <div class="col-6 col-md-6 col-lg-6 border-top">
        <a href="{{route('shop-single')}}" class="item">
          <img src="{{asset('ui/frontend')}}/images/product_1.jpg" alt="Image" class="img-fluid">
          <div class="item-info">
            <h3>The Shoe</h3>
            <span class="collection d-block">Summer Collection</span>
            <strong class="price">$9.50</strong>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-6 col-lg-6 border-top">
        <a href="{{route('shop-single')}}" class="item">
          <span class="tag">Sale</span>
          <img src="{{asset('ui/frontend')}}/images/product_2.jpg" alt="Image" class="img-fluid">
          <div class="item-info">
            <h3>Marc Jacobs Bag</h3>
            <span class="collection d-block">Summer Collection</span>
            <strong class="price">$9.50 <del>$30.00</del></strong>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-6 col-lg-6">
        <a href="{{route('shop-single')}}" class="item">
          <img src="{{asset('ui/frontend')}}/images/product_3.jpg" alt="Image" class="img-fluid">
          <div class="item-info">
            <h3>The  Belt</h3>
            <span class="collection d-block">Summer Collection</span>
            <strong class="price">$9.50</strong>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-6 col-lg-6">
        <a href="{{route('shop-single')}}" class="item">
          <img src="{{asset('ui/frontend')}}/images/product_1.jpg" alt="Image" class="img-fluid">
          <div class="item-info">
            <h3>The Shoe</h3>
            <span class="collection d-block">Summer Collection</span>
            <strong class="price">$9.50</strong>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-6 col-lg-6">
        <a href="{{route('shop-single')}}" class="item">
          <span class="tag">Sale</span>
          <img src="{{asset('ui/frontend')}}/images/product_2.jpg" alt="Image" class="img-fluid">
          <div class="item-info">
            <h3>Marc Jacobs Bag</h3>
            <span class="collection d-block">Summer Collection</span>
            <strong class="price">$9.50 <del>$30.00</del></strong>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-6 col-lg-6">
        <a href="{{route('shop-single')}}" class="item">
          <img src="{{asset('ui/frontend')}}/images/product_3.jpg" alt="Image" class="img-fluid">
          <div class="item-info">
            <h3>The  Belt</h3>
            <span class="collection d-block">Summer Collection</span>
            <strong class="price">$9.50</strong>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="border p-4 mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Men</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li>
              </ul>
            </div>

            <div class="border p-4 mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                <label for="s_sm" class="d-flex">
                  <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
                </label>
                <label for="s_md" class="d-flex">
                  <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
                </label>
                <label for="s_lg" class="d-flex">
                  <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
                </label>
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                </a>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">The Collections</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              
              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_1.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="{{asset('ui/frontend')}}/images/product_2.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="{{asset('ui/frontend')}}/images/product_3.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="{{asset('ui/frontend')}}/images/product_1.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="{{asset('ui/frontend')}}/images/product_2.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="{{asset('ui/frontend')}}/images/product_3.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

   @endsection