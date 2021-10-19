<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardCategoryController;
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
        'posts' => Post::all()->take(4),
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'users'=>User::all(),
    ]);
});
Route::get('/team', function () {
    return view('team', [
        'users'=>User::all(),
    ]);
});
Route::get('/schedule', function () {
    return view('schedule', [
        'users'=>User::all(),
    ]);
});
Route::get('/article', function () {
    return view('article', [
        'users'=>User::all(),
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
// halaman sigle post
Route::get('/posts/{post:slug}',[PostController::class, 'show']);

// SELURUH KATEGORI
Route::get('/categories',function(){
    return view('categories',[
        'categories'=> Category::all(),
    ]);
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

// Route Register
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);




// DASHBOARD
Route::middleware(['auth','verified'])->prefix('dashboard')->group(function(){
    Route::get('',function(){
        return view('dashboard.index');});
    // cek slug untuk mengetahui slug tidak ada dalam database atau tidak
    Route::get('/posts/checkSlug',[DashboardPostController::class, 'checkSlug']);
    // resource untuk posts
    Route::resource('/posts',DashboardPostController::class);

    // ADMINISTRATOR
    Route::resource('/all-posts',AdminPostController::class)->only(['edit','index'])->middleware(['permission:validation articles']);
    // set publish post status
    Route::put('/publish/{post:slug}',[AdminPostController::class,'updatePublishStatus']);
    // Categories
    Route::resource('/categories',AdminCategoryController::class)->except(['edit','show','create'])->middleware(['permission:create category']);
    Route::get('/categories/checkSlug',[AdminCategoryController::class, 'checkSlug']);
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

// Profile
// Route::middleware(['auth','verified'])->prefix('profile')->group(function(){
    Route::resource('/profiles',UserProfileController::class)->middleware(['auth','verified']);
// });



// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('posts', [
//         'title'=> "Post By Category : $category->name",
//         'active'=> 'Categories',
//         'posts'=> $category->posts->load('category','author'),
//     ]);

// });

