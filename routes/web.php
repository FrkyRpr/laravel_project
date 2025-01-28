<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('', [App\Http\Controllers\UserRoleController::class, 'index'])->name('user_role.index');
Route::get('/user_role/table', [App\Http\Controllers\UserRoleController::class, 'table'])->name('user_role.table');
Route::post('/user_role/store', [App\Http\Controllers\UserRoleController::class, 'store'])->name('user_role.store');
Route::delete('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'destroy'])->name('user_role.destroy');
Route::get('/user_role/{id}/edit', [App\Http\Controllers\UserRoleController::class, 'edit'])->name('user_role.edit');
Route::put('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'update'])->name('user_role.update');



// Route::get('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'show']);
// Route::get('/user_role/{id}/edit', [App\Http\Controllers\UserRoleController::class, 'edit']);
// Route::put('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'update']);
// Route::delete('/user_role/{id}', [App\Http\Controllers\UserRoleController::class, 'destroy']);