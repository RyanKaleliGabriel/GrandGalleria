@extends('layout.app')



@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" style="color:#F9C5D5;">Home</a></li>
                <li class="breadcrumb-item" style="color:#F2789F">Product</li>
                <li class="breadcrumb-item active" style="color:#F2789F">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card" style="background-color:#000000; height: auto">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#F9C5D5">Add new Product</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{route('storeproduct')}}" method="post" id="productForm" enctype="multipart/form-data">
                            @csrf
                            @if(Auth::check())
                            <div>
                                <input type="hidden" name="shop_id" value="{{Auth::user()->id}}">
                            </div>
                            @endif
                            <div class="col-md-6">
                                <input placeholder="Enter product name..." style="background-color: lightgrey;" type="text" name="name" class="form-control" id="inputName5">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <select id="inputState2" name="category_id" style="background-color: lightgrey;" class="form-control js-example-responsive">
                                    @foreach($categories as $category)
                                    <option style="color: black;" value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Enter product price" style="background-color: lightgrey;" type="text" name="price" class="form-control" id="inputName5">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Quantity" style="background-color: lightgrey;" type="text" name="quantity" class="form-control" id="inputName5">
                                @error('quantity')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input style="background-color: lightgrey;" class="form-control" name="image" type="file" id="formFile">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <textarea maxlength="234" placeholder="Describe this product" rows="5" cols="50" style="background-color: lightgrey; width:100%" class="form-control" name="description"></textarea>
                                @error('description')
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
                            var form = document.getElementById('productForm');

                            // Submit event listener for the form
                            form.addEventListener('submit', function(event) {
                                // Prevent the form from submitting
                                event.preventDefault();

                                // Check if the form is valid
                                if (form.checkValidity()) {
                                    // Configure SweetAlert alert
                                    Swal.fire({
                                        title: 'Proceed to add new product?',
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