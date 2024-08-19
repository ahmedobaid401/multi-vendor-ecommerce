
@extends('front.layouts.layout')
@section('content')
 

 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>User Account Details</h3>
                    </div>
                    <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                          <div class="btn-danger">
                            <span>{{$error}}</span>
                          </div>
                        @endforeach
                   @endif
                      <div class=" row"> 
                 
                    <form action="{{url('user/account-update')}}" method="post">
                        @csrf
                      <div class="col-md-6">

                        <div class="mb-6 row">
                            <label  class="col-sm-5">Username</label>
                            <div class="col-sm-5">
                                <input type="text" name="name" class="form-control mb-6" id="username" value="{{$user['name']}}">
                            </div>
                        </div>
                        <div class="mb-6 row">
                            <label for="email" class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="email" name="email" class="form-control mb-6" id="email" value="{{$user['email']}}">
                                 
                            </div>
                        </div>
                        <div class="mb-6 row">
                            <label for="phone" class="col-sm-5 col-form-label">Phone Number</label>
                            <div class="col-sm-5">
                                <input type="text" name="phone" class="form-control" id="phone" value="{{$user['phone']}}">
                            </div>
                        </div>
                        <div class="mb-6 row">

                           
                            <label for="exampleInputUsername1"> country</label>
                                <select class="form-control" id="section_id" name="country_code">
                                  <option type="text"   class="form-control"   value=""  placeholder="section">select country</option>
                                    @foreach($country as $country_code => $country_value)
                       
                                       <option type="text"   class="form-control"   value="{{$country_code}}"
                                       @if(!empty($user['address']['country'])) @if($country_code == $user['address']['country']) selected  @endif @endif
                                        placeholder="country">{{$country_value}} </option>
                                     @endforeach
                                 </select>
                           
                         </div>     
                        
                        </div> 

                        <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-4 ">state</label>
                            <div class="col-sm-6">
                                <input type="text"  name="state" class="form-control" id="username" @if(!empty($user['address']['state'])) value="{{$user['address']['state']}}"@endif>
                            </div>
                        </div>
                        <div class="m-3 row">
                            <label for="email" class="col-sm-4 col-form-label">city</label>
                            <div class="col-sm-6">
                                <input type="text" name="city" class="form-control" id="email" @if(!empty($user['address']['city'])) value="{{$user['address']['city']}}"@endif>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-4 col-form-label">pincode </label>
                            <div class="col-sm-6">
                                <input type="text" name="pincode"  class="form-control" id="phone" @if(!empty($user['address']['pincode'])) value="{{$user['address']['pincode']}}"@endif>
                            </div>
                        </div>
                        <div class="mb-6 row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-6">
                                <input type="text" name="address" class="form-control" id="address" @if(!empty($user['address']['address'])) value="{{$user['address']['address']}}"@endif>
                            </div>
                        </div>

                        </div>

                        <div class="text-center m-3">
                            <button type="submit"  class="btn btn-primary m-6">Update Profile</button>
                            </div>
                      </form>
                      <div class="text-center">
                            <a href="{{url('user/logout')}}" class="btn btn-danger">Logout</a>
                        </div>



                      </div>
                      
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    


@endsection