<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

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
    return redirect("login");
});

Route::resource('users', UserController::class)->middleware('auth');
Route::delete("delete-user/{id}", [UserController::class, "restore"])->name("delete-user")->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/homeTodo', [TodoController::class, 'index']);
Route::post('/todos/create', [TodoController::class, 'store']);
Route::put('/todos/{todo}', [TodoController::class, 'update']);
Route::get('get-data-todo',[TodoController::class, 'getDataTodo']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
Route::get('/todoo', [TodoController::class, 'index']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

