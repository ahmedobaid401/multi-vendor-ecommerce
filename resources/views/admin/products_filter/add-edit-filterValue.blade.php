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

                  <form @if(!empty($filterValue["id"] )) action="{{url('admin/filters/add-edit-filterValue/'.$filterValue['id'])}}" 
                       @else  action='{{url("admin/filters/add-edit-filterValue")}}'   @endif method='post' class="forms-sample">
                    @csrf


                    <div class="form-group">
                      <label for="exampleInputUsername1"> filters</label>
                      <select class="form-control"   name="filter_id">
                      <option type="text"   class="form-control"   value=""  placeholder="section">select filter</option>
                      @foreach($filters as $filter)                      
                        <option type="text" value="{{$filter['id']}}"  class="form-control"  @if (isset($filterValue)&&$filter['id']== $filterValue['filter_id'])  selected  @endif  >{{$filter['filter_name']}} </option>
                       @endforeach
                      </select>
                    </div> 
                    <div class="form-group">
                      <label  >filter value</label>
                      <input type="text"name="filter_value" class="form-control"   @if (isset($filterValue['filter_value'])) value="{{$filterValue['filter_value']}} "  else value="{{old('filter_value')}}"    @endif placeholder="filter value">
                    </div> 
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection