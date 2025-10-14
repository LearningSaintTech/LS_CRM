<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::any('employee-list', [EmployeeController::class, 'employeelist'])
        ->name('employee.list');
});

