<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Contracts\View\View
     */
    function __construct()
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();

        // dd($all_menus);
        return view('setting.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
    * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $permission = Permission::get();
        $all_menus = Menu::get();
        return view('setting.role.new',compact('all_menus'));
    }

    public function rolemenusetting(Request $request)
    {
        $data =[];
        if($request->ids){
            if(in_array('All', $request->ids))
            {
                $data = Permission::with('Menu_details')->latest()->get();
            }else{
                $data = Permission::with('Menu_details')->whereIn('menu_id', $request->ids)->get();
            }
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
   public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'nullable|string',
            'permission' => 'array'
        ]);

        if ($request->has('permission')) {
            $permissions = Permission::whereIn('id', $request->permission)->pluck('name')->toArray();

            $role = Role::create([
                'name'=>$request->name,
                'description'=>$request->description
            ]);
            $role->syncPermissions($permissions);
            self::alertSuccess();
            return redirect('users/roles');
        }else{
            return redirect()->back()->with('error', 'Please select permission!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('setting.role.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    * @return \Illuminate\Contracts\View\View
     */
    public function edit(Role $role,Request $request)
    {
        $all_menus = Menu::get();
        $all_permissions= $role->permissions;
        $permission_list = $role->permissions->pluck('id')->toArray();
        $permission = Permission::with('Menu_details')->whereIn('id', $permission_list)->get();
        $selected_menus = array_unique($permission->pluck('menu_id')->toArray());
        return view('setting.role.edit',compact('role','all_menus','all_permissions','selected_menus'));
        // return [$role,$all_menus,$all_permissions];

    }
    public function editMenu(Request $request){
        // dd($request->all());
        $role_id = convert_uudecode(base64_decode($request->role_id));
        $role = Role::find($role_id);
        $role->permissions;
        $permission_list = $role->permissions->pluck('id')->toArray();
        $data = Permission::with('Menu_details')->whereIn('menu_id', $request->ids)->get();
        $html = '';
        foreach ($data as $item) {
            $html .= '<tr>';
            $html .= '<td><input type="checkbox" name="permission[]" class="checkone1" value="' . $item?->id . '"' . (in_array($item->id, $permission_list) ? 'checked' : '') . '></td>';
            $html .= '<td>' . $item?->name . '</td>';
            $html .= '<td>' . $item?->Menu_details?->menu_name . '</td>';
            $html .= '</tr>';
        }
        return $html;
        // $permission = Permission::with('Menu_details')->whereIn('id', $permission_list)->get();
        // $menus = array_unique($permission->pluck('menu_id')->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'permissions.*' => 'required',
        ]);
        try{
            $role_id = convert_uudecode(base64_decode($request->role_id));
            $role = Role::find($role_id);
            $role->description = $request->input('description');
            $role->save();
            $permission = Permission::whereIn('id',$request->permission)->get();
            $permissions = $permission->pluck('name')->toArray();
            $role->syncPermissions($permissions);
            self::alertupdate();
            return redirect('users/roles');
        }catch(Exception $e)
        {
            self::alerterror();
            return redirect('users/roles');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $role = Role::findOrFail($id);
        if($role->users()->exists())
        {
            self::errordelete();
            return redirect()->back();
        }else{
            $role->delete();
            self::alertdelete();
            return redirect()->back();
        }
    }
}
