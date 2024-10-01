<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;

Route::get('/', function () {
    return view('website.index');
})->name('website.index');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//USER
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
//USER


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'register'])->name('register')
        ->middleware('guest');
    Route::get('/get_city/{id}', [RegisterUserController::class, 'cities'])->name('register.cities');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginUserController::class, 'login'])->name('login');
    Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');

    Route::post('/mobile-verification', [RegisterUserController::class, 'mobileVerification'])->name('mobile.verification');
});
Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');

//Route::middleware('')->group(function () {
//    Route::middleware('isAdmin')->group(function () {
//        Route::get("/post", [\App\Http\Controllers\Admin\PostController::class, 'store'])
//            ->name('post.store');
//    });
//});

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::middleware('isAdmin')->group(function () {

//            POST
            Route::prefix('post')->group(function () {
                Route::get("/index", [\App\Http\Controllers\Admin\PostController::class, 'index'])
                    ->name('post.index');

                Route::get("/show/{post_id}", [\App\Http\Controllers\Admin\PostController::class, 'show'])
                    ->name('post.show');


                Route::get("/create", [\App\Http\Controllers\Admin\PostController::class, 'create'])
                    ->name('post.create');

                Route::post("/store", [\App\Http\Controllers\Admin\PostController::class, 'store'])
                    ->name('post.store');

                Route::get("/edit/{post_id}", [\App\Http\Controllers\Admin\PostController::class, 'edit'])
                    ->name('post.edit');

                Route::put("/update/{post_id}", [\App\Http\Controllers\Admin\PostController::class, 'update'])
                    ->name('post.update');

                //            POST END
            });
        });
    }

    );
