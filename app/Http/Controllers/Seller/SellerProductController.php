<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    //
    public function product_create(){
        return view('seller.product.create');
    }
    public function product_management(){
        return view('seller.product.manage');
    }
}