@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
        <div class="row">

           <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Attributes</h4>
                   
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
                  <form action="{{url('admin/add-edit-attributes/'.$product['id'])}}" method='post' class="forms-sample" >
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
                      &nbsp;{{$product["product_color"]}} 
                    </div>

                     <div class="form-group m-3">
                      <label for="product_price" >Product price</label>
                      &nbsp;{{$product["product_price"]}} 
                    </div>

                    <div class="field_wrapper form-group m-3">
                          <div class="mb-3">
                           <input type="text" name="size[]"  style="width:110px;" placeholder="size" required/>
                           <input type="text" name="sku[]"   style="width:110px;" placeholder="sku"required/>
                           <input type="text" name="price[]" style="width: 110px;" placeholder="price"required/>
                           <input type="text" name="stock[]" style="width:110px;" placeholder="stock"required/>
                            <a href="javascript:void(0);" class="add_button" title="Add Attribute"> Add</a>
                       </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-3" style="width:120px;" >Submit</button>                                                                                                                                        
                  </form>
        

                  <form method="post" action="{{url('admin/edit-attribute/'.$product['id'])}}">
                                      
                   @csrf
                   <div class="table-responsive">
                   <table id="d_Table" class="table table-bordered ">
                       <thead>
                           <tr>                                                       
                                                      
                              <th>Id</th>
                              <th>size</th>
                              <th>sku </th>                                                             
                              <th>price </th>                          
                              <th>stock  </th>  
                              <th>action </th>                
                                                                                                                                                                                                                                                      
                           </tr>
                        </thead>
                        <tbody>
                          
                           
                        @foreach($product["attributes"] as  $key=>$attribute)
                                                                                  
                            <tr>  
                               
                                 <input type="hidden" name="attribute_id[]" value="{{$attribute['id']}}"/> 
                                                                                                   
                              <td>
                                  {{$attribute['id']}} 
                              </td>
                              <td>
                                  {{$attribute['size']}} 
                              </td>
                              <td>
                              {{$attribute['sku']}} 
                                </td>
                              <td>
                              <input type="number" name="price[]" value="{{$attribute['price']}}" style="width:90px;" placeholder="price" required/>
                              </td>
                              <td>
                              <input type="number" name="stock[]" value="{{$attribute['stock']}}" style="width:90px;" placeholder="stock" required/>
                              </td>
                                                                                                                                                                               
                             <td>                                          
                             @if($attribute['status']==1)                                
                                  <a href="javascript:void(0)" class="updateStatus" id="Active-{{$attribute['id']}}" object="ProductAttribute" object_id="{{$attribute['id']}}"
                                    status="Active">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" class="bi bi-x-lg">
                                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                   </svg>                                                                  
                                  </a>                                  
                                 @else                                
                                 <a href="javascript:void(0)"  class="updateStatus"
                                 status="inactive" object="ProductAttribute" object_id="{{$attribute['id']}}" id="Inactive-{{$attribute['id']}}">  
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                  </svg>                                                             
                                  </a>                   
                                 @endif   
                                 <a href=" ">  
                                      edit not ready                                                                
                                  </a>                         
                              </td>
                           </tr>
                           
                         </tbody>
                           
                        
                    @endforeach

                   </table>
                   </div>
                   <button type="submit" class="btn btn-primary"> update attribute</button>  
                       
                  
                  </form>







































                </div> 
              </div> 
            </div>   
              </div> 


             
                
            
                
               
                      
                
                 
               

     </div> 
    </div>  



     @endsection