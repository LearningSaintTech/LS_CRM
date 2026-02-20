<?php

use App\Http\Controllers\ScholarshipsControler;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'scholarships', 'middleware' => 'auth'], function () {

    Route::get('scholarships-list', [ScholarshipsControler::class, 'scholarshipslist'])->name('scholarships.list');

});
