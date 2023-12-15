@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Inovice Approve</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @php
        $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
        @endphp
        <div class="row">
            <div class="col-md-12">
                <!-- ---------------------
                    start INVOICE
                    ---------------- -->
                <div class="card card-body printableArea">
                    <h3><b>Invoice No: #{{ $invoice->invoice_no }} - </b> <span class="float-right">{{ date('d-m-Y',strtotime($invoice->date)) }}</span></h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <a href="{{ route('invoice.pending.list') }}" class="btn btn-primary btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-list"> Pending Invoice List </i></a> <br>  <br>
                                <table class="table " width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h3>
                                                    <p> Customer Info </p>
                                                </h3>
                                            </td>
                                            <td>
                                                <p> Name: <strong> {{ $payment['customer']['name']  }} </strong> </p>
                                            </td>
                                            <td>
                                                <p> Mobile: <strong> {{ $payment['customer']['mobile_no']  }} </strong> </p>
                                            </td>
                                            <td>
                                                <p> Email: <strong> {{ $payment['customer']['email']  }} </strong> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="3">
                                                <p> Description : <strong> {{ $invoice->description  }} </strong> </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both">
                                <form method="post" action="{{ route('invoice.approval.store',$invoice->id) }}">
                                    @csrf
                                    <table class="table table-hover">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Category</th>
                                                <th class="text-end">Product Name</th>
                                                <th class="text-end">Current Stock</th>
                                                <th class="text-end">Quantity</th>
                                                <th class="text-end">Unit Price</th>
                                                <th class="text-end">Total Price</th>
                                            </tr>
                                            <!-- end row -->
                                        </thead>
                                        <tbody>
                                            @php
                                            $total_sum = '0';
                                            @endphp
                                            @foreach($invoice['invoice_details'] as $key => $details)
                                            <!-- start row -->
                                            <tr>
                                                <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
                                                <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
                                                <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{ $details->selling_qty }}">
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td>{{ $details['category']['name'] }}</td>
                                                <td class="text-end">{{ $details['product']['name'] }}</td>
                                                <td class="text-end">{{ $details['product']['quantity'] }}</td>
                                                <td class="text-end">{{ $details->selling_qty }}</td>
                                                <td class="text-end">${{ number_format($details->unit_price , 2) }}</td>
                                                <td class="text-end">${{ number_format($details->selling_price , 2) }}</td>
                                            </tr>
                                            {{-- @php
                                            $total_sum += $details->selling_price;
                                            @endphp --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- </form> --}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            @php
                            $total_sum += $details->selling_price;
                            @endphp
                            <div class="pull-right m-t-30 text-end">
                                <p><strong>Sub-Total amount  :</strong> ${{ number_format($total_sum , 2) }} </p>
                                <p><strong>Discount  :</strong> ${{ number_format($payment->discount_amount, 2) }}</p>
                                <p><strong>Paid Amount  :</strong> ${{ number_format($payment->paid_amount, 2) }}</p>
                                <p><strong>Due Amount  :</strong> ${{ number_format($payment->due_amount, 2) }}</p>
                                <hr />
                                <h3><b>Grand Amount :</b> ${{ number_format($payment->total_amount, 2) }}</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <div class="text-end">
                                {{-- <button type="submit" class="btn btn-info">Invoice Approve </button> --}}
                                <button class="btn btn-danger" type="submit">Invoice Approve </button>
                                <button id="print" class="btn btn-default btn-outline" type="button">
                                <span><i data-feather="printer" class="feather-sm"></i> Print</span>
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- ---------------------
                    end INVOICE
                    ---------------- -->
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>


@endsection
