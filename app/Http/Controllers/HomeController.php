<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Module;
use App\Role;
use App\Permission;
use App\PermissionRole;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $no = 1;
      $roles = Role::all();
      return view('index',['no'=>$no,'roles'=>$roles]);
    }

    public function edit($id)
    {
      $i = 0;
      $j = 0;
      $menu_parent = Module::where('parent_id',NULL)->get();
      $role = Role::find($id);
      return view('edit',['i'=>$i,'j'=>$j,'menu_parent'=>$menu_parent,'role'=>$role]);
    }

    public function update(Request $r)
    {
      $id = $r->input('id');

      $permission_role = PermissionRole::where('role_id',$id);
      $permissions = Permission::all();

      if ($permission_role->count()>0) {
        $permission_role->delete();

        foreach ($permissions as $value) {
          if ($r->input('permission_'.$value->id)!='') {
            PermissionRole::create(['permission_id'=>$r->input('permission_'.$value->id),'role_id'=>$id,'module_id'=>$r->input('module_'.$value->module_id)]);
            // $role->attachPermission($r->input('permission_'.$value->id));
          }
        }
      }

      else {
        foreach ($permissions as $value) {
          if ($r->input('permission_'.$value->id)!='') {
            PermissionRole::create(['permission_id'=>$r->input('permission_'.$value->id),'role_id'=>$id,'module_id'=>$r->input('module_'.$value->module_id)]);
            // $role->attachPermission($r->input('permission_'.$value->id));
          }
        }
      }

      return redirect('roles');
    }
}
