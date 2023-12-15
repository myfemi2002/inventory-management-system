@extends('admin.admin_master')
@section('title', 'Supplier')
@section('admin')
<!-- File export -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
            start File export
            ---------------- -->
        <div class="card">
            <div class="border-bottom title-part-padding">
                <a href="{{ route('supplier.add') }}" class="btn btn-rounded btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Add Supplier</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier Name</th>
                                <th>Mobile Number </th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Date of Creation</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $key => $rows)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td> {{ $rows->name }} </td>
                                <td> {{ $rows->mobile_no }} </td>
                                <td> {{ $rows->email }} </td>
                                <td> {!! Str::limit($rows->address,20)!!}</td>
                                <td>
                                    @if($rows->created_at == NULL)<span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($rows->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('supplier.edit', $rows->id) }}" class="btn btn-primary btn-rounded btn-sm text-white" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('supplier.delete', $rows->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>
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
