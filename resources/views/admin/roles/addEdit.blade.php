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

                  <form @if(!empty($role["id"] )) action="{{url('admin/role/update/'.$role['id'])}}" 
                       @else  action='{{url("admin/role/store")}}' 
                       @endif method='post' class="forms-sample">
                    @csrf


                    <div class="form-group">
                      <label for="exampleInputUsername1">Role Name</label>
                      <input type="text"name="name" class="form-control" @if(!empty($role))  value="{{$role['name']}}" @else value="{{old('name')}}" @endif placeholder="role name">
                    </div> 
                    @foreach(app("abilities") as $ability_code=>$ability_name)
                     <div class="row mb-2">
                         <div class="col-md-4">
                            {{is_callable($ability_name) ? $ability_name() : $ability_name}}
                         </div>
                         <div class="col-md-2">
                             <input type="radio" name="abilities[{{$ability_code}}]" value="allow" @checked (($role_abilities[$ability_code] ?? '') == "allow")>
                             allow
                         </div>

                         <div class="col-md-2">
                             <input type="radio" name="abilities[{{$ability_code}}]" value="deny" @checked (($role_abilities[$ability_code] ?? '') == "deny")>
                             deny
                         </div>

                     </div>

                    @endforeach
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    

                  </form>
                </div>
              </div>
            </div>

@endsection