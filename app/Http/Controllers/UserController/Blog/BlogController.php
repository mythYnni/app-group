<?php

namespace App\Http\Controllers\UserController\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Blog;

class BlogController extends Controller
{
    public function view_list_blog(Group $group, Blog $blog){
        $list_category = $group->lay_danh_muc();
        $listBlog = $blog->get_orderBy_DESC_where_status();
        return view('FEuser.Pages.Blog.list_blog', compact('list_category' , 'listBlog'));
    }
}
