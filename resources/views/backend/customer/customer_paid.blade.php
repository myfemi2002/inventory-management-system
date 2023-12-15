@extends('admin.admin_master')
@section('title', 'All Paid Customer')
@section('admin')
<!-- File export -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
            start File export
            ---------------- -->
        <div class="card">
            <div class="border-bottom title-part-padding">
                <a href="{{ route('paid.customer.print.pdf') }}" class="btn btn-rounded btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Print Paid Customer </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Invoice No </th>
                                <th>Date</th>
                                <th>Due Amount</th>
                                <th>Date of Creation</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item['customer']['name'] }} </td>
                            <td> {{ $item['invoice']['invoice_no'] }}</td>
                            <td> {{ date('d-m-Y',strtotime($item['invoice']['date'])) }} </td>
                            <td> {{ $item->due_amount }} </td>
                                <td>
                                    @if($item->created_at == NULL)<span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('customer.invoice.details.pdf',$item->invoice_id) }}" class="btn btn-primary btn-rounded btn-sm text-white" target="_black" title="Customer Details">  <i class="fa fa-eye"></i> </a>
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
