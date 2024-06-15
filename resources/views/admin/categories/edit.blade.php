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

                  <form   action="{{url('admin/categories/add-edit/'.$category['id'])}}"  enctype="multipart/form-data"
                        method='post' class="forms-sample">
                    @csrf


                    <div class="form-group">
                      <label for="exampleInputUsername1">category Name</label>
                      <input type="text"name="category_name" class="form-control" id="exampleInputUsername1"  value="{{$category['category_name']}}"  old('category_name') ? value='{{old("category_name")}}' :    value="{{old('category_name')}}"   placeholder="category name">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1"> section</label>
                      <select class="form-control"   name="section_id">
                      <option type="text"   class="form-control" id="exampleInputUsername1" value="  "  placeholder="section">select section</option>
                       @foreach($sections as $section)
                       
                        <option type="text"   class="form-control" @if($category['section_id']==$section['id']) selected   @endif value="{{$section['id']}} "  placeholder="section">{{$section['name']}} </option>
                       @endforeach
                      </select>
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1"> parent</label>
                      <select class="form-control"   name="parent_id">
                      <option type="text"   class="form-control" id="exampleInputUsername1" value="  "  placeholder="section">select parent</option>
                       @foreach($categories as $cat)
                       
                        <option type="text"   class="form-control" @if($category['parent_id']==$cat['id']) selected   @endif  value="{{$cat['id']}} "  placeholder="category">{{$cat['category_name']}} </option>
                       @endforeach
                      </select>
                    </div> 
                     
                    <div class="form-group">
                      <label for="exampleInputUsername1">category image </label>
                      <input type="text"name="category_image" class="form-control" id="exampleInputUsername1"   value="{{$category['category_image']}}"   placeholder="image">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">category discount</label>
                      <input type="text"name="category_discount" class="form-control" id="exampleInputUsername1"  value="{{$category['category_discount']}}"  placeholder="discount">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">description</label>
                      <input type="text"name="description" class="form-control" id="exampleInputUsername1"  value="{{$category['description']}}"   placeholder="description ...">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">url </label>
                      <input type="text"name="url" class="form-control" id="exampleInputUsername1"   value="{{$category['url']}}"   placeholder="url">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">categoy meta title</label>
                      <input type="text"name="meta_title" class="form-control" id="exampleInputUsername1"  value="{{$category['meta_title']}}"   placeholder="meta title">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputUsername1">category meta description</label>
                      <input type="text"name="meta_description" class="form-control" id="exampleInputUsername1"  value="{{$category['meta_description']}}"     placeholder="meta description">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputUsername1">category meta keywords</label>
                      <input type="text"name="meta_keywords" class="form-control" id="exampleInputUsername1"   value="{{$category['meta_keywords']}}"   placeholder="meta keywords">
                    </div> 

                                                                  
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection