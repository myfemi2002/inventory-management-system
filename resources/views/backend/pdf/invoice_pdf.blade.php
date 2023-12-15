@extends('admin.admin_master')
@section('title', 'Print Inovice PDF')
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card card-body printableArea">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-16"><strong>Invoice No # {{ $invoice->invoice_no }}</strong></h4>
                            <h3>
                                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo" height="24"/> Newinfo Shopping Mall
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6 mt-4">
                                <address>
                                    <strong>Newinfo Shopping Mall:</strong><br>
                                    Block 21 Room 1, Redemption Camp<br>
                                    info@newinfo.com.ng
                                </address>
                            </div>
                            <div class="col-6 mt-4 text-end">
                                <address>
                                    <strong>Invoice Date:</strong><br>
                                    {{ date('d-m-Y',strtotime($invoice->date)) }} <br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
                @endphp


                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="p-2">
                                <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td><strong>Customer Name </strong></td>
                                                <td class="text-center"><strong>Customer Mobile</strong></td>
                                                <td class="text-center"><strong>Address</strong></td>
                                                <td class="text-center"><strong>Description</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td> {{ $payment['customer']['name'] }}</td>
                                                <td class="text-center">{{ $payment['customer']['mobile_no']  }}</td>
                                                <td class="text-center">{{ $payment['customer']['email']  }}</td>
                                                <td class="text-center">{{ $invoice->description  }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="p-2">
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td><strong># </strong></td>
                                                <td class="text-center"><strong>Category</strong></td>
                                                <td class="text-center"><strong>Product Name</strong></td>
                                                <td class="text-center"><strong>Current Stock</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-center"><strong>Unit Price </strong></td>
                                                <td class="text-center"><strong>Total Price</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            @php
                                            $total_sum = '0';
                                            @endphp
                                            @foreach($invoice['invoice_details'] as $key => $details)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $details['category']['name'] }}</td>
                                                <td class="text-center">{{ $details['product']['name'] }}</td>
                                                <td class="text-center">{{ $details['product']['quantity'] }}</td>
                                                <td class="text-center">{{ $details->selling_qty }}</td>
                                                <td class="text-center">{{ number_format( $details->unit_price, 2) }}</td>
                                                <td class="text-center">{{ number_format( $details->selling_price, 2) }}</td>
                                                {{-- <td class="text-end">${{ number_format($details->selling_price , 2) }}</td> --}}
                                            </tr>
                                            @php
                                            $total_sum += $details->selling_price;
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center">
                                                    <strong>Subtotal</strong>
                                                </td>
                                                <td class="thick-line text-center">${{ number_format( $total_sum, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Discount Amount</strong>
                                                </td>
                                                <td class="no-line text-center">${{ number_format( $payment->discount_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Paid Amount</strong>
                                                </td>
                                                <td class="no-line text-center">${{ number_format($payment->paid_amount , 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Due Amount</strong>
                                                </td>
                                                <td class="no-line text-center">${{ number_format($payment->due_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Grand Amount</strong>
                                                </td>
                                                <td class="no-line text-center">
                                                    <h4 class="m-0">${{ number_format($payment->total_amount, 2) }}</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-print-none">
                                    <div class="float-end">
                                        <button id="print" class="btn btn-default btn-outline" type="button">
                                        <span><i data-feather="printer" class="feather-sm"></i> Print</span>
                                        </button>
                                        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a> --}}

                                        <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
