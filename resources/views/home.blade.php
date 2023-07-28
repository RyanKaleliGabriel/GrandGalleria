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
                                        <h6 style="color:#F2789F">1234</h6>
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
                                        <h6 style="color:#F2789F">24</h6>
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
                                        <h6 style="color:#F2789F">34</h6>
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
                                        <h6 style="color:#F2789F">54</h6>
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
                <div class="col-lg-8">
                    <div class="card" style="background-color: #000000;">
                        <h5 class="card-title" style="margin-left: 20px; color:#F2789F">Devices per Category</h5>
                        <div class="card-body" style="height: 300px;">
                        </div>
                    </div>
                </div><!-- End Reports -->

                <!-- <div class="card" style="background-color: #000000;">
                    <h5 class="card-title" style="margin-left: 20px; color:#F2789F">Students in Each Department</h5>
                    <div class="card-body pb-0">
                    </div>
                </div> -->
            </div>
    </section>

</main><!-- End #main -->




@endsection