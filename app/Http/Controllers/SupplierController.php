<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class SupplierController extends Controller
{
    public function SupplierView(){
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.index',compact('suppliers'));
    } // End Method

    public function SupplierAdd(){
        return view('backend.supplier.add_supplier');
    } // End Method

    public function Supplierstore(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'address' => 'required',
        ],
        [
            'name.required' => 'Please Input Supplier name',
            'mobile_no.required' => 'Please Input Supplier Phone no ',
            'email.required' => 'Please Input Supplier email ',
            'address.required' => 'Please Input Supplier address ',
        ]);

        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => "Suppier's Details Added Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('supplier.view')->with($notification);
    } // End Method

    public function SupplierEdit($id){
        $editData = Supplier::findOrFail($id);
        return view('backend.supplier.edit_supplier', compact('editData'));
    } // End Method

    public function SupplierUpdate (Request $request, $id){
        $validateData = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'address' => 'required',
        ],
        [
            'name.required' => 'Please Input Supplier name',
            'mobile_no.required' => 'Please Input Supplier Phone no ',
            'email.required' => 'Please Input Supplier email ',
            'address.required' => 'Please Input Supplier address ',
        ]);

        Supplier::findOrFail($id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => "Supplier's Details Updated Successfully",
                'alert-type' => 'success'
            );
            return Redirect()->route('supplier.view')->with($notification);
        } // End Method

    public function SupplierDelete($id) {
        Supplier::findOrFail($id)->delete();
        $notification = array(
            'message' => "Supplier's Details Deleted Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('supplier.view')->with($notification);
    } // End Method
}
