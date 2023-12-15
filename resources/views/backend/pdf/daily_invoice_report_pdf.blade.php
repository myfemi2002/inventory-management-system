@extends('admin.admin_master')
@section('title', 'PDF Invoice Report')
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card card-body printableArea">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
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

                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="p-2">
                                <h3 class="font-size-16"><strong> Invoice Report
                                    <span class="btn btn-info">{{ date('d-m-Y', strtotime($start_date)) }}</span> -
                                    <span class="btn btn-info">{{ date('d-m-Y', strtotime($end_date)) }}</span>
                                </strong></h3>
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
                                                <td class="text-center"><strong># </strong></td>
                                                <td class="text-center"><strong> Customer Name</strong></td>
                                                <td class="text-center"><strong> Invoice No</strong></td>
                                                <td class="text-center"><strong> Date</strong></td>
                                                <td class="text-center"><strong> Description</strong></td>
                                                <td class="text-center"><strong>Total Price</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            @php
                                            $total_sum = '0';
                                            @endphp

                                            @foreach($allData as $key => $item)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $item['payment']['customer']['name'] }}</td>
                                                <td class="text-center">{{ $item->invoice_no }}</td>
                                                <td class="text-center">{{ date('d-m-Y',strtotime($item->date)) }} </td>
                                                <td class="text-center">{{ $item->description }}</td>
                                                <td class="text-center">${{ number_format($item['payment']['total_amount'] , 2) }}</td>
                                            </tr>
                                            @php
                                            $total_sum += $item['payment']['total_amount'];
                                            @endphp
                                            @endforeach
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Grand Amount</strong>
                                                </td>
                                                <td class="no-line text-center">
                                                    <h4 class="m-0">${{ number_format($total_sum , 2) }}</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-print-none">
                                    <div class="float-end">
                                        <button id="print" class="btn btn-danger  btn-outline" type="button">
                                        <span><i data-feather="printer" class="feather-sm"></i> Print</span>
                                        </button>
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
