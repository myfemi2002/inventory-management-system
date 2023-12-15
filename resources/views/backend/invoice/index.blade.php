@extends('admin.admin_master')
@section('title', 'Invoice')
@section('admin')
<!-- File export -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
            start File export
            ---------------- -->
        <div class="card">
            <div class="border-bottom title-part-padding">
                <a href="{{ route('invoice.add') }}" class="btn btn-rounded btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Add Invoice</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Invoice No </th>
                                <th>Date </th>
                                <th>Desctipion</th>
                                <th>Amount</th>
                                <th>Date of Creation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData  as $key => $rows)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $rows['payment']['customer']['name'] }} </td>
                                <td> #{{ $rows->invoice_no }} </td>
                                <td> {{ date('d-m-Y',strtotime($rows->date))  }} </td>
                                <td> {{ $rows->description }} </td>
                                <td>${{ number_format($rows['payment']['total_amount'] , 2) }}</td>
                                <td>
                                    @if($rows->created_at == NULL)<span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($rows->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ---------------------
            end File export
            ---------------- -->
    </div>
</div>
@endsection
