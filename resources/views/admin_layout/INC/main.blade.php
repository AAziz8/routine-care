@extends('admin_layout.master')
@section('content')
    <?php

    $usercounts = \App\helpers:: userscount();
    $productcounts = \App\helpers:: productcount();
    $userproductcounts = \App\helpers:: userproductcounts();

    ?>

    <style>


        .small-box {
            border-radius: 10px;
            box-shadow: 0 2px 4px;
            background-color: #444a4a;
            padding: 10px;
            transition: transform 0.3s ease;
        }

        .small-box:hover {
            transform: scale(1.05);
        }

        .small-box .icon {
            font-size: 48px;
            color: white;
            margin-bottom: 5px;
        }

        .small-box h3 {
            font-size: 28px;
            margin-bottom: 0;
            color: white;
        }

        .small-box p {
            font-size: 16px;
            color: white;
            margin-bottom: 0;
        }

        .small-box-footer {
            display: block;
            font-size: 14px;
            color: white;
            margin-top: 5px;
            transition: color 0.3s ease;

        }

        .small-box-footer:hover {
            color: black;
        }
    </style>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Dashboard
                </h3>
            </div>


            <div class="row grid-margin">
                <div class="col-lg-12 col-sm-12">


                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <a href="{{url('users')}}" style="text-decoration: none">
                                <div class="card-body">
                                    <div class="small-box text-center">
                                        <div class="icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <div class="inner">
                                            <h3>{{$usercounts}}</h3>
                                            <p>User Registers</p>
                                        </div>
                                        <a href="{{url('users')}}" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 grid-margin stretch-card">
                            <a href="{{url('posts')}}" style="text-decoration: none">
                                <div class="card-body">
                                    <div class="small-box text-center">
                                        <div class="icon">
                                            <i class="fa fa-newspaper"></i>
                                        </div>
                                        <div class="inner">
                                            <h3>{{$productcounts}}</h3>
                                            <p>Total Products</p>
                                        </div>
                                        <a href="{{url('products')}}"  class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card-body">
                                <div class="small-box text-center">
                                    <div class="icon">
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                    <div class="inner">
                                        <h4 style="color: white">Most Products</h4>
                                        @if ($userproductcounts)
                                            <b style="color: white">{{ $userproductcounts->name }}</b>
                                        @else
                                            No users found with products
                                        @endif
                                    </div>
                                    <p style="display: block; font-size: 14px; color: white; margin-top: 5px;">Total
                                        Products: {{ $userproductcounts->post_count }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card col-lg-6">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <i class="fa fa-newspaper"></i>
                                        Products Monthly
                                    </h4>
                                    <canvas id="posts-chart"></canvas>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <i class="fas fa-chart-line"></i>
                                        Products by Year
                                    </h4>
                                    <div class="chart-container">
                                        <canvas id="line-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            @endsection

            @push('js')


                <script>
                    // Make an AJAX request to fetch the chart data
                    fetchChartdata();

                    function fetchChartdata() {
                        fetch("{{ route('posts.chart') }}")
                            .then(response => response.json())
                            .then(data => {
                                createChart(data.months, data.totalPosts);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }

                    function createChart(months, totalPosts) {
                        var ctx = document.getElementById('posts-chart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: months,
                                datasets: [{
                                    label: 'Total Products',
                                    data: totalPosts,
                                    backgroundColor: 'rgba(75, 192, 192, 0.8)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                // Customize chart options as needed
                            }
                        });
                    }
                </script>


                <script>
                    function updateLineChart() {
                        $.ajax({
                            url: "{{ route('get.posts.data') }}",
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                var years = data.map(item => item.year);
                                var postCounts = data.map(item => item.count);

                                var ctx = document.getElementById('line-chart').getContext('2d');

                                // Destroy the previous Line Chart instance if it exists
                                if (window.lineChart !== undefined) {
                                    window.lineChart.destroy();
                                }

                                var lineChartOptions = {
                                    type: 'line',
                                    data: {
                                        labels: years,
                                        datasets: [{
                                            label: 'Number of Products',
                                            data: postCounts,
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderWidth: 2,
                                            fill: true
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false, // Allow custom size
                                        scales: {
                                            x: {
                                                display: true,
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Year'
                                                }
                                            },
                                            y: {
                                                display: true,
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Number of Products'
                                                },
                                                ticks: {
                                                    beginAtZero: true,
                                                    precision: 0
                                                }
                                            }
                                        },
                                        plugins: {
                                            legend: {
                                                display: false
                                            }
                                        }
                                    }
                                };


                                var chartContainer = document.querySelector('.chart-container');
                                var desiredWidth = 450;
                                var desiredHeight = 300;
                                chartContainer.style.width = desiredWidth + 'px';
                                chartContainer.style.height = desiredHeight + 'px';

                                window.lineChart = new Chart(ctx, lineChartOptions);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }

                    updateLineChart();
                </script>

    @endpush
