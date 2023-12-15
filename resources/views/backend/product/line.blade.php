@extends('admin.admin_master')
@section('title', 'Dashboard')
@section('admin')
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
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
</script>
</head>
<body>
    <h1>Google Bar Chart Example - ItSolutionStuff.com</h1>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
</body>
</html>
@endsection
