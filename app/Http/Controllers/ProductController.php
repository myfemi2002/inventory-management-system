<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class ProductController extends Controller
{
    public function ProductView(){
        $products = Product::latest()->get();
        return view('backend.product.index',compact('products'));
    } //End Method

    public function ProductAdd(){
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.add_product',compact('supplier','category','unit'));
    }

    public function Productstore(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
        ],
        [
            'name.required' => 'Please Input Product name',
            'supplier_id.required' => 'Please Input Supplier Name ',
            'unit_id.required' => 'Please Input Unit Name ',
            'category_id.required' => 'Please Input Category Name ',
        ]);

        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Product Added Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('product.view')->with($notification);
    } //End Method

    public function ProductEdit($id){
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('backend.product.edit_product',compact('product','supplier','category','unit'));
    } // End Method

    public function ProductUpdate (Request $request, $id){
        $validateData = $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
        ],
        [
            'name.required' => 'Please Input Product name',
            'supplier_id.required' => 'Please Input Supplier Name ',
            'unit_id.required' => 'Please Input Unit Name ',
            'category_id.required' => 'Please Input Category Name ',
        ]);

        Product::findOrFail($id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => "Product Updated Successfully",
                'alert-type' => 'success'
            );
            return Redirect()->route('product.view')->with($notification);
        } // End Method

    public function ProductDelete($id) {
        Product::findOrFail($id)->delete();
        $notification = array(
            'message' => "Product Deleted Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('product.view')->with($notification);
    } // End Method

    public function ProductCurrentStockView(){
        $products = Product::orderBy('quantity','asc')->get();
        return view('backend.product.current_stock',compact('products'));
    } //End Method


    public function productGoogleLineChart()
    {
        $productline = Product::select("name", "quantity")->get();
        $result[] = ['Names','Quantities'];
            foreach ($productline as $key => $value) {
            $result[++$key] = [$value->name, (int)$value->quantity];
        }
        return view('backend.product.line', compact('result'));
    }
}

// }
