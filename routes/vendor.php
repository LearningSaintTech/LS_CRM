<?php

use App\Http\Controllers\VendorCntroller;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function () {
Route::get('vendor-list', [VendorCntroller::class, 'vendorlist'])->name('vendor.list');
    Route::get('add-vendor' ,[VendorCntroller::class ,'addvendor'])->name('add.vender');
    Route::post('insert-vendor' ,[VendorCntroller::class ,'insertvender'])->name('insert.vender');
    Route::get('vendor-data' ,[VendorCntroller::class ,'vendordata'])->name('vendor.data');
    Route::get('vendor-edit' ,[VendorCntroller::class ,'vendoredit'])->name('vendor.edit');
    Route::get('vendor/status/{id}', [VendorCntroller::class, 'toggleStatus'])
    ->name('vendor.status');
    Route::get('user-view' ,[VendorCntroller::class ,'userview'])->name('user.view');
    Route::post('vendoruser.insert' ,[VendorCntroller::class ,'vendoruserinsert'])->name('vendoruser.insert');
    Route::get('/vendor-user-data', [VendorCntroller::class, 'vendoruserdata'])->name('vendor.user.data');
    Route::get('vendor-user/{id}', [VendorCntroller::class, 'vendoreuserdit'])
     ->name('vendoruser.edit');
});
