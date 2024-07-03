<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsearchController;
use App\Http\Controllers\ArtopicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Conference\ConferenceController;
use App\Http\Controllers\Topic\TopicController;
use App\Http\Controllers\Magazine\MagazineController;
use App\Http\Controllers\Scientist\ScientistController;
use App\Http\Controllers\UserController;
use App\Exports\PapersExport;
use App\Http\Controllers\Auth\RegisterController;



use App\Http\Controllers\ReportController;



use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\CouncilController;
use App\Http\Controllers\Curriculum\CurriculumController;
use App\Http\Controllers\LvcouncilController;
use App\Http\Controllers\LvtopicController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposeController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\Scouncil\ScouncilController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\TpcouncilController;
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


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('/', [AdminController::class, 'check_login'])->name('admin.check_login');



Route::get('auth/google', [AdminController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [AdminController::class, 'handleGoogleCallback']);



// Route group bảo vệ bởi middleware 'auth' và 'admin'
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');



  Route::resource('scientist', ScientistController::class);
  Route::get('/scientist/{scientist}/profile', [ScientistController::class, 'showProfile'])->name('scientist.profile');

  Route::resource('council', CouncilController::class);
  Route::resource('lvtopic', LvtopicController::class);
  Route::resource('paper', PaperController::class);
  Route::resource('seminar', SeminarController::class);
  Route::resource('propose', ProposeController::class);
  Route::resource('money', MoneyController::class);
  Route::resource('product', ProductController::class);
  Route::resource('training', TrainingController::class);
  Route::resource('lvcouncil', LvcouncilController::class);
  Route::resource('artopic', ArtopicController::class);
  Route::resource('arsearch', ArsearchController::class);
  Route::resource('office', OfficeController::class);
  Route::resource('suggestion', SuggestionController::class);
  Route::resource('tpcouncil', TpcouncilController::class);
  Route::resource('score', ScoreController::class);
  Route::resource('profile', ProfileController::class);


  Route::get('/topic', [TopicController::class, 'index'])->name('topic.index');
  Route::post('/topic', [TopicController::class, 'store'])->name('topic.store');
  Route::put('/topic/{topic}', [TopicController::class, 'update'])->name('topic.update');
  Route::delete('/topic/{id}', [TopicController::class, 'destroy'])->name('topic.destroy');
  Route::resource('topic', TopicController::class);
  Route::get('topics/{topic}/download', [TopicController::class, 'download'])->name('topic.download');

  Route::get('/topics/export', [TopicController::class, 'export'])->name('topics.export');

  Route::get('/scientist/{scientist}/topics', [TopicController::class, 'showTopicsByScientist'])->name('scientist.topics');

  Route::get('/conference', [ConferenceController::class, 'index'])->name('conference.index');
  Route::post('/conference', [ConferenceController::class, 'store'])->name('conference.store');
  Route::delete('/conference/{id}', [ConferenceController::class, 'destroy'])->name('conference.destroy');
  Route::resource('conference', ConferenceController::class);

  Route::get('/conferences/export', [ConferenceController::class, 'export'])->name('conferences.export');


  Route::get('/magazine', [MagazineController::class, 'index'])->name('magazine.index');
  Route::post('/magazine', [MagazineController::class, 'store'])->name('magazine.store');
  Route::put('/magazine/{magazine}', [MagazineController::class, 'update'])->name('magazine.update');
  Route::delete('/magazine/{id}', [MagazineController::class, 'destroy'])->name('magazine.destroy');
  Route::resource('magazine', MagazineController::class);
  Route::get('download/{magazine}', [MagazineController::class, 'download'])->name('magazine.download');

  Route::get('/export', [MagazineController::class, 'export'])->name('magazines.export');


  Route::get('/scientist/{scientist}/magazines', [MagazineController::class, 'showMagazinesByScientist'])->name('scientist.magazines');

  Route::get('/scouncil', [ScouncilController::class, 'index'])->name('scouncil.index');
  Route::post('/scouncil', [ScouncilController::class, 'store'])->name('scouncil.store');
  Route::delete('/scouncil/{id}', [ScouncilController::class, 'destroy'])->name('scouncil.destroy');
  Route::resource('scouncil', ScouncilController::class);

  Route::get('/offer', [OfferController::class, 'index'])->name('offer.index');
  Route::post('/offer', [OfferController::class, 'store'])->name('offer.store');
  Route::delete('/offer/{id}', [OfferController::class, 'destroy'])->name('offer.destroy');
  Route::resource('offer', OfferController::class);




  Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
  Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
  Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
  Route::resource('category', CategoryController::class);


  Route::get('/curriculum', [CurriculumController::class, 'index'])->name('curriculum.index');
  Route::post('/curriculum', [CurriculumController::class, 'store'])->name('curriculum.store');
  Route::put('/curriculum/{curriculum}', [CurriculumController::class, 'update'])->name('curriculum.update');
  Route::delete('/curriculum/{id}', [CurriculumController::class, 'destroy'])->name('curriculum.destroy');
  Route::resource('curriculum', CurriculumController::class);
  Route::get('/curriculums/export', [CurriculumController::class, 'export'])->name('curriculums.export');
  Route::get('curriculums/{curriculum}/download', [CurriculumController::class, 'download'])->name('curriculum.download');

  

  Route::get('/scientist/{scientist}/curriculums', [CurriculumController::class, 'showCurriculumsByScientist'])->name('scientist.curriculums');


  Route::get('/projects/progress-report', [ProjectController::class, 'progressReport'])->name('projects.progress-report');




  Route::get('/report', [ReportController::class, 'index'])->name('report.index');
  Route::get('/report/export-combined', [ReportController::class, 'exportCombined'])->name('report.export.combined');


  Route::get('/export-papers', function () {
    return Excel::download(new PapersExport, 'papers_by_magazine.xlsx');
  })->name('report.export.papers');
});



