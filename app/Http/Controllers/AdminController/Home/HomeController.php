<?php

namespace App\Http\Controllers\AdminController\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index(Cart $cart){
        $count = $cart->get_all_count();
        return view('FEadmin.Pages.Home.index', compact('count'));
    }
}
