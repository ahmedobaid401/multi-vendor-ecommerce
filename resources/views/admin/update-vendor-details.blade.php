@extends('admin.layout.layout')
@section('content')

@if($slug=='personal')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">setting</h4>
                  <p class="card-description">
                 update vendor personal details
          
                  </p>
                  <form action='{{url("admin/update-vendor-details/personal")}}' method='post' class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text"name="name" class="form-control" id="exampleInputUsername1" value="{{$vendor_personal['name']}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{$vendor_personal['email']}}" placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <input type="text"name="address" class="form-control" id="current_password" value="{{$vendor_personal['address']}}"  placeholder="inter current Password">
                     
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text"name="city" class="form-control" id="current_password"  value="{{$vendor_personal['city']}}" placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">State</label>
                      <input type="text" name="state" class="form-control" id="new_password" value="{{$vendor_personal['state']}}"  placeholder="inter new Password">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Country</label>
                    <select name="country" class="form-group"> 
                      
                      @foreach($country as $key=>$value)
                      <option name="{{$key}}" type="text" class="form-control" id="exampleInputConfirmPassword1"value="{{$value}}" placeholder="confirm Password">{{$value}}</option>
                      @endforeach
                   </select>   
                     </div>            
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Pincode</label>
                      <input name="pincode" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$vendor_personal['pincode']}}"placeholder="confirm Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Mobile</label>
                      <input name="mobile" type="text" class="form-control" id="exampleInputConfirmPassword1"value="{{$vendor_personal['mobile']}}" placeholder="confirm Password">
                    </div>
                     
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endif

           

@if($slug=='business')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">setting</h4>
                  <p class="card-description">
                 update vendor business details
          
                  </p>
                  @if(Session::has('success'))
                   <div class="alert alert-success">
                    {{Session::get('success')}}
                   </div>

                  @endif

                  
                  <form action='{{url("admin/update-vendor-details/business")}}' method='post' class="forms-sample">
                    @csrf
                     @foreach($vendor_business as $key=>$value)

                     

                       @if($key!=='address_proof'&& $key!=='shop_country')
                       <div class="form-group"> 
                          <label for="exampleInputConfirmPassword1">{{ucfirst(str_replace('_',' ',$key))}}</label>
                          <input name="{{$key}}" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$value}}" placeholder=" ">
                       </div>

                        @endif
                    @if($key=='shop_country')
                   <div class="form-group">
                         <label for="exampleFormControlSelect3">Shop Country</label>
                         <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="shop_country">
                             @foreach($country as $key_country=>$value_country)
                               <option  value="{{$key_country}}" @if($key_country==$value) selected @endif > {{$value_country}} </option>
                               @endforeach
                         </select>
                    </div>
                    @endif
                    @if($key=='address_proof')
                   <div class="form-group">
                         <label for="exampleFormControlSelect3">address proof</label>
                         <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="address_proof">
                             
                               <option  value="passport" @if($value=="passport") selected @endif > passport </option>
                               <option  value="identity" @if($value=="identity") selected @endif >  identity   </option>
                                
                                
                         </select>
                    </div>
                    @endif


                   


                     @endforeach
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endif


@if($slug=='bank')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">setting</h4>
                  <p class="card-description">
                 update vendor bank details
          
                  </p>
                  <form action='{{url("admin/update-vendor-details/bank")}}' method='post' class="forms-sample">
                    @csrf
                    
                     
                     @foreach($vendor_bank as $key=>$value)
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">{{ucfirst(str_replace('_',' ',$key))}}</label>
                      <input name="{{$key}}" type="text" class="form-control" id="exampleInputConfirmPassword1" value="{{$value}}" placeholder=" ">
                    </div>
                     @endforeach
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endif
@endsection
