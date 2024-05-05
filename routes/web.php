<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;

use Illuminate\Support\Facades\Storage;
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

Route::get('/', function () {
    return view('client.home');
})->name('client.home');

Route::get('/vacancy', [VacancyController::class, 'client'])->name('client.vacancy');
Route::get('/vacancy/{id}', [VacancyController::class, 'clientDetail'])->name('client.vacancy.detail');
Route::post('/vacancy/apply', [ApplicationController::class, 'apply'])->name('client.vacancy.apply');

Route::get('/application/me', [ApplicationController::class, 'client'])->name('client.application');
Route::get('/application/{id}', [ApplicationController::class, 'detail'])->name('client.application.detail');
Route::get('/download/{folder}/{filename}', [ApplicationController::class, 'downloadFile'])->name('download-file');

Route::get('/auth/register', function () {
    return view('auth.register-client');
})->name('client.register');

Route::get('/auth/login', function () {
    return view('auth.login-client');
})->name('client.login');

Route::get('/auth/forgot-password', function () {
    return view('auth.forgot-password-client');
})->name('client.forgot-password');

Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth/forgot-password', [AuthController::class, 'requestResetPassword'])->name('forgot-password');
Route::get('auth/reset-password/{token}', function (Request $request, string $token) {
    $email = $request->query('email');
    return view('auth.reset-password-client', ['token' => $token, 'email' => $email]);
})->name('password.reset');
Route::post('/auth/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['isLogin', 'isAdmin']);

Route::get('/admin/vacancy', [VacancyController::class, 'index'])->name('admin.vacancy')->middleware(['isLogin', 'isAdmin']);
Route::get('/admin/vacancy/create', [VacancyController::class, 'create'])->name('admin.vacancy.create')->middleware(['isLogin', 'isAdmin']);
Route::post('/admin/vacancy/store', [VacancyController::class, 'store'])->name('admin.vacancy.store')->middleware(['isLogin', 'isAdmin']);
Route::get('/admin/vacancy/{id}/edit', [VacancyController::class, 'edit'])->name('admin.vacancy.edit')->middleware(['isLogin', 'isAdmin']);
Route::patch('/admin/vacancy/{id}/update', [VacancyController::class, 'update'])->name('admin.vacancy.update')->middleware(['isLogin', 'isAdmin']);
Route::delete('/admin/vacancy/{id}', [VacancyController::class, 'destroy'])->name('admin.vacancy.destroy')->middleware(['isLogin', 'isAdmin']);

Route::get('/admin/application', [ApplicationController::class, 'index'])->name('admin.application')->middleware(['isLogin', 'isAdmin']);
Route::get('/admin/application/{id}/edit', [ApplicationController::class, 'edit'])->name('admin.application.edit')->middleware(['isLogin', 'isAdmin']);
Route::patch('/admin/application/{id}/update', [ApplicationController::class, 'update'])->name('admin.application.update')->middleware(['isLogin', 'isAdmin']);
Route::delete('/admin/application/{id}', [ApplicationController::class, 'destroy'])->name('admin.application.destroy')->middleware(['isLogin', 'isAdmin']);

Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user')->middleware(['isLogin', 'isAdmin']);
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy')->middleware(['isLogin', 'isAdmin']);

