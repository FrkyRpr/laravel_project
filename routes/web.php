<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user_role', [UserRoleController::class, 'index'])->name('user_role.index');
Route::get('/user_role/table', [UserRoleController::class, 'table'])->name('user_role.table');
Route::post('/user_role/store', [UserRoleController::class, 'store'])->name('user_role.store');
Route::delete('/user_role/{id}', [UserRoleController::class, 'destroy'])->name('user_role.destroy');
Route::put('/user_role/{id}', [UserRoleController::class, 'edit'])->name('user_role.edit');


// Route::get('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'show']);
// Route::get('/user_role/{id}/edit', [App\Http\Controllers\UserRoleController::class, 'edit']);
// Route::put('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'update']);
// Route::delete('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'destroy']);