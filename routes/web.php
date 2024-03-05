<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'loginUser']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerUser']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'user'], function() {
    Route::get('/dashboard', [UserController::class, 'index']);
    Route::get('/quizz-completed', [UserController::class, 'quizz_completed']);
    Route::get('/quizz_action/{id}', [UserController::class, 'quizz_action']);
    Route::post('/quizz_action/{id}', [UserController::class, 'quizz_action_submit']);
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'index']);
});