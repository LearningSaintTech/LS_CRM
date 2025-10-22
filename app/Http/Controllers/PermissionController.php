<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Menu;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $all_permission = Permission::orderBy('id','DESC')->get();
        // $all_menus = Menu::get();
        // dd($all_menus);
        return view('setting.permission.index',compact('all_permission'));
    }
    public function create()
    {
        $menuset = Menu::get();
        $permission= null;
        return view('setting.permission.new',compact('menuset','permission'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'menu_setting'=>'required',
            'permission_name'=>'required',
        ]);

        if($request?->permission_id)
        {
            $id = convert_uudecode(base64_decode($request?->permission_id));
            $permission = Permission::find($id);
            $permission->menu_id = $request?->menu_setting;
            $permission->save();
            self::alertupdate();
            return redirect()->back();
        }else{
            $permission = Permission::create([
                'name'=>$request->permission_name,
                'menu_id' =>$request?->menu_setting,
            ]);
            self::alertSuccess();
            return redirect()->back();
        }


    }
    public function edit($id)
    {
        // dd($id);
        $menuset = Menu::get();
        $permission = Permission::find($id);
        return view('setting.permission.new',compact('menuset','permission'));
    }
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if($permission->roles()->exists())
        {
            self::errordelete();
            return redirect()->back();
        }else{
            $permission->delete();
            self::alertdelete();
            return redirect()->back();
        }
    }

}
