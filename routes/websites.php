<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'websites', 'middleware' => 'auth'], function () {

    Route::get('websites-list', [WebsiteController::class, 'websiteslist'])->name('websites.list');
    Route::get('websites-data' ,[WebsiteController::class ,'websitesdata'])->name('websites.data');
    Route::get('add-websites/{vendor}' ,[WebsiteController::class ,'addwebsites'])->name('add.websites');
    Route::get('/website/{id}/edit',[WebsiteController::class, 'editwebsites'])->name('website.edit');
    Route::post('insert-website' ,[WebsiteController::class ,'insertwebsite'])->name('insert.website');

});


Route::group(['prefix' => 'course', 'middleware' => 'auth'], function () {

    Route::get('course-list', [WebsiteController::class, 'courselist'])->name('course.list');
    Route::get('course-data' ,[WebsiteController::class ,'coursedata'])->name('course.data');
    Route::post('course-insert' ,[WebsiteController::class ,'courseinsert'])->name('course.insert');
     Route::get('course/{id}', [WebsiteController::class, 'coursedit'])
     ->name('course.edit');

     Route::get('course-delete/{id}', [WebsiteController::class, 'coursedelete'])
    ->name('course.delete');

});

