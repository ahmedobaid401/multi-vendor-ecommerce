<div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                    @foreach($categoryproducts as $categoryproduct )
                    <?php 
                    
                      $arr=array();
                              if(count($categoryproduct->attributes) > 0){
                                
                             $attribute_object= $categoryproduct->attributes->first();
                             $size= $attribute_object->size;
                             $arr['size']=$size;
                             $befor_discount_price= $attribute_object->price;
                                 
                              }else{
                                $size=null;
                                $arr['size']=$size;
                                $befor_discount_price=  $categoryproduct['product_price'];
                                
                              }
                               if(count($categoryproduct['images']) > 0){
                                 $color= $categoryproduct['images'][0]->color;
                                 $arr['color']=$color;
                               }else{
                               $color= $categoryproduct['product_color'];
                               $arr['color']=$color;
                               }
                               $object_att_color=Illuminate\Support\Facades\DB::table("product_attribute_color")->where("product_id",$categoryproduct['id'])
                               ->where("size",$size)->where("color",$color)->first();
                               if($object_att_color){
                                $stock=$object_att_color->stock;
                                $arr['stock']=$stock;
                               }else{
                                $stock= $categoryproduct['product_stock'];
                                $arr['stock']=$stock;
                               }

                                 $getDiscountPrice = App\Models\Product::getDiscountPrice($categoryproduct['id'],$size);
                                 if($getDiscountPrice['discount_price']>0){
                                  $price=$getDiscountPrice['discount_price'];
                                 }else{
                                  if($getDiscountPrice['attribute_price']>0){
                                    $price=$getDiscountPrice['attribute_price'];
                                  }else{
                                    $price=$getDiscountPrice['product_price'];

                                  }
                                  
                                 }
                                 

                                ?>
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          @if(count($categoryproduct['images']) >0)
                          <div class="image"> <a href="{{url('product/'.$categoryproduct['id'].'/?size='.$size.'& color='.$color.'&stock='.$stock.'&price='.$price)}}"><img  src="{{url('uploaded/front/images/product_images/'.$categoryproduct['images'][0]->image)}}" alt=""></a> </div>
                          @else
                          <div class="image"> <a href="{{url('product/'.$categoryproduct['id'].'/?size='.$size.'&color='.$color.'&stock='.$stock .'&price='.$price)}}"><img  src="{{url('uploaded/front/images/product_images/small/'.$categoryproduct['product_image'])}}" alt=""></a> </div>
                          @endif
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                       
                        <h6 > {{$categoryproduct['product_code']}}/{{$categoryproduct['brand']['name']}}/{{$categoryproduct['product_color']}}  </h6> 
                          <h3 class="name"><a href="{{url('product/'.$categoryproduct['id'].'/'.$size)}}"> {{$categoryproduct->product_name}} </a></h3> 
                          <div class=" ">
                               @for($i=1; $i<=5; $i++)
                                    @if($i <= floor($categoryproduct->avg_rating))
                                        ⭐️
                                       @elseif( $i - $categoryproduct->avg_rating < 1 )
                                                                           
                                        ⭐️ (half star emoji or SVG)
                                        @else
                                        ☆
                                          
                                     @endif

                               @endfor
                          </div>
                          <div class="description">{{$categoryproduct['description']}}</div>
                          <div class="product-price">

                              
                                @if($getDiscountPrice['discount_price'] >0)
                                 <span class="price"> ${{$getDiscountPrice['discount_price']}} </span>
                                   <span class="price-before-discount">$ {{$befor_discount_price}}</span>
                               @else
                                <span class="price"> ${{$categoryproduct['product_price']}} </span>

                              @endif

                             </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                   @endforeach
                  <!-- /.item --> 
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
           
            
            <div class="tab-pane"  id="list-container">
                
              <div class="category-product">
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                  @foreach($categoryproducts as $categoryproduct )
                    <div class="product-list product">

                      <div class="row product-list-row">
                      
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <img src="{{url('uploaded/front/images/product_images/small/'.$categoryproduct['product_image'])}}" alt=""> </div>
                          </div>
                          <!-- /.product-image --> 
                          </div>
                       
                        <!-- /.col -->
                        
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="detail.html">${{$categoryproduct['product_price']}} </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">        
                               <?php  
                               if(!empty($categoryproduct['attributes']))
                               $getDiscountPrice = App\Models\Product::getDiscountPrice($categoryproduct['id']);
                                ?>
                            @if($getDiscountPrice['discount_price'] >0)
                                  <span class="price"> ${{$getDiscountPrice['discount_price']}} </span>
                                    <span class="price-before-discount">$ {{$categoryproduct['product_price']}}</span>
                             @else
                                    <span class="price"> ${{$categoryproduct['product_price']}} </span>

                            @endif
                        
                           </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-list-row -->
                      <div class="tag new"><span>new</span></div>
                    </div>
                    @endforeach
                    <!-- /.product-list --> 
                   
                  </div>
                  <!-- /.products --> 
                </div>
               
                <!-- /.category-product-inner -->
                           
              </div>
              <!-- /.category-product --> 
            </div>
           
            
            <!-- /.tab-pane #list-container --> 
          </div>