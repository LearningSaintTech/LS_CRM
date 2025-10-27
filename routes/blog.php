<?php

use App\Http\Controllers\BLogController;


Route::middleware('auth')->group(function () {
    Route::any('/blog-list', [BLogController::class, 'bloglist'])->name('blog.list');
    Route::any('blog-create' ,[BLogController::class ,'blogcreate'])->name('blog.create');
});