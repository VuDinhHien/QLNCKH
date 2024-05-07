<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Topic\TopicController;
use App\Http\Controllers\Magazine\MagazineController;
use App\Http\Controllers\Scientist\ScientistController;

use App\Http\Controllers\CouncilController;


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


Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('/', [AdminController::class, 'check_login']);


Route::group(['prefix' => 'admin' , 'middleware'=>'auth'], function(){
   Route::get('/', [AdminController::class, 'index'])->name('admin.index');
   Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

   Route::resource('topic',TopicController::class);
   Route::resource('magazine',MagazineController::class);
   Route::resource('scientist',ScientistController::class);
   
   Route::resource('council', CouncilController::class);
  

 });

