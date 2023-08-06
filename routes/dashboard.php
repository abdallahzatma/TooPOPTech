<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardControlller;
use App\Http\Controllers\SilderController;
use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// 'middleware' => ['LaravelLocalizationRedirect', 'localeSessionRedirect', 'localizationRedirect'],
// 'prefix' => LaravelLocalization::setLocale(),
// 'prefix'=> "dashboard/",

// Route::group(['as' => 'dashboard.',   
//  'prefix' => FacadesLaravelLocalization::setLocale(),

// 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']

// ],function(){


// });




Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {
    Route::group(
        [
            'as' => 'dashboard.',
            'prefix' => 'dashboard'
        ],
        function () {
            Route::get('/',[DashboardControlller::class, 'index']);
            Route::resource('categories',CategoryController::class);
            Route::resource("books",BookController::class);
  
            Route::post('/silder/ajaxupdate/{id}', [SilderController::class, 'ajaxUpdate'])->name('silders.ajaxUpdate');
            Route::get('/translations', [TranslationController::class, 'index'])->name('translations.index');
            Route::get('/translations/create', [TranslationController::class, 'create'])->name('translations.create');
            Route::post('/translations', [TranslationController::class, 'store'])->name('translations.store');
            Route::get('/translations/{id}/edit', [TranslationController::class, 'edit'])->name('translations.edit');
            Route::put('/translations/{id}', [TranslationController::class, 'update'])->name('translations.update');
            Route::delete('/translations/{id}', [TranslationController::class, 'destroy'])->name('translations.destroy');
        }
    );
});