
@extends('front.layouts.layout')
@section('content')
 <style> 
	*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

 </style>
    
      <!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
</div>		
  
    
    
    	<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
		
														<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="assets/images/hot-deals/p5.jpg" alt="">
							</div>
							<div class="sale-offer-tag"><span>35%<br>off</span></div>
							<div class="timing-wrapper">
								<div class="box-wrapper">
									<div class="date box">
										<span class="key">120</span>
										<span class="value">Days</span>
									</div>
								</div>
				                
				                <div class="box-wrapper">
									<div class="hour box">
										<span class="key">20</span>
										<span class="value">HRS</span>
									</div>
								</div>

				                <div class="box-wrapper">
									<div class="minutes box">
										<span class="key">36</span>
										<span class="value">MINS</span>
									</div>
								</div>

				                <div class="box-wrapper hidden-md">
									<div class="seconds box">
										<span class="key">60</span>
										<span class="value">SEC</span>
									</div>
								</div>
							</div>
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
									$600.00
								</span>
									
							    <span class="price-before-discount">$800.00</span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								<div class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>													
									</button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
															
								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>		        
													<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="assets/images/products/p6.jpg" alt="">
							</div>
							<div class="sale-offer-tag"><span>35%<br>off</span></div>
							<div class="timing-wrapper">
								<div class="box-wrapper">
									<div class="date box">
										<span class="key">120</span>
										<span class="value">Days</span>
									</div>
								</div>
				                
				                <div class="box-wrapper">
									<div class="hour box">
										<span class="key">20</span>
										<span class="value">HRS</span>
									</div>
								</div>

				                <div class="box-wrapper">
									<div class="minutes box">
										<span class="key">36</span>
										<span class="value">MINS</span>
									</div>
								</div>

				                <div class="box-wrapper hidden-md">
									<div class="seconds box">
										<span class="key">60</span>
										<span class="value">SEC</span>
									</div>
								</div>
							</div>
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
									$600.00
								</span>
									
							    <span class="price-before-discount">$800.00</span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								<div class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>													
									</button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
															
								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>		        
													<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="assets/images/products/p7.jpg" alt="">
							</div>
							<div class="sale-offer-tag"><span>35%<br>off</span></div>
							<div class="timing-wrapper">
								<div class="box-wrapper">
									<div class="date box">
										<span class="key">120</span>
										<span class="value">Days</span>
									</div>
								</div>
				                
				                <div class="box-wrapper">
									<div class="hour box">
										<span class="key">20</span>
										<span class="value">HRS</span>
									</div>
								</div>

				                <div class="box-wrapper">
									<div class="minutes box">
										<span class="key">36</span>
										<span class="value">MINS</span>
									</div>
								</div>

				                <div class="box-wrapper hidden-md">
									<div class="seconds box">
										<span class="key">60</span>
										<span class="value">SEC</span>
									</div>
								</div>
							</div>
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
									$600.00
								</span>
									
							    <span class="price-before-discount">$800.00</span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								<div class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>													
									</button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
															
								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>		        
						
	    
    </div><!-- /.sidebar-widget -->
</div>
<!-- ============================================== HOT DEALS: END ============================================== -->					

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
         	<div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
		<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>
    
