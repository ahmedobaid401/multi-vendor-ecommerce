 
    
 <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                @foreach($sections as $section)
                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$section["name"]}}</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                        @foreach($section["categories"] as $category)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                          
                            <h2 class="title"> <a href="{{url($category['url'])}}">{{$category["category_name"]}} </a> </h2>
                            
                            <ul class="links">
                            @if(isset($category["sub_categories"])&&count($category["sub_categories"])>0)
                                 @foreach($category["sub_categories"] as $subCategory) 
                                     <li><a href="{{url($subCategory['url'])}}">{{$subCategory["category_name"]}}</a></li>
                                 @endforeach
                            @endif
                              
                            </ul>
                          </div>
                          @endforeach
                          <!-- /.col -->                                                                                                                         
                          <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="{{asset('front/images/banners/banner-side.png')}}"></a> </div>
                        </div>
                        <!-- /.row --> 
                      </div>
                      <!-- /.yamm-content --> </li>
                  </ul>
                </li>
                @endforeach
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              <li><a href="home.html">Homepppppppp</a></li>
                              <li><a href="category.html">Category 9999999999999999999</a></li>
                              <li><a href="detail.html">Detail</a></li>
                              <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
                              <li><a href="checkout.html">Checkout</a></li>
                              <li><a href="blog.html">Blog</a></li>
                              <li><a href="blog-details.html">Blog Detail</a></li>
                              <li><a href="contact.html">Contact</a></li>
                              <li><a href="sign-in.html">Sign In</a></li>
                              <li><a href="my-wishlist.html">Wishlist</a></li>
                              <li><a href="terms-conditions.html">Terms and Condition</a></li>
                              <li><a href="track-orders.html">Track Orders</a></li>
                              <li><a href="product-comparison.html">Product-Comparison</a></li>
                              <li><a href="faq.html">FAQ</a></li>
                              <li><a href="404.html">404</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
              </ul>