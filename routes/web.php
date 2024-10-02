<?php

use App\Http\Controllers\AuthController;
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

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});


Route::middleware('guest')->group(function () {
//    Route::get('/register', [AuthController::class, 'register'])->name('register')
//        ->middleware('guest');
//    Route::get('/get_city/{id}', [AuthController::class, 'cities'])->name('register.cities');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/otp-request', [AuthController::class, 'otpForm'])
        ->name('mobile.otpForm');

    Route::post('/otp-request', [AuthController::class, 'sendOtp'])
        ->name('mobile.sendOtp');

    Route::post('/otp-verification', [AuthController::class, 'otpVerification'])
        ->name('mobile.otpVerification');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])
        ->name('register.form');

    Route::post('/register', [AuthController::class, 'registerRequest'])->name('register.store');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


//POST
Route::get('/post-single/{post_id}', [\App\Http\Controllers\PostController::class , 'single'])
    ->name('post.single');
//END POST


//COMMENT
Route::post('/post-single', [\App\Http\Controllers\CommentController::class , 'store'])
    ->name('comment.store');
//END COMMENT



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
