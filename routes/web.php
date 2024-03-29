<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
Route::post('/login', [UserController::class, 'do_login'])->name('login');
Route::get('/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/forgot-password', [UserController::class, 'do_forgotPassword']);
Route::get('/reset-password/{token}', [UserController::class, 'resetPassword']);
Route::post('/reset-password/{token}', [UserController::class, 'do_resetPassword']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/customers', [CustomerController::class, 'index'])->name('dashboard.customer');
    Route::get('/customer/{id}', [CustomerController::class, 'detail_customer']);
    Route::get('/customer/{id}/verification', [CustomerController::class, 'verify_customer']);
    Route::post('/customer/{id}/verification', [CustomerController::class, 'do_verify_customer']);
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit_customer']);
    Route::post('/customer/{id}/edit', [CustomerController::class, 'do_update_customer']);
    Route::delete('/customer/{id}/delete', [CustomerController::class, 'delete_customer']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::post('/setting/{setting_id}', [SettingController::class, 'update']);
    Route::get('/change-password', [ProfileController::class, 'change_password']);
    Route::post('/change-password', [ProfileController::class, 'do_change_password']);
    Route::get('/users', [DashboardController::class, 'list_user'])->name('dashboard.user');
    Route::get('/users/create', [UserController::class, 'create'])->name('dashboard.user.create');
    Route::post('/users/create', [UserController::class, 'create_user'])->name('dashboard.user_create');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('dashboard.user.edit');
    Route::post('/users/{id}/edit', [UserController::class, 'edit_user'])->name('dashboard.user_edit');
    Route::delete('/users/{id}/delete', [UserController::class, 'delete_user'])->name('dashboard.user.delete');
    Route::get('/logs', [DashboardController::class, 'logs']);
    Route::get('/logout', function () {
        $user = User::where('id',Auth::id())->first();
        $user->active_token = NULL;
        $user->save();
        Session::flush();
        Auth::logout();
        return redirect()->intended('login')
                ->withSuccess('Berhasil Logout');
    });
});
