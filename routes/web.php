<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/',[ProductController::class,'Homepage']);
Route::get('/select/{id}',[ProductController::class,'getByid'])->name('select');
Route::post('/addNewproduct',[ProductController::class,'addNewproduct'])->name('addNewproduct');
Route::delete('/delete/{id}',[ProductController::class,'deleteItem']);
Route::patch('/update/{id}',[ProductController::class,'updateItem'])->name('update');



