<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function destroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('login')->with($notification);
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminProfileData = User::find($id);
        return view('admin.admin_setup.view_profile',compact('adminProfileData'));
    }


    public function AdminProfileEdit(){
        $id = Auth::user()->id;
        $adminProfileEdit = User::find($id);
        return view('admin.admin_setup.edit_profile',compact('adminProfileEdit'));

    }
    public function AdminProfileStore(Request $request){
        $validateData = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Please Input name',
            'phone.required' => 'Please Input phone',
            'address.required' => 'Please Input address',
            'profile_image.min' => 'Image Longer Than 4 Characters',
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('profile_image')) {
        $image = $request->file('profile_image');
        @unlink(public_path('upload/admin_images/'.$data->profile_image));

        // $image = $request->file('profile_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1000, 1000)->save('upload/admin_images/' . $name_gen);
        $last_img = 'upload/admin_images/' . $name_gen;

        // $filename = date('YmdHi').$file->getClientOriginalName();
        // $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_image'] = $name_gen;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.profile')->with($notification);
    }// End Method

    public function AdminChangePassword(){
        return view('admin.admin_setup.change_password');
    }// End Method

    public function AdminUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Successfully Changed',
                'alert-type' => 'success'
            );
            return Redirect()->route('login')->with($notification);
        }else {
            $notification = array(
                'message' => 'Wrong old password',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }// End Method


    public function AdminGoogleLineChart()
    {
        // $visitors = Visitor::select("visit_date", "click", "viewer")->get();
        // $result[] = ['Dates','Clicks','Viewers'];
        // foreach ($visitors as $key => $value) {
        // $result[++$key] = [$value->visit_date, (int)$value->click, (int)$value->viewer];

        $productline = Product::select("name", "quantity")->get();
        $result[] = ['Names','Quantities'];
            foreach ($productline as $key => $value) {
            $result[++$key] = [$value->name, (int)$value->quantity];
        }
        return view('/Dashboard', compact('result'));
    }








}
