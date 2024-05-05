<?php

namespace App\Http\Controllers\UserController\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Category;

class HomeController extends Controller
{
    // View danh sách nhóm thuê nhiều + tương tác tốt trang home
    public function view_home(Request $req, Group $group, Blog $blog, Banner $banner, Category $category){
        // danh sách nhóm thuê nhiều
        $list_rent = $group->get_all_rent_paginate_12();
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();
        // danh sách nhóm tương tác tốt
        $list_interact = $group->get_all_interact_paginate_12();
        // danh sách bài viết
        $listBlog = $blog->get_orderBy_DESC_where_status_paginate4();
        // danh sách popup
        $list_popup = $banner->get_popup();
        // danh sách banner
        $list_banner = $banner->get_banner();
        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();

        return view('FEuser.Pages.Home.index', compact('list_rent', 'list_interact', 'list_category', 'listBlog', 'list_popup', 'list_banner', 'list_vi_tri'));
    }

    // View danh sách nhóm
    public function view_group_index(Request $req, Group $group, Category $category){
        // Nhận dữ liệu từ Request
        $filters = $req->only(['search' ,'category', 'province', 'district', 'wards', 'vitri']);
    
        // Lấy Dữ liệu
        $searchResultAndRelated = $group->get_all_group_20_type($req, 2);
        $searchResult = $searchResultAndRelated['searchResult'];
        $allByProvince = $searchResultAndRelated['allByProvince'];
        $allByProvinceAndDistrict = $searchResultAndRelated['allByProvinceAndDistrict'];
    
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();

        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        
        // Sửa đổi compact để chứa các biến cần thiết
        return view('FEuser.Pages.List_Group.index_list', compact('searchResult', 'allByProvince', 'allByProvinceAndDistrict', 'list_category', 'filters', 'list_vi_tri'));
    }

    // Chi Tiết
    public function view_detail_group(Group $group, $slug, Category $category){
        $obj = $group->get_link_slug($slug);
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();

        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();

        $listDetail = $group->get_all_detail_3($obj->category, $obj->province, $slug);
        
        return view('FEuser.Pages.Detail.group_detail', compact('obj', 'listDetail','list_category', 'list_vi_tri'));
    }

    // View danh sách nhóm tương tác tốt + phân trang và tìm kiếm
    public function view_group_interact(Request $req, Group $group, Category $category){
        // Nhận dữ liệu từ Request
        $filters = $req->only(['search' ,'category', 'province', 'district', 'wards', 'vitri']);
    
        // Lấy Dữ liệu
        $searchResultAndRelated = $group->get_all_paginate_20_type($req, 2);
        $searchResult = $searchResultAndRelated['searchResult'];
        $allByProvince = $searchResultAndRelated['allByProvince'];
        $allByProvinceAndDistrict = $searchResultAndRelated['allByProvinceAndDistrict'];
    
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();

        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();
        
        // Sửa đổi compact để chứa các biến cần thiết
        return view('FEuser.Pages.List_Group.group_interact', compact('searchResult', 'allByProvince', 'allByProvinceAndDistrict', 'list_category', 'filters', 'list_vi_tri'));
    }

    // View danh sách nhóm thuê nhiều + phân trang và tìm kiếm
    public function view_group_rent(Request $req, Group $group, Category $category){
        // Nhận dữ liệu từ Request
        $filters = $req->only(['search' ,'category', 'province', 'district', 'wards', 'vitri']);
    
        // Lấy Dữ liệu
        $searchResultAndRelated = $group->get_all_paginate_20_type($req, 1);
        $searchResult = $searchResultAndRelated['searchResult'];
        $allByProvince = $searchResultAndRelated['allByProvince'];
        $allByProvinceAndDistrict = $searchResultAndRelated['allByProvinceAndDistrict'];
     
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();

        // danh sách vị trí
        $list_vi_tri = $category->get_orderBy_Where_status_ASC();

        return view('FEuser.Pages.List_Group.group_rent', compact('searchResult', 'allByProvince', 'allByProvinceAndDistrict', 'list_category', 'filters', 'list_vi_tri'));
    }
}
