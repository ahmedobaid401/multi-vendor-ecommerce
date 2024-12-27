@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                       
                       @if(session()->has("success"))
                        <div class="alert alert-cuccess alert-dismissible fade show" role="alert" > 
                           <strong> success:</strong>  {{session("success")}}
                           <dutton type="button" class="close" data-dismiss="alert" aria-lable="close">
                              <span aria-hidden="true" > &items;</span>
                           </dutton>
                        </div>
                     @endif
                      <a href="{{url('admin/role/create')}}" class="btn btn-primary">Add role</a>
                       </div>
                     @if(count($roles)==0)
                     There is no roles
                     @else
                     <h4 class="card-title">roles Table</h4>                            
                    
                   <div class="table-responsive">
                   <table id="d_Table" class="table table-striped display ">
                       <thead>
                           <tr>   
                                                     
                                                      
                              <th>Id</th>
                              <th>name</th>                                                         
                              <th>status</th>                                                                                                                                                                                                                       
                              <th>Action</th>                         
                                                                                                                                                                                                                              </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                        <tr>                                              
                              <td>
                                  {{$role['id']}} 
                              </td>
                              <td>
                                  {{$role['name']}} 
                              </td>
                              <td>
                                  {{$role["type"]}} 
                              </td>
                              
                              <td>                                                              
                                 @if($role['status']=="allow")                                
                                  <a href="javascript:void(0)" class="updateStatus" id="Active-{{$role['id']}}" object="role" object_id="{{$role['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateStatus"
                                 status="inactive" object="role" object_id="{{$role['id']}}" id="Inactive-{{$role['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                                                             
                                  </a>                   
                                 @endif
                              </td>  
                               
                               
                                                       
                             <td>                                          
                                <a href="{{url('admin/role/edit/'.$role['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                                   <i class="ti-pencil btn-icon-prepend"></i>
                                      Edit
                                 </a>
                                 <a  title="role"   comfirm href="{{url('admin/role/delete/'.$role['id'])}}" class="btn btn-danger btn-sm btn-icon-text confirmDelete" >
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
                              <th>role image</th>                          
                              <th>role discount</th>                          
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
                        @foreach($roles as $role)
                           <tr>                                              
                              <td>
                                  {{$role['id']}} 
                              </td>
                              <td>
                                  {{$role['role_name']}} 
                              </td>
                              <td>
                                  {{$role['parent_id']}} 
                              </td>
                              <td>
                                  {{$role['section_id']}} 
                              </td>
                              <td>                                                              
                                 @if($role['status']==1)                                
                                  <a href="javascript:void(0)" class="updateCategoryStatus" id="Active-{{$role['id']}}" admin_id="{{$role['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateCategoryStatus"
                                 status="inactive" admin_id="{{$role['id']}}" id="Inactive-{{$role['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                                                             
                                  </a>                   
                                 @endif
                              </td>  
                              <td>
                                  {{$role['role_image']}} 
                              </td>
                              <td>
                                  {{$role['role_discount']}} 
                              </td>
                              <td>
                                  {{$role['description']}} 
                              </td>
                              <td>
                                  {{$role['url']}} 
                              </td>
                              <td>
                                  {{$role['meta_title']}} 
                              </td>
                              <td>
                                  {{$role['meta_description']}} 
                              </td>  
                              <td>
                                  {{$role['meta_keywords']}} 
                              </td>
                                                       
                             <td>                                          
                                <a href="{{url('admin/roles/add-edit/'.$role['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                                   <i class="ti-pencil btn-icon-prepend"></i>
                                      Edit
                                 </a>
                                 <a  title="role"   comfirm href="{{url('admin/role/delete/'.$role['id'])}}" class="btn btn-danger btn-sm btn-icon-text confirmDelete" >
                                   <i class="ti-trash btn-icon-prepend"></i> Delete
                                  </a>                              
                              </td>
                           </tr>
                           @endforeach
                          
                        </tbody>
                     </table>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   --}}