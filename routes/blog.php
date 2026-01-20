<?php

use App\Http\Controllers\BLogController;
Route::middleware('auth')->group(function () {
    Route::any('/blog-list', [BLogController::class, 'bloglist'])->name('blog.list');
    Route::any('blog-create' ,[BLogController::class ,'blogcreate'])->name('blog.create');
    Route::any('blog-data' ,[BLogController::class ,'blogdata'])->name('blog.data');
    Route::any('blog-destroy' ,[BLogController::class ,'blogdata'])->name('blog.destroy');
    Route::any('blog-edit' ,[BLogController::class ,'blogedit'])->name('blog.edit');
    Route::post('/tinymce-upload', [BLogController::class, 'upload'])->name('tinymce.upload');
    Route::any('insert-blog' ,[BLogController::class ,'insertblog'])->name('insert.blog');

});