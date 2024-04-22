<?php

namespace App\Http\Controllers\adminController\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cart\createRequest;
use App\Models\Cart;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // View danh sách
    public function view_list(Cart $cart){
        $list = $cart -> get_orderBy_ASC();
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Cart.view_list', compact('list', 'count'));
    }

    //Phương thức xóa
    public function delete_cart(Cart $cart, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $cart->get_by_id($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($cart->deleteCart($slug) > 0) {
            return redirect()->route('view_list_cart')->with('success','Xóa Thành Công!');
        } else {
            return redirect()->route('view_list_cart')->with('err','Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }

    public function index_update(Cart $cart, Group $group, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $objs = $cart->get_by_id($slug);
        if (!$objs) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }
        
        $obj_group = $group->get_by_id($objs->idGroup);
        if (!$obj_group) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        return view('FEadmin.Pages.Cart.view_update', compact('objs', 'obj_group', 'count'));
    }

    public function update_cart(Request $req,Cart $cart, Group $group, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $objs = $cart->get_by_id($slug);
        if (!$objs) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($cart->update_cart_note($req, $slug) >= 0) {
            return redirect()->route('view_list_cart')->with('success', 'Cập Nhật Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Thất Bại!');
        }
    }

    public function index_buiding(Cart $cart, Group $group, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $objs = $cart->get_by_id($slug);
        if (!$objs) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }
        
        $obj_group = $group->get_by_id($objs->idGroup);
        if (!$obj_group) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        return view('FEadmin.Pages.Cart.view_buiding', compact('objs', 'obj_group', 'count'));
    }

    // Lấy thông tin  nhóm
    public function get_detail_groups(Group $group, $slug){
        $obj = $group -> get_by_code($slug);
        return response()->json($obj);
    }

    // View thêm mới
    public function view_create_cart(Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Cart.view_create', compact('count'));
    }

    public function post_detail_groups(createRequest $req,Cart $cart, Group $group){
        // Tạo dữ liệu
        $req->merge([
            'name_account' => $req->name_account,
            'linkFacebook'=> $req->linkFacebook,
            'phone'=> $req->phone,
            'email'=> $req->email,
            'idGroup'=> $req->idGroup,
            'codeGroup'=> $req->codeGroup,
            'nameGroup'=> $req->nameGroup,
            'price'=> $req->price,
            'rent_cost'=> $req->rent_cost,
            'status'=> 0,
            'status_type'=> $req->status_type,
            'linkGroup'=> $req->linkGroup,
            'note'=> $req->note,
            'user_create'=> Auth::guard('admin')->user()->fullName,
            'user_email_create'=> Auth::guard('admin')->user()->email,
        ]);

        //Thực hiện thêm mới
        $create = $cart->create_cart($req);
        
        if ($create) {
            return redirect() -> route('view_list_cart')->with('success', 'Thêm Mới Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
        }
    }
}
