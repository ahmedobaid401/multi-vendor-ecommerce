@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                       <h4 class="card-title">products Table</h4>
                 
                     @if(count($products)==0)
                     There is no sections
                     @else
                                                   
                     @if(session()->has("success"))
                        <div class="alert alert-cuccess alert-dismissible fade show" role="alert" > 
                           <strong> success:</strong>  {{session("success")}}
                           <dutton type="button" class="close" data-dismiss="alert" aria-lable="close">
                              <span aria-hidden="true" > &items;</span>
                           </dutton>
                        </div>
                     @endif
                      <a href="{{url('admin/products/add')}}" class="btn btn-primary">Add product</a>
                       </div>
                   <div class="table-responsive ">
                   <table id="d_Table" class="table table-striped display ">
                       <thead>
                           <tr>                                                       
                                                      
                              <th>Id</th>
                              <th>name</th>
                              <th>category </th>                                                             
                              <th>section </th>                          
                              <th>Added by </th>  
                              <th>product image</th>                
                              <th>status</th>                                                                                                                                                                                                                                                           
                              <th>Action</th>                                                                                                                                                                                                                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                      
                        <tr>                                              
                              <td>
                                  {{$product['id']}} 
                              </td>
                              <td>
                                  {{$product['product_name']}} 
                              </td>
                              <td>
                                  {{$product['category']["category_name"]}} 
                              </td>
                              <td>
                                  {{$product['section']["name"]}} 
                              </td>
                              <td>
                                  {{$product['vendor']["name"]}} 
                              </td>
                              <td>
                                 @if(!empty($product["product_image"]))
                                <img src="{{asset('uploaded/front/images/product_images/small/'.$product['product_image'])}} "> 
                                @else
                                no image 
                                @endif

                              </td>
                              
                              <td>                                                              
                                 @if($product['status']==1)                                
                                  <a href="javascript:void(0)" class="updateStatus" id="Active-{{$product['id']}}" object="product" object_id="{{$product['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateStatus"
                                 status="inactive" object="product" object_id="{{$product['id']}}" id="Inactive-{{$product['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                                                             
                                  </a>                   
                                 @endif
                              </td>  
                             
                               
                                                       
                             <td>                                          
                                <a href="{{url('admin/product/edit/'.$product['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                                   <i class="ti-pencil btn-icon-prepend"></i>
                                      Edit
                                 </a>

                                 <a href="{{url('admin/add-edit-attributes/'.$product['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                                   <i class="ti-plus btn-icon-plus"></i>
                                      Add Attribute
                                 </a>
                                 <a href="{{url('admin/add-images/'.$product['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                                   <i class="ti-plus btn-icon-plus"></i>
                                      Add images
                                 </a>
                                 <a  title="product" comfirm href="{{url('admin/product/delete/'.$product['id'])}}" class="btn btn-danger btn-sm btn-icon-text confirmDelete" >
                                   <i class="ti-trash btn-icon-prepend"></i> Delete
                                  </a>                              
                              </td>
                           </tr>
                     
                    @endforeach

                   </table>
                  </div>



                    
                 
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
 

@endsection


 