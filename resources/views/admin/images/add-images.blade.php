@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
        <div class="row">

           <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add images</h4>
                   
                  @if(Session::has('success'))
                   <div class="alert alert-success">
                    {{Session::get('success')}}
                   </div>
                  @endif
                  @if(Session::has('error_message'))
                   <div class="alert alert-danger">
                    {{Session::get('error_message')}}
                   </div>
                  @endif

                  <form action="{{url('admin/add-images/'.$product['id'])}}" method='post' class="forms-sample" enctype="multipart/form-data" >
                    @csrf
                     
                      <div class="form-group m-3">
                      <label for="product_name" >Product name</label>
                      &nbsp;{{$product["product_name"]}} 
                    </div>

                     <div class="form-group m-3">
                      <label for="product_code" >Product code</label>
                      &nbsp;{{$product["product_code"]}} 
                    </div>

                     <div class="form-group m-3">
                      <label for="product_color" >Product color</label>
                      <input type="text" name="color"   style="width:110px;" placeholder="color" required />
                    </div>

                     <div class="form-group m-3">
                      <label for="product_price" >Product price</label>
                      &nbsp;{{$product["product_price"]}} 
                    </div>

                    <div class="field_wrapper form-group m-3">
                          <div class="mb-3">
                            <lable> select a primary image</lable>
                           <input type="file"   name="image_primary"   style="width:110px;"   placeholder="add primary image" required />        
                         </div>
                    </div>

                    <div class="field_wrapper form-group m-3">
                          <div class="mb-3">
                          <lable> select multiple images </lable>
                           <input type="file" multiple="" name="images[]"   style="width:110px;" id="images" placeholder="add images" required />        
                         </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-3" style="width:120px;" >Submit</button>                                                                                                                                        
                  </form>      
                  
                   <div class="table-responsive">
                   <table id="d_Table" class="table table-bordered ">
                       <thead>
                           <tr>                                                       
                                                      
                              <th>Id</th>
                              <th>Image</th>

                            
                              <th>status </th>   
                              <th>action </th>                

                                                                                                                                                                                                                                                      
                           </tr>
                        </thead>
                        <tbody>
                          
                           
                        @foreach($product["images"] as  $key=>$image)
                                                                                  
                             <td>
                                  {{$image['id']}} 
                              </td>
                               
                          
                              <td>
                              <image    src="{{asset('uploaded/front/images/product_images/'.$image['image'])}}" style="width:90px;"/>
                              </td>
                              
                                                                                                                                                                               
                             <td>                                          
                             @if($image['status']==1)                                
                                  <a href="javascript:void(0)" class="updateStatus" id="Active-{{$image['id']}}" object="ProductImage" object_id="{{$image['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateStatus"
                                 status="inactive" object="ProductImage" object_id="{{$image['id']}}" id="Inactive-{{$image['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                                                             
                                  </a>                   
                                 @endif                            
                              </td>
                              <td>
                              <a  title="image" comfirm href="{{url('admin/image/delete/'.$image['id'])}}" class="btn btn-danger btn-sm btn-icon-text confirmDelete" >
                                   <i class="ti-trash btn-icon-prepend"></i> Delete
                                  </a>
                              </td>

                           </tr>
                           
                         </tbody>
                           
                        
                    @endforeach

                   </table>
                   </div>
                                                                 
                </div> 
              </div> 
            </div>   
              </div> 


           </div> 
    </div>  



     @endsection