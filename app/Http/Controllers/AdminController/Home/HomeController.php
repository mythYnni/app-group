<?php

namespace App\Http\Controllers\AdminController\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('FEadmin.Pages.Home.index');
    }
}
