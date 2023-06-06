<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TodoController;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Todo Route
Route::get('/home', [App\Http\Controllers\TodoController::class, 'index']);
Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store']);
Route::put('/todos/{todo}', [TodoController::class, 'update']);
Route::get('get-data-todo',[TodoController::class, 'getDataTodo']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
Route::get('/todoo', [TodoController::class, 'index']);
