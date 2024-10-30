
<!DOCTYPE html>
<html lang=" LaravelLocalization::getCurrentLocale()" dir="LaravelLocalization::getCurrentLocaleDirection()">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Flipmart premium HTML5 & CSS3 Template</title>

<!-- Bootstrap Core CSS -->
 @if( LaravelLocalization::getCurrentLocaleDirection()=="rtl")
 <link rel="stylesheet" href="{{asset('front/css/bootstrap.rtl.min.css')}}">
@else
<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
@endif
<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('front/css/main.css')}}">
<link rel="stylesheet" href="{{asset('front/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('front/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('front/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('front/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('front/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{asset('custom.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('front/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
              @if(Auth::check())
              
            <li><a href="{{route('userAccount',Auth::id())}}"><i class="icon fa fa-user"></i>My Account</a></li>
              @endif
            <li><a href="#"><i class="icon fa fa-heart"></i>{{__("wishlist")}}</a></li>
            <li><a href="{{url('cart/show')}}"><i class="icon fa fa-shopping-cart"></i> {{__("cart")}}</a></li>
            <li><a href="{{url('cart/checkout')}}"><i class="icon fa fa-check"></i>{{__("checkout")}}</a></li>
            <li><a href="{{url('user/register-login')}}"><i class="icon fa fa-lock"></i>{{__("register-login")}}</a></li>
          </ul>
        </div>
        <!-- /.cnt-account -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                 
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
           </li>
           @endforeach
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  @include("front/layouts/header")
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
    
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
     @yield("content")
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
   @include("front/layouts/brand")
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include("front/layouts/footer")
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('front/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('front/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('front/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('front/js/echo.min.js')}}"></script> 
<script src="{{asset('front/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('front/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('front/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/js/lightbox.min.js')}}"></script> 
<script src="{{asset('front/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('front/js/wow.min.js')}}"></script> 
<script src="{{asset('front/js/scripts.js')}}"></script>
<script >  var csrf="{{csrf_token()}}";  </script>


<script type="text/javascript" src="{{asset('front/js/custom.js')}}"></script>

</body>
</html>