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
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function getUsers()
    {
        $users = User::select('users.*');
        return DataTables::of($users)
            ->addColumn('role', function ($user) {
                    $roleColors = [
                        'Super Admin' => '#6610f2',
                        'Admin' => '#0d6efd',
                        'Manager' => '#198754',
                        'User' => '#6c757d',
                    ];

                    $badges = '';
                    foreach ($user->roles as $r) {
                        $name = $r->name;
                        $color = $roleColors[$name] ?? '#6c757d'; // fallback color
                        $textColor = '#ffffff';
                        $badges .= '<span style="background-color: '. $color .'; color: '. $textColor .'; padding: 2px 6px; border-radius: 7px; margin-right: 5px; display:inline-block;">'. e($name) .'</span>';
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
                    <a href="' . $editUrl . '" class="btn btn-square btn-warning btn-sm me-1">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="" data-id="' . $user->id . '" 
                       class="btn btn-square btn-danger btn-sm delete-user">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            ';
            })
            ->rawColumns(['status' ,'action' ,'role'])
            ->make(true);
    }

    public function edit(Request $request){
        $id = convert_uudecode(base64_decode($request->userId));
        $user = User::where('id' ,$id)->first();
        // dd($user);
        $roles = Role::get();
        $userRole = $user?->roles->pluck('name','name')->all() ?? [];
        // dd($userRole);
        return view('user.addEdit' ,compact('user' ,'roles','userRole'));
    }
    public function userupdate(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('user.list')
                        ->with('success','User updated successfully');
    }

}
