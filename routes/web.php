<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\Category\CategoryController;
use App\Http\Controllers\AdminController\Account\AccountController;
use App\Http\Controllers\AccountController\User\LoginController;
use App\Http\Controllers\AdminController\Home\HomeController;
use App\Http\Controllers\AdminController\Profile\ProfileController;
use App\Http\Controllers\AdminController\Group\GroupController;
use App\Http\Controllers\adminController\Cart\CartController as adminCartController;
use App\Http\Controllers\AdminController\Banner\BannerController;
use App\Http\Controllers\AdminController\Blog\BlogController;
use App\Http\Controllers\AdminController\Admin\AdminController;
// Controller Người Dùng
use App\Http\Controllers\UserController\Home\HomeController as UserHomeController;
use App\Http\Controllers\UserController\Cart\CartController;

// Router Đăng Nhập Admin
Route::get('/dang-nhap-quan-tri',[LoginController::class,'view_login'])->name('view_login_account');
Route::post('/dang-nhap-quan-tri',[LoginController::class,'login'])->name('login_admin');
Route::get('/dang-xuat-quan-tri',[LoginController::class,'logout'])->name('logout_admin');

// Danh Sách Router Admin
Route::prefix('group-admin')->group(function () {
// Route::prefix('group-admin')->middleware('admin')->group(function () {
    // Route Trang Home
    Route::get('/', [HomeController::class,'index'])->name('view_home_admin');

    // Router Đơn Hàng
    Route::get('/don-hang', [adminCartController::class,'view_list'])->name('view_list_cart');
    Route::get('/xoa-don-hang/{slug}',[adminCartController::class,'delete_cart'])->name('delete_cart');
    Route::get('/cap-nhat-don-hang/{slug}', [adminCartController::class,'index_update'])->name('view_update_cart');
    Route::post('/cap-nhat-don-hang/{slug}',[adminCartController::class,'update_cart'])->name('update_cart');
    Route::get('/tao-hop-dong-thue/{slug}', [adminCartController::class,'index_buiding'])->name('index_buiding');

    // Router Cá nhân
    Route::get('/thong-tin-ca-nhan', [ProfileController::class,'index'])->name('view_profile');
    Route::post('/cap-nhat-thong-tin-ca-nhan',[ProfileController::class,'update_profile'])->name('update_profile');
    Route::get('/thong-tin-mat-khau', [ProfileController::class,'index_password'])->name('index_password');
    Route::post('/cap-nhat-mat-khau-ca-nhan',[ProfileController::class,'update_password_profile'])->name('update_password_profile');

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

    // Router Group
    Route::get('/danh-sach-group-thue-nhieu',[GroupController::class,'view_list_rent'])->name('view_list_rent');
    Route::get('/danh-sach-group-tuong-tac-tot',[GroupController::class,'view_list_interact'])->name('view_list_interact');
    Route::get('/danh-sach-group',[GroupController::class,'view_list'])->name('view_list_group');
    Route::get('/view-them-moi-group',[GroupController::class,'view_creater'])->name('view_creater_group');
    Route::post('/them-moi-group',[GroupController::class,'creater_group'])->name('creater_group');
    Route::get('/xoa-danh-group/{slug}',[GroupController::class,'delete_group'])->name('delete_group');
    Route::get('/cap-nhat-group/{slug}',[GroupController::class,'view_update'])->name('view_update_group');
    Route::post('/cap-nhat-group/{slug}',[GroupController::class,'update_group'])->name('update_group');

    // Banner
    Route::get('/view-danh-sach-banner',[BannerController::class,'view_list'])->name('view_list_banner');
    Route::get('/view-danh-sach-popup',[BannerController::class,'view_list_popup'])->name('view_list_popup');
    Route::get('/view-them-moi-banner',[BannerController::class,'view_creater'])->name('view_creater_banner');
    Route::post('/them-moi-banner',[BannerController::class,'creater_banner'])->name('creater_banner');
    Route::get('/xoa-banner/{slug}',[BannerController::class,'delete_banner'])->name('delete_banner');
    Route::get('/cap-nhat-banner/{slug}',[BannerController::class,'view_update'])->name('view_update_banner');
    Route::post('/cap-nhat-banner/{slug}',[BannerController::class,'update_banner'])->name('update_banner');

    // Router Blog
    Route::get('/view-danh-sach-bai-viet',[BlogController::class,'view_list'])->name('view_list_blog');
    Route::get('/chi-tiet-bai-viet/{slug}',[BlogController::class,'detail_blog'])->name('detail_blog');
    Route::get('/view-them-moi-bai-viet',[BlogController::class,'view_creater'])->name('view_creater_blog');
    Route::post('/them-moi-bai-viet',[BlogController::class,'creater_blog'])->name('creater_blog');
    Route::get('/xoa-bai-viet/{slug}',[BlogController::class,'delete_blog'])->name('delete_blog');
    Route::get('/cap-nhat-bai-viet/{slug}',[BlogController::class,'view_update'])->name('view_update_blog');
    Route::post('/cap-nhat-bai-viet/{slug}',[BlogController::class,'update_blog'])->name('update_blog');

    // Banner
    Route::get('/view-danh-sach-quan-tri-nhom',[AdminController::class,'view_list'])->name('view_list_quan_tri_nhom');
    Route::get('/view-them-moi-quan-tri-nhom',[AdminController::class,'view_creater'])->name('view_create_quan_tri_nhom');
    Route::post('/them-moi-quan-tri-nhom',[AdminController::class,'creater_quan_tri_nhom'])->name('creater_quan_tri_nhom');
    Route::get('/xoa-quan-tri-nhom/{slug}',[AdminController::class,'delete_quan_tri_nhom'])->name('delete_quan_tri_nhom');
    Route::get('/cap-nhat-quan-tri-nhom/{slug}',[AdminController::class,'view_update'])->name('view_update_quan_tri_nhom');
    Route::post('/cap-nhat-quan-tri-nhom/{slug}',[AdminController::class,'update_quan_tri_nhom'])->name('update_quan_tri_nhom');
});

// Danh Sách Router Người Dùng
Route::prefix('/')->group(function () {
    // Route Trang Home
    Route::get('/',[UserHomeController::class,'view_home'])->name('view_home_user');
    // Router thông tin chi tiết
    Route::get('/chi-tiet/{slug}',[UserHomeController::class,'view_detail_group'])->name('view_detail_group');
    // Router lấy thông tin khách hàng
    Route::post('/dang-ky-thong-tin',[CartController::class,'creater_cart'])->name('creater_cart');
    // Route danh sách group tương tác tốt
    Route::get('/danh-sach-group-tuong-tac-tot',[UserHomeController::class,'view_group_interact'])->name('view_group_interact');
    // Route danh sách group thuê nhiều
    Route::get('/danh-sach-group-thue-nhieu',[UserHomeController::class,'view_group_rent'])->name('view_group_rent');
    // Route danh sách group thuê nhiều
    Route::get('/danh-sach-group',[UserHomeController::class,'view_group_index'])->name('view_group_index');
});