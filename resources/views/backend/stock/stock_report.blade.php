@extends('admin.admin_master')
@section('title', 'Stock Report')
@section('admin')
<!-- File export -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
            start File export
            ---------------- -->
        <div class="card">
            <div class="border-bottom title-part-padding">
                <a href="{{ route('stock.report.pdf') }}" target="_blank" class="btn btn-primary btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-print"> Stock Report Print </i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier Name </th>
                                <th>Unit</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>In Qty</th>
                                <th>Out Qty </th>
                                <th>Stock </th>
                                <th>Date of Creation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allData as $key => $item)
                            @php
                            $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
                            $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
                            @endphp
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item['supplier']['name'] }} </td>
                                <td> {{ $item['unit']['name'] }} </td>
                                <td> {{ $item['category']['name'] }} </td>
                                <td> {{ $item->name }} </td>
                                <td> <span class="btn btn-success"> {{ $buying_total  }}</span>  </td>
                                <td> <span class="btn btn-info"> {{ $selling_total  }}</span> </td>
                                <td> <span class="btn btn-danger"> {{ $item->quantity }}</span> </td>
                                <td>
                                    @if($item->created_at == NULL)<span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
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
