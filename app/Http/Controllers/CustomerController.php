<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Payment;
use App\Models\PaymentDetail;

class CustomerController extends Controller
{
    public function CustomerView(){
        $customers = Customer::latest()->get();
        return view('backend.customer.index',compact('customers'));
    } // End Method

    public function CustomerAdd(){
        return view('backend.customer.add_customer');
    } //End Method

    public function Customerstore(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'address' => 'required',
        ],
        [
            'name.required' => 'Please Input Customer name',
            'mobile_no.required' => 'Please Input Customer Phone no ',
            'email.required' => 'Please Input Customer email ',
            'address.required' => 'Please Input Customer address ',
        ]);

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.view')->with($notification);

    } //End Method

    public function CustomerEdit($id){
        $editData = Customer::findOrFail($id);
        return view('backend.customer.edit_Customer', compact('editData'));
    } // End Method

    public function CustomerUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'address' => 'required',
        ],
        [
            'name.required' => 'Please Input Customer name',
            'mobile_no.required' => 'Please Input Customer Phone no ',
            'email.required' => 'Please Input Customer email ',
            'address.required' => 'Please Input Customer address ',
        ]);

            Customer::find($id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('customer.view')->with($notification);
    } // End Method


    public function CustomerDelete($id) {
        // This line of code will delete image from the folder
        $image = Customer::find($id);
        $old_image = $image->image;
        unlink($old_image);
        // Delete from the Database
        Customer::find($id)->delete();
        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('customer.view')->with($notification);
    } //End Method

    public function CreditCustomer(){
        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.customer_credit',compact('allData'));
    } // End Method

    public function CreditCustomerPrintPdf(){
        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf',compact('allData'));
    }// End Method

    public function CustomerEditInvoice($invoice_id){
        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.customer.edit_customer_invoice',compact('payment'));
    }// End Method

    public function CustomerUpdateInvoice(Request $request,$invoice_id){
        if ($request->new_paid_amount < $request->paid_amount) {
            $notification = array(
            'message' => 'Input Amount Is Greater Than Paid Amount',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
        } else{
            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->new_paid_amount;

            } elseif ($request->paid_status == 'partial_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
            }

            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

            $notification = array(
            'message' => 'Invoice Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.credit')->with($notification);
        }
    }// End Method

    public function CustomerInvoiceDetails($invoice_id){
        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf',compact('payment'));
    }// End Method

    public function PaidCustomer(){
        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.customer.customer_paid',compact('allData'));
    }// End Method

    public function PaidCustomerPrintPdf(){
        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_paid_pdf',compact('allData'));
    }// End Method

    public function CustomerWiseReport(){
        $customers = Customer::all();
        return view('backend.customer.customer_wise_report',compact('customers'));
    }// End Method

    public function CustomerWiseCreditReport(Request $request){
        $allData = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_wise_credit_pdf',compact('allData'));
    }// End Method

    public function CustomerWisePaidReport(Request $request){
        $allData = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_wise_paid_pdf',compact('allData'));
    }// End Method
}
