<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});
//register
Route::get('/register', [RegisterController::class, 'save'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
//login
Route::get('/login', [LoginController::class, 'save'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
//Home
Route::middleware(['auth'])->group(function(){
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/logout', [AdminController::class, 'logout'])->name('destroy');
//posts
Route::resource('/posts', PostController::class);
});
//Admin Routes
Route::middleware(['auth', 'role:admin'])->name('admins.')->prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/roles/{role}/permissions', [RoleController::class,'assignPermission'])->name('roles.permissions');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/users', UserController::class);
});
