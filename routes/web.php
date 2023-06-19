<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/register', [UserController::class, 'register'])->name('registration.register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', [UserController::class, 'userManagement'])->name('user.management');
    Route::get('/users/create', [UserController::class, 'showRegistrationForm'])->name('user.create');
    Route::post('/users/store', [UserController::class, 'register'])->name('user.store');
    Route::get('/users/{user}/edit', [UserController::class, 'showEditForm'])->name('user.edit');
    Route::post('/users/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
});