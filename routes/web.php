<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsearchController;
use App\Http\Controllers\ArtopicController;
use App\Http\Controllers\Topic\TopicController;
use App\Http\Controllers\Magazine\MagazineController;
use App\Http\Controllers\Scientist\ScientistController;

use App\Http\Controllers\CouncilController;
use App\Http\Controllers\LvcouncilController;
use App\Http\Controllers\LvtopicController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProposeController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\TrainingController;

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




Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('/', [AdminController::class, 'check_login']);


Route::group(['prefix' => 'admin' , 'middleware'=>'auth'], function(){
   Route::get('/', [AdminController::class, 'index'])->name('admin.index');
   Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

   Route::resource('topic',TopicController::class);
   Route::resource('magazine',MagazineController::class);
   Route::resource('scientist',ScientistController::class);
   
   Route::resource('council',CouncilController::class);
   Route::resource('lvtopic',LvtopicController::class);
   Route::resource('paper',PaperController::class);
   Route::resource('seminar',SeminarController::class);
   Route::resource('propose',ProposeController::class);
   Route::resource('money',MoneyController::class);
   Route::resource('product',ProductController::class);
   Route::resource('training',TrainingController::class);
   Route::resource('lvcouncil',LvcouncilController::class);
   Route::resource('artopic',ArtopicController::class);
   Route::resource('arsearch',ArsearchController::class);

 });

