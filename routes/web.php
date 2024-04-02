<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\Category\CategoryController;

Route::get('/', function () {
    return view('FEadmin.Pages.Home.index');
});


Route::get('/them-moi-danh-muc',[CategoryController::class,'view_creater'])->name('view_creater_category');