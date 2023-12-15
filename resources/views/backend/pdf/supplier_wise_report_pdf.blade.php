@extends('admin.admin_master')
@section('title', 'PDF Supplier Report')
@section('admin')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card card-body printableArea">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h3>
                                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo" height="24" /> Newinfo Shopping Mall
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
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <h3 class="text-center"><strong>Supplier Name : </strong> {{ $allData['0']['supplier']['name'] }} </h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td class="text-center"><strong># </strong></td>
                                                <td class="text-center"><strong>Supplier Name </strong></td>
                                                <td class="text-center"><strong>Unit  </strong></td>
                                                <td class="text-center"><strong>Category</strong></td>
                                                <td class="text-center"><strong>Product Name</strong></td>
                                                <td class="text-center"><strong>Stock  </strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            @foreach($allData as $key => $item)
                                            <tr>
                                                <td class="text-center"> {{ $key+1}} </td>
                                                <td class="text-center"> {{ $item['supplier']['name'] }} </td>
                                                <td class="text-center"> {{ $item['unit']['name'] }} </td>
                                                <td class="text-center"> {{ $item['category']['name'] }} </td>
                                                <td class="text-center"> {{ $item->name }} </td>
                                                <td class="text-center"> {{ $item->quantity }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @php $date = new DateTime('now', new DateTimeZone('Africa/Lagos')); @endphp
                                <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
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
