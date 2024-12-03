@extends('admin.layout.layout')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>
                  <p class="card-description">
                  {{$title}}
                  </p>
                  @if(Session::has('success'))
                   <div class="alert alert-success">
                    {{Session::get('success')}}
                   </div>

                  @endif

                  <form  action="{{url('admin/payment-methods/'.$paymentMethod['id'])}}"  enctype="multipart/form-data"
                        method="post"  class="forms-sample">
                    @csrf
                    @method("put")


                    <div class="form-group">
                      <label for="exampleInputUsername1">paymentMethod Name</label>
                      <input type="text"name="name" class="form-control"   value="{{$paymentMethod['name']}}"  >
                    </div> 
                    @foreach($options as $key=>$value)
                    <div class="form-group">
                                 
                      <label for="exampleInputUsername1">{{$value['lable']}}</label>
                      <input type="text" name="options[{{$key}}]" class="form-control" value="{{$paymentMethod['options'][$key]}}"  >
                      
                    </div>
                    @endforeach
                                                                                                                                                                                                           
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection