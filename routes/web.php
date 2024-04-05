<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\Category\CategoryController;
use App\Http\Controllers\AdminController\Account\AccountController;
use App\Http\Controllers\AccountController\User\LoginController;
use App\Http\Controllers\AdminController\Home\HomeController;
use App\Http\Middleware\groupMiddleware;

// Router Đăng Nhập Admin
Route::get('/dang-nhap-quan-tri',[LoginController::class,'view_login'])->name('view_login_account');
Route::post('/dang-nhap-quan-tri',[LoginController::class,'login'])->name('login_admin');
Route::get('/dang-xuat-quan-tri',[LoginController::class,'logout'])->name('logout_admin');

Route::prefix('group-admin')->middleware('admin')-> group(function () {
    // Route Trang Home
    Route::get('/', [HomeController::class,'index'])->name('view_home_admin');
    // Router Account
    Route::get('/view-danh-sach-nhan-su',[AccountController::class,'view_list'])->name('view_list_account');
    Route::get('/view-them-moi-nhan-su',[AccountController::class,'view_creater'])->name('view_creater_account');
    Route::post('/them-moi-nhan-su',[AccountController::class,'creater_account'])->name('creater_account');
    Route::get('/xoa-nhan-su/{slug}',[AccountController::class,'delete_account'])->name('delete_account');
    Route::get('/cap-nhat-nhan-su/{slug}',[AccountController::class,'view_update'])->name('view_update_account');
    Route::post('/cap-nhat-nhan-su/{slug}',[AccountController::class,'update_account'])->name('update_account');
    Route::get('/cap-nhat-mat-khau-nhan-su/{slug}',[AccountController::class,'view_update_password'])->name('view_update_password');
    Route::post('/cap-nhat-mat-khau-nhan-su/{slug}',[AccountController::class,'update_password_account'])->name('update_password_account');

    // Router Category
    Route::get('/view-danh-sach-danh-muc',[CategoryController::class,'view_list'])->name('view_list_category');
    Route::get('/view-them-moi-danh-muc',[CategoryController::class,'view_creater'])->name('view_creater_category');
    Route::post('/them-moi-danh-muc',[CategoryController::class,'creater_category'])->name('creater_category');
    Route::get('/xoa-danh-muc/{slug}',[CategoryController::class,'delete_category'])->name('delete_category');
    Route::get('/cap-nhat-danh-muc/{slug}',[CategoryController::class,'view_update'])->name('view_update_category');
    Route::post('/cap-nhat-danh-muc/{slug}',[CategoryController::class,'update_category'])->name('update_category');
});