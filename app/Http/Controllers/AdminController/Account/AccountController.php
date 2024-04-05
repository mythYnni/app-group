<?php

namespace App\Http\Controllers\AdminController\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Account\createRequest;
use App\Http\Requests\Account\updateRequest;
use App\Http\Requests\Account\passwordRequest;
use App\Rules\Account\AccountRule;
use Mail;
use App\Mail\Send_Email_Password;

class AccountController extends Controller
{
    // View danh sách
    public function view_list(Account $account){
        $list = $account -> get_orderBy_ASC();
        return view('FEadmin.Pages.Account.view_list', compact('list'));
    }

     // View thêm mới
     public function view_creater(){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        return view('FEadmin.Pages.Account.view_create');
    }

    // Phương thức thêm mới
    public function creater_account(createRequest $req, Account $account){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        // Mã khóa mật khẩu
        $text_password = $req->password;
        $req->merge(['password' => Hash::make($req->password)]);
        // Tạo slug dường dẫn sạch
        $text = 'abc0123456789';
        $random_slugUser = substr(str_shuffle($text), 0, 10);
        $req->merge(['slugUser' => "account-admin-".$random_slugUser]);
        // thêm trạng thái tài khoản
        $req->merge(['status' => 0]);

        // dd($req->all());
        //Thực hiện thêm mới
        $create = $account -> create_account($req);
        
        if ($create) {
            $mailData = [
                'email' => $req->email,
                'password' => $text_password,
            ];

            Mail::to($req->email)->send(new Send_Email_Password($mailData));

            return redirect() -> route('view_creater_account')->with('success', 'Thêm Mới Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa nhân sự
    public function delete_account(Account $account, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $account->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($account->delete_account($slug) > 0) {
            return redirect()->route('view_list_account')->with('success','Xóa Nhân Sự Thành Công!');
        } else {
            return redirect()->route('view_list_account')->with('err','Kiểm Tra Lại, Xóa Nhân Sự Thất Bại!');
        }
    }

    public function view_update(Account $account, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $account->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }
        return view('FEadmin.Pages.Account.view_update', compact('obj'));
    }

    public function update_account(updateRequest $req, Account $account, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $validatedData = $req->validate([
            'phone' => [new AccountRule($slug)],
        ]);
    
        $obj = $account->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($account->update_account($req, $slug) >= 0) {
            return redirect()->route('view_list_account')->with('success', 'Cập Nhật Nhân Sự Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Nhân Sự Thất Bại!');
        }
    }

    public function view_update_password(Account $account, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $account->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }
        return view('FEadmin.Pages.Account.view_update_password', compact('obj'));
    }

    public function update_password_account(passwordRequest $req, Account $account, $slug){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $account->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        $text_password = $req->password;
        //Mã khóa mật khẩu
        $req->merge(['password' => Hash::make($req->password)]);

        if ($account->update_password_account($req, $slug) >= 0) {

            $mailData = [
                'email' => $obj->email,
                'password' => $text_password,
            ];

            Mail::to($obj->email)->send(new Send_Email_Password($mailData));
            return redirect()->route('view_list_account')->with('success', 'Cập Nhật Mật Khẩu Nhân Sự Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Mật Khẩu Nhân Sự Thất Bại!');
        }
    }
}
