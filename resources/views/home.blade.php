@extends('layout.app')

@section('content')



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color:#F9C5D5;" href="{{route('home')}}">Home</a></li>
                <li style="color:#F2789F" class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card sales-card" style="background-color: #000000;">
                            <div class="card-body">
                                <h5 style="color:#F2789F" class="card-title">Transactions </h5>
                                <div class="d-flex align-items-center">
                                    <div style="background-color: #1A1A1B;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style="color: white;" class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 style="color:#F2789F">{{$transactions}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card revenue-card" style="background-color: #000000;">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#F2789F">Orders</h5>
                                <div class="d-flex align-items-center">
                                    <div style="background-color: #1A1A1B;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style="color:white" class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 style="color:#F2789F">{{$orders}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card sales-card" style="background-color: #000000;">
                            <div class="card-body">
                                <h5 style="color:#F2789F" class="card-title">Products</h5>
                                <div class="d-flex align-items-center">
                                    <div style="background-color: #1A1A1B;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style="color: white;" class="bi bi-view-stacked"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 style="color:#F2789F">{{$products}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card sales-card" style="background-color: #000000;">
                            <div class="card-body">
                                <h5 style="color:#F2789F" class="card-title">Customers </h5>
                                <div class="d-flex align-items-center">
                                    <div style="background-color: #1A1A1B;" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style="color: white;" class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 style="color:#F2789F">{{$customers}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div><!-- End Left side columns -->



            <!-- Right side columns -->

            <div class="col-lg-12">
                <!-- Reports -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card" style="background-color: #000000;">
                            <div class="card-body">
                                <h5 class="card-title"  style="margin-left: 20px; color:#F2789F">Bar Chart</h5>

                                <!-- Bar Chart -->
                                <div id="barChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#barChart")).setOption({
                                            xAxis: {
                                                type: 'category',
                                                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                                            },
                                            yAxis: {
                                                type: 'value'
                                            },
                                            series: [{
                                                data: [120, 200, 150, 80, 70, 110, 130],
                                                type: 'bar'
                                            }]
                                        });
                                    });
                                </script>
                                <!-- End Bar Chart -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card" style="background-color: #000000;">
                            <div class="card-body">
                                <h5 class="card-title" style="margin-left: 20px; color:#F2789F">Radar Chart</h5>

                                <!-- Radar Chart -->
                                <div id="radarChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#radarChart")).setOption({
                                            legend: {
                                                data: ['Allocated Budget', 'Actual Spending']
                                            },
                                            radar: {
                                                // shape: 'circle',
                                                indicator: [{
                                                        name: 'Sales',
                                                        max: 6500
                                                    },
                                                    {
                                                        name: 'Administration',
                                                        max: 16000
                                                    },
                                                    {
                                                        name: 'Information Technology',
                                                        max: 30000
                                                    },
                                                    {
                                                        name: 'Customer Support',
                                                        max: 38000
                                                    },
                                                    {
                                                        name: 'Development',
                                                        max: 52000
                                                    },
                                                    {
                                                        name: 'Marketing',
                                                        max: 25000
                                                    }
                                                ]
                                            },
                                            series: [{
                                                name: 'Budget vs spending',
                                                type: 'radar',
                                                data: [{
                                                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                        name: 'Allocated Budget'
                                                    },
                                                    {
                                                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                        name: 'Actual Spending'
                                                    }
                                                ]
                                            }]
                                        });
                                    });
                                </script>
                                <!-- End Radar Chart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->




@endsection