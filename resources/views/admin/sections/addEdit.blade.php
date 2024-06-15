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

                  <form @if(!empty($section )) action="{{url('admin/section/add-edit/'.$section['id'])}}" 
                       @else  action='{{url("admin/section/add-edit")}}'   @endif method='post' class="forms-sample">
                    @csrf


                    <div class="form-group">
                      <label for="exampleInputUsername1">Section Name</label>
                      <input type="text"name="name" class="form-control" id="exampleInputUsername1"@if(!empty($section))  value="{{$section['name']}}" @else value="{{old('name')}}" @endif placeholder="Username">
                    </div> 
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection