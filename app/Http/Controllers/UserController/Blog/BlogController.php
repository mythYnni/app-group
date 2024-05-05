<?php

namespace App\Http\Controllers\UserController\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function view_list_blog(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status();
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

    // Tư Vấn Cá Nhân
    public function list_tu_van_ca_nhan(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(1);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     // Tư Vấn Doanh Nghiệp
    public function list_tu_van_doanh_nghiep(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(2);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     // Khóa Học Online
    public function list_khoa_hoc_online(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(3);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     // Dịch Vụ Xây Nhóm
    public function list_dich_vu_xay_nhom(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(4);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     // Phát Triển Nhóm
    public function list_phat_trien_nhom(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(5);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     // Tăng Thành Viên Nhóm
    public function list_tang_thanh_vien_nhom(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(6);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     // Tăng Like/Follow Fanpag
    public function list_Like_Follow(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(7);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     // Dịch Vụ Facebook
    public function list_dich_vu_facebook(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(8);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

     //Thiết Kế Website
    public function list_thiet_ke_website(Group $group, Blog $blog, Category $category){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status_type(9);
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog', 'list_vi_tri'));
    }

    public function view_list_detail_blog(Group $group, Blog $blog, Category $category, $slug){
        $list_category = $group->lay_danh_muc();
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        $Blog = $blog->get_link_slug($slug);
        $listBlog = $blog->get_orderBy_DESC_where_status_paginate4();
        return view('FEuser.Pages.Blog.blog_detail', compact('list_category' , 'Blog', 'listBlog', 'list_vi_tri'));
    }
}
