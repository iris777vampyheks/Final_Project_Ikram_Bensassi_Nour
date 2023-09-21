<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
        public function index(){
        return view('category');
    }
    public function cart(){
        return view('cart');
    }
}
