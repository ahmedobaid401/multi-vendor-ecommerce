<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoleAbility;

class RoleController extends Controller
{
    public function index() {
        
        $roles=Role::paginate();
        return view("admin.roles.index",compact("roles"));
    }

    public function create() {
        $role=new Role();
        $title="create new role";
        return view("admin.roles.addEdit",compact("role","title"));
    }

    public function store(Request $request) {
       
        $request->validate([
         "name"=>"required|string|max:255",
         "abilities"=>"array|required"
        ]);
         Role::createWithAbilities($request);
         $role=new Role();
         $title="create new role";
         return view("admin.roles.addEdit",compact("role","title"));
    }

    public function edit( $id) {
         $title="edit role";
         $role=Role::findOrFail($id);
         $role_abilities=$role->abilities->pluck("type","ability")->toArray();
        // dd($role_abilities);
        return view("admin.roles.addEdit",compact("role","title","role_abilities"));
    }
    public function update(Role $role ,Request $request) {
       // dd($request->abilities);
        $request->validate([
            "name"=>"required|string|max:255",
            "abilities"=>"array|required"
           ]);
           $role->updateWithAbilities($request);
           
         
           return redirect("admin/roles/index");
         
    }

    public function destroy($id){
       Role::destroy($id);
       return redirect()->back()->with("success","role has deleted successfully");


    }
}
