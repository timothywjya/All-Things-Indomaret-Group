<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('login');
// });

// Auth::routes();
// // Login Route
// Route::get('/', [LoginController::class, 'login']);
// // Route::get('/register', [LoginController::class, 'register']);

// Auth::routes();

// Home Route
Route::get('/home', [App\Http\Controllers\TodoController::class, 'index']);
Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store']);
Route::put('/todos/{todo}', [TodoController::class, 'update']);
Route::get('get-data-todo',[TodoController::class, 'getDataTodo']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
Route::get('/todoo', [TodoController::class, 'index']);



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
