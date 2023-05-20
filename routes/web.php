<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/order', [TransactionController::class, 'store'])->name('order');
Route::get('admin/home', [HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::resource('rooms', RoomController::class)->middleware('is_admin');
Route::resource('room_types', RoomTypeController::class)->middleware('is_admin');
Route::resource('transactions', TransactionController::class)->middleware('is_admin');