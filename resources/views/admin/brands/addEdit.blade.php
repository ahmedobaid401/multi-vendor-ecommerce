@extends('admin.layout.layout')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>
                  <p class="card-description">
                  {{$title}}
                  </p>
                  @if(Session::has('success'))
                   <div class="alert alert-success">
                    {{Session::get('success')}}
                   </div>

                  @endif

                  <form @if(!empty($brand["id"] )) action="{{url('admin/brand/add-edit/'.$brand['id'])}}" 
                       @else  action='{{url("admin/section/add-edit")}}'   @endif method='post' class="forms-sample">
                    @csrf


                    <div class="form-group">
                      <label for="exampleInputUsername1">Brand Name</label>
                      <input type="text"name="name" class="form-control" id="exampleInputUsername1"@if(!empty($brand))  value="{{$brand['name']}}" @else value="{{old('name')}}" @endif placeholder="brand name">
                    </div> 
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection