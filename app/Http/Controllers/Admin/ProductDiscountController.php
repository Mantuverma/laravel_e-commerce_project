<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDiscountController extends Controller
{
    //
    public function index()
    {
        return view('admin.discounts.create');
    }

    public function manage()
    {
        return view('admin.discounts.manage');
    }
}
