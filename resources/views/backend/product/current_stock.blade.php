@extends('admin.admin_master')
@section('title', 'Product')
@section('admin')
<!-- File export -->
<div class="row">
    <div class="col-12">
        <!-- ---------------------
            start File export
            ---------------- -->
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Supplier Name</th>
                                <th> Product Name</th>
                                <th> Category Name</th>
                                <th> Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $rows)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td> {{ $rows['supplier']['name'] }} </td>
                                <td> {{ $rows->name }} </td>
                                <td> {{ $rows['category']['name'] }} </td>
                                <td>
                                    @if ($rows->quantity < 101)
                                    <span class="badge badge-danger btn-danger" > Low Stock {{ $rows->quantity }} </span>
                                    @else
                                    <span class="badge badge-success btn-success"> {{ $rows->quantity }}</span>
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
