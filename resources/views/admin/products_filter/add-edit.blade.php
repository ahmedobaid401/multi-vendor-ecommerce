 
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
                  @if(Session::has('error'))
                   <div class="alert alert-success">
                    {{Session::get('error')}}
                   </div>
                  @endif

                  <form @if(!empty($productsFilter->id )) action="{{url('admin/filters/add-edit/'.$productsFilter->id)}}" 
                       @else  action='{{url("admin/filters/add-edit")}}'   @endif method='post' class="forms-sample"  >
                    @csrf
                     

                    <div class="form-group">
                      <label for="exampleInputUsername1">select category</label>
                      <select class="form-control" style="height:200px;"  name="category_id[]" multiple="">
                   
                       @foreach($sections as $section)
                       
                        <optgroup label="{{$section['name']}}">{{$section['name']}}</optgroup>
                       @foreach($section["categories"] as $category)
                       <option value="{{$category['id']}}">&nbsp;&nbsp;&nbsp;>&nbsp;{{$category['category_name']}}</option>
                       @foreach($category["sub_categories"] as $subcategory)
                       <option value="{{$subcategory['id']}}"  @if(in_array($subcategory['id'],$productsFilter->getCatIds()) ) selected  @endif > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>&nbsp;{{$subcategory['category_name']}}</option>
                       @endforeach
                       @endforeach
                       @endforeach
                      </select>
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1"> filter name</label>
                      <input type="text"name="filter_name" class="form-control"   @if(!empty($productsFilter->filter_name))  value="{{$productsFilter->filter_name}}" @else value="{{old('filter_name')}}" @endif  required>
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1">filter column</label>
                      <input type="text"name="filter_column" class="form-control"   @if(!empty($productsFilter->filter_column))  value="{{$productsFilter->filter_column}}" @else value="{{old('filter_column')}}" @endif required >
                    </div>  
                   
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection