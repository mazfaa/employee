<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee', [EmployeeController::class, 'read'])->name('employee.read');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('/employee/delete', [EmployeeController::class, 'delete'])->name('employee.delete');
Route::get('/employee/delete/{id}', [EmployeeController::class, 'remove'])->name('employee.remove');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'wipe'])->name('employee.wipe');
Route::delete('/employee/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');
