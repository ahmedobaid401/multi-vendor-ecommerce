@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                       <h4 class="card-title">brand Table</h4>
                 
                     @if(count($brands)==0)
                     There is no brands
                     @else
                                                   
                     @if(session()->has("success"))
                        <div class="alert alert-cuccess" role="alert" > 
                           <strong> success:</strong>  {{session("success")}}
                           <dutton type="button" class="close" data-dismiss="alert" aria-lable="close">
                              <span aria-hidden="true" > &items;</span>
                           </dutton>
                        </div>
                     @endif
                     <a href="{{url('admin/brand/add-edit')}}" class="btn btn-primary">Add brand</a>
               </div>
                     <table  id="d_Table" class="table table-striped display" >
                        <thead>
                           <tr>   
                              <th>Id</th>
                              <th>name</th>
                              <th>status</th>                                                             
                              <th>Action</th>                          
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                           <tr>                                              
                              <td>
                                  {{$brand['id']}} 
                              </td>
                              <td>
                                  {{$brand['name']}} 
                              </td>                                                    
                              <td>                                                              
                                 @if($brand['status']==1)                                
                                  <a href="javascript:void(0)" class="updateStatus" object="brand" id="Active-{{$brand['id']}}" object_id="{{$brand['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateStatus" object="brand" 
                                 status="inactive" object_id="{{$brand['id']}}" id="Inactive-{{$brand['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                           
                                   
                                  </a>
                                 
                                 @endif
                              </td>                            
                                <td>                     
                              
                              <a href="{{url('admin/brand/add-edit/'.$brand['id'])}}" class="btn btn-primary btn-sm btn-icon-text" >                            
                              <i class="ti-pencil btn-icon-prepend"></i>
                                Edit
                              </a>
                              <a  title="brand"   comfirm href="{{url('admin/brand/delete/'.$brand['id'])}}" class="btn btn-danger btn-sm btn-icon-text confirmDelete" >
                                <i class="ti-trash btn-icon-prepend"></i> Delete
                              </a>                              
                              </td>
                           </tr>
                           @endforeach
                          
                        </tbody>
                     </table>
                 
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
 

@endsection


 

 




 