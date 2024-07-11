@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
        <div class="row">

           <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Attributes-colors</h4>
                   
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
                  <form action="{{url('admin/product_attribute/'.$productAttribute['id'].'/add-color')}}" method='post' class="forms-sample" >
                    @csrf
                    <input type="hidden" name="product_id" value="{{$productAttribute['product_id']}}"/>
                    <input type="hidden" name="size" value="{{$productAttribute['size']}}"/>
                    
                    <div class="form-group m-3">
                      <label for="product_name" >size</label>
                      &nbsp;{{$productAttribute["size"]}} 
                    </div>

                    <div class="field_wrapper form-group m-3">
                          <div class="mb-3">
                           <input type="text" name="color[]"  style="width:110px;" placeholder="color" required/>
                           <input type="text" name="stock[]"   style="width:110px;" placeholder="stock"required/>
                           
                           
                            <a href="javascript:void(0);" class="add_button" id="add-color" title="Add color"> Add color</a>
                       </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-3" style="width:120px;" >Submit</button>                                                                                                                                        
                  </form>
        
                
                


                </div> 
              </div> 
            </div>   
              </div> 


             
                
            
                
               
                      
                
                 
               

     </div> 
    </div>  



     @endsection