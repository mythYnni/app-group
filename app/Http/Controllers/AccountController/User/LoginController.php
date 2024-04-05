<?php

namespace App\Http\Controllers\AccountController\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Login\loginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // View giao diện đăng nhập
    public function view_login(){
        return view('Login.index');
    }

    // Đăng nhập
    public function login(loginRequest $req){
        if (Auth::guard('admin')->attempt(['email' => $req -> email,'password' => $req -> password])){
            if(Auth::guard('admin') -> user() -> decentralization == 0 || Auth::guard('admin') -> user() -> decentralization == 1){
                return redirect()->route('view_home_admin')->with('success', 'Đăng Nhập Thành Công!');      
            }else{
                return redirect() -> back() ->with('error', 'Đăng Nhập Thất Bại, Hãy Kiểm Tra Lại!');
            }
        }
        return redirect() -> back() ->with('error', 'Đăng Nhập Thất Bại, Hãy Kiểm Tra Lại!');
    }

    public function logout(){
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect() -> route('view_login_account')->with('success', 'Đăng Xuất Thành Công!');
        }
        return redirect()-> back();
    }
}
