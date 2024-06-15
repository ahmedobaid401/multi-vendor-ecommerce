
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
              <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            @foreach($sliders as $slider)
               
                <div class="item" style="background-image:url('uploaded/front/images/slider_images/{!!$slider["image"]!!}') ;">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">{{$slider['title']}}</div>
                  <div class="big-text fadeInDown-1"> new collectioni</div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
               
                 </div>
               
            </div>
            @endforeach
            
            
            
           
            
                </div>
          </div>
 

           
         