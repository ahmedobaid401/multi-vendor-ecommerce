
@foreach($sliders as $slider)
 

<div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="{{url('uploaded/front/images/slider_images/'.$slider['image'])}}" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
        </div>

        @endforeach