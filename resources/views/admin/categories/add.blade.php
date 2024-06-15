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

                  <form action='{{url("admin/categories/add-edit")}}' method='post' class="forms-sample" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                      <label for="exampleInputUsername1">category Name</label>
                      <input type="text"name="category_name" class="form-control" id="exampleInputUsername1"  value="{{old('category_name')}}" placeholder="category name">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1"> section</label>
                      <select class="form-control" id="section_id" name="section_id">
                      <option type="text"   class="form-control"   value=""  placeholder="section">select section</option>
                       @foreach($sections as $section)
                       
                        <option type="text"   class="form-control"   value="{{$section['id']}} "  placeholder="section">{{$section['name']}} </option>
                       @endforeach
                      </select>
                    </div> 
                   <div class="form-group">
                      <label for="exampleInputUsername1">select category level</label>

                      <select class="form-control" id="append_categories" name="parent_id">
                       
                      
                      
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">category image </label>
                      <input type="file"name="category_image" class="form-control" id="exampleInputUsername1" value="{{old('category_image')}}"  placeholder="image">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">category discount</label>
                      <input type="text"name="category_discount" class="form-control" id="exampleInputUsername1" value="{{old('category_discount')}}"   placeholder="discount">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">description</label>
                      <input type="text"name="description" class="form-control" id="exampleInputUsername1" value="{{old('description')}}"  placeholder="description ...">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">url </label>
                      <input type="text"name="url" class="form-control" id="exampleInputUsername1" value="{{old('url')}}"  placeholder="url">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">categoy meta title</label>
                      <input type="text"name="meta_title" class="form-control" id="exampleInputUsername1"  value="{{old('meta_title')}}"   placeholder="meta title">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputUsername1">category meta description</label>
                      <input type="text"name="meta_description" class="form-control" id="exampleInputUsername1"  value="{{old('meta_description')}}"   placeholder="meta description">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputUsername1">category meta keywords</label>
                      <input type="text"name="meta_keywords" class="form-control" id="exampleInputUsername1"  value="{{old('meta_keywords')}}"   placeholder="meta keywords">
                    </div> 

                                                                  
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection