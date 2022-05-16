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
                        categories: [ 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
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

        <div class="table-responsive" style="margin-left:-80px;margin-top:50px" >
            <h3>Top 10 bài viết mới nhất</h3>
            <table class="table">
                <thead>
                <tr style="text-align: center">
                    <th>#</th>
                    <th style="width: 150px">Tiêu đề</th>
                    <th style="width:200px">Hình ảnh</th>
                    <th style="width: 180px">Phụ đề</th>
                    <th style="width: 150px">Danh mục</th>
                    <th style="width: 150px">Thời gian tạo</th>
                    <th style="width:300px">Nội dung</th>
                    <th style="width:220px !important;">Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $item)
                    <tr class="bang">
                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                        <td style="vertical-align: middle">{{ $item->title }}</td>
                        <td style="vertical-align: middle"><img src="{{$item->image}}" width="140px"></td>
                        <td style="overflow: hidden;vertical-align: middle;text-overflow: ellipsis;-webkit-line-clamp:6;display: -webkit-box;-webkit-box-orient: vertical;height:160px">{{ $item->sub_title }}</td>
                        <td style="vertical-align: middle;text-align: center">{{ $item->category->name }}</td>
                        <td style="vertical-align: middle">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                        <td style="vertical-align: middle ;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp:6;display: -webkit-box;-webkit-box-orient: vertical;height:160px">{!!strip_tags( $item->details)  !!}}</td>

                        <td style="vertical-align: middle">
                            <a href="{{ url('/post/' . $item->id) }}" title="View "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection
