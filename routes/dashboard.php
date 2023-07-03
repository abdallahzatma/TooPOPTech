<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardControlller;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'dashboard.','prefix'=> 'dashboard'],function(){
    Route::get('/',[DashboardControlller::class, 'index']);
Route::resource('categories',CategoryController::class);
Route::resource("books",BookController::class);



});