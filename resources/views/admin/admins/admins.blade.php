@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Admins Table</h4>
                  <p class="card-description">
                     @if(count($admins)==0)
                     There is no admins
                     @else
                  </p>
                   
                     <table id="d_Table" class="table table-striped display">
                        <thead>
                           <tr>
                             
                              
                              <th>Id</th>
                              <th>name</th>
                              <th>type</th>
                              <th>email</th>
                              <th>mobile</th>
                              <th>vendor Id</th>
                              <th>image</th>
                              <th>status</th>
                              <th>created At</th>
                              <th>Action</th>
                           
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                           <tr>
                              
                              
                              <td>
                                  {{$admin['id']}} 
                              </td>
                              <td>
                                  {{$admin['name']}} 
                              </td>
                              <td>
                                 {{$admin['type']}} 
                              </td>
                              <td>
                                  {{$admin['email']}} 
                              </td>
                              <td>
                                  {{$admin['mobile']}} 
                              </td>
                              <td>
                                 {{$admin['vendor_id']}} 
                              </td>
                               <td>
                                  {{$admin['image']}} 
                              </td>
                              <td>  
                                
                              
                                 @if($admin['status']==1)
                                 
                                  <a href="javascript:void(0)" class="updateStatus" id="Active-{{$admin['id']}}"  object="admin" object_id="{{$admin['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                
                                   
                                  </a>
                                  
                                 @else
                                 
                                 <a href="javascript:void(0)"  class="updateStatus"
                                 status="Inactive" object="admin" object_id="{{$admin['id']}}" id="Inactive-{{$admin['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                           
                                   
                                  </a>
                                 
                                 @endif
                              </td>
                              <td>
                                  {{$admin['created_at']}} 
                              </td>
                            
                              
                                <td> 
                              @if($admin['vendor_id']>0)

                              <a href="{{url('admin/admins/view/'.$admin['id'])}}" class="btn btn-info btn-sm btn-icon-text" >
                               <i class="ti-eye btn-icon-prepend"></i> view 
                              </a>

                                 @else
                                      ---
                                 @endif
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