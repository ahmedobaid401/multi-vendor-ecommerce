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

                  <form @if(!empty($slider["id"] )) action="{{url('admin/slider/add-edit/'.$slider['id'])}}" 
                       @else  action='{{url("admin/slider/add-edit")}}'   @endif method='post' class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Slider image</label>
                       
                      <input type="file" name="image" class="form-control"   @if(!empty($slider))  value="{{$slider['image']}}" @else value="{{old('image')}}" @endif  required>
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1">Slider title</label>
                      <input type="text"name="title" class="form-control"   @if(!empty($slider))  value="{{$slider['title']}}" @else value="{{old('title')}}" @endif  required>
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1">Slider link</label>
                      <input type="text"name="link" class="form-control"   @if(!empty($slider))  value="{{$slider['link']}}" @else value="{{old('link')}}" @endif  required>
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1">Slider alt</label>
                      <input type="text"name="alt" class="form-control"   @if(!empty($slider))  value="{{$slider['alt']}}" @else value="{{old('alt')}}" @endif required >
                    </div>   
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection