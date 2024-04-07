<?php

namespace App\Http\Controllers\AdminController\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Account;

class GroupController extends Controller
{
    // View thêm mới
    public function view_creater(Category $category, Account $account){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        // Lấy danh mục quản trị
        $listAccount = $account->getAll();

        // Lấy danh mục vị trí
        $listCategory = $category->get_orderBy_ASC();

        return view('FEadmin.Pages.Group.view_create', compact('listCategory', 'listAccount'));
    }

}
