<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VisitorAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReporterProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PhotoAlbumController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CirculationController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AboutController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/news-category/{id}', [WebsiteController::class, 'category'])->name('news-category');
Route::get('/news-detail/{id}', [WebsiteController::class, 'detail'])->name('news-detail');

Route::get('/user-login',[VisitorAuthController::class, 'index'])->name('user-login');
Route::post('/user-login',[VisitorAuthController::class, 'login'])->name('user-login');
Route::get('/user-register',[VisitorAuthController::class, 'reg'])->name('user-register');
Route::post('/user-register',[VisitorAuthController::class, 'register'])->name('user-register');

Route::get('/user-logout',[VisitorAuthController::class, 'logout'])->name('user-logout');


Route::get('/privacy-policy', [PagesController::class,'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-condition', [PagesController::class,'termsCondition'])->name('terms-condition');
Route::get('/contact', [PagesController::class,'contact'])->name('contact');
Route::get('/circulation', [PagesController::class,'circulation'])->name('circulation');
Route::get('/advertisement', [PagesController::class,'advertisement'])->name('advertisement');

Route::middleware(['visitor'])->group(function () {
    Route::get('/my-dashboard', [VisitorAuthController::class, 'dashboard'])->name('my-dashboard');
});

Route::middleware(['reporter'])->group(function () {
    Route::get('/reporter-dashboard', [ReporterProfileController::class, 'dashboard'])->name('reporter-dashboard');
    Route::get('/reporterPost/create', [ReporterProfileController::class, 'create'])->name('reporterPost.create');
    Route::post('/reporterPost/store', [ReporterProfileController::class, 'store'])->name('reporterPost.store');
    Route::get('/reporterPost/edit/{id}', [ReporterProfileController::class, 'edit'])->name('reporterPost.edit');
    Route::post('/reporterPost/update/{id}', [ReporterProfileController::class, 'update'])->name('reporterPost.update');
    Route::get('/reporterPost/delete/{id}', [ReporterProfileController::class, 'destroy'])->name('reporterPost.delete');
    Route::get('/get-sub-category-by-category', [ReporterProfileController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('reporter', ReporterController::class);
    Route::resource('post', PostController::class);
    Route::get('/get-sub-category-by-category', [PostController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.see');
    Route::get('/post/update-status/{id}', [PostController::class, 'updateStatus'])->name('post.update-status');
    Route::resource('setting', SettingController::class);
    Route::resource('video', VideoController::class);
    Route::resource('photo-album', PhotoAlbumController::class);
    Route::resource('ad', AdController::class);

    Route::resource('comment', CommentController::class);
    Route::get('/comment/update-status/{id}', [CommentController::class, 'updateStatus'])->name('comment.update-status');

    Route::resource('privacy-policy-form', PrivacyPolicyController::class);
    Route::resource('terms-condition-form', TermsConditionController::class);
    Route::resource('contact-us-form', ContactUsController::class);
    Route::resource('advertisement-form', AdvertisementController::class);
    Route::resource('circulation-form', CirculationController::class);

});

