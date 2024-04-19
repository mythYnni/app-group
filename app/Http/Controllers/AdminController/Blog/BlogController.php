<?php

namespace App\Http\Controllers\adminController\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Cart;
use App\Http\Requests\Blog\createRequest;
use App\Http\Requests\Blog\updateRequest;
use App\Rules\Blog\BlogRule;

class BlogController extends Controller
{
    // View danh sách Blog
    public function view_list(Blog $blog, Cart $cart){
        $count = $cart->get_all_count();
        $list = $blog -> get_orderBy_ASC();
        return view('FEadmin.Pages.Blog.view_list', compact('list', 'count'));
    }

    // Phương thức chi tiết bài viết|
    public function detail_blog(Blog $blog, $slug){
        $objBlog = $blog -> get_link_slug($slug);
        return response()->json($objBlog);
    }


    // View thêm mới
    public function view_creater(Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Blog.view_create', compact('count'));
    }

    // Phương thức thêm mới
    public function creater_blog(createRequest $req, Blog $blog){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        //Phương Thức tạo ảnh
        $imgrPath = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath(): null;
        // Gán ảnh vào Request
        $req->merge(['image' => $imgrPath]);

        //Thực hiện thêm mới
        $create = $blog -> create_blog($req);
        
        if ($create) {
            return redirect() -> route('view_creater_blog')->with('success', 'Thêm Mới Thành Công!');
        }else{
            return redirect() -> back() ->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    //Phương thức xóa Bài Viết
    public function delete_blog(Blog $blog, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $blog->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        if ($blog->deleteBlog($slug) > 0) {
            return redirect()->route('view_list_blog')->with('success','Xóa Bài Viết Thành Công!');
        } else {
            return redirect()->route('view_list_blog')->with('err','Kiểm Tra Lại, Xóa Bài Viết Thất Bại!');
        }
    }

    public function view_update(Blog $blog, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count();
        $obj = $blog->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }
        return view('FEadmin.Pages.Blog.view_update', compact('obj', 'count'));
    }

    public function update_blog(updateRequest $req, Blog $blog, $slug, Cart $cart){
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }
        $count = $cart->get_all_count(); 

        $validatedData = $req->validate([
            'slug' => [new BlogRule($slug)],
        ]);
    
        $obj = $blog->get_link_slug($slug);

        if (!$obj) {
            return view('FEadmin.Pages.Error.error404', compact('count'));
        }

        // Xử lý ảnh: Nếu có file ảnh được tải lên, lưu trên Cloudinary, ngược lại sử dụng ảnh hiện tại
        $imgrPath = $req->file('file') ? cloudinary()->upload($req->file('file')->getRealPath())->getSecurePath(): $obj->image;
        $req->merge(['image' => $imgrPath]);

        if ($blog->update_blog($req, $slug) >= 0) {
            return redirect()->route('view_list_blog')->with('success', 'Cập Nhật Bài Viết Thành Công!');
        } else {
            return redirect() -> back() ->with('error', 'Cập Nhật Bài Viết Thất Bại!');
        }
    }
}
