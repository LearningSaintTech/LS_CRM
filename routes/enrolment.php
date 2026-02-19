<?php

use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'enrolment', 'middleware' => 'auth'], function () {
    Route::get('enrolment-list', [EnrolmentController::class, 'enrolmentlist'])->name('enrolment.list');
    Route::post('enrolment-edit', [EnrolmentController::class, 'enrolmentedit'])->name('enrolment.edit');
    Route::post('insert-enrolment', [EnrolmentController::class, 'insertenrolment'])->name('insert.enrolment');
    Route::get('delete-enrolmen', [EnrolmentController::class, 'deleteenrolmen'])->name('delete.enrolment');
    Route::get('view-payment/{id}' ,[EnrolmentController::class ,'viewpayment'])->name('view.payment');
    Route::get('/view-student/{id}', [EnrolmentController::class, 'viewstudent'])
    ->name('view.student')
    ->middleware('signed');

});

Route::group(['prefix' => 'reviews', 'middlewere' => 'auth'], function () {
    Route::get('reviews-list', [ReviewController::class, 'reviewslist'])->name('reviews.list');
    Route::post('insert-reviews', [ReviewController::class, 'insertreviews'])->name('insert.reviews');
    Route::post('reviews-edit', [ReviewController::class, 'reviewsedit'])->name('reviews.edit');
    Route::get('delete.reviews', [ReviewController::class, 'deletereviews'])->name('delete.reviews');
    
});
