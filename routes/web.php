
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
Route::redirect('/dallas', '/dallas/dashboard');

Route::middleware('auth')->prefix('dallas')->group(function () {

    Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
    Route::view('/about', 'admin.about')->name('admin.about')->middleware('auth');

    // Admin
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', \App\Http\Livewire\Admin\Users\ListUsers::class)->name('index');
        Route::get('/{user}', \App\Http\Livewire\Admin\Users\EditUser::class)->name('edit');
    });

    // CRM
    Route::resource('companies', \App\Http\Controllers\Crm\CompanyController::class)
        ->except(['store', 'update', 'destroy']);
    Route::resource('companies.contacts', \App\Http\Controllers\Crm\ContactController::class)
        ->except(['store', 'update', 'destroy'])
        ->scoped();







    // Route::resource('companies', \App\Http\Controllers\Crm\CompanyController::class)
    //     ->except(['store', 'update', 'destroy'])
    //     ->prefix('companies')
    //     ->name('companies.');

    // Route::prefix('companies')->name('companies.')->group(function () {
    //     Route::resource('companies', \App\Http\Controllers\Crm\CompanyController::class)
    //         ->except(['store', 'update', 'destroy']);
    //     });

    //     // Route::get('/', \App\Http\Livewire\Crm\Company\Table::class)->name('index');
    //     Route::get('/', [\App\Http\Controllers\Crm\CompanyController::class, 'index'])->name('index');
    //     Route::get('/create', [\App\Http\Controllers\Crm\CompanyController::class, 'create'])->name('create');
    //     Route::get('/{company}', [\App\Http\Controllers\Crm\CompanyController::class, 'show'])->name('show');
    //     // Route::get('/{company}', \App\Http\Livewire\Crm\Companies\ViewCompany::class)->name('view');
    //     Route::get('/{company}/edit', [\App\Http\Controllers\Crm\CompanyController::class, 'edit'])->name('edit');
    //     // Route::get('/{company}/edit', \App\Http\Livewire\Crm\Company\Form::class)->name('edit');
    // });
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/{company}/list', [\App\Http\Controllers\Crm\ContactController::class, 'index'])->name('index')->scopeBindings();
        // Route::get('/{company}/list', \App\Http\Livewire\Crm\Contact\Table::class)->name('index');
        // Route::get('/create', \App\Http\Livewire\Crm\Contact\Form::class)->name('create');
        // Route::get('/{contact}', \App\Http\Livewire\Crm\Companies\ViewContact::class)->name('view');
        // Route::get('/{contact}/edit', \App\Http\Livewire\Crm\Contact\Form::class)->name('edit');
    });

    // Survey Management




    // Route::get('admin/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    // Route::get('admin/users', \App\Http\Livewire\Admin\Users\ListUsers::class)->name('users.index');
    // Route::get('admin/users/edit', \App\Http\Livewire\Admin\Users\EditUser::class)->name('users.edit');

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
