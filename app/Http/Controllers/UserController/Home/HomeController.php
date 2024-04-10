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
        // danh sách nhóm tương tác tốt
        $list_interact = $group->get_all_interact_paginate_12();

        return view('FEuser.Pages.Home.index', compact('list_rent', 'list_interact'));
    }
}
