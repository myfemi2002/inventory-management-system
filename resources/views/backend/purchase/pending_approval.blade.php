@extends('admin.admin_master')
@section('title', 'Purchase Pending Approval')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- File export -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
            start File export
            ---------------- -->
        <div class="card">
            {{-- <div class="border-bottom title-part-padding">
                <a href="{{ route('purchase.add') }}" class="btn btn-rounded btn-success" style="float: right;"><i class="fa fa-plus-circle"></i> Add Purchase</a>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Purhase No</th>
                                <th>Date </th>
                                <th>Supplier</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Date of Creation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData  as $key => $rows)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $rows->purchase_no }} </td>
                                <td> {{ date('d-m-Y',strtotime($rows->date))  }} </td>
                                <td> {{ $rows['supplier']['name'] }} </td>
                                <td> {{ $rows['category']['name'] }} </td>
                                <td> {{ $rows->buying_qty }} </td>
                                <td> {{ $rows['product']['name'] }} </td>
                                <td>
                                    @if($rows->status == '0')
                                    <span class="btn btn-warning">Pending</span>
                                    @elseif($rows->status == '1')
                                    <span class="btn btn-success">Approved</span>
                                    @endif
                                </td>

                                <td>
                                    @if($rows->created_at == NULL)<span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($rows->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    @if($rows->status == '0')
                                    <a href="{{ route('purchase.approve',$rows->id) }} " class="btn btn-danger sm" title="Approved" id="ApproveBtn">  <i class="fas fa-check-circle"></i> </a>
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
