<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $all_permission = Permission::with('Menu_details')->orderBy('id', 'DESC')->get();
        $all_menus = Menu::get();
        // dd($all_menus);
        return view('setting.permission.index', compact('all_permission', 'all_menus'));
    }
    public function create()
    {
        $menuset = Menu::get();
        $permission = null;
        return view('setting.permission.new', compact('menuset', 'permission'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'menu_setting' => 'required',
                'permission_name' => 'required',
            ]);

            if ($request?->permission_id) {
                $id = convert_uudecode(base64_decode($request?->permission_id));
                $permission = Permission::findOrFail($id);
                $permission->menu_id = $request?->menu_setting;
                $permission->guard_name = 'web'; // Ensure guard is set on update
                $permission->save();

                return redirect()->back()->with('success', 'Permission Updated Successfully');
            } else {
                $permissionName = $request->permission_name;
                // Check if permission is for enabling Claude Sonnet 3.5
                if ($permissionName === 'Enable Claude Sonnet 3.5 for all clients') {
                    $permissionName = 'enable_claude_sonnet';
                }

                // Check if permission already exists
                if (Permission::where('name', $permissionName)->exists()) {
                    return redirect()->back()->with('error', 'Permission already exists!');
                }

                $permissionData = [
                    'name' => $permissionName,
                    'menu_id' => $request?->menu_setting,
                    'guard_name' => 'web'
                ];

                $permission = Permission::create($permissionData);
                return redirect()->back()->with('success', 'Permission Created Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $menuset = Menu::get();
        $permission = Permission::find($id);
        return view('setting.permission.new', compact('menuset', 'permission'));
    }
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        if ($permission->roles->count() > 0) {
            return redirect()->back()->withErrors(provider: ['permission' => 'Cannot delete this permission because it is assigned to one or more roles.']);
        }

        $permission->delete();
        return redirect()->route(route: 'permission.index')->with('success', 'Permission deleted successfully.');
    }


}
