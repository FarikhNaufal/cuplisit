<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/forgotPass', function () {
    return view('auth.forgot');
})->name('password.request');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register']);
Route::post('forgot-password', [AuthController::class, 'forgot_password'])->name('password.email');
Route::post('reset-password', [AuthController::class, 'reset_password'])->name('password.update');
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset', ['token' => $token]);
})->name('password.reset');