<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
        @if(!empty($product['images'] ))
           @foreach($product['images'] as $key=>$image)
            <div class="single-product-gallery-item" id="{{$key}}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset('uploaded/front/images/product_images/'.$image['image'])}}">
                    <img class="img-responsive"   src="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" data-echo="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->
        @endforeach
		@else
		<div class="single-product-gallery-item" id=" ">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset('uploaded/front/images/product_images/small/'.$product['product_image'])}}">
                    <img class="img-responsive"   src="{{asset('uploaded/front/images/product_images/small/'.$product['product_image'])}}" data-echo="{{asset('uploaded/front/images/product_images/small/'.$product['product_image'])}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

		@endif
        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
              
                @foreach($product['images'] as $key=>$image)
                <div class="item">
                  @if($loop->first)
                    <a class="horizontal-thumb active"  data-target="#owl-single-product" data-slide="{{$key}}" href="#{{$key}}">
                        <img class="img-responsive" width="85" alt="" src="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" data-echo="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" />
                    </a>
					@else
					<a class="horizontal-thumb"   data-target="#owl-single-product" data-slide="{{$key}}" href="#{{$key}}">
                        <img class="img-responsive" width="85" alt="" src="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" data-echo="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" />
                    </a>

					@endif
                </div>
                
                @endforeach         
                 
               
                
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"> {{$product["product_name"]}}</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->
							@if(isset($product["vendor"]))
                            <div> 
                               sold by :  {{$product["vendor"]["name"]}}
							</div>
							@endif
							<div class="stock-container info-container m-t-10">

								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Available sizes:</span>
										</div>	
									</div>
									<form action="{{url('cart/add')}}" method="post"  >
										@csrf
										<input type="hidden" name="product_id" value="{{$product['id']}}"/>
									<div class="col-sm-9">
										<div class="stock-box">
										@if(count($product['attributes']) > 0 )
											<select name="size" id="get_price" product_id="{{$product['id']}}" class="select-box product-size">
												 
											    	@foreach($product['attributes'] as $attribute)
											     	<option value="{{$attribute['size']}}" @if($attribute['size']==$size) selected @endif >{{$attribute['size']}}</option>				 
												    @endforeach
                                                
											</select>
										@endif
										 
										</div>	
									</div>
								</div><!-- /.row -->	

							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								 {{$product['description']}}
						  </div><!-- /.description-container --> 
						  <input id="selected-color" type="hidden" name="color" value="{{ $color}}"/>
						<div >color : <span class="color-ajax">{{ $color}}</span></div>
						<div > in stock : <span class="in-stock-ajax">{{ $stock}} </span></div>
						<input id="image-item" type="hidden" name="item_image" value=" "  />
					 @if(isset($product['images'])&&!empty($product['images']))
							<div class="row">
	@foreach($product['images'] as $key=>$image)
	
	   @if($image['is_orginal_image']=="yes")
	   <div class="col-md-3">
         
		<a class="horizontal-thumb color-photo"  color="{{$image['color']}}" image-name="{{$image['image']}}" data-target="#owl-single-product" data-slide="{{$key}}" href="#{{$key}}">
			<img class="img-responsive" width="70" height="50" alt="" src="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" data-echo="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" />
		</a>
	</div>
	@endif

	@endforeach 
	
					</div>
					 
				@endif
					
							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
										<?php $getDiscountPrice = App\Models\Product::getDiscountPrice($product['id'],$size);?>
									    	 @if($getDiscountPrice['discount_price'] > 0)
                                             <span class="price price-after-discount"> ${{$price}} </span>
											 <span class="price-before-discount">$ {{$getDiscountPrice['attribute_price']}}</span>
                                            @else
                                             <span class="price price-orginal"> ${{$product['product_price']}} </span>

                                            @endif

										</div>
									</div>
                                 
									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
												 
								                </div>
								                <input type="number" id="quantity-input" value="1" min="1"  name="quantity"/>
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<button type="submit" id="submit-button"   class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>

									</form>
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">product details</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<?php
										 $filters= App\Models\ProductsFilter::filter_available($product['category_id']);
										  
										 ?>               

											@foreach($filters as $filter)
											<div class="row"> 
										      <div class="col-md-6">{{$filter['filter_column']}} : {{$product[$filter['filter_column']]}} </div>
										       
										       
											</div>
										    @endforeach
                                       
									  
											 

										 
									   
									 																											 
																																																 																																						
									 
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
																										</div>
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<form method="post" action="{{url('add-rating')}}" class="cnt-form">
												@csrf
											<div class="rate">
													<input type="radio" id="star5" name="rate" value="5" />
													<label for="star5" title="text">5 stars</label>
													<input type="radio" id="star4" name="rate" value="4" />
													<label for="star4" title="text">4 stars</label>
													<input type="radio" id="star3" name="rate" value="3" />
													<label for="star3" title="text">3 stars</label>
													<input type="radio" id="star2" name="rate" value="2" />
													<label for="star2" title="text">2 stars</label>
													<input type="radio" id="star1" name="rate" value="1" />
													<label for="star1" title="text">1 star</label>
											    </div><br><br> <br><br>
											
											<div class="review-form">
												<div class="form-container">
													
													
														<div class="row">
															 

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->
                                   <div>
                                      <?php  
									  $count=0; 
                                        while($count<6){
											
											
                                       ?>

                                      <span style="color: gold;">&#9733;</span>
                                     <?php 
									  $count++; 
									}
										 
                                       ?>
								   </div>
								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">upsell products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p1.jpg" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p2.jpg" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p3.jpg" alt=""></a>
			</div><!-- /.image -->			

			                        <div class="tag hot"><span>hot</span></div>		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p4.jpg" alt=""></a>
			</div><!-- /.image -->			

			<div class="tag new"><span>new</span></div>                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/blank.gif" data-echo="assets/images/products/p5.jpg" alt=""></a>
			</div><!-- /.image -->			

			                        <div class="tag hot"><span>hot</span></div>		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/blank.gif" data-echo="assets/images/products/p6.jpg" alt=""></a>
			</div><!-- /.image -->			

			<div class="tag new"><span>new</span></div>                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->


 @endsection










 