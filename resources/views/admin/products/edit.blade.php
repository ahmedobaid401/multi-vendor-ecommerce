@extends('admin.layout.layout')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Edit product</h4>                                     
                  @if(Session::has('success'))
                   <div class="alert alert-success">
                    {{Session::get('success')}}
                   </div>

                  @endif

                  <form action="{{url('admin/product/update/'.$product['id'])}}"  enctype="multipart/form-data"
                        method='post' class="forms-sample">
                    @csrf
                                             
                    <div class="form-group">
                      <label for="exampleInputUsername1">Product Name</label>
                      <input type="text"name="product_name" class="form-control" id="exampleInputUsername1"  value="{{$product['product_name']}}" placeholder="product name">
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1"> category</label>
                      <select class="form-control" id="category_filters"  name="category_id">
                      <option value=" " >select</option>
                       @foreach($sections as $section)
                       
                        <optgroup label="{{$section['name']}}">{{$section['name']}}</optgroup>
                       @foreach($section["categories"] as $category)
                       <option @if($product["category_id"]==$category["id"]) selected  @endif value="{{$category['id']}}">&nbsp;&nbsp;&nbsp;>&nbsp;{{$category['category_name']}}</option>
                       @foreach($category["sub_categories"] as $subcategory)
                       <option @if($product["category_id"]==$subcategory["id"]) selected  @endif value="{{$subcategory['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>&nbsp;{{$subcategory['category_name']}}</option>
                       @endforeach
                       @endforeach
                       @endforeach
                      </select>
                    </div> 
                    @foreach($filters as $filter)
                    <div class="form-group" id="append_filters">
                      <label for="exampleInputUsername1"> select filers</label>
                     
                       <select style="height:200px;"   class="form-control"  name="filters[{{$filter['filter_column']}}][]" multiple="">
                          <optgroup label="{{$filter['filter_name']}}">{{$filter['filter_name']}}</optgroup>
                                    @foreach($filter['filter_values'] as $key=>$filter_value)
                                      <option value=" {{$filter_value['filter_value']}} ">&nbsp;&nbsp;&nbsp;>&nbsp;{{$filter_value['filter_value']}}</option>
                        
                                    @endforeach
                       </select>
                        
                     
                    </div>
                    @endforeach 
                 
                    <div class="form-group">
                      <label for="exampleInputUsername1"> brand</label>
                      <select class="form-control" id="brand_id" name="brand_id">
                      <option type="text"   class="form-control" value=" " placeholder="section">select brand</option>
                       @foreach($brands as $brand)
                       
                        <option type="text"   class="form-control" @if($product["brand_id"]==$brand["id"]) selected  @endif   value="{{$brand['id']}} "  placeholder="brand">{{$brand['name']}} </option>
                       @endforeach
                      </select>
                    </div> 
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">product image </label>
                      <input type="file"name="product_image" class="form-control" value="{{$product['product_image']}}"  placeholder="image">
                      
                    <div class="form-group">
                      <label for="exampleInputUsername1">product discount</label>
                      <input type="text"name="product_discount" class="form-control" value="{{$product['product_discount']}}"   placeholder="discount">
                    </div> 

                    <div class="form-group">
                      <label for="exampleInputUsername1">product color</label>
                      <input type="text"name="product_color" class="form-control"value="{{$product['product_color']}}"  placeholder="product color">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product code</label>
                      <input type="text"name="product_code" class="form-control" value="{{$product['product_code']}}"  placeholder="product color">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product weight</label>
                      <input type="text"name="product_weight" class="form-control" value="{{$product['product_weight']}}"   placeholder="product weight">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product price</label>
                      <input type="text"name="product_price" class="form-control" value="{{$product['product_price']}}"  placeholder="product price">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product video</label>
                      <input type="file"name="product_video" class="form-control" value="{{$product['product_video']}}"   placeholder=" product_video">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">product featured</label>
                    </div> <input type="text"name="is_featured" class="form-control"  value="{{$product['is_featured']}}"   placeholder="is featured">
                     
                    <div class="form-group">
                      <label for="exampleInputUsername1">description</label>
                      <input type="text"name="description" class="form-control"value="{{$product['description']}}"  placeholder="description ...">
                    </div> 
                   
                    <div class="form-group">
                      <label for="exampleInputUsername1">product meta title</label>
                      <input type="text"name="meta_title" class="form-control" value="{{$product['meta_title']}}"  placeholder="meta title">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputUsername1">product meta description</label>
                      <input type="text"name="meta_description" class="form-control" value="{{$product['meta_description']}}"   placeholder="meta description">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputUsername1">product meta keywords</label>
                      <input type="text"name="meta_keywords" class="form-control" value="{{$product['meta_keywords']}}"   placeholder="meta keywords">
                     </div> 
                                                                 
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>                                                  
                </div>
              </div>
            </div>

@endsection