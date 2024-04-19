<?php

namespace App\Http\Controllers\adminController\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Admin\createRequest;
use App\Http\Requests\Admin\updateRequest;
use App\Rules\Admin\emailRule;
use App\Rules\Admin\phoneRule;
use App\Rules\Admin\AdminRule;
use App\Models\Cart;


class AdminController extends Controller
{
    // View danh sách
    public function view_list(Admin $admin, Cart $cart){
        $list = $admin -> get_orderBy_ASC();
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Admin.view_list', compact('list', 'count'));
    }

     // View thêm mới
     public function view_creater(Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Admin.view_create', compact('count'));
    }

    // Phương thức thêm mới
    public function creater_quan_tri_nhom(createRequest $req, Admin $admin){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        // Tạo slug dường dẫn sạch
        $text = 'abc0123456789';
        $random_slugUser = substr(str_shuffle($text), 0, 10);
        $req->merge(['slugUser' => "quan-tri-".$random_slugUser]);

        // dd($req->all());
        //Thực hiện thêm mới
        $create = $admin -> create_admin($req);
        
        if ($create) {
            return redirect() -> route('view_create_quan_tri_nhom')->with('success', 'Thêm Mới Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa Quản Trị
    public function delete_quan_tri_nhom(Admin $admin, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $admin->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($admin->delete_admin($slug) > 0) {
            return redirect()->route('view_list_quan_tri_nhom')->with('success','Xóa Quản Trị Thành Công!');
        } else {
            return redirect()->route('view_list_quan_tri_nhom')->with('err','Kiểm Tra Lại, Xóa Quản Trị Thất Bại!');
        }
    }

    public function view_update(Admin $admin, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $admin->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }
        return view('FEadmin.Pages.Admin.view_update', compact('obj', 'count'));
    }

    public function update_quan_tri_nhom(updateRequest $req, Admin $admin, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $validatedData = $req->validate([
            'linkFacebook' => [new AdminRule($slug)],
        ]);

        $validatedData = $req->validate([
            'email' => [new emailRule($slug)],
        ]);

        $validatedData = $req->validate([
            'phone' => [new phoneRule($slug)],
        ]);
    
        $obj = $admin->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($admin->update_admin($req, $slug) >= 0) {
            return redirect()->route('view_list_quan_tri_nhom')->with('success', 'Cập Nhật Quản Trị Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Quản Trị Thất Bại!');
        }
    }
}
