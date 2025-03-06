<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class MasterSubCategoryController extends Controller
{
    public function store_subcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_name' => 'required',
            
        ]);

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->save();

        return redirect()->back()->with('success', 'Sub Category Created Successfully');

    }

    public function edit_subcategory($id){
        $subcategory = SubCategory::find($id);
        return view('admin.sub_category.edit', compact('subcategory'));
    }
    
    public function update_subcategory(Request $request, $id)
    {
    $subcategory = SubCategory::findOrFail($id);
    if (!$subcategory) {
            return redirect()->back()->with('error', 'Subcategory not found');
        }

        echo $subcategory;

        echo $request;
    $request->validate([
    
        'subcategory_name' => 'required',
    ]);

    $subcategory->update([
        // 'category_id' => $request->category_id,
        'subcategory_name' => $request->subcategory_name,
    ]);

    return redirect()->back()->with('success', 'Sub Category Updated Successfully');
}


    public function delete_category($id)
    {
        $subcategory = SubCategory::find($id);
        
        if (!$subcategory) {
            return redirect()->back()->with('error', 'Subcategory not found');
        }

        $subcategory->delete();

        return redirect()->back()->with('success', 'Subcategory Deleted Successfully');
    }

}