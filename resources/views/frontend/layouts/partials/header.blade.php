   
  <div class="site-wrap">
    

    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.html" class="js-logo-clone">Dealers</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">

                <li>

                  <a href="{{route('welcome')}}">Home</a></li>
                   <li><a href="{{route('about')}}">About</a></li>


                    @foreach($categories  as $category)

                  <li class="has-children active">
            <a href="{{ route('products.list', $category->id) }}">
                      {{ $category->title }}</a>
                    
             <ul class="dropdown">
                @foreach($category->subCategories as $subCategory)

             <li><a href="{{ route('products.list', [$category->id, $subCategory->id]) }}">{{ $subCategory->title }}</a></li>
                                       
                                       
                                       @endforeach
                                       </ul> 
                                        
                    @endforeach
                
                  
                </li>
                
                <li><a href="{{route('blogs')}}">Blogs</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="{{route('shopping_bag')}}" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span></a>

            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>