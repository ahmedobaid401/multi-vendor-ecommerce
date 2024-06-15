@extends('admin.layout.layout')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Admin</h4>
                  <p class="card-description">
                     Admin details
                  </p>
                  @if(Session::has('success'))
                   <div class="alert alert-success">
                    {{Session::get('success')}}
                   </div>

                  @endif
                  <form action='{{url("admin/admins/edit/$admin[id]")}}' method='post' class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text"name="name" class="form-control" id="exampleInputUsername1" value="{{$admin['name']}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{$admin['email']}}" placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">type</label>
                      <input type="text"name="type" class="form-control" id=" " value="{{$admin['type']}}"  placeholder=" type">
                     
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Vendor Id</label>
                      <input type="text"name="vendor_id" class="form-control" id="current_password"  value="{{$admin['vendor_id']}}" placeholder=" ">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Status</label>
                      <input type="text" name="status" class="form-control" id="new_password" value="{{$admin['status']}}"  placeholder=" ">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">image</label>
                      <input name="image" type="text" class="form-control" id="exampleInputConfirmPassword1"value="{{$admin['image']}}" placeholder=" ">
                    </div>
                     
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Mobile</label>
                      <input name="mobile" type="text" class="form-control" id="exampleInputConfirmPassword1"value="{{$admin['mobile']}}" placeholder="confirm Password">
                    </div>
                     
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

@endsection