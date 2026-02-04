<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use APP\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;



class UserController extends Controller
{
    //
    public function userlist(Request $request)
    {
        $users = User::where('status' ,'Active')->get();
        if (session('success')) {
            session()->flash('success', session('success'));
        }
        return view('user.index', compact('users'));
    }

    public function adduser(Request $request)
    {
        $user = null;
        $roles = Role::get(['id', 'name']);
        $userRole = $user ? $user->roles->pluck('name', 'name')->all() : [];
        return view('user.addEdit', compact('roles', 'user', 'userRole'));

    }

    public function getUsers()
    {
        $users = User::orderBy('id', 'Desc')->select('users.*');
        return DataTables::of($users)
            ->addColumn('role', function ($user) {
                $roleColors = [
                    'Super Admin' => '#6610f2',
                    'Admin' => '#f3b95a',
                    'Manager' => '#198754',
                    'User' => 'hsl(207, 18%, 78%)',
                    'sub-admin' => '#f74900d9',
                    'vendor' => '#000',
                ];

                $badges = '';
                foreach ($user->roles as $r) {
                    $name = $r->name;
                    $color = $roleColors[$name] ?? '#6c757d';
                    $textColor = '#ffffff';
                    $badges .= '<span style="background-color: ' . $color . '; color: ' . $textColor . '; padding: 2px 6px; border-radius: 7px; margin-right: 5px; display:inline-block;">' . e($name) . '</span>';
                }

                return $badges ?: '<span class="text-muted">—</span>';
            })
            ->addColumn('status', function ($user) {
                if ($user->status === 'Active') {
                    return '<span class="badge bg-success">Active</span>';
                } else {
                    return '<span class="badge bg-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function ($user) {
                $editUrl = route('users.edit', ['userId' => base64_encode(convert_uuencode($user->id))]);
                $deleteUrl = route('users.destroy', $user->id);
                return '
                <td class="text-end">
                    <a href="' . $editUrl . '" class="btn btn-square btn-info btn-sm me-1">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="" data-id="' . $user->id . '" 
                       class="btn btn-square btn-danger btn-sm delete-user">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            ';
            })
            ->rawColumns(['status', 'action', 'role'])
            ->make(true);
    }

    public function edit(Request $request)
    {
        $id = convert_uudecode(base64_decode($request->userId));
        $user = User::where('id', '=', $id)->first();
        // dd($user);
        $roles = Role::get(['id', 'name']);
        $userRole = $user?->roles->pluck('name', 'name')->all() ?? [];
        // dd($userRole);
        return view('user.addEdit', compact('user', 'roles', 'userRole'));
    }
    public function userupdate(Request $request): RedirectResponse
    {
        if ($request->id) {
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|max:12',
                'email' => 'required|max:70',
                'roles' => 'required',
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|max:12',
                'email' => 'required|max:70|unique:users,email',
                'password' => 'same:confirm-password',
                'roles' => 'required',
            ]);
        }
        DB::beginTransaction();
        $id = $request->id;
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        try {
            $user = $id ? User::findOrFail($id) : new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            if (!empty($input['password'])) {
                $user->password = $input['password'];
            }
            $user->save();
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
            return redirect()->route('user.list')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage())->withInput();
        }
    }

}
