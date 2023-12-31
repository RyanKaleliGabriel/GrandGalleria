@extends('layout.app')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Product Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" style="color:#F9C5D5;">Home</a></li>
                <li class="breadcrumb-item" style="color:#F2789F">Category</li>
                <li class="breadcrumb-item active" style="color:#F2789F">Update</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card" style="background-color:#000000; height: auto">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#F9C5D5">Update {{$category->name}}</h5>
                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{route('updatecategory', $category->id)}}" method="post" id="categoryForm">
                            @csrf
                            @method('PUT')
                            @if(Auth::check())
                            <div class="col-md-12">
                                <input type="hidden" name="shop_id" value="{{Auth::user()->id}}">
                            </div>
                            @endif
                            <div class="col-md-12">
                                <input value="{{$category->name}}" placeholder="Enter category name..." style="background-color: lightgrey;" type="text" name="name" class="form-control" id="inputName5">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-light confirm" style="float: right;">Save</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                        <script src="sweetalert2.all.min.js"></script>
                        <script src="sweetalert2/dist/sweetalert2.min.js"></script>
                        <script>
                            // Get the device form element
                            var form = document.getElementById('categoryForm');

                            // Submit event listener for the form
                            form.addEventListener('submit', function(event) {
                                // Prevent the form from submitting
                                event.preventDefault();

                                // Check if the form is valid
                                if (form.checkValidity()) {
                                    // Configure SweetAlert alert
                                    Swal.fire({
                                        title: 'Proceed to update this Category?',
                                        cancelButtonText: 'Cancel',
                                        icon: 'question',
                                        background: 'black',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
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
            </div>


        </div>
    </section>
</main><!-- End #main -->




@endsection