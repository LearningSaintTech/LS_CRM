<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('new_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::any('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('roles' ,[RoleController::class,'index'])->name('roles.index');
    Route::get('settings' ,[SettingController::class , 'settingIndex'])->name('settings.index');
    Route::get('user-list',[UserController::class,'userlist'])->name('user.list');
    Route::get('/users/data', [UserController::class, 'getUsers'])->name('users.data');
    Route::get('users-edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch('/{user}/user-update', [UserController::class ,'userupdate'])->name('users.role.update');
    Route::get('role-list' ,[RoleController::class,'index'])->name('role.index');
    // Route::get('permission', [PermissionController::class ,'index'])->name('permission.index');
    Route::resource('permission', PermissionController::class);

});

require __DIR__.'/auth.php';
require __DIR__.'/employee.php';
