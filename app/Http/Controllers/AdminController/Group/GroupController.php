<?php

namespace App\Http\Controllers\AdminController\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Account;
use App\Models\Group;
use App\Http\Requests\Group\createRequest;
use App\Http\Requests\Group\updateRequest;
use App\Rules\Group\codeRule;
use App\Rules\Group\slugRule;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Admin;
use Illuminate\Support\Facades\Http;

class GroupController extends Controller
{
     // View danh sách nhóm thuê nhiều
     public function view_list_rent(Group $group, Cart $cart){
        $count = $cart->get_all_count();
        $list = $group->get_all_rent();
        return view('FEadmin.Pages.Group.view_list_rent', compact('list', 'count'));
    }


    // View danh sách nhóm Tương tác tốt
    public function view_list_interact(Group $group, Cart $cart){
        $count = $cart->get_all_count();
        $list = $group->get_all_interact();
        return view('FEadmin.Pages.Group.view_list_interact', compact('list', 'count'));
    }

    // View danh sách nhóm mặc định
    public function view_list(Group $group, Cart $cart){
        $count = $cart->get_all_count();
        $list = $group->get_all_default();
        return view('FEadmin.Pages.Group.view_list', compact('list', 'count'));
    }

    // View thêm mới
    public function view_creater(Category $category, Account $account, Cart $cart, Admin $admin){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        // Lấy danh mục sale
        $listAdmin = $admin->getAll();
        // Lấy danh mục quản trị
        $listAccount = $account->getAll();
        // Lấy danh mục vị trí
        $listCategory = $category->get_orderBy_ASC();
        return view('FEadmin.Pages.Group.view_create', compact('listCategory', 'listAccount', 'count', 'listAdmin'));
    }

    // Phương thức thêm mới
    public function creater_group(createRequest $req, Group $group, Account $account, Cart $cart, Admin $admin){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        
        // Kiểm tra xem người dùng đã chọn ảnh từ file máy hay nhập đường dẫn ảnh từ URL
        if ($req->hasFile('file')) {
            // Nếu người dùng chọn ảnh từ file máy, thực hiện upload ảnh
            $imagePath = cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath();
             // Gán ảnh vào Request
            $req->merge(['image' => $imagePath]);
        }else{
             // Gán ảnh vào Request
            $req->merge(['image' => $req->imageURL]);
        }
        // Xử lý danh sách quản trị
        $accountData = [];

        // Xử lý danh sách sale
        if (is_array($req->name_user_sale) || is_object($req->name_user_sale)) {
            // Xử lý danh sách sale
            foreach ($req->name_user_sale as $value) {
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
            $req->merge(['name_user_sale' => $accountData]);
        }else{
            $req->merge(['name_user_sale' => $accountData]);
        }

        // Xử lý danh sách sale
        // Khởi tạo mảng rỗng để lưu trữ kết quả
        $saleData = [];

        // Xử lý danh sách quản trị
        if (is_array($req->name_user_group) || is_object($req->name_user_group)) {
            foreach ($req->name_user_group as $value) {
                $objSale = $admin->get_by_id($value);
                if ($objSale) {
                    $accountItem = [
                        'id' => $objSale->id,
                        'slug' => $objSale->slugUser,
                        'name' => $objSale->fullName,
                        'linkFacebook' => $objSale->linkFacebook,
                    ];
                    $saleData[] = $accountItem;
                }
            }
            $req->merge(['name_user_group' => $saleData]);
        }else{
            $req->merge(['name_user_group' => $saleData]);
        }
            
        // Lấy Thông Tin Người Tạo
        $req->merge(['user_create' =>  Auth::guard('admin')->user()->fullName]);
        $req->merge(['user_email_create' =>  Auth::guard('admin')->user()->email]);
        $req->merge(['type_sales' => $req->type_sale]);
        // dd($req->all());

        //Thực hiện thêm mới
        $create = $group->create_group($req);
        
        if ($create) {
            return redirect() -> route('view_creater_group')->with('success', 'Thêm Mới Nhóm Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Nhóm Thất Bại!');
        }
    }

    // Phương thức xóa hội nhóm
    //Phương thức xóa danh mục
    public function delete_group(Group $group, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $group->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($group->delete_group($slug) > 0) {
            return redirect()->route('view_list_group')->with('success','Xóa Group Thành Công!');
        } else {
            return redirect()->route('view_list_group')->with('err','Kiểm Tra Lại, Xóa Group Thất Bại!');
        }
    }

    // View cập nhật
    public function view_update(Category $category, Account $account, Group $group, $slug, Cart $cart, Admin $admin){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        // Lấy thông tin hội nhóm
        $obj = $group->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        } 
        // Lấy danh mục sale
        $listAdmin = $admin->getAll();
        // Lấy danh mục quản trị
        $listAccount = $account->getAll();
        // Lấy danh mục vị trí
        $listCategory = $category->get_orderBy_ASC();
        return view('FEadmin.Pages.Group.view_update', compact('listCategory', 'listAccount', 'obj', 'count', 'listAdmin'));
    }

    // Phương thức cập nhật
    public function update_group(updateRequest $req, Category $category, Account $account, Group $group, $slug, Cart $cart, Admin $admin){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $validatedData = $req->validate([
            'code' => [new codeRule($slug)],
        ]);

        $validatedData = $req->validate([
            'slugGroup' => [new slugRule($slug)],
        ]);

        // Lấy Thông Tin Nhóm
        $obj = $group->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        } 
        
        // Kiểm tra xem người dùng đã chọn ảnh từ file máy hay nhập đường dẫn ảnh từ URL
        if ($req->hasFile('file')) {
            // Nếu người dùng chọn ảnh từ file máy, thực hiện upload ảnh
            $imagePath = cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath();
             // Gán ảnh vào Request
            $req->merge(['image' => $imagePath]);
        }else{
             // Gán ảnh vào Request
            $req->merge(['image' => $req->imageURL]);
        }

        // Xử lý danh sách quản trị
        // Khởi tạo mảng rỗng để lưu trữ kết quả
        $accountData = [];

        // Xử lý danh sách sale
        if (is_array($req->name_user_sale) || is_object($req->name_user_sale)) {
            // Xử lý danh sách sale
            foreach ($req->name_user_sale as $value) {
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
            $req->merge(['name_user_sale' => $accountData]);
        }else{
            $req->merge(['name_user_sale' => $accountData]);
        }

        // Xử lý danh sách sale
        // Khởi tạo mảng rỗng để lưu trữ kết quả
        $saleData = [];

        // Xử lý danh sách quản trị
        if (is_array($req->name_user_group) || is_object($req->name_user_group)) {
            foreach ($req->name_user_group as $value) {
                $objSale = $admin->get_by_id($value);
                if ($objSale) {
                    $accountItem = [
                        'id' => $objSale->id,
                        'slug' => $objSale->slugUser,
                        'name' => $objSale->fullName,
                        'linkFacebook' => $objSale->linkFacebook,
                    ];
                    $saleData[] = $accountItem;
                }
            }
            $req->merge(['name_user_group' => $saleData]);
        }else{
            $req->merge(['name_user_group' => $saleData]);
        }

        // dd($req->all());

        if ($group->update_group($req, $slug) >= 0) {
            return redirect() -> back()->with('success', 'Cập Nhật Nhóm Thành Công!');
        } else {
            return redirect() -> back()->with('error', 'Cập Nhật Nhóm Thất Bại!');
        }
    }
}
