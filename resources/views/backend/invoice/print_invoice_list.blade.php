@extends('admin.admin_master')
@section('title', 'Print Inovice All')
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allData as $key => $item)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item['payment']['customer']['name'] }} </td>
                                <td> #{{ $item->invoice_no }} </td>
                                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>
                                <td>  {{ $item->description }} </td>
                                <td>   ${{ number_format($item['payment']['total_amount'] , 2) }}</td>
                                {{--
                                <td>  $ {{ $item['payment']['total_amount'] }} </td>
                                --}}
                                <td>
                                    <a href="{{ route('print.invoice',$item->id) }}" class="btn btn-danger sm" title="Print Invoice" >  <i class="fa fa-print"></i> </a>
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
