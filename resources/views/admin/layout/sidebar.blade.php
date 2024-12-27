<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item"   >
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title"   >Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item" >
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">setting</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" @if (activSidebar(2,"admin-update-password")) style='background:#2e2c7f;'  @endif > <a class="nav-link" href="{{url('admin/admin-update-password')}}">update admin password</a></li>
                <li class="nav-item"@if (activSidebar(3,"admin-update-details")) style='background:#2e2c7f;'  @endif  > <a class="nav-link" href="{{url('admin/admin-update-details')}}">update admin details </a></li>
        
              </ul>
            </div>  
          </li>
          
          @if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->type == 'vendor')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements-1" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Update vendor details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" @if (activSidebar(3,"personal")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/update-vendor-details/personal')}}">update personal details</a></li>
                <li class="nav-item"@if (activSidebar(3,"business")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/update-vendor-details/business')}}">update business details</a></li>
                <li class="nav-item" @if (activSidebar(3,"bank")) style='background:#2e2c7f;'  @endif ><a class="nav-link" href="{{url('admin/update-vendor-details/bank')}}">update bank details</a></li>
              </ul>
            </div>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements-2" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Admins Managment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" @if (activSidebar(3,"admin")) style='background:#2e2c7f;'  @endif ><a class="nav-link" href="{{url('admin/admins/admin')}}">Admins</a></li>
                <li class="nav-item" @if (activSidebar(3,"superAdmin")) style='background:#2e2c7f;'  @endif ><a class="nav-link" href="{{url('admin/admins/superAdmin')}}">SuperAdmins</a></li>
                <li class="nav-item" @if (activSidebar(3,"vendor")) style='background:#2e2c7f;'  @endif ><a class="nav-link" href="{{url('admin/admins/vendor')}}">Vendors</a></li>
                <li class="nav-item" @if (activSidebar(3,"all")) style='background:#2e2c7f;'  @endif ><a class="nav-link" href="{{url('admin/admins/all')}}">All</a></li>
              </ul>
            </div>
          </li>
           
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements-4" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Catalogue Managment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-4">
              <ul class="nav flex-column sub-menu">
                @if(Auth::guard('admin')->user()->type=="vendor")
                <li class="nav-item"@if (activSidebar(2,"products")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/products/index')}}">products</a></li>
                @else
                <li class="nav-item"@if (activSidebar(2,"sections")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/sections/index')}}">sections</a></li>
                <li class="nav-item"@if (activSidebar(2,"catigories")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/categories/index')}}">catigories</a></li>
                <li class="nav-item"@if (activSidebar(2,"brands")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/brands/index')}}">brands</a></li>
                <li class="nav-item"@if (activSidebar(2,"products")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/products/index')}}">products</a></li>
                <li class="nav-item"@if (activSidebar(2,"sliders")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/sliders/index')}}">sliders</a></li>
                <li class="nav-item"@if (activSidebar(2,"filters")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/filters/index')}}">products filter</a></li>
                <li class="nav-item"@if (activSidebar(2,"roles")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/roles/index')}}">roles</a></li>

               @endif

                
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements-3" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Users Managment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements-3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"@if (activSidebar(2,"users")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/users')}}">Userss</a></li>
                <li class="nav-item"@if (activSidebar(2,"subscibers")) style='background:#2e2c7f;'  @endif  ><a class="nav-link" href="{{url('admin/subscribers')}}">Subscribers</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>