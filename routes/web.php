<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home', [
        "title" => 'Home',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'users'=>User::all(),
        'title'=>'about',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
// halaman sigle post
Route::get('/posts/{post:slug}',[PostController::class, 'show']);

// SELURUH KATEGORI
Route::get('/categories',function(){
    return view('categories',[
        'title'=> "Post Categories",
        'categories'=> Category::all(),
    ]);
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);


Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
// Route Register
Route::post('/register',[RegisterController::class,'store']);

// DASHBOARD
Route::prefix('dashboard')->group(function(){
    Route::get('',function(){
        return view('dashboard.index');})->middleware(['auth','verified']);
    // cek slug untuk mengetahui slug tidak ada dalam database atau tidak
    Route::get('/posts/checkSlug',[DashboardPostController::class, 'checkSlug']);
    // resource untuk posts
    Route::resource('/posts',DashboardPostController::class);
    Route::get('/all-posts',[DashboardPostController::class, 'allPost'])->middleware(['permission:validation articles']);
    Route::resource('/categories',AdminCategoryController::class)->except('show');
    // set publish post status
    Route::put('/publish/{post:slug}',[DashboardPostController::class,'updatePublishStatus']);
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('posts', [
//         'title'=> "Post By Category : $category->name",
//         'active'=> 'Categories',
//         'posts'=> $category->posts->load('category','author'),
//     ]);

// });

