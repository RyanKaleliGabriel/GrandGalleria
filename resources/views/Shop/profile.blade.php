@extends('layout.app')



@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" style="color:#F9C5D5;">Home</a></li>
                <li class="breadcrumb-item" style="color:#F2789F">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xl-12">
                <div class="card" style="background-color:#000000; height: auto">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ url('shop_images/'.Auth::user()->image)}}" height="150" width="150" alt="Profile" class="rounded-circle">
                        <h2 style="color:#F2789F">{{Auth::user()->name}}</h2>
                        <h5 style="color: #F9C5D5;">{{Auth::user()->description}}</h5>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>


@endsection