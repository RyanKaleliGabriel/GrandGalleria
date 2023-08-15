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
                            <h5>{{$item->name}}</h5>
                            <form action="{{route('updatecart', $item->id)}}" method="post">
                                @csrf
                                <input name="price" class="form-control" value="Kes: {{$item->price}}" style="background:none;border: none;width: 10%; margin-bottom:3px">
                                <h5 style="margin-bottom: 3px;">Quantity:</h5>
                                <input name="id" type="hidden" value="{{$item->id}}">
                                <input name="quantity" class="form-control" value="{{$item->quantity}}" style="width: 10%; margin-bottom:3px">
                                <button type="submit" style="color:aliceblue;border: none; background-color:#2cbc85; border-radius:17px; padding:5px;">
                                    Update
                                </button>
                                @error('quantity')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </form>
                        </div>
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
                <h5>Total: Kes: {{ Cart::getTotal() }} </h5>
                <div class="col-lg-4 text-left">
                    <form class="d-inline" action="{{route('checkout')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$shop->id}}" name="shop_id">
                        <input type="hidden" value="{{Cart::getTotal()}}" name="amount">
                        <button class="cta-btn" href="{{route('checkout')}}">Checkout</>
                    </form>

                    <form class="d-inline" action="{{route('clearcart')}}" method="post">
                        @csrf
                        <button style="border: none;" type="submit" class="clearcart">Clear Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->



</main><!-- End #main -->
@endsection