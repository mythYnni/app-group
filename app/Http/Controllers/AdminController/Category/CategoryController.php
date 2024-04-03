<?php

namespace App\Http\Controllers\AdminController\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Category\createRequest;

class CategoryController extends Controller
{
    // View danh sách
    public function view_list(Category $category){
        $list = $category -> get_orderBy_ASC();
        return view('FEadmin.Pages.Category.view_list', compact('list'));
    }

    // View thêm mới
    public function view_creater(){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.error.error404');
        // }
        return view('FEadmin.Pages.Category.view_create');
    }

    // Phương thức thêm mới
    public function creater_category(createRequest $req, Category $category){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.error.error404');
        // }

        //Thực hiện thêm mới
        $create = $category -> create_category($req);
        
        if ($create) {
            return redirect() -> route('view_creater_category')->with('success', 'Thêm Mới Thành Công!');
        }else{
            return redirect() -> back() ->with('error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa danh mục
    public function delete_category(Category $category, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.error.error404');
        // }

        $obj = $category->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.error.error404');
        }

        if ($category->deleteCategory($slug) > 0) {
            return redirect()->route('view_list_category')->with('success','Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('view_list_category')->with('err','Kiểm Tra Lại, Xóa Danh Mục Thất Bại!');
        }
    }
}
