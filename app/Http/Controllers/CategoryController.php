<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.index',compact('categories'));
    }// End Method

    public function CategoryAdd(){
        return view('backend.category.add_category');
    } // End Method

    public function Categorystore(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Please Input category name',
        ]);

        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => "Category Added Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('category.view')->with($notification);
    } // End Method

    public function CategoryEdit($id){
        $editData = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('editData'));
    } // End Method

    public function CategoryUpdate (Request $request, $id){
        $validateData = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Please Input category name',
        ]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => "Category Updated Successfully",
                'alert-type' => 'success'
            );
            return Redirect()->route('category.view')->with($notification);
        } // End Method

    public function CategoryDelete($id) {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => "Category Deleted Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('category.view')->with($notification);
    } // End Method


}
