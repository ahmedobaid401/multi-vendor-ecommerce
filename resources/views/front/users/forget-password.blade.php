@extends('front.layouts.layout')
@section('content')
 
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
@if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif

@if (session('error_message'))
    <div class="alert alert-danger">
        {{ session('ererror_messageror') }}
    </div>
@endif

<div class="load">
	<img src="{{asset('loaded-images/load.gif')}}">
</div>
	<h4 class="">Sign in</h4>
	 
	 
	<p id="user-incorrect"> </p>
	
	<form id="forgetPasswordForm" method="post"  class="register-form outer-top-xs" role="form">
	@csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" >
			<p id="user-email"></p>
		</div>
	  	 
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
 
  	</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	 
   

	 
 
 	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection