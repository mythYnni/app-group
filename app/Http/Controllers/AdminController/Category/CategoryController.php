<?php

namespace App\Http\Controllers\AdminController\Category;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Category\createRequest;
use App\Http\Requests\Category\updateRequest;
use App\Rules\Category\CategoriesRule;
use App\Models\Cart;

class CategoryController extends Controller
{
    // View danh sách
    public function view_list(Category $category, Cart $cart){
        $count = $cart->get_all_count();
        $list = $category -> get_orderBy_ASC();
        return view('FEadmin.Pages.Category.view_list', compact('list', 'count'));
    }

    // View thêm mới
    public function view_creater(Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Category.view_create', compact('count'));
    }

    // Phương thức thêm mới
    public function creater_category(createRequest $req, Category $category){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        //Thực hiện thêm mới
        $create = $category -> create_category($req);
        
        if ($create) {
            return redirect() -> route('view_creater_category')->with('success', 'Thêm Mới Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa danh mục
    public function delete_category(Category $category, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $category->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($category->deleteCategory($slug) > 0) {
            return redirect()->route('view_list_category')->with('success','Xóa Danh Mục Thành Công!');
        } else {
            return redirect()->route('view_list_category')->with('err','Kiểm Tra Lại, Xóa Danh Mục Thất Bại!');
        }
    }

    public function view_update(Category $category, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $category->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }
        return view('FEadmin.Pages.Category.view_update', compact('obj'));
    }

    public function update_category(updateRequest $req, Category $category, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();

        $validatedData = $req->validate([
            'slug' => [new CategoriesRule($slug)],
        ]);
    
        $obj = $category->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($category->update_category($req, $slug) >= 0) {
            return redirect()->route('view_list_category')->with('success', 'Cập Nhật Danh Mục Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Danh Mục Thất Bại!');
        }
    }
}
