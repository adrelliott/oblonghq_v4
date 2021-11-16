<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('public.index');
})->name('public.home');
Route::get('/about', function () {
    return view('public.about');
})->name('public.about');
Route::get('/faq', function () {
    return view('public.faq');
})->name('public.faq');
Route::get('/book', function () {
    return view('public.book');
})->name('public.book');
Route::get('/about/privacy', function () {
    return view('public.privacy');
})->name('public.privacy');
Route::get('/about/cookies', function () {
    return view('public.cookies');
})->name('public.cookies');
Route::get('/about/contact', function () {
    return view('public.contact');
})->name('public.contact');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('admin/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');

    Route::view('admin/about', 'admin.about')->name('admin.about')->middleware('auth');

    // Route::get('admin/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('admin/users', \App\Http\Livewire\Admin\Users\ListUsers::class)->name('users.index');
    Route::get('admin/users/edit', \App\Http\Livewire\Admin\Users\EditUser::class)->name('users.edit');

    Route::get('admin/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::put('admin/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
});


/*
|--------------------------------------------------------------------------
| Survey Routes
|--------------------------------------------------------------------------
*/





/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
