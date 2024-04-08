<?php

namespace App\Http\Controllers\AdminController\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Account;
use App\Models\Group;
use App\Http\Requests\Group\createRequest;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
     // View danh sách nhóm mặc định
     public function view_list(Group $group){
       
        $list = $group->get_all_default();
        return view('FEadmin.Pages.Group.view_list', compact('list'));
    }

    // View thêm mới
    public function view_creater(Category $category, Account $account){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        // Lấy danh mục quản trị
        $listAccount = $account->getAll();
        // Lấy danh mục vị trí
        $listCategory = $category->get_orderBy_ASC();
        return view('FEadmin.Pages.Group.view_create', compact('listCategory', 'listAccount'));
    }

    // Phương thức thêm mới
    public function creater_group(createRequest $req, Group $group, Account $account){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        

        //Phương Thức tạo ảnh
        $imgrPath = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath(): null;
        // Gán ảnh vào Request
        $req->merge(['image' => $imgrPath]);

        // Xử lý danh sách quản trị
        // Khởi tạo mảng rỗng để lưu trữ kết quả
        $accountData = [];

        // Xử lý danh sách quản trị
        foreach ($req->name_user_group as $value) {
            $objAccount = $account->get_by_id($value);
            if ($objAccount) {
                $accountItem = [
                    'id' => $objAccount->id,
                    'slug' => $objAccount->slugUser,
                    'name' => $objAccount->fullName
                ];
                $accountData[] = $accountItem;
            }
        }
        $req->merge(['name_user_group' => $accountData]);
            
        // Lấy Thông Tin Người Tạo
        $req->merge(['user_create' =>  Auth::guard('admin')->user()->fullName]);
        $req->merge(['user_email_create' =>  Auth::guard('admin')->user()->email]);

        //Thực hiện thêm mới
        $create = $group->create_group($req);
        
        if ($create) {
            return redirect() -> route('view_creater_group')->with('success', 'Thêm Mới Nhóm Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Nhóm Thất Bại!');
        }
    }
}
