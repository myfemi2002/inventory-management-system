@extends('admin.admin_master')
@section('title', 'Assign User & Role')
@section('admin')
<!-- File export -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
            start File export
            ---------------- -->
        <div class="card">
            <div class="border-bottom title-part-padding">
                <a href="{{ route('role.add') }}" class="btn btn-rounded btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Add Role</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table customize-table table-bordered mb-0 v-middle">
                        <thead>
                            <tr>
                                <th class="border-bottom border-top">#</th>
                                <th class="border-bottom border-top">Name </th>
                                <th class="border-bottom border-top">Email </th>
                                <th class="border-bottom border-top">Role </th>
                                <th class="border-bottom border-top">Date of Creation</th>
                                <th class="border-bottom border-top" scope="col" width="9%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $rows)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td> {{ $rows->name }} </td>
                                <td> {{ $rows->email }} </td>
                                <td>
                                    @if($rows->current_stock == 1)
                                     <span class="badge ms-auto bg-success">Current Stock</span>
                                    @else
                                    @endif

                                    @if($rows->customer == 1)
                                    <span class="badge ms-auto bg-success">Customer</span>
                                    @else
                                    @endif

                                    @if($rows->supplier == 1)
                                    <span class="badge ms-auto bg-success">Supplier</span>
                                    @else
                                    @endif

                                    @if($rows->unit == 1)
                                    <span class="badge ms-auto bg-success">Unit</span>
                                    @else
                                    @endif

                                    @if($rows->category == 1)
                                    <span class="badge ms-auto bg-success">Category</span>
                                    @else
                                    @endif

                                    @if($rows->product == 1)
                                    <span class="badge ms-auto bg-success">Product</span>
                                    @else
                                    @endif

                                    @if($rows->role == 1)
                                    <span class="badge ms-auto bg-success">Role</span>
                                    @else
                                    @endif

                                    @if($rows->purchase == 1)
                                    <span class="badge ms-auto bg-success">Purchase </span>
                                    @else
                                    @endif

                                    @if($rows->invoice == 1)
                                    <span class="badge ms-auto bg-success">Invoice</span>
                                    @else
                                    @endif

                                    @if($rows->Stock == 1)
                                    <span class="badge ms-auto bg-success">Stock </span>
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if($rows->created_at == NULL)<span class="text-danger">No Date Set</span>
                                        @else
                                        {{ Carbon\Carbon::parse($rows->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('role.edit',$rows->id) }}" class="btn btn-primary btn-rounded btn-sm text-white" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('role.delete',$rows->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>
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
