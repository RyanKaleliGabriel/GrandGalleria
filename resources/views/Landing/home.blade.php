@extends('layout.landing')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <h2>Journey through<span>orchard dreams</span> we weave</h2>
        <p>Where fruits, vegetables, juices breathe.
          Nature's palette, vibrant and pure,
          FreshMart, where cravings allure.</p>
        <a href="contact.html" class="btn-get-started">Start Shopping</a>
      </div>
    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="section-header">
      <h2 style="margin-left: 4rem;">Total of {{$numberofproducts}} varieties</h2>
      <p style="margin-left: 4rem;">All Products</p>
    </div>
    <div class="container-fluid">
      <div class="row gy-4 justify-content-center">
        @foreach($products as $product)
        <div class="testimonial-item col-xl-4 col-lg-4 col-md-6" style="text-align:center; padding:7px">
          <div class="profile mt-auto">
            <img src="{{ url('product_images/'.$product->image)}}" class="testimonial-img" height="150" width="150" alt="">
            <p>{{$product->name}}</p>
            <p class="price">Ksh:{{$product->price}}</p>
          </div>
          <button class="add-btn">Add to Cart</button>
        </div>
        @endforeach
      </div>
    </div>


    <div class="card" style="border: none; margin-top:5px;">
      <div class="card-body text-center" style="text-align: center;">
        <!-- Pagination with icons -->
        <nav aria-label="Page navigation example">
          <ul class="pagination d-flex justify-content-center">
            <li class="page-item {{ $products->currentPage() == 1 ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            @for ($i = 1; $i <= $products->lastPage(); $i++)
              <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
              </li>
              @endfor
              <li class="page-item  {{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
          </ul>
        </nav><!-- End Pagination with icons -->
      </div>
    </div>
  </section><!-- End Gallery Section -->
  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center" style="background-color: #27a776;">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Contact</h2>
          <p>Get in touch with our online store for any assistance you need. We're here to help with your questions, orders, and feedback. Reach out via email, phone, or our contact page – we're committed to ensuring your shopping experience is smooth and enjoyable</p>

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact" style="background-color: #27a776;">
    <div class="container">

      <div class="row gy-4 justify-content-center">

        <div class="col-lg-3">
          <div class="info-item d-flex">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h4>Location:</h4>
              <p>{{$shop->address}}</p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-lg-3">
          <div class="info-item d-flex">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h4>Email:</h4>
              <p>{{$shop->email}}</p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-lg-3">
          <div class="info-item d-flex">
            <i class="bi bi-phone flex-shrink-0"></i>
            <div>
              <h4>Call:</h4>
              <p>{{$shop->phone}}</p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="header-social-links">
          @if($shop->twitter)
          <a href="{{$shop->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
          @endif
          @if($shop->facebook)
          <a href="{{$shop->facebook}}" class="facebook"><i class="bi bi-facebook"></i></a>
          @endif
          @if($shop->instagram)
          <a href="{{$shop->instagram}}" class="instagram"><i class="bi bi-instagram"></i></a>
          @endif
          @if($shop->linkedin)
          <a href="{{$shop->linkedin}}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
          @endif
        </div>
      </div>

      <div class="row justify-content-center mt-4">
      </div>

    </div>
  </section><!-- End Contact Section -->




</main><!-- End #main -->

@endsection