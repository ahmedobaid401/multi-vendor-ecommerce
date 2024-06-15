@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                       <h4 class="card-title">categories Table</h4>
                 
                     @if(count($categories)==0)
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
                      <a href="{{url('admin/categories/add-edit')}}" class="btn btn-primary">Add category</a>
                       </div>
                   <div class="table-responsive">
                   <table id="d_Table" class="table table-striped display ">
                       <thead>
                           <tr>   
                                                     
                                                      
                              <th>Id</th>
                              <th>name</th>
                              <th>parent </th>                                                             
                              <th>section </th>                          
                              <th>status</th>                          
                              <th>category image</th>                          
                              <th>category discount</th>                          
                              <th>description</th>                          
                              <th>url</th> 
                               <th>meta title </th>                          
                              <th>meta description</th>                          
                              <th>meta keywords</th>                                                                                
                              <th>Action</th>                         
                                                        
                                                        
                               
                                                    
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>                                              
                              <td>
                                  {{$category['id']}} 
                              </td>
                              <td>
                                  {{$category['category_name']}} 
                              </td>
                              <td>
                                  {{$category['parent']["category_name"]}} 
                              </td>
                              <td>
                                  {{$category['section']["name"]}} 
                              </td>
                              <td>                                                              
                                 @if($category['status']==1)                                
                                  <a href="javascript:void(0)" class="updateStatus" id="Active-{{$category['id']}}" object="category" object_id="{{$category['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateStatus"
                                 status="inactive" object="category" object_id="{{$category['id']}}" id="Inactive-{{$category['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                                                             
                                  </a>                   
                                 @endif
                              </td>  
                              <td>
                                  {{$category['category_image']}} 
                              </td>
                              <td>
                                  {{$category['category_discount']}} 
                              </td>
                              <td>
                                  {{$category['description']}} 
                              </td>
                              <td>
                                  {{$category['url']}} 
                              </td>
                              <td>
                                  {{$category['meta_title']}} 
                              </td>
                              <td>
                                  {{$category['meta_description']}} 
                              </td>  
                              <td>
                                  {{$category['meta_keywords']}} 
                              </td>
                                                       
                             <td>                                          
                                <a href="{{url('admin/categories/add-edit/'.$category['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                                   <i class="ti-pencil btn-icon-prepend"></i>
                                      Edit
                                 </a>
                                 <a  title="category"   comfirm href="{{url('admin/category/delete/'.$category['id'])}}" class="btn btn-danger btn-sm btn-icon-text confirmDelete" >
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


{{--    
   
   
   
   
   
   <table  id="d_Table" class="table table-striped display" >
                        <thead>
                           <tr>   
                              <th>Id</th>
                              <th>name</th>
                              <th>parent Id</th>                                                             
                              <th>section Id</th>                          
                              <th>status</th>                          
                              <th>category image</th>                          
                              <th>category discount</th>                          
                              <th>description</th>                          
                              <th>url</th> 
                               <th>meta title </th>                          
                              <th>meta description</th>                          
                              <th>meta keywords</th>                          
                              <th>meta keywords</th>                          
                              <th>Action</th>                          
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                           <tr>                                              
                              <td>
                                  {{$category['id']}} 
                              </td>
                              <td>
                                  {{$category['category_name']}} 
                              </td>
                              <td>
                                  {{$category['parent_id']}} 
                              </td>
                              <td>
                                  {{$category['section_id']}} 
                              </td>
                              <td>                                                              
                                 @if($category['status']==1)                                
                                  <a href="javascript:void(0)" class="updateCategoryStatus" id="Active-{{$category['id']}}" admin_id="{{$category['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateCategoryStatus"
                                 status="inactive" admin_id="{{$category['id']}}" id="Inactive-{{$category['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                                                             
                                  </a>                   
                                 @endif
                              </td>  
                              <td>
                                  {{$category['category_image']}} 
                              </td>
                              <td>
                                  {{$category['category_discount']}} 
                              </td>
                              <td>
                                  {{$category['description']}} 
                              </td>
                              <td>
                                  {{$category['url']}} 
                              </td>
                              <td>
                                  {{$category['meta_title']}} 
                              </td>
                              <td>
                                  {{$category['meta_description']}} 
                              </td>  
                              <td>
                                  {{$category['meta_keywords']}} 
                              </td>
                                                       
                             <td>                                          
                                <a href="{{url('admin/categories/add-edit/'.$category['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                                   <i class="ti-pencil btn-icon-prepend"></i>
                                      Edit
                                 </a>
                                 <a  title="category"   comfirm href="{{url('admin/category/delete/'.$category['id'])}}" class="btn btn-danger btn-sm btn-icon-text confirmDelete" >
                                   <i class="ti-trash btn-icon-prepend"></i> Delete
                                  </a>                              
                              </td>
                           </tr>
                           @endforeach
                          
                        </tbody>
                     </table>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   --}}