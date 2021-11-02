<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SlugController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


// HOME MENU
Route::get('/', HomeController::class)->name('home');


// ABOUT MENU
Route::get('/about', function () {
    return view('about', [
        'users' => User::all(),
    ]);
})->name('about');
// TEAM MENU
Route::get('/team', function () {
    return view('team', [
        'users' => User::all(),
    ]);
})->name('team');
// SCHEDULE MENU
Route::get('/schedule', function () {
    return view('schedule', [
        'users' => User::all(),
    ]);
})->name('schedule');
// ARTICLE MENU
Route::get('/article', function () {
    return view('article', [
        'users' => User::all(),
    ]);
})->name('article');

// POST MENU
Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('', [PostController::class, 'index'])->name('index');
    // halaman sigle post
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');
});


// CATEGORI MENU
Route::get('/categories', function () {
    return view('categories', [
        'categories' => Category::all(),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.auth');

// Email Verification
Route::prefix('email')->middleware('auth')->group(function () {
    Route::get('/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::post('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
    Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware(['signed'])->name('verification.verify');
});


// DASHBOARD
Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('', function () {
        return view('dashboard.index', [
            'users' => User::with('roles')->get(),
        ]);
    });

    // resource untuk posts
    Route::resource('/posts', DashboardPostController::class);

    // cek slug untuk mengetahui slug tidak ada dalam database atau tidak
    Route::get('/check-post-slug', [SlugController::class, 'checkPostSlug'])->name('post.slug');
    Route::get('/check-category-slug', [SlugController::class, 'checkCategorySlug'])->name('category.slug');

    // ADMINISTRATOR
    Route::resource('/all-posts', AdminPostController::class)->except(['create', 'store'])->middleware(['permission:validation articles']);
    // set publish post status
    Route::put('/publish/{post:slug}', [AdminPostController::class, 'updatePublishStatus'])->name('post.publish');
    // Categories
    Route::resource('/categories', AdminCategoryController::class)->except(['edit', 'show', 'create'])->middleware(['permission:create category']);
});

// Profile
// Route::middleware(['auth','verified'])->prefix('profile')->group(function(){
Route::resource('/profiles', UserProfileController::class)->middleware(['auth', 'verified'])->only(['edit', 'show', 'update']);
    // });


// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('posts', [
//         'title'=> "Post By Category : $category->name",
//         'active'=> 'Categories',
//         'posts'=> $category->posts->load('category','author'),
//     ]);

// });
