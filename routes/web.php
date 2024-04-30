<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);


Route::group(['prefix' => 'admin' , 'middleware'=>'auth'], function(){
   Route::get('/', [AdminController::class, 'index'])->name('admin.index');
   Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
 });

