<?php

namespace App\Http\Controllers\adminController\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Cart;
use App\Http\Requests\Banner\createRequest;
use App\Http\Requests\Banner\updateRequest;
use App\Rules\Banner\BannerRule;


class BannerController extends Controller
{
    // View danh sách banner
    public function view_list(Banner $banner, Cart $cart){
        $count = $cart->get_all_count();
        $list = $banner -> get_orderBy_ASC();
        return view('FEadmin.Pages.Banner.view_list', compact('list', 'count'));
    }

    // View danh sách popup
    public function view_list_popup(Banner $banner, Cart $cart){
        $count = $cart->get_all_count();
        $list = $banner -> get_popup_orderBy_ASC();
        return view('FEadmin.Pages.Banner.view_list', compact('list', 'count'));
    }

    // View thêm mới
    public function view_creater(Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Banner.view_create', compact('count'));
    }

    // Phương thức thêm mới
    public function creater_Banner(createRequest $req, Banner $banner){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        //Phương Thức tạo ảnh
        $imgrPath = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath(): null;
        // Gán ảnh vào Request
        $req->merge(['image' => $imgrPath]);

        //Thực hiện thêm mới
        $create = $banner -> create_Banner($req);
        
        if ($create) {
            return redirect() -> route('view_creater_banner')->with('success', 'Thêm Mới Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa Banner
    public function delete_Banner(Banner $banner, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $banner->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($banner->deleteBanner($slug) > 0) {
            return redirect()->route('view_list_banner')->with('success','Xóa Banner Thành Công!');
        } else {
            return redirect()->route('view_list_banner')->with('err','Kiểm Tra Lại, Xóa Banner Thất Bại!');
        }
    }

    public function view_update(Banner $banner, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $banner->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }
        return view('FEadmin.Pages.Banner.view_update', compact('obj', 'count'));
    }

    public function update_Banner(updateRequest $req, Banner $banner, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count(); 

        $validatedData = $req->validate([
            'slug' => [new BannerRule($slug)],
        ]);
    
        $obj = $banner->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        // Xử lý ảnh: Nếu có file ảnh được tải lên, lưu trên Cloudinary, ngược lại sử dụng ảnh hiện tại
        $imgrPath = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath(): $obj->image;
        $req->merge(['image' => $imgrPath]);

        if ($banner->update_Banner($req, $slug) >= 0) {
            return redirect()->route('view_list_banner')->with('success', 'Cập Nhật Banner Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Banner Thất Bại!');
        }
    }
}
