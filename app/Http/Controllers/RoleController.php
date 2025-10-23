<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use Spatie\Permission\Traits\HasRoles;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Apply middleware through the routes file instead
        // Example in routes/web.php:
        // Route::group(['middleware' => ['permission:role-list']], function () {
        //     Route::resource('roles', RoleController::class);
        // });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $roles = Role::with([
            'permissions' => function ($query) {
                $query->withCount('Menu_details');
            }
        ])->orderBy('id', 'DESC')->get();

        // Add debug information
        foreach ($roles as $role) {
            $role->permissions_count = $role->getAllPermissions()->count();
        }

        return view('setting.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        $permission = Permission::get();
        $all_menus = Menu::get();
        return view('setting.role.new', compact('all_menus'));
    }

    /**
     * Get permissions by menu IDs.
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function rolemenusetting(Request $request)
    {
        if (!$request->has('ids')) {
            return collect();
        }

        $query = Permission::with('Menu_details');

        if (in_array('All', $request->ids)) {
            return $query->latest()->get();
        }

        return $query->whereIn('menu_id', $request->ids)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    /**
     * Store a newly created role in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
            $roleData = [
                'name' => $request->name,
                'description' => $request->description
            ];
            if (Schema::hasColumn('roles', 'guard_name')) {
                $roleData['guard_name'] = '';
            }
            $role = Role::create($roleData);
            $role->syncPermissions($permissions);
            return redirect()->route('role.index')
                ->with('success', 'Role created successfully');
        } else {
            return redirect()->back()->with('error', 'Please select permission!');
        }

    }

    /**
     * Display the specified role.
     *
     * @param int $id
     * @return View
     */
    public function show($id): View
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        if (!view()->exists('setting.role.show')) {
            abort(404, 'View setting.role.show not found');
        }

        return view('setting.role.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param int $id
     * @return View
     */
    public function edit($id): View
    {
        $role = Role::findOrFail($id);
        $all_menus = Menu::all();
        $role->load('permissions');

        $permission_list = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::with('Menu_details')
            ->whereIn('id', $permission_list)
            ->get();

        $selected_menus = $permissions->pluck('menu_id')
            ->unique()
            ->values()
            ->toArray();

        if (!view()->exists('setting.role.edit')) {
            abort(404, 'View setting.role.edit not found');
        }

        return view('setting.role.edit', compact('role', 'all_menus', 'permissions', 'selected_menus'));
    }

    /**
     * Get menu-specific permissions for editing.
     *
     * @param Request $request
     * @return string
     */
    public function editMenu(Request $request): string
    {
        $role = Role::findOrFail(convert_uudecode(base64_decode($request->role_id)));
        $role->load('permissions');

        $permission_list = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::with('Menu_details')
            ->whereIn('menu_id', $request->ids)
            ->get();

        return view('setting.role._permission_list', compact('permissions', 'permission_list'))
            ->render();
    }

    /**
     * Update the specified role in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'role_id' => 'required',
            'description' => 'nullable|string',
            'permission' => 'required|array'
        ]);

        DB::beginTransaction();
        try {
            $role = Role::findOrFail(convert_uudecode(base64_decode($request->role_id)));
            $role->description = $request->description;
            $role->save();

            $permissions = Permission::whereIn('id', $request->permission)
                ->pluck('name')
                ->toArray();

            $role->syncPermissions($permissions);
            DB::commit();

            return redirect()->route('roles.index')
                ->with('success', 'Role updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Failed to update role. ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified role from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $role = Role::findOrFail($id);

        if ($role->users()->exists()) {
            return redirect()->back()
                ->with('error', 'Cannot delete role with assigned users.');
        }

        try {
            $role->delete();
            return redirect()->back()
                ->with('success', 'Role deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete role. ' . $e->getMessage());
        }
    }


}
