
@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

    <div >
             
         <a href="{{url('admin/admins/edit/'.$vendor_details['id'])}}" class="  btn btn-primary btn-sm btn-icon-text">
               <i class="ti-pencil btn-icon-prepend"></i> Edit
                               
                </a>
             
          <a href="{{url('admin/admins/delete/'.$vendor_details['id'])}}" class=" btn btn-danger btn-sm btn-icon-text">
                       <i class="ti-trash btn-icon-prepend"></i>   Delete
           </a>        
   </div>     
<div class='row'> 
 
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">vendor personal </h4>
                  <p class="card-description">
                  vendor personal details
          
                  </p>
                 
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text"name="name" class="form-control" id="exampleInputUsername1" value="{{$vendor_details['vendor_personal']['name']}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{$vendor_details['vendor_personal']['email']}}" placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <input type="text"name="address" class="form-control" id="current_password" value="{{$vendor_details['vendor_personal']['address']}}"  placeholder="inter current Password">
                     
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text"name="city" class="form-control" id="current_password"  value="{{$vendor_details['vendor_personal']['city']}}" placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">syatus</label>
                      <input type="text"name="city" class="form-control" id="current_password"  value="{{$vendor_details['vendor_personal']['status']}}" placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">State</label>
                      <input type="text" name="state" class="form-control" id="new_password" value="{{$vendor_details['vendor_personal']['state']}}"  placeholder="inter new Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Country</label>
                      <input name="country" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_personal']['country']}}" placeholder="confirm Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Pincode</label>
                      <input name="pincode" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_personal']['pincode']}}"placeholder="confirm Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Mobile</label>
                      <input name="mobile" type="text" class="form-control" id="exampleInputConfirmPassword1"value="{{$vendor_details['vendor_personal']['mobile']}}" placeholder="confirm Password">
                    </div>
                     
                </div>
              </div>
            </div>
 
 
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">vendor business details</h4>
                  <p class="card-description">
                  vendor business details
          
                  </p>
                   
                  
                  <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text"name="name" class="form-control" id="exampleInputUsername1" value="{{$vendor_details['vendor_business']['shop_name']}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{$vendor_details['vendor_business']['shop_city']}}" placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <input type="text"name="address" class="form-control" id="current_password" value="{{$vendor_details['vendor_business']['shop_address']}}"  placeholder="inter current Password">
                     
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text"name="city" class="form-control" id="current_password"  value="{{$vendor_details['vendor_business']['shop_state']}}" placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">syatus</label>
                      <input type="text"name="city" class="form-control" id="current_password"  value="{{$vendor_details['vendor_business']['shop_country']}}" placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">State</label>
                      <input type="text" name="state" class="form-control" id="new_password" value="{{$vendor_details['vendor_business']['shop_pincode']}}"  placeholder="inter new Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Country</label>
                      <input name="country" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_business']['shop_mobile']}}" placeholder="confirm Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Pincode</label>
                      <input name="pincode" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_business']['shop_website']}}"placeholder="confirm Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Mobile</label>
                      <input name="mobile" type="text" class="form-control" id="exampleInputConfirmPassword1"value="{{$vendor_details['vendor_business']['address_proof']}}" placeholder="confirm Password">
                    </div>
                     
                    <div class="form-group">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text"name="city" class="form-control" id="current_password"  value="{{$vendor_details['vendor_business']['address_proof_image']}}" placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">syatus</label>
                      <input type="text"name="city" class="form-control" id="current_password"  value="{{$vendor_details['vendor_business']['business_license_number']}}" placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">State</label>
                      <input type="text" name="state" class="form-control" id="new_password" value="{{$vendor_details['vendor_business']['gst_number']}}"  placeholder="inter new Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Country</label>
                      <input name="country" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_business']['pan_number']}}" placeholder="confirm Password">
                    </div>
  
                   
                   
                </div>
              </div>
            </div>
 


 
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">vendor bank details</h4>
                  <p class="card-description">
                  vendor bank details
          
                  </p>
                 
                    
                     
                  
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">bank name </label>
                      <input name=" " type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_bank']['bank_name']}}" placeholder=" ">
                    </div>

                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">account holder name </label>
                      <input name=" " type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_bank']['account_holder_name']}}" placeholder=" ">
                    </div>

                      <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1"> account number</label>
                      <input name=" " type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_bank']['account_number']}}" placeholder=" ">
                    </div> 

                     <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1"> bank ifsc code</label>
                      <input name=" " type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_details['vendor_bank']['bank_ifsc_code']}}" placeholder=" ">
                    </div>
                    
                  
                </div>
              </div>
            </div>
 
</div>
</div>
</div>
@endsection