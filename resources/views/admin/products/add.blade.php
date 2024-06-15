@extends('admin.layout.layout')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product</h4>
                   
                  @if(Session::has('success'))
                   <div class="alert alert-success">
                    {{Session::get('success')}}
                   </div>
                  @endif


                  <form action='{{url("admin/products/store")}}' method='post' class="forms-sample" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                      <label for="exampleInputUsername1">Product Name</label>
                      <input type="text"name="product_name" class="form-control" id="exampleInputUsername1"  value="{{old('product_name')}}" placeholder="product name">
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1"> category</label>
                      <select class="form-control" id="category_filters" name="category_id">
                      <option value=" " >select</option>
                       @foreach($sections as $section)
                       
                        <optgroup label="{{$section['name']}}">{{$section['name']}}</optgroup>
                       @foreach($section["categories"] as $category)
                       <option value="{{$category['id']}}">&nbsp;&nbsp;&nbsp;>&nbsp;{{$category['category_name']}}</option>
                       @foreach($category["sub_categories"] as $subcategory)
                       <option value="{{$subcategory['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>&nbsp;{{$subcategory['category_name']}}</option>
                       @endforeach
                       @endforeach
                       @endforeach
                      </select>
                    </div> 

                   
                    <div class="form-group" id="append_filters">
                      <label for="exampleInputUsername1"> select filers</label>
                             
                     
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1"> brand</label>
                      <select class="form-control" id="brand_id" name="brand_id">
                      <option type="text"   class="form-control" id="exampleInputUsername1" value="  "  placeholder="section">select brand</option>
                       @foreach($brands as $brand)
                       
                        <option type="text"   class="form-control" id="exampleInputUsername1" value="{{$brand['id']}} "  placeholder="brand">{{$brand['name']}} </option>
                       @endforeach
                      </select>
                    </div> 
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">product image </label>
                      <input type="file"name="image" class="form-control" id="exampleInputUsername1" value="{{old('product_image')}}"  placeholder="image">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">product discount</label>
                      <input type="text"name="product_discount" class="form-control" id="exampleInputUsername1" value="{{old('product_discount')}}"   placeholder="discount">
                    </div> 



                    <div class="form-group">
                      <label for="exampleInputUsername1">product color</label>
                      <input type="text"name="product_color" class="form-control" value="{{old('product_color')}}"   placeholder="product color">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product code</label>
                      <input type="text"name="product_code" class="form-control" value="{{old('product_code')}}"   placeholder="product color">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product weight</label>
                      <input type="text"name="product_weight" class="form-control" value="{{old('product_weight')}}"   placeholder="product weight">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product price</label>
                      <input type="text"name="product_price" class="form-control" value="{{old('product_price')}}"   placeholder="product price">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product video</label>
                      <input type="file"name="product_video" class="form-control" value="{{old('product_video')}}"   placeholder=" product_video">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product featured</label>
                    </div> <input type="text"name="is_featured" class="form-control"  value="{{old('is_featured')}}"   placeholder="is featured">
                     

                    <div class="form-group">
                      <label for="exampleInputUsername1">description</label>
                      <input type="text"name="description" class="form-control" id="exampleInputUsername1" value="{{old('description')}}"  placeholder="description ...">
                    </div> 

                     

                    <div class="form-group">
                      <label for="exampleInputUsername1">product meta title</label>
                      <input type="text"name="meta_title" class="form-control" id="exampleInputUsername1"  value="{{old('meta_title')}}"   placeholder="meta title">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputUsername1">product meta description</label>
                      <input type="text"name="meta_description" class="form-control" id="exampleInputUsername1"  value="{{old('meta_description')}}"   placeholder="meta description">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputUsername1">product meta keywords</label>
                      <input type="text"name="meta_keywords" class="form-control" id="exampleInputUsername1"  value="{{old('meta_keywords')}}"   placeholder="meta keywords">
                     </div> 

                                                                  
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection