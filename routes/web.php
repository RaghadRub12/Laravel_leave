<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsCtontroller;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [EmployeesController::class, 'index'])
   ->middleware(['auth:admin,web'])
    ->name('home');
Route::get('/{guard}/login', [LoginController::class, 'create'])
    ->middleware(['guest:admin,web'])
    ->name('login');
Route::post('/{guard}/login', [LoginController::class, 'store'])
    ->middleware(['guest:admin,web']);

Route::delete('/logout', [LoginController::class, 'destroy'])
    ->middleware(['auth:admin,web'])
    ->name('logout');

Route::resource('departments',DepartmentsCtontroller::class);
Route::resource('leaves',LeavesController::class);
Route::resource('employees',EmployeesController::class);