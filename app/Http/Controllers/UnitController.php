<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class UnitController extends Controller
{
    public function UnitView(){
        $units = Unit::latest()->get();
        return view('backend.unit.index',compact('units'));
    }// End Method

    public function UnitAdd(){
        return view('backend.unit.add_unit');
    } // End Method

    public function Unitstore(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Please Input Unit name',
        ]);

        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => "Units Added Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('unit.view')->with($notification);
    } // End Method

    public function UnitEdit($id){
        $editData = Unit::findOrFail($id);
        return view('backend.unit.edit_unit', compact('editData'));
    } // End Method

    public function UnitUpdate (Request $request, $id){
        $validateData = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Please Input unit name',
        ]);

        Unit::findOrFail($id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => "Unit Updated Successfully",
                'alert-type' => 'success'
            );
            return Redirect()->route('unit.view')->with($notification);
        } // End Method

    public function UnitDelete($id) {
        Unit::findOrFail($id)->delete();
        $notification = array(
            'message' => "Unit Deleted Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('unit.view')->with($notification);
    } // End Method





}
