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

    public function edit_category($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    
    public function update_category(Request $request, $id) {
        $category = Category::findOrFail($id);
         $validate_data=$request->validate([
            'category_name' => 'unique:categories|max:100|required',
        ]);
        $category->update($validate_data);
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

}