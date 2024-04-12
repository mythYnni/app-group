<?php

namespace App\Http\Controllers\UserController\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cart\createRequest;
use App\Models\Group;
use App\Models\Cart;

class CartController extends Controller
{
    public function creater_cart(createRequest $req, Group $group, Cart $cart){
        // Validate the request
        $validated = $req->validated();
        
        // Lấy thông tin nhóm
        $obj = $group->get_link_slug($req->slugGroup);
    
        // Tạo dữ liệu
        $req->merge([
            'name_account' => $req->name_account,
            'phone' => $req->email,
            'email' => $req->phone,
            'idGroup' => $obj->id,
            'nameGroup' => $obj->nameGroup,
            'price' => $obj->price,
            'rent_cost' => $obj->rent_cost,
            'status_type' => $req->status_type,
            'linkGroup' => $obj->linkGroup,
        ]);
    
        //Thực hiện thêm mới
        $create = $cart->create_cart($req);
            
        if ($create) {
            return redirect()->route('view_detail_group', ['slug' => $req->slugGroup])->with('success', 'Đăng Ký Tư Vấn Thành Công!');
        } else {
            return redirect()->route('view_detail_group', ['slug' => $req->slugGroup])->with('error', 'Đăng Ký Tư Vấn Thất Bại!');
        }
    }
}
