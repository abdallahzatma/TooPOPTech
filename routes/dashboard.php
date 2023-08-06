<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardControlller;
use App\Http\Controllers\SilderController;
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
            
            Route::resource('/silders', SilderController::class);
            Route::get('/SildergetAll', [SilderController::class, 'getAll'])->name('silders.getAll');
            Route::post('/silder/ajaxupdate/{id}', [SilderController::class, 'ajaxUpdate'])->name('silders.ajaxUpdate');

        }
    );
});