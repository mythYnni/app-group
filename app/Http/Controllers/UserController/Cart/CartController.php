<?php

namespace App\Http\Controllers\UserController\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cart\createRequest;

class CartController extends Controller
{
    public function creater_cart(createRequest $req){
        // Validate the request
        $validated = $req->validated();
    
        // If validation fails, return back with errors
        if ($req->fails()) {
            return redirect()->back()->withErrors($req->errors())->withInput()->with('modalShown', true);
        }
    
        dd($req->all());
    }
}
