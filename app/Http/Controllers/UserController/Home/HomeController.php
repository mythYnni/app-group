<?php

namespace App\Http\Controllers\UserController\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

class HomeController extends Controller
{
    // View danh sách nhóm thuê nhiều + tương tác tốt trang home
    public function view_home(Group $group){
        // danh sách nhóm thuê nhiều
        $list_rent = $group->get_all_rent_paginate_12();
        $list_category = $group->lay_danh_muc();
        // danh sách nhóm tương tác tốt
        $list_interact = $group->get_all_interact_paginate_12();

        return view('FEuser.Pages.Home.index', compact('list_rent', 'list_interact', 'list_category'));
    }

    // View danh sách nhóm thuê nhiều + tương tác tốt trang home
    public function view_detail_group(Group $group, $slug){
        $obj = $group->get_link_slug($slug);
        $listDetail = $group->get_all_detail_3($obj->category, $obj->province, $slug);
        return view('FEuser.Pages.Detail.group_detail', compact('obj', 'listDetail'));
    }
}
