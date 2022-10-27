@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales Graph</h3>
                </div>
                <div class="card-body">
                    <canvas class="chart" id="sales-chart" style="height: 250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lates Transaction</h3>
                </div>
                <div class="card-body">
                    Lates transaction here <br/><br/><br/><br>
                </div>
            </div>
        </div>
    </div>
    <script>
        var chart = document.getElementById("sales-chart");
        var areaChart = new Chart(chart, {
            type: 'line',
            data: {
                labels: {!! json_encode($months) !!},
                datasets:[
                    {
                        label: 'Overall Sales',
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: {{ json_encode($totals) }}
                    }
                ]
            }

        });
    </script>
@endsection
