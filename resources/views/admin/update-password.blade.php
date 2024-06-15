@extends('admin.layout.layout')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">setting</h4>
                  <p class="card-description">
                 update admin password
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" value="{{$admin->name}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Admin type</label>
                      <input name="type" class="form-control" id="exampleInputEmail1" value="{{$admin->type}}" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Current Password</label>
                      <input type="password"name="current_password" class="form-control" id="current_password"   placeholder="inter current Password">
                      <span id='check_password'></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password"name="new_password" class="form-control" id="new_password"   placeholder="inter new Password">
                    </div>
                    <div class="form-group"> 
                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
                      <input name="confirm_password" type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="confirm Password">
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

@endsection