<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Defaultattribute;

class ProductAttributeController extends Controller
{
    //
    public function index()
    {
        return view('admin.product_attribute.create');
    }

    public function manage(){
        $attribute=Defaultattribute::all();
        return view('admin.product_attribute.manage',compact('attribute'));
    }

    public function store_attribute(Request $request){
    $request->validate([
            'attribute_name' => 'required',
        ]);
        $attribute = new Defaultattribute();
        $attribute->attribute_name = $request->attribute_name;
        $attribute->save();
        return redirect()->back()->with('success', 'Sub Category Created Successfully');
    }

    
    public function edit_attribute($id){
        $attribute = Defaultattribute::find($id);
        return view('admin.product_attribute.edit', compact('attribute'));
    }
    
    public function update_attribute(Request $request, $id) {
        $attribute = Defaultattribute::findOrFail($id);
         $validate_data=$request->validate([
            'attribute_name' => 'required',
        ]);

        $attribute->update($validate_data);
        return redirect()->back()->with('success', 'Attribute Updated Successfully');
    }

    public function delete_attribute($id){
        $attribute = Defaultattribute::find($id);
        $attribute->delete();

        return redirect()->back()->with('success', 'Attribute Deleted Successfully');
    }

}