<?php

namespace App\Http\Controllers\AdminController\Buiding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Group;
use App\Models\Buiding;
use App\Http\Requests\Buiding\createRequest;
use Illuminate\Support\Facades\Auth;

class BuidingController extends Controller
{
    // Xử lsy xóa buiding
    public function delete_buiding(Cart $cart, Buiding $buiding, $slug){
        $obj = $buiding->get_link_code_delete($slug);

        if ($buiding->delete_Buiding_model($slug) > 0) {
            $cart->update_cart_status_check_buiding($obj->idCart);
            return redirect()->back()->with('success','Xóa Hợp Đồng Thành Công!');
        } else {
            return redirect()->back()->with('err','Kiểm Tra Lại, Xóa Hợp Đồng Thất Bại!');
        }
    }

    // View danh sách
    public function view_list_rent_buiding(Cart $cart, Buiding $buiding){
        $count = $cart -> get_all_count();
        $list_buiding = $buiding->get_orderBy_asc_rent();
        return view('FEadmin.Pages.Buiding.list_rent', compact('list_buiding', 'count'));
    }

    // View danh sách buiding mua
    public function view_list_buy_buiding(Cart $cart, Buiding $buiding){
        $count = $cart -> get_all_count();
        $list_buiding = $buiding->get_orderBy_asc_buy();
        return view('FEadmin.Pages.Buiding.list_buy', compact('list_buiding', 'count'));
    }

    // View chi tiết buiding
    public function view_detail_buiding(Cart $cart, Buiding $buidings, $slug){
        $count = $cart -> get_all_count();
        $buiding = $buidings->get_link_code($slug);

        if (!$buiding) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        return view('FEadmin.Pages.Buiding.viewBuiding', compact('buiding', 'count'));
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

    public function create_buiding(createRequest $req, Cart $cart, Group $group, Buiding $buiding, $slug){
        // dd($req->all());
        $objs = $cart->get_by_id($slug);
        $obj_group = $group->get_by_id($objs->idGroup);


        if($req->status_type == 0){
            $req->merge([
                'code' => $req->code, // Mã phiếu
                'idCart'=> $objs->id,
                'code_group'=> $req->code_group,
                'name_account'=> $objs->name_account,
                'phone'=> $objs->phone,
                'linkFacebook'=> $objs->linkFacebook,
                'email'=> $objs->email,
                'nameGroup'=> $req->nameGroup,
                'idGroup'=> $req->id_group,
                'rent_cost'=> $req->rent_cost,
                'totail_price'=> $req->totail_price,
                'status_type'=> $req->status_type,
                'linkGroup'=> $obj_group->linkGroup,
                'time'=> $req->time,
                'time_out'=> $req->time_out,
                'date'=> $req->date,
                'note'=> $req->note,
            ]);

            //Thực hiện thêm mới
            $create = $buiding->create_buiding_thue($req);
            
            if ($create) {

                $cart->update_cart_status($req, $slug);

                return redirect() -> route('view_list_rent_buiding')->with('success', 'Tạo Hợp Đồng Thành Công!');
            }else{
                return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
            }
        }else{
            $req->merge([
                'code' => $req->code, // Mã phiếu
                'idCart'=> $objs->id,
                'code_group'=> $req->code_group,
                'name_account'=> $objs->name_account,
                'phone'=> $objs->phone,
                'linkFacebook'=> $objs->linkFacebook,
                'email'=> $objs->email,
                'nameGroup'=> $req->nameGroup,
                'idGroup'=> $req->id_group,
                'price'=> $req->price,
                'totail_price'=> $req->totail_price,
                'status_type'=> $req->status_type,
                'linkGroup'=> $obj_group->linkGroup,
                'note'=> $req->note,
            ]);

            //Thực hiện thêm mới
            $create = $buiding->create_buiding_mua($req);
            
            if ($create) {

                $cart->update_cart_status($req, $slug);

                return redirect() -> route('view_list_buy_buiding')->with('success', 'Tạo Hợp Đồng Thành Công!');
            }else{
                return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
            }
        }
    }
}
