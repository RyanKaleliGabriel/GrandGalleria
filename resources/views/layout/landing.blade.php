<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FreshMart - E-Commerce</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assetslanding/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assetslanding/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assetslanding/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetslanding/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assetslanding/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetslanding/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetslanding/vendor/aos/aos.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="sweetalert2.min.css">

  <!-- Template Main CSS File -->
  <link href="{{asset('assetslanding/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="{{route('freshmart')}}" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ url('shop_images/'.$shop->image)}}" alt="" height="50" width="50" class="rounded-circle">
        <!-- <i class="bi bi-camera"></i> -->
        <h1>{{$shop->name}}</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('freshmart')}}" class="active">Home</a></li>
          <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach($categories as $category)
              <li><a href="{{route('freshmartcategory', $category->id)}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="{{route('subscribe')}}">Subscribe</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="{{route('cartlist')}}" class="twitter">
          <i class="bi bi-cart flex-shrink-0" style="font-size: 1.5rem;"></i>
          <span class="badge bg-primary badge-number" style="color:white; font-size: 15px; background-color:#27a776">0</span></span>
        </a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->


  @yield('content')



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>PhotoFolio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
      <div class="header-social-links d-flex justify-content-center">
        @if($shop->twitter)
        <a href="{{$shop->twitter}}" class="twitter" style="padding: 5px;"><i class="bi bi-twitter"></i></a>
        @endif
        @if($shop->facebook)
        <a href="{{$shop->facebook}}" class="facebook" style="padding: 5px;"><i class="bi bi-facebook"></i></a>
        @endif
        @if($shop->instagram)
        <a href="{{$shop->instagram}}" class="instagram" style="padding: 5px;"><i class="bi bi-instagram"></i></a>
        @endif
        @if($shop->linkedin)
        <a href="{{$shop->linkedin}}" class="linkedin" style="padding: 5px;"><i class="bi bi-linkedin"></i></i></a>
        @endif
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assetslanding/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assetslanding/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assetslanding/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assetslanding/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assetslanding/vendor/php-email-form/validate.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('assetslanding/js/main.js')}}"></script>

</body>

</html>