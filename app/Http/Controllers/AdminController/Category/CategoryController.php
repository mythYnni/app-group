<?php

namespace App\Http\Controllers\AdminController\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view_creater(){
        return view('FEadmin.Pages.Category.view_create');
    }
}
