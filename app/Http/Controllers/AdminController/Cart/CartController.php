<?php

namespace App\Http\Controllers\adminController\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Group;

class CartController extends Controller
{
    // View danh sách
    public function view_list(Cart $cart){
        $list = $cart -> get_orderBy_ASC();
        return view('FEadmin.Pages.Cart.view_list', compact('list'));
    }

    //Phương thức xóa
    public function delete_cart(Cart $cart, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $cart->get_by_id($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
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
        $objs = $cart->get_by_id($slug);
        if (!$objs) {
            return view('FEadmin.Pages.Error.error404');
        }
        
        $obj_group = $group->get_by_id($objs->idGroup);
        if (!$obj_group) {
            return view('FEadmin.Pages.Error.error404');
        }

        return view('FEadmin.Pages.Cart.view_update', compact('objs', 'obj_group'));
    }

    public function update_cart(Request $req,Cart $cart, Group $group, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $objs = $cart->get_by_id($slug);
        if (!$objs) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($cart->update_cart_note($req, $slug) >= 0) {
            return redirect()->route('view_list_cart')->with('success', 'Cập Nhật Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Thất Bại!');
        }
    }
}
