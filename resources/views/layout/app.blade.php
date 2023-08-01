<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title style="font-family: 'Satisfy', cursive;">GrandGalleria</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets\img\favicon.png" rel="icon"> -->
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

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

</head>

<body>


    <!-- ======= Header ======= -->
    <header style="background-color: #000000;" id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <i style="color:#F2789F" class="sidebar-icon bi bi-list toggle-sidebar-btn"></i>
            <a href="{{route('home')}}" class="logo d-flex align-items-center">
                <!-- <img src="{{asset('assets/img/logo.png')}}" alt=""> -->
                <span style="font-family: 'Satisfy', cursive; color:#F2789F" class="d-none d-lg-block">GrandGalleria</span>
            </a>

        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" style="color:#F9C5D5;">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number" style="color:white;">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="background-color: #000000; color:#F9C5D5;">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>
                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->






                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="background-color: #000000; color:#F9C5D5;">
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html" style="color:#F9C5D5;">
                                <i class="bi bi-person"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" style="color:#F9C5D5;">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            </ul>




        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->



    <!-- ======= Sidebar ======= -->
    <aside style="background-color:#000000" id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a style="background-color: #000000; color:#F9C5D5;" class="nav-link " href="{{route('home')}}">
                    <i style="color:#F9C5D5;" class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Main Operations</li>

            <li class="nav-item">
                <a style="background-color: #000000; color:#F9C5D5;" class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i style="color:#F9C5D5;" class="bi bi-cart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i style="color:#F9C5D5;" class="bi bi-circle"></i><span>List</span>
                        </a>
                    </li>
                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i style="color:#F9C5D5;" class="bi bi-circle"></i><span>Pending</span>
                        </a>
                    </li>
                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i style="color:#F9C5D5;" class="bi bi-circle"></i><span>Completed</span>
                        </a>
                    </li>
                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i style="color:#F9C5D5;" class="bi bi-circle"></i><span>Cancelled</span>
                        </a>
                    </li>


                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a style="background-color: #000000; color:#F9C5D5;" class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i style="color:#F9C5D5;" class="bi bi-people"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i style="color:#F9C5D5;" class="bi bi-circle"></i><span>List</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a style="background-color: #000000;color:#F9C5D5;" class="nav-link collapsed" data-bs-target="#table-nav" data-bs-toggle="collapse" href="#">
                    <i style="color:#F9C5D5;" class="bi bi-view-stacked"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="table-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i class="bi bi-circle"></i><span>List</span>
                        </a>
                    </li>

                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i class="bi bi-circle"></i><span>Category</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->
            <li class="nav-item">
                <a style="background-color: #000000;color:#F9C5D5;" class="nav-link collapsed" data-bs-target="#t-nav" data-bs-toggle="collapse" href="#">
                    <i style="color:#F9C5D5;" class="bi bi-cash"></i><span>Transactions</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="t-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i class="bi bi-circle"></i><span>List</span>
                        </a>
                    </li>

                    <li>
                        <a style="color:#F9C5D5;" href="">
                            <i class="bi bi-circle"></i><span>Statements</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-heading">Administrator</li>

            <li class="nav-item">
                <a style="background-color: #000000; color:#F9C5D5;" class="nav-link collapsed" href="">
                    <i style="color:#F9C5D5;" class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <form action="" method="post">

                    <button style="background-color: #000000; color:#F9C5D5;" type="submit" class="nav-link collapsed" href="">
                        <i style="color:#F9C5D5;" class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li><!-- End Profile Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    @yield('content')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div style="color:#F2789F" class="copyright">
            &copy; Copyright <strong><span>Ryan</span></strong>. All Rights Reserved
        </div>
        <div style="color:#F2789F" class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a style="color:#F9C5D5;" href="https://bootstrapmade.com/">Ryan Kaleli</a>
        </div>
    </footer><!-- End Footer -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>


    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
        $(".js-example-responsive").select2({
            width: 'resolve' // need to override the changed default
        })
    </script>

</body>

</html>