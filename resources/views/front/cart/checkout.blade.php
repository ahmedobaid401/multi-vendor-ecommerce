@extends('front.layouts.layout')
@section('content')
<?php //dd($addresses) ?>
  
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
@if($errors->any())
      @foreach($errors->all() as $error)
        <div class="btn-danger">
             <span>{{$error}}</span>
          </div>
       @endforeach
 @endif


<div class="body-content">
	<div class="container">
<!--   //////////////////// ********************************************************   -->
					 <!-- Button to trigger modal -->
					 <button type="button" id="add-new-address" class="btn btn-primary" data-toggle="modal" data-target="#addressModal">
    Add New Address
</button>

<!-- Address Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				
				
                <h5 class="modal-title" id="addressModalLabel">إضافة عنوان جديد</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form id="add-address-form"   method="post">
			@csrf
                    <div class="form-group">
                        <label for="addressType">عنوان فردي (المنزل - السكن)</label>
                        <select class="form-control" id="addressType">
                            <option>عنوان فردي</option>
                            <option>عنوان شركة</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="firstName">الاسم الأول</label>
                        <input type="text" class="form-control" id="firstName" placeholder="ahmed obaid">
                    </div>
                    <div class="form-group">
                        <label for="lastName">اسم العائلة</label>
                        <input type="text" class="form-control" id="lastName" placeholder="obaid">
                    </div>
                    <div class="form-group">
                        <label for="country">البلد</label>
                        <select class="form-control" id="country">
                            <option>تركيا</option>
                            <option>سوريا</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="province">الرجا اختيار محافظة</label>
                        <select class="form-control" id="province">
                            <option>اسطنبول</option>
                            <option>أنقرة</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">حي</label>
                        <input type="text" class="form-control" id="city" placeholder="حي">
                    </div>
                    <div class="form-group">
                        <label for="address">عنوان</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="أدخل معلومات الحي والشارع والشارع بالكامل"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notes">ملاحظات</label>
                        <input type="text" class="form-control" id="notes" placeholder="من أجل الإبلاغ عن التسليمات">
                    </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button id="add-address-submit" type="submit" class="btn btn-primary">حفظ</button>
           </form>
            </div>
        </div>
    </div>
</div>
<!--  /////////////////////////////////// ************************************  -->

		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		 
    <!-- panel-heading -->

	 
<!-- checkout-step-01  -->
					    
<div class="panel panel-default checkout-step-04">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
						        	<span>4</span>Shipping Method
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFour" class="panel-collapse collapse">
							    <div class="panel-body">
							     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							    </div>
					    	</div>
						</div>
<!--  //////////////////////////////////////////////////////////////   -->
                <form id="check-address"action="{{url('cart/checkout')}}" method="post">
                  @csrf
                       @if(count($addresses)>0)
						  <div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						          <span>2</span>Select Shipping Address
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
						      <div class="panel-body">
					
								
						     @foreach($addresses as $address)
							 <div class="control-group">   
							     <input id="address"name="address-id" value="{{$address['id']}}" type="radio">
								 <lable for="address">   {{$address['address']}} , {{$address['country']}} , {{$address['state']}} , {{$address['city']}}</lable>
							 </div>
							   						  				                               
							 @endforeach
						      </div>
						    </div>
					  	</div>

                       @endif
						<!-- checkout-step-03  -->
					   
					  	<!-- checkout-step-03  -->

						<!-- checkout-step-04  -->
					
						<!-- checkout-step-04  -->

						<!-- checkout-step-05  -->
					  	<div class="panel panel-default checkout-step-05">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
						        	<span>5</span>Payment Information
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse">
						      <div class="panel-body">
						            <!-- Payment Details -->
            <div class="col-md-6">
               
                
                    <div class="row">
                        
                    

                    <hr class="mb-4">

                     

                    

                    <hr class="mb-4">

                    <h4>Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" value="cod" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="credit">cash on delivery</label>
                        </div>
                       
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod"  value="PayPal"type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder=""  >
                            <small class="text-muted">Full name as displayed on card</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" >
                        </div>
                    </div>

                    <hr class="mb-4">
					 
					<input type="radio" name="accept" value="yes" class="" id="" placeholder="" required>
					<label for="cc-cvv">I've read an accept the terms & condition  </label>


                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>

						      </div>
						    </div>
					    </div>
					     
					  	
					</div><!-- /.checkout-steps -->
				</div>
				 
 
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->




@endsection