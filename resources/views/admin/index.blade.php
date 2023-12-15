@extends('admin.admin_master')
@section('title', 'Dashboard')
@section('admin')

<!-- Container fluid  -->
<!-- -------------------------------------------------------------- -->
<div class="container-fluid">




<div class="row">

<!------Graph Start------->
<div class="col-sm-12 col-lg-6">
    <div class="card">
        <div>
            <div class="mt-2" id="piechart_3d" style="width: 500px; height: 340px;"></div>
            </div>
        </div>
</div>
<!------Graph End------->

    
    <div class="col-sm-12 col-lg-6"> <!-- ---------------------
        start Trade History
        ---------------- -->
    <div class="card">
        <div class="card-body">
            <!-- title -->
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Supplier</h4>
                    <h5 class="card-subtitle">Latest Supplier Details</h5>
                </div>
            </div>
            <!-- title -->
            <div class="tab-content mt-3" id="pills-tabContent2">
                <div class="tab-pane fade show active" id="test11" role="tabpanel"  aria-labelledby="pills-home-tab2">
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th class="border-top-0">Supplier Name</th>
                                    <th class="border-top-0">Product Name</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                <!-- start row -->
                                @foreach($currentProducts as $key => $rows)
                                <tr>
                                    <td>
                                        <span class="text-info">{{ $rows['supplier']['name'] }}</span>
                                    </td>
                                    <td>
                                        <span> {{ $rows->name }}</span>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- end row -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------
        end Trade History
        ---------------- -->
    </div>





</div>





















    <!-- Trade history / Exchange -->
    <!-- -------------------------------------------------------------- -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12 col-lg-6">
            <!-- ---------------------
                start Trade History
                ---------------- -->
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Purchase</h4>
                            <h5 class="card-subtitle">Latest Purchase</h5>
                        </div>
                    </div>
                    <!-- title -->
                    <div class="tab-content mt-3" id="pills-tabContent2">
                        <div class="tab-pane fade show active" id="test11" role="tabpanel"  aria-labelledby="pills-home-tab2">
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th class="border-top-0">Purchase No</th>
                                            <th class="border-top-0">Qty</th>
                                            <th class="border-top-0">Date</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        @foreach($purchaseData as $key => $rows)
                                        <tr>
                                            <td>
                                                <span class="text-success">{{ $rows->purchase_no }}</span>
                                            </td>
                                            <td>
                                                <i class="cc BTC me-1"></i>
                                                <span class="font-medium">{{ $rows->buying_qty }}</span>
                                            </td>
                                            <td>{{ date('d-m-Y',strtotime($rows->date))  }}</td>
                                        </tr>
                                        @endforeach
                                        <!-- end row -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                end Trade History
                ---------------- -->
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-6">
            <!-- ---------------------
                start Trade History
                ---------------- -->
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Approved Invoice</h4>
                            <h5 class="card-subtitle">Overview of Latest Approved Invoice List</h5>
                        </div>
                    </div>
                    <div class="tab-content mt-3" id="pills-tabContent3">
                        <div
                            class="tab-pane fade show active"
                            id="test7"
                            role="tabpanel"
                            aria-labelledby="pills-home-tab3"
                            >
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th class="border-top-0">Invoice No</th>
                                            <th class="border-top-0">Customer Name</th>
                                            <th class="border-top-0">Date </th>
                                            <th class="border-top-0">Amount</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        @foreach($invoiceData as $key => $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <h5 class="mb-0 fs-4 font-medium">#{{ $item->invoice_no }}</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item['payment']['customer']['name'] }}</td>
                                            <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>
                                            <td class="font-medium">${{ number_format($item['payment']['total_amount'] , 2) }}</td>
                                        </tr>
                                        @endforeach
                                        <!-- end row -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                end Trade History
                ---------------- -->
        </div>
        <!-- column -->
        <!-- column -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- Table -->
    <!-- -------------------------------------------------------------- -->
    <div class="row">
        <div class="col-sm-12">
            <!-- ---------------------
                start Top Selling Products
                ---------------- -->
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Low Stocks </h4>
                            <h5 class="card-subtitle">Overview of Low Stocks</h5>
                        </div>
                    </div>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle no-wrap">
                        <thead>
                            <!-- start row -->
                            <tr class="bg-light">
                                <th class="border-top-0">Products Name</th>
                                <th class="border-top-0">Quantity In</th>
                                <th class="border-top-0">Quantity Out</th>
                                <th class="border-top-0">Quantity Status</th>
                                {{--
                                <th class="border-top-0">Quantity</th>
                                --}}
                                <th class="border-top-0">Supplier</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @php
                            $allData = App\Models\Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->take(10)->get();
                            @endphp
                            @foreach($allData as $key => $item)
                            @php
                            $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
                            $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
                            @endphp
                            <tr>
                                @if ($item->quantity < 101)
                                <td>{{ $item->name }}</td>
                                <td>{{ $buying_total  }}</td>
                                <td>{{ $selling_total  }}</td>
                                <td><label  class="btn d-flex bg-light-danger text-danger font-medium"> Low <span class="badge ms-auto bg-danger">{{ $item->quantity}}</span></label></td>
                                <td> {{ $item['supplier']['name'] }} </td>
                                @else
                                @endif
                            </tr>
                            @endforeach
                            <!-- end row -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ---------------------
                end Top Selling Products
                ---------------- -->
        </div>
    </div>
    <!-- -------------------------------------------------------------- -->
</div>
<!-- -------------------------------------------------------------- -->
<!-- End Container fluid  -->
<!-- -------------------------------------------------------------- -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
{{-- <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
      var data = google.visualization.arrayToDataTable({{ Js::from($result) }});
    
      var options = {
        chart: {
          title: 'Website Performance',
          subtitle: 'Click and Views',
        },
      };
    
      var chart = new google.charts.Bar(document.getElementById('barchart_material'));
    
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script> --}}

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {

    var data = google.visualization.arrayToDataTable({{ Js::from($resultpie) }});

    var options = {
      title: 'My Daily Activities',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>
@endsection
