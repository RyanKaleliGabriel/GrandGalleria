@extends('layout.landing')
@section('content')


<div class="page-header d-flex align-items-center">
    <div class="container position-relative">
        <div class="row justify-content-left">
            <div class="col-lg-6 text-left">
                <h5 style="color: #27a776;">M-Pesa Payment</h5>
                <p style="color: black;"></p>
                <form action="post">
                    <input style="width: 50%; margin-bottom:10px;" class="form-control" placeholder="Enter your Phone Number">
                    <button style="border: none;" type="submit" class="clearcart" href="contact.html">Pay</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h4 style="color: #27a776;">Order Summary</h4>
                <p style="color: #000;">All {{$itemCount}} items</p>
                <div>
                @foreach($cart as $item)
                <img src="{{ url('product_images/'.$item->attributes->image)}}" alt="" height="50" width="50" class="">
                <h5 class="d-line">{{$item->name}}</h5>
                <span>Kes: {{$item->price}}</span>
                <hr/>
                @endforeach
                <hr/> 
                <h5>Total Price: KES {{Cart::getTotal()}}</h5>
                <hr/>
                </div>
            </div>

        </div>
    </div>
</div><!-- End Page Header -->



@endsection