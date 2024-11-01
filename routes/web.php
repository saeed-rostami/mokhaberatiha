<?php

use App\Http\Controllers\AuthController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('website.index');

//Route::get('/post/{post_id}', [\App\Http\Controllers\HomeController::class, 'single'])->name('post.single');
//
//Route::get('/posss/sa', function () {
//    $post = Post::query()
//        ->find(3);
//    return view('website.singleNew' , compact('post'));
//});
//
//Route::get('/po', function () {
//    $post = Post::query()
//        ->find(3);
//    return view('website.singleNew' , compact('post'));
//});

Route::get('/news',[\App\Http\Controllers\HomeController::class, 'news'])->name('website.news');

Route::get('/about-us',[\App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about-us');

Route::get('/contact-us',[\App\Http\Controllers\HomeController::class, 'contactUs'])->name('contact-us');

Route::get('/archives',[\App\Http\Controllers\HomeController::class, 'archives'])->name('website.archives');

Route::get('/societies/{province_id?}',[\App\Http\Controllers\SocietyController::class, 'index'])->name('website.societies');

Route::get('/dashboard', function () {
    return \Illuminate\Support\Facades\Auth::user();
//    return view('dashboard.index');
})->name('dashboard');

Route::get('/get_city/{id}', [AuthController::class , 'getCity']);

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

    Route::get('/forgot-otp-form', [AuthController::class, 'forgotOTPForm'])
        ->name('forgotOTPForm');

    Route::post('/send-forgot-otp', [AuthController::class, 'sendForgotOTP'])
        ->name('sendForgotOTP');

    Route::post('/verify-forgot-otp', [AuthController::class, 'verifyForgotAndLogin'])
        ->name('verify.forgot.otp');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])
        ->name('register.form');

    Route::post('/register', [AuthController::class, 'registerRequest'])->name('register.store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/vote', [\App\Http\Controllers\UserPollController::class, 'vote'])->name('poll-user.vote');

    //COMMENT
    Route::post('/comment/store', [\App\Http\Controllers\CommentController::class , 'store'])
        ->name('comment.store');
//END COMMENT
});


//POST
Route::get('/{post_id}', [\App\Http\Controllers\PostController::class , 'single'])
    ->name('post.single');
//END POST



//Route::middleware('')->group(function () {
//    Route::middleware('isAdmin')->group(function () {
//        Route::get("/post", [\App\Http\Controllers\Admin\PostController::class, 'store'])
//            ->name('post.store');
//    });
//});


//ADMIN ******************
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::middleware('isAdmin')->group(function () {

            Route::get('/panel', function () {
                return view('admin.index');
            });

//            USER
            Route::prefix('user')->group(function () {
                Route::get("/index", [\App\Http\Controllers\Admin\UserController::class, 'index'])
                    ->name('user.index');

                Route::get("/export", [\App\Http\Controllers\Admin\UserController::class, 'export'])
                    ->name('user.export');
            });
//          END  USER


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

                Route::get("/edit/{post}", [\App\Http\Controllers\Admin\PostController::class, 'edit'])
                    ->name('post.edit');

                Route::post("/update/{post_id}", [\App\Http\Controllers\Admin\PostController::class, 'update'])
                    ->name('post.update');

                Route::delete("/delete/{post}", [\App\Http\Controllers\Admin\PostController::class, 'delete'])
                    ->name('post.delete');
            });
            //            POST END

//           POLL
            Route::prefix('poll')->group(function () {

                Route::get('index', [\App\Http\Controllers\Admin\PollController::class, 'index'])
                    ->name('poll.index');

                Route::get('create', [\App\Http\Controllers\Admin\PollController::class, 'create'])
                    ->name('poll.create');

                Route::post('store', [\App\Http\Controllers\Admin\PollController::class, 'store'])
                    ->name('poll.store');

                Route::get('edit/{poll}', [\App\Http\Controllers\Admin\PollController::class, 'edit'])
                    ->name('poll.edit');

                Route::post('update', [\App\Http\Controllers\Admin\PollController::class, 'update'])
                    ->name('poll.update');

                Route::post('delete/{poll}', [\App\Http\Controllers\Admin\PollController::class, 'delete'])
                    ->name('poll.delete');

                Route::get('statistic/{poll}', [\App\Http\Controllers\Admin\PollController::class, 'statistic'])
                    ->name('poll.statistic');

                Route::get('activation/{poll}', [\App\Http\Controllers\Admin\PollController::class, 'activation'])
                    ->name('poll.activation');
            });
//            POLL END

//            SETTINGS
            Route::prefix('settings')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])
                    ->name('settings.index');

                Route::get('/create', [\App\Http\Controllers\Admin\SettingsController::class, 'create'])
                    ->name('settings.create');

                Route::post('/store', [\App\Http\Controllers\Admin\SettingsController::class, 'store'])
                    ->name('settings.store');
            });
//            SETTINGS END

            //            COMMENTS
            Route::prefix('comments')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\CommentController::class, 'index'])
                    ->name('comment.index');

                Route::post('/reject/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'reject'])
                    ->name('comment.reject');

                Route::post('/approve/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'approve'])
                    ->name('comment.approve');

                Route::get('/response/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'response'])
                    ->name('response.comment');

                Route::post('/response/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'sendResponse'])
                    ->name('send.response.comment');
            });


//            COMMENTS END


            //           SOCIETY
            Route::prefix('society')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\SocietyController::class, 'index'])
                    ->name('admin.society.index');

                Route::get('/create', [\App\Http\Controllers\Admin\SocietyController::class, 'create'])
                    ->name('admin.society.create');

                Route::post('/store', [\App\Http\Controllers\Admin\SocietyController::class, 'store'])
                    ->name('admin.society.store');


                Route::delete('/delete/{society}', [\App\Http\Controllers\Admin\SocietyController::class, 'delete'])
                    ->name('admin.society.delete');
            });
//            SOCIETY END

        });
    }

    );

Route::get('/artisan', function () {
//    \Illuminate\Support\Facades\Artisan::call('storage:link');
//    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
//    \Illuminate\Support\Facades\Artisan::call('migrate');
//    \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
//    \Illuminate\Support\Facades\Artisan::call('db:seed');
});
