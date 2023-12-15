<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class PurchaseController extends Controller
{
    public function PurchaseView(){
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.index',compact('allData'));
    } //End method

    public function PurchaseAdd(){
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.purchase.add_purchase',compact('supplier','unit','category'));
    } //End method

    public function PurchaseStore(Request $request){
    // Another validation method
        if ($request->category_id == null) {

            $notification = array(
            'message' => 'Sorry you do not select any item',
            'alert-type' => 'error'
        );
        return redirect()->back( )->with($notification);
        } else {

            $count_category = count($request->category_id);
            for ($i=0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];

                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];

                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            } // end foreach
        } // end else

        $notification = array(
            'message' => 'Data Save Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.view')->with($notification);
        } // End Method

        public function PurchaseDelete($id){
            Purchase::findOrFail($id)->delete();
            $notification = array(
            'message' => ' Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        } // End Method

        public function PurchasePendingView(){
            $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
            return view('backend.purchase.pending_approval',compact('allData'));
        }// End Method

        public function PurchaseApprove($id){
            $purchase = Purchase::findOrFail($id);
            $product = Product::where('id',$purchase->product_id)->first();
            $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
            $product->quantity = $purchase_qty;
            if($product->save()){
            // This line update the Status from 0 to 1
            Purchase::findOrFail($id)->update([
            'status' => '1',
            ]);
            $notification = array(
            'message' => 'Approved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.view')->with($notification);
        }
    }// End Method
}
