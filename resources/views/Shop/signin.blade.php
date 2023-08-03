<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - AssetTracker</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets\img\favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <h5 class="card-title" style="margin-bottom: 3rem; margin-top:3rem; text-align:center; color:#F2789F">Sign In as Administrator</h5>
    <div class="card" style="max-width: 500px; margin: 0 auto; background-color:#000000">

        <div class="card-body">
            <h5 class="card-title" style="color:#F2789F">Welcome Back</h5>
            <!-- No Labels Form -->
            <form class="row g-3" action="{{route('authadmin')}}" method="post">
                @csrf
                <div class="col-md-12">
                    <input name="email" type="email" class="form-control" placeholder="Email Address" style="background-color: lightgrey;">
                </div>
                <div class="col-md-12">
                    <input name="password" type="password" class="form-control" placeholder="Password.." style="background-color: lightgrey;">
                </div>
                <div class="col-md-12">
                    <button style="width: 100%; " type="submit" class="btn btn-outline-secondary">Continue</button>
                    <p class="nav-heading" style="text-align: center; margin-top:10px; color:white ">Don't have an account? <a href="{{route('signup')}}" style="color: #F2789F;">Sign Up</a></p>
                </div>
            </form><!-- End No Labels Form -->
        </div>
    </div>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('/assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('/assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
        $(".js-example-responsive").select2({
            width: 'resolve' // need to override the changed default
        })
    </script>



</body>

</html>