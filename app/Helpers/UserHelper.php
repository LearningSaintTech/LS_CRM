<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class UserHelper
{
    public static function store_user($vendor, $password, $role)
    {
        $user = new User();
        $user->name = $vendor->name;
        $user->email = $vendor->email;
        $user->phone = $vendor->phone;
        $user->type = 'Sub-Admin';
        $user->status = 'Active';
        $user->password = Hash::make($password);
        $user->vendor_id = $vendor->id;
        $user->created_by = Auth::id();
        $user->save();
        // DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($role);
        return $user;
    }

    public static function update_user($vendor)
    {
        return User::where('vendor_id', $vendor->id)->update([
            'name' => $vendor->name,
            'email' => $vendor->email,
            'phone' => $vendor->phone,
            'created_by' => Auth::id(),
        ]);
    }

}
