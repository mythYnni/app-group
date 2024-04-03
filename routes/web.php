<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\Category\CategoryController;

Route::get('/', function () {
    return view('FEadmin.Pages.Home.index');
});

// Router Account
// Route::get('/view-them-moi-nhan-su',[CategoryController::class,'view_creater'])->name('view_creater_category');

// Router Category
Route::get('/view-danh-sach-danh-muc',[CategoryController::class,'view_list'])->name('view_list_category');
Route::get('/view-them-moi-danh-muc',[CategoryController::class,'view_creater'])->name('view_creater_category');
Route::post('/them-moi-danh-muc',[CategoryController::class,'creater_category'])->name('creater_category');
Route::get('/xoa-danh-muc/{slug}',[CategoryController::class,'delete_category'])->name('delete_category');
Route::get('/cap-nhat-danh-muc/{slug}',[CategoryController::class,'view_update'])->name('view_update_category');
Route::post('/cap-nhat-danh-muc/{slug}',[CategoryController::class,'update_category'])->name('update_category');