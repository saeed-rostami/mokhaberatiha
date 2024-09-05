<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\isAdmin;



use App\Models\Notice;

Route::get('/', function () {
    $notices = Notice::latest()->take(5)->get();
    return view('website.index', compact('notices'));
});

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

require __DIR__ . '/auth.php';


Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('note/{id}', [NoteController::class, 'show'])->name('note.show');
Route::get('note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');
Route::delete('note/{id}', [NoteController::class, 'delete'])->name('note.destroy');

// Route::resource('note', NoteController::class);

Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::get('/get_city/{id}', [RegisterUserController::class, 'cities'])->name('register.cities');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
Route::get('/login', [LoginUserController::class, 'login'])->name('login');
Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Route::middleware('isAdmin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/404', [DashboardController::class, 'notfound'])->name('dashboard.notfound');
    Route::get('/dashboard/sendmesssage', [DashboardController::class, 'sendmesssage'])->name('dashboard.sendmesssage');
    Route::resource('notice', \App\Http\Controllers\NoticeController::class);
    // });
});

Route::get('/notice/{id}', function ($id) {
    $notice = Notice::find($id);
    return view('website.notice', compact('notice'));
})->name('notice.page');
