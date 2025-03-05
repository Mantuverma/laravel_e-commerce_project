<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('admin.sub_category.create',compact('categories'));
    }

    public function manage()
    { 
         $sub_categories = SubCategory::all();
        return view('admin.sub_category.manage', compact('sub_categories'));
    }
}