<?php    ?>
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
                @foreach($sections as $section )
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$section["name"]}}</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                        
                        @foreach($section["categories"] as $category)
                      <div class="col-sm-12 col-md-3">
                      <h2 class="title">{{$category["category_name"]}}</h2>
                        <ul class="links list-unstyled">
                        @if(isset($category["sub_categories"])&&count($category["sub_categories"])>0)
                          @foreach($category["sub_categories"] as $subCategory)
                                
                           <li><a href="#">{{$subCategory ["category_name"]}}</a></li>
                          @endforeach 
                         @endif
                        </ul>
                      </div>
                      <!-- /.col -->
                      @endforeach
                       
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>                                                         
               </li>
              @endforeach
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed"> Camera </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed"> Desktops </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed"> Pants </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed"> Bags </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed"> Hats </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed"> Accessories </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group --> 
                  
                </div>
                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder --> 
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            
            
            <!-- ============================================== MANUFACTURES============================================== -->
         <form action ="#" method="post" class="facet-form">

         <div class="sidebar-widget wow fadeInUp">
               <div class="widget-header">
                    <h4 class="widget-title">brands</h4>
                
                   </div>
              <div class="sidebar-widget-body">
                <ul>
                 
                    @foreach($brands_available  as $key=>$brand)
                    <?php   //dd($brand);   ?>
                      <li>
                
                            <input type="checkbox" class="check-box brand" id="brand{{$key}}"
                                value="{{$brand['id']}}" name="brand[]" >  
                                <label>{{$brand['name']}}</label> 
                       </li>
                    @endforeach
                 </ul>
              
              </div>
             </div>

         <div class="sidebar-widget wow fadeInUp">
               <div class="widget-header">
                    <h4 class="widget-title">Price</h4>
                
                   </div>
              <div class="sidebar-widget-body">
                <ul>
                <?php  $price_array=array("0-100","100-200","200-300");   ?>
                    @foreach($price_array  as $key=>$price)
                      <li>
                
                            <input type="checkbox" class="check-box price" id="price{{$key}}"
                                value="{{$price}}" name="price[]" >  
                                <label>{{$price}}</label> 
                       </li>
                    @endforeach
                 </ul>
              
              </div>
              </div>
         <div class="sidebar-widget wow fadeInUp">
               <div class="widget-header">
                    <h4 class="widget-title">Color</h4>
                
                   </div>
              <div class="sidebar-widget-body">
                <ul>
                    @foreach($colors_available  as $key=>$color)
                      <li>
               
                            <input type="checkbox" class="check-box color" id="color{{$key}}"
                                value="{{$color}}" name="color[]" >  
                            <label>{{$color}}</label> 
                       </li>
                    @endforeach
                 </ul>
              
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
          <div class="sidebar-widget wow fadeInUp">
               <div class="widget-header">
                    <h4 class="widget-title">Size</h4>
                
                   </div>
              <div class="sidebar-widget-body">
                <ul>
                    @foreach($sizes_available  as $key=>$size)
                      <li>
               
                            <input type="checkbox" class="check-box size" id="size{{$key}}"
                                value="{{$size}}" name="size[]" >  
                            <label>{{$size}}</label> 
                       </li>
                    @endforeach
                 </ul>
              
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
          
            @foreach($filters_available  as $filter)
            <div class="sidebar-widget wow fadeInUp">
                 <div class="widget-header">
                     <h4 class="widget-title">{{$filter['filter_name']}}</h4>
                
                 </div>
             
              <div class="sidebar-widget-body">
                <ul>
                  @foreach($filter['filter_values'] as $key=>$filter_value)
                  <li>
               
                 <input type="checkbox" class="check-box filter {{$filter['filter_name']}}" data-index="{{$filter['filter_column']}}"
                 id="{{$filter_value['filter_value']}}"  value="{{$filter_value['filter_value']}}" name="{{$filter['filter_name']}}[]" >  
                 <label>{{ucwords($filter_value['filter_value'])}}</label> 
                 </li>
                  @endforeach
                 </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            @endforeach
            <!-- /.sidebar-widget --> 
            
            </form>          
            <!-- ============================================== COMPARE============================================== -->
            <div class="sidebar-widget wow fadeInUp outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COMPARE: END ============================================== --> 
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
              <h3 class="section-title">Product tags</h3>
              <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone" href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a> </div>
                <!-- /.tag-list --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
          <!----------- Testimonials------------->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
              <div id="advertisement" class="advertisement">
                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">John Doe <span>Abc Company</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item --> 
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            
            <!-- ============================================== Testimonials: END ============================================== -->
            
            <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->