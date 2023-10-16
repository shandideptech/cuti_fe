<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    EmployeeController
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
Route::group(['prefix' => '/employees'], function() {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/edit/{id}',[EmployeeController::class, 'edit']);
    Route::post('/{id}',[EmployeeController::class, 'update']);
    Route::get('/create',[EmployeeController::class, 'create']);
    Route::post('/',[EmployeeController::class, 'store']);
    Route::get('/delete/{id}',[EmployeeController::class, 'destroy']);
});
