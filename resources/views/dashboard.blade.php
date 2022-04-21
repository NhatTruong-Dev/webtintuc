@extends('layout')
@section('content')
    <div class="row" style="margin-top:30px;margin-left:20px">
        <div class="col-xl-3 col-md-6" style="margin-left:-100px">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    Tổng số danh mục
                    <h2>{{$categories}}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                    <a href="{{route('category.index')}}"  class="small text-white stretched-link">View details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>

                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6" style="margin-left:20px">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    Tổng số bài viết
                    <h2>{{$post}}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                    <a href="{{route('post.index')}}" class="small text-white stretched-link">View details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>

                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6" style="margin-left:20px">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    Tổng số tài khoản
                    <h2>{{$user}}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                    <a href="{{route('users.index')}}" class="small text-white stretched-link">View details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>

                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6" style="margin-left:20px">
            <div class="card bg-facebook text-white mb-4">
                <div class="card-body">
                    Tổng số chuyên mục
                    <h2>{{$thematic}}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                    <a href="{{route('thematic.index')}}"  class="small text-white stretched-link">View details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>

                </div>
            </div>
        </div>
        <div class="chart-container">
            <figure class="highcharts-figure">
                <div id="container-chart" style="width:1100px;margin-top:50px;margin-left:-80px"></div>
            </figure>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script type="text/javascript">
                var chartPost =<?php echo json_encode($chartPost)?>;
                Highcharts.chart('container-chart', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Thống kê bài viết theo tháng'
                    },
                    xAxis: {
                        categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                            'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']
                    },
                    yAxis: {
                        title: {
                            text: 'Số lượng bài viết từng tháng'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'Số bài viết',
                        data: chartPost
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });

            </script>
        </div>
        <div class="canvas">
            <canvas id="income" width="600" height="400"></canvas>
            <script>
                // pie chart data
                var pieData = [
                    {
                        value: 20,
                        color:"#878BB6"
                    },
                    {
                        value : 40,
                        color : "#4ACAB4"
                    },
                    {
                        value : 10,
                        color : "#FF8153"
                    },
                    {
                        value : 30,
                        color : "#FFEA88"
                    }
                ];

                // pie chart options
                var pieOptions = {
                    segmentShowStroke : false,
                    animateScale : true
                }

                // get pie chart canvas
                var countries= document.getElementById("countries").getContext("2d");

                // draw pie chart
                new Chart(countries).Pie(pieData, pieOptions);
            </script>
        </div>
    </div>
@endsection
