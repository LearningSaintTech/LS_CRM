<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/mail-test', function () {
//     Mail::raw('Test Mail Working', function ($msg) {
//         $msg->to('amarjeet@learningsaint.com')
//             ->subject('SMTP Test');
//     });
// });

Route::get('/dashboard', function () {
    return view('new_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::any('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/notifications', [NotificationController::class, 'notificationindex'])
    ->name('notifications.index');
    // Role management routes with permissions
    Route::prefix('users')->group(function () {
        Route::get('roles/edit/{id}', [RoleController::class, 'editroles'])->name('roles.edit');
        Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        Route::resource('roles', RoleController::class)->except(['edit', 'update', 'destroy']);
        Route::get('role-menusetting', [RoleController::class, 'rolemenusetting'])->name('role-menusetting');
    });


    Route::post('/set-vendor', function (Illuminate\Http\Request $request) {

        if ($request->vendor_id) {
            session(['vendor_id' => $request->vendor_id]);
        } else {
            session()->forget('vendor_id'); // VERY IMPORTANT
        }

        return response()->json(['success' => true]);
    })->name('set.vendor');


    Route::get('settings', [SettingController::class, 'settingIndex'])->name('settings.index');
    Route::get('user-list', [UserController::class, 'userlist'])->name('user.list');
    Route::get('add-user' ,[UserController::class , 'adduser'])->name('add.user');
    Route::get('/users/data', [UserController::class, 'getUsers'])->name('users.data');
    Route::get('users-edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('user-update', [UserController::class, 'userupdate'])->name('users.role.update');
    Route::get('role-list', [RoleController::class, 'index'])->name('role.index');
    // Route::get('permission', [PermissionController::class ,'index'])->name('permission.index');
    Route::get('/permissioncreate', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permissionedit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::get('/create-role', [RoleController::class, 'create'])->name(name: 'create-role');
    Route::get('/role-menusetting', [RoleController::class, 'rolemenusetting'])->name('role-menusetting');
    Route::resource('permission', PermissionController::class);
    Route::get('payment' ,[PaymentController::class ,'paymentlist'])->name('payment');
    Route::get('get-websites' ,[PaymentController::class ,'getwebsites'])->name('get.websites');
    Route::post('payment-insert' ,[PaymentController::class ,'paymentinsert'])->name('payment.insert');
    Route::post('payment-insert' ,[PaymentController::class ,'paymentinsert'])->name('payment.insert');
    // Route::get('payment-edit' ,[PaymentController::class ,'paymentedit'])->name('payment.edit');
    Route::get('/payment/{id}/edit', [PaymentController::class, 'paymentedit'])
    ->name('payment.edit');

});

Route::get('lang/{lang}', function ($lang) {
    session(['locale' => $lang]);
    app()->setLocale($lang);
    return redirect()->back();
})->name('lang.switch');


require __DIR__ . '/auth.php';
require __DIR__ . '/employee.php';
require __DIR__ . '/blog.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/websites.php';
require __DIR__ . '/enrolment.php';