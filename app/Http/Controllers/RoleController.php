<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Carbon;
use Auth;
use DB;

class RoleController extends Controller
{
    public function RoleView(){
        $roles = User::where('type', 0)->latest()->get();
        return view('backend.role.index',compact('roles'));
    } // End Method

    public function RoleAdd(){
        return view('backend.role.add_role');
    } // End Method

    public function RoleStore(Request $request){
        $validateData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm_password',
        ],
        [
        'name.required' => 'Please Input name',
        'email.required' => 'Please Input email',
        'password.required' => 'Please Input password',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
            // 'code'=> $request->password,
            // 'type' => $request->type,
            'current_stock' => $request->current_stock,
            'customer' => $request->customer,
            'supplier' => $request->supplier,
            'unit' => $request->unit,
            'category' => $request->category,
            'product' => $request->product,
            'purchase' => $request->purchase,
            'invoice' => $request->invoice,
            'stock' => $request->stock,
            'dash' => $request->dash,
            'type' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
            ]);

        $notification = array(
            'message' => "User Added Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('role.view')->with($notification);
    } //End Method

    public function RoleEdit($id){
        $editData = User::findOrFail($id);
        return view('backend.role.edit_role', compact('editData'));
    } // End Method

    // I used this method because Eloquent Method is not working.
    public function RoleUpdate(Request $request, $id){
            $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            ],
            [
            'name.required' => 'Please Input name',
            'email.required' => 'Please Input email',
            ]);

            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;

            $data['current_stock'] = $request->current_stock;
            $data['customer'] = $request->customer;
            $data['supplier'] = $request->supplier;
            $data['unit'] = $request->unit;
            $data['category'] = $request->category;
            $data['product'] = $request->product;
            $data['purchase'] = $request->purchase;
            $data['invoice'] = $request->invoice;
            $data['stock'] = $request->stock;
            $data['dash'] = $request->dash;
            $data['updated_at'] = Carbon::now();

            DB::table('users')->where('id',$id)->update($data);
            $notification = array(
            'message' => 'User Role Updated Successfully',
            'alert-type' => 'info'
            );
            return Redirect()->route('role.view')->with($notification);
            } //End Method

            public function RoleDelete($id) {
            User::findOrFail($id)->delete();
            $notification = array(
            'message' => "User Deleted Successfully",
            'alert-type' => 'success'
            );
            return Redirect()->route('role.view')->with($notification);
            } // End Method
}
