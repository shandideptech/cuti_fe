<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    EmployeeController,
    LeaveController,
    AdminController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['prefix' => '/employees'], function() {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/edit/{id}',[EmployeeController::class, 'edit']);
    Route::post('/{id}',[EmployeeController::class, 'update']);
    Route::get('/create',[EmployeeController::class, 'create']);
    Route::post('/',[EmployeeController::class, 'store']);
    Route::get('/delete/{id}',[EmployeeController::class, 'destroy']);
});
Route::group(['prefix' => '/leaves'], function() {
    Route::get('/', [LeaveController::class, 'index'])->name('leaves');
    Route::get('/edit/{id}',[LeaveController::class, 'edit']);
    Route::post('/{id}',[LeaveController::class, 'update']);
    Route::get('/create',[LeaveController::class, 'create']);
    Route::post('/',[LeaveController::class, 'store']);
    Route::get('/delete/{id}',[LeaveController::class, 'destroy']);
});
Route::group(['prefix' => '/admins'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admins');
    Route::get('/edit/{id}',[AdminController::class, 'edit']);
    Route::post('/{id}',[AdminController::class, 'update']);
    Route::get('/create',[AdminController::class, 'create']);
    Route::post('/',[AdminController::class, 'store']);
    Route::get('/delete/{id}',[AdminController::class, 'destroy']);
});
