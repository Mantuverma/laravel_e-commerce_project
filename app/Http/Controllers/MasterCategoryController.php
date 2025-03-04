<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MasterCategoryController extends Controller
{
    public function store_category(Request $request)
    {
        $request->validate([
            'category_name' => 'unique:categories|max:100|required',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        // $validate_data = $request->validate([
        //     'category_name' => 'unique:categories|max:100|required',
        // ]);

        // Category::create($validate_data);
        return redirect()->back()->with('success', 'Category Added Successfully');
    }
    
}