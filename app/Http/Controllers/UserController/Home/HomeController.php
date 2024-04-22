<?php

namespace App\Http\Controllers\UserController\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Blog;

class HomeController extends Controller
{
    // View danh sách nhóm thuê nhiều + tương tác tốt trang home
    public function view_home(Request $req, Group $group, Blog $blog){
        // danh sách nhóm thuê nhiều
        $list_rent = $group->get_all_rent_paginate_12();
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();
        // danh sách nhóm tương tác tốt
        $list_interact = $group->get_all_interact_paginate_12();
        // danh sách bài viết
        $listBlog = $blog->get_orderBy_DESC_where_status_paginate4();

        return view('FEuser.Pages.Home.index', compact('list_rent', 'list_interact', 'list_category', 'listBlog'));
    }

    // View danh sách nhóm
    public function view_group_index(Request $req, Group $group){
        // Nhận dữ liệu từ Request
        $filters = $req->only(['search' ,'category', 'province', 'district', 'wards']);
    
        // Lấy Dữ liệu
        $searchResultAndRelated = $group->get_all_group_20_type($req, 2);
        $searchResult = $searchResultAndRelated['searchResult'];
        $allByProvince = $searchResultAndRelated['allByProvince'];
        $allByProvinceAndDistrict = $searchResultAndRelated['allByProvinceAndDistrict'];
    
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();
        
        // Sửa đổi compact để chứa các biến cần thiết
        return view('FEuser.Pages.List_Group.index_list', compact('searchResult', 'allByProvince', 'allByProvinceAndDistrict', 'list_category', 'filters'));
    }

    // View danh sách nhóm thuê nhiều + tương tác tốt trang home
    public function view_detail_group(Group $group, $slug){
        $obj = $group->get_link_slug($slug);
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();

        $listDetail = $group->get_all_detail_3($obj->category, $obj->province, $slug);
        return view('FEuser.Pages.Detail.group_detail', compact('obj', 'listDetail','list_category'));
    }

    // View danh sách nhóm tương tác tốt + phân trang và tìm kiếm
    public function view_group_interact(Request $req, Group $group){
        // Nhận dữ liệu từ Request
        $filters = $req->only(['search' ,'category', 'province', 'district', 'wards']);
    
        // Lấy Dữ liệu
        $searchResultAndRelated = $group->get_all_paginate_20_type($req, 2);
        $searchResult = $searchResultAndRelated['searchResult'];
        $allByProvince = $searchResultAndRelated['allByProvince'];
        $allByProvinceAndDistrict = $searchResultAndRelated['allByProvinceAndDistrict'];
    
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();
        
        // Sửa đổi compact để chứa các biến cần thiết
        return view('FEuser.Pages.List_Group.group_interact', compact('searchResult', 'allByProvince', 'allByProvinceAndDistrict', 'list_category', 'filters'));
    }

    // View danh sách nhóm thuê nhiều + phân trang và tìm kiếm
    public function view_group_rent(Request $req, Group $group){
        // Nhận dữ liệu từ Request
        $filters = $req->only(['search' ,'category', 'province', 'district', 'wards']);
    
        // Lấy Dữ liệu
        $searchResultAndRelated = $group->get_all_paginate_20_type($req, 1);
        $searchResult = $searchResultAndRelated['searchResult'];
        $allByProvince = $searchResultAndRelated['allByProvince'];
        $allByProvinceAndDistrict = $searchResultAndRelated['allByProvinceAndDistrict'];
     
        // danh sách danh mục
        $list_category = $group->lay_danh_muc();
        return view('FEuser.Pages.List_Group.group_rent', compact('searchResult', 'allByProvince', 'allByProvinceAndDistrict', 'list_category', 'filters'));
    }
}
