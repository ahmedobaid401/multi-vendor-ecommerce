
@extends('front.layouts.layout')
@section('content')
 

 
    <div  class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="text-center">
                            <a href="{{url('user/delivery-address')}}" class="btn btn-primary">add delivery-address</a>
                            
                        </div>
                    <div class="card-header text-center">
                        <h3>User Account Details</h3>
                    </div>
                    <div class="card-body">
                      <div class=" row"> 
                      <div class="col-md-6">

                        <div class="mb-6 row">
                            <label  class="col-sm-4">Username</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control mb-6" id="username" value="{{$user['name']}}">
                            </div>
                        </div>
                        <div class="mb-6 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" readonly class="form-control mb-6" id="email" value="{{$user['email']}}">
                            </div>
                        </div>
                        <div class="mb-6 row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="phone" value="{{$user['phone']}}">
                            </div>
                        </div>
                        <div class="mb-6 row">
                            <label for="address" class="col-sm-4 col-form-label">country</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="address"@if(!empty($user['address']['country'])) value="{{$user['address']['country']}}"@endif>
                            </div>
                        </div>

                        </div>
  
                        <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-4 ">state</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="username"@if(!empty($user['address']['state'])) value="{{$user['address']['state']}}"@endif>
                            </div>
                        </div>
                        <div class="m-3 row">
                            <label for="email" class="col-sm-4 col-form-label">city</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="email" @if(!empty($user['address']['city'])) value="{{$user['address']['city']}}" @endif>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-4 col-form-label">pincode </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="phone"@if(!empty($user['address']['pincode'])) value="{{$user['address']['pincode']}}"@endif>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="address"@if(!empty($user['address']['address'])) value="{{$user['address']['address']}}"@endif>
                            </div>
                        </div>

                        </div>

                        <div class="text-center">
                            <a href="{{route('userAccountEdit')}}" class="btn btn-primary">Edit Profile</a>
                            <a href="{{url('user/logout')}}" class="btn btn-danger">Logout</a>
                        </div>

                      </div>
                               
                    </div>
                </div>
            </div>
        </div>
    </div>

    


@endsection