<?php

namespace App\Http\Controllers\AdminController\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Requests\Profile\updateRequest;
use App\Http\Requests\Profile\passwordRequest;
use App\Rules\Account\AccountRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class ProfileController extends Controller
{
    public function index(Cart $cart){
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Profile.index', compact('count'));
    }

    public function update_profile(updateRequest $req, Account $account, Cart $cart){
        $obj = $account->get_link_slug($req -> slugUser);
        $count = $cart->get_all_count();
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        $validatedData = $req->validate([
            'phone' => [new AccountRule($req -> slugUser)],
        ]);
    
        if ($account->update_profile($req, $req->slugUser) >= 0) {
            return redirect() -> back() ->with('success', 'Cập Nhật Hồ Sơ Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Hồ Sơ Thất Bại!');
        }
    }

    public function index_password(Cart $cart){
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Profile.index_password', compact('count'));
    }

    public function update_password_profile(passwordRequest $req, Account $account, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $account->get_link_slug($req -> slugUser);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        $text_password = $req->password;
        //Mã khóa mật khẩu
        $req->merge(['password' => Hash::make($req->password)]);

        if ($account->update_password_account($req, $req -> slugUser) >= 0) {
            Auth::guard('admin')->logout();
            return redirect() -> route('view_login_account')->with('success', 'Cập Nhật Mật Khẩu Nhân Sự Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Mật Khẩu Nhân Sự Thất Bại!');
        }
    }
}
