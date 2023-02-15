<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'do_register']);
//API route for login user
Route::post('/login', [AuthController::class, 'do_login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::get('/profile', function(Request $request) {
    //     return auth()->user();
    // });

    // Route::resource('customer', MemberController::class);
    Route::get('/customer', [MemberController::class, 'index']);
    Route::post('/customer', [MemberController::class, 'store']);
    Route::put('/customer/{addressid}', [MemberController::class, 'update']);
    Route::get('/customer/{addressid}', [MemberController::class, 'show']);
    Route::delete('/customer/{addressid}', [MemberController::class, 'destroy']);

    Route::get('/address', [AddressController::class, 'index']);
    Route::post('/address', [AddressController::class, 'store']);
    Route::put('/address/{addressid}', [AddressController::class, 'update']);
    Route::get('/address/{addressid}', [AddressController::class, 'show']);
    Route::delete('/address/{addressid}', [AddressController::class, 'destroy']);

    Route::get('/account', [UserController::class, 'index']);
    Route::post('/account', [UserController::class, 'store']);
    Route::put('/account/{accountid}', [UserController::class, 'update']);
    Route::get('/account/{accountid}', [UserController::class, 'show']);
    Route::delete('/account/{accountid}', [UserController::class, 'destroy']);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
