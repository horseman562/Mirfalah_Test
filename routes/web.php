<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');

//Client
Route::get('/index', [ClientController::class, 'dashboard']);
Route::get('/', [ClientController::class, 'dashboard']);

//Insert News
Route::get('/add_news', [AdminController::class, 'insert_data']);
Route::post('/insert_process', [AdminController::class, 'insert_data_pocess']);

//Update News
Route::get('/update_news/{id}', [AdminController::class, 'update_data']);
Route::post('/update_news_process/{id}', [AdminController::class, 'update_data_process']);

//Soft Delete
Route::get('/softdelete/{id}', [AdminController::class, 'soft_delete']);

//Restore
Route::get('/restore/{id}', [AdminController::class, 'restore']);

// Logout
Route::get('logout', [AuthController::class, 'logout']);

//Pass data
Route::get('/ajax_call', [AdminController::class, 'ajax_call']);