// Route cho trang đăng nhập
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/check_login', [UserController::class, 'check_login'])->name('check_login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Bảo vệ các route của người dùng thông thường
Route::middleware(['auth', 'user'])->group(function () {
  Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
  Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.show');
  Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
  Route::put('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');


  Route::get('/projects', [UserController::class, 'projects'])->name('user.projects.index'); // Thêm route này
  Route::put('/user/topics/{topic}', [UserController::class, 'update'])->name('user.topic.update');
  Route::post('/user/projects', [UserController::class, 'storeProject'])->name('user.projects.store'); //thêm mới của user Topic
  Route::delete('/user/projects/{topic}', [UserController::class, 'destroyProject'])->name('user.projects.destroy'); // xóa của user Topic
  Route::delete('/user/topic/{file}', [UserController::class, 'destroyFile_topic'])->name('user.topic.destroyFile_topic');

  Route::get('/user/topic/download/{file}', [UserController::class, 'downloadFile_topic'])->name('user.topic.download');


  Route::get('/magazines', [UserController::class, 'magazines'])->name('user.magazines.index'); // Thêm route này
  Route::put('/user/magazines/{magazine}', [UserController::class, 'updateMagazine'])->name('user.magazine.updateMagazine');
  Route::post('/user/magazines', [UserController::class, 'storeMagazine'])->name('user.magazines.store'); //thêm mới của user Magzine
  Route::delete('/user/magazines/{magazine}', [UserController::class, 'destroyMagazine'])->name('user.magazines.destroy'); // xóa của user magazine
  Route::delete('/user/magazine/{file}', [UserController::class, 'destroyFile'])->name('user.magazine.destroyFile');
  Route::get('/user/magazine/download/{file}', [UserController::class, 'downloadFile'])->name('user.magazine.download');

  Route::get('/curriculums', [UserController::class, 'curriculums'])->name('user.curriculums.index'); // Thêm route này
  Route::put('/user/curriculums/{curriculum}', [UserController::class, 'updateCurriculum'])->name('user.curriculum.updateCurriculum');
  Route::post('/user/curriculums', [UserController::class, 'storeCurriculum'])->name('user.curriculums.store'); //thêm mới của user curriculum
  Route::delete('/user/curriculums/{curriculum}', [UserController::class, 'destroyCurriculum'])->name('user.curriculums.destroy'); // xóa của user Curriculum
  Route::delete('/user/curriculum/{file}', [UserController::class, 'destroyFile_curriculum'])->name('user.topic.destroyFile_curriculum');

  Route::get('/user/curriculum/download/{file}', [UserController::class, 'downloadFile_curriculum'])->name('user.curriculum.download');
  
  Route::get('/offers', [UserController::class, 'offers'])->name('user.offers.index'); // Thêm route này
  Route::post('/user/offers', [UserController::class, 'storeOffer'])->name('user.offers.store');


});

