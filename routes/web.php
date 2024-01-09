<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/forgotPass', function () {
    return view('auth.forgot');
})->name('password.request');

Route::post('login', [AuthController::class, 'login'])->name('login-process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register']);
Route::post('forgot-password', [AuthController::class, 'forgot_password'])->name('password.email');
Route::post('reset-password', [AuthController::class, 'reset_password'])->name('password.update');
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset', ['token' => $token]);
})->name('password.reset');

// Routes View Abid
Route::get('/', [PostController::class, 'index']);
Route::get('/explore', [PostController::class, 'explore']);
Route::resource('posts', PostController::class)->except('index');
Route::resource('comments', CommentController::class);
Route::resource('users', UserController::class);

Route::post('/changepassword/{user}', [UserController::class, 'changePassword'])->name('changepassword');



Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.auth.login');
    });
    Route::get('/', function () {
        return view('admin.posts.index');
    });
    Route::get('/report', function () {
        return view('admin.user.index');
    });

});