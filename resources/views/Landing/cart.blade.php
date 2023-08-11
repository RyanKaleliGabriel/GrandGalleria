@extends('layout.landing')

@section('content')


<main id="main" data-aos="fade" data-aos-delay="1500">



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" style="margin-top: 5rem; width: 100%">
            <div class="row gy-4">
                @if($cart->isEmpty())
                <div class="col-xl-12 col-md-6 d-flex">
                    <div class="service-item position-relative">
                        <i class="bi bi-dash-circle-fill"></i>
                        <!-- <img src="{{ url('shop_images/'.$shop->image)}}" alt="" height="50" width="50" class="rounded-circle"> -->
                        <h4><a href="{{route('freshmart')}}" class="stretched-link" style="color:black">Continue Shopping</a></h4>
                        <p>No Items on Cart</p>
                        <hr>
                    </div>
                </div><!-- End Service Item -->
                @else
                @foreach($cart as $item)
                <div class="col-xl-12 col-md-6 d-flex">
                    <div class="cart service-item position-relative">
                        <img src="{{ url('product_images/'.$item->attributes->image)}}" alt="" height="50" width="50" class="rounded-circle">
                        <div class="item-details">
                            <h5>{{$item->name}}</a></h5>
                            <h5>Kes:{{$item->price}}</h5>
                            <p>Quantity: {{$item->quantity}}</p>
                        </div>
                        <form method="post" action="{{route('addupdate', $item->id)}}">
                            <button type="submit" style="border: none; background:none;">
                                <i class="bi bi-plus"></i>
                            </button>
                        </form>
                        <form method="post" action="{{route('minusupdate', $item->id)}}">
                            <button type="submit" style="border: none; background:none;">
                                <i class="bi bi-dash"></i>
                            </button>
                        </form>

                        <a href="{{route('removefromcart',$item->id)}}">
                            <i class="bi bi-trash"></i>
                        </a>
                        <hr>
                    </div>
                </div><!-- End Service Item -->
                @endforeach
                @endif
            </div>
        </div>
    </section><!-- End Services Section -->


    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-left">
                <div class="col-lg-4 text-left">
                    <a class="cta-btn" href="contact.html">Checkout</a>
                    <a class="clearcart" href="contact.html">Clear Cart</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->



</main><!-- End #main -->
@endsection