@extends('layout.landing')

@section('content')

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 style="color: #27a776;">Subscribe</h2>
                    <p style="color: black;">Stay in the loop! Subscribe now for instant notifications on exclusive offers, exciting updates, and more. Don't miss out, join our notification squad today.</p>
                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center mt-4">

                <div class="col-lg-9">
                    <form id="customerForm" action="{{route('subscribecustomer')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="hidden" value="{{$shop->id}}" name="shop_id">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" style="color: black;">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" style="color: black;">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center"><button type="submit">Subscribe</button></div>
                    </form>
                </div><!-- End Contact Form -->
                <script src="sweetalert2.all.min.js"></script>
                <script src="sweetalert2/dist/sweetalert2.min.js"></script>
                <script>
                    // Get the device form element
                    var form = document.getElementById('customerForm');

                    // Submit event listener for the form
                    form.addEventListener('submit', function(event) {
                        // Prevent the form from submitting
                        event.preventDefault();

                        // Check if the form is valid
                        if (form.checkValidity()) {
                            // Configure SweetAlert alert
                            Swal.fire({
                                title: 'Proceed to subscribe?',
                                cancelButtonText: 'Cancel',
                                icon: 'question',
                                background: 'white',
                                showCancelButton: true,
                                confirmButtonColor: '#27a776',
                                cancelButtonColor: '#000',
                                confirmButtonText: 'Proceed'
                            }).then(function(result) {
                                // If the user confirms, submit the form
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        } else {
                            form.classList.add('was-validated');
                        }
                    });
                </script>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection