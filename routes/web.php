<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\Category\CategoryController;
use App\Http\Controllers\AdminController\Account\AccountController;
use App\Http\Controllers\AccountController\User\LoginController;
use App\Http\Controllers\AdminController\Home\HomeController;
use App\Http\Controllers\AdminController\Profile\ProfileController;
use App\Http\Controllers\AdminController\Group\GroupController;
use App\Http\Controllers\AdminController\Cart\CartController as adminCartController;
use App\Http\Controllers\AdminController\Banner\BannerController;
use App\Http\Controllers\AdminController\Blog\BlogController;
use App\Http\Controllers\AdminController\Admin\AdminController;
use App\Http\Controllers\AdminController\Buiding\BuidingController;
// Controller Người Dùng
use App\Http\Controllers\UserController\Home\HomeController as UserHomeController;
use App\Http\Controllers\UserController\Cart\CartController;
use App\Http\Controllers\UserController\Blog\BlogController as UserBlogController;

// Router Đăng Nhập Admin
Route::get('/dang-nhap-quan-tri',[LoginController::class,'view_login'])->name('view_login_account');
Route::post('/dang-nhap-quan-tri',[LoginController::class,'login'])->name('login_admin');
Route::get('/dang-xuat-quan-tri',[LoginController::class,'logout'])->name('logout_admin');

// Danh Sách Router Admin
// Route::prefix('group-admin')->group(function () {
Route::prefix('group-admin')->middleware('admin')->group(function () {
    // Route Trang Home
    Route::get('/', [HomeController::class,'index'])->name('view_home_admin');

    // Router Đơn Hàng
    Route::get('/khach-hang', [adminCartController::class,'view_list'])->name('view_list_cart');
    Route::get('/xoa-khach-hang/{slug}',[adminCartController::class,'delete_cart'])->name('delete_cart');
    Route::get('/cap-nhat-khach-hang/{slug}', [adminCartController::class,'index_update'])->name('view_update_cart');
    Route::post('/cap-nhat-khach-hang/{slug}',[adminCartController::class,'update_cart'])->name('update_cart');
    Route::get('/them-moi-khach-hang', [adminCartController::class,'view_create_cart'])->name('view_create_cart');
    Route::get('/lay-thong-tin-nhom/{slug}', [adminCartController::class,'get_detail_groups'])->name('get_detail_group');
    Route::post('them-moi-khach-hang',[adminCartController::class,'post_detail_groups'])->name('post_detail_groups');

    // Router Hợp Đồng
    Route::get('/hop-dong-thue', [BuidingController::class,'view_list_rent_buiding'])->name('view_list_rent_buiding');
    Route::get('/chi-tiet-hop-dong/{slug}', [BuidingController::class,'view_detail_buiding'])->name('view_detail_buiding');
    Route::get('/xoa-hop-dong/{slug}', [BuidingController::class,'delete_buiding'])->name('delete_buiding');
    Route::get('/hop-dong-mua', [BuidingController::class,'view_list_buy_buiding'])->name('view_list_buy_buiding');
    Route::get('/tao-hop-dong-thue/{slug}', [BuidingController::class,'index_buiding'])->name('index_buiding');
    Route::post('/tao-hop-dong-thue-dich-vu/{slug}', [BuidingController::class,'create_buiding'])->name('create_buiding');

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


    // Route Bài Viết
    Route::get('/danh-sach-bai-viet',[UserBlogController::class,'view_list_blog'])->name('view_list_blog_user');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/tu-van-ca-nhan',[UserBlogController::class,'list_tu_van_ca_nhan'])->name('list_tu_van_ca_nhan');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/tu-van-doanh-nghiep',[UserBlogController::class,'list_tu_van_doanh_nghiep'])->name('list_tu_van_doanh_nghiep');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/khoa-hoc-online',[UserBlogController::class,'list_khoa_hoc_online'])->name('list_khoa_hoc_online');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/dic-vu-xay-nhom',[UserBlogController::class,'list_dich_vu_xay_nhom'])->name('list_dich_vu_xay_nhom');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/phat-trien-nhom',[UserBlogController::class,'list_phat_trien_nhom'])->name('list_phat_trien_nhom');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/tang-thanh-vien-nhom',[UserBlogController::class,'list_tang_thanh_vien_nhom'])->name('list_tang_thanh_vien_nhom');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/tang-like-follow-fanpage',[UserBlogController::class,'list_Like_Follow'])->name('list_Like_Follow');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/dich-vu-facebook',[UserBlogController::class,'list_dich_vu_facebook'])->name('list_dich_vu_facebook');
    // Route Bài Viết
    Route::get('/danh-sach-bai-viet/thiet-ke-website',[UserBlogController::class,'list_thiet_ke_website'])->name('list_thiet_ke_website');
    // Chi Tiết
    Route::get('/chi-tiet-bai-viet/{slug}',[UserBlogController::class,'view_list_detail_blog'])->name('view_list_detail_blog_user');
    // Kết Thúc Route Bài Viết
});