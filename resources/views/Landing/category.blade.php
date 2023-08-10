@extends('layout.landing')

@section('content')



<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery" style="margin-top: 8rem;">
        <div class="section-header">
            <h2 style="margin-left: 4rem;">Total of {{$numberofproducts}} varieties</h2>
            <p style="margin-left: 4rem;">All {{$category->name}} Products</p>
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
    </section><!-- End Gallery Section -->

</main><!-- End #main -->

@endsection