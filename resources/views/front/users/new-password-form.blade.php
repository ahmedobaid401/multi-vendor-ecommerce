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
	<h4 class="">set new password</h4>
	 
	 
	<p id="user-incorrect"> </p>
	
	<form method="post" action="{{url('user/put-new-password')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">

    <input type="hidden" name="email" value="{{$email}}">
   
   <div class="form-group">
		    <label class="info-title" for="user-name">  new password</label>
		    <input type="text" name="new-password" class="form-control unicase-form-control text-input" required>	 
		</div>

     <div class="form-group">
		    <label class="info-title" for="user-phone">confirm password</label>
		    <input type="text" name="confirm-password" class="form-control unicase-form-control text-input" required>
			 
		</div>

    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">send password</button>
  </form>				
</div>
<!-- Sign-in -->

<!-- create a new account -->
 
  	</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	 
   

	 
 
 	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection