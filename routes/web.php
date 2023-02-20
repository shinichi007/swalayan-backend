<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [UserController::class, 'login']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'do_login'])->name('login.submit');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/customers', [CustomerController::class, 'index'])->name('dashboard.customer');
    Route::get('/customer/{id}', [CustomerController::class, 'detail_customer']);
    Route::get('/customer/{id}/verification', [CustomerController::class, 'verify_customer']);
    Route::post('/customer/{id}/verification', [CustomerController::class, 'do_verify_customer']);
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit_customer']);
    Route::post('/customer/{id}/edit', [CustomerController::class, 'do_update_customer']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::get('/change-password', [ProfileController::class, 'change_password']);
    Route::post('/change-password', [ProfileController::class, 'do_change_password']);
    Route::get('/users', [DashboardController::class, 'list_user'])->name('dashboard.user');
    Route::get('/logs', [DashboardController::class, 'logs']);
    Route::get('/logout', function () {
        Session::flush();
        Auth::logout();
        return redirect()->intended('login')
                ->withSuccess('Berhasil Logout');
    });
});
