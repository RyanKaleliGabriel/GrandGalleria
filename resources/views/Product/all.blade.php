@extends('layout.app')

@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color:#F9C5D5;" href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item" style="color:#F2789F">Products</li>
                <li class="breadcrumb-item active" style="color:#F2789F">all</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="background-color: #000000;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#F9C5D5">List of all products</h5>
                        <a href="{{route('addproduct')}}" style="float: right;">
                            <button type="button" class="btn btn-outline-light">
                                Add New
                                <i class="bi bi-plus"></i>
                            </button>
                        </a>
                        <br>
                        <br>
                        <!-- Table with stripped rows -->
                        <table class="datatable striped-table" style="background-color: #000000;">
                            <thead>
                                <tr>
                                    <th scope="col">Product Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#verticalycentered-{{$product->id}}">
                                            <i class="bi bi-info"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="">
                                            <button type="button" class="btn btn-outline-info">
                                                <i class="bi bi-pen"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger confirm"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <!-- <script src="sweetalert2.all.min.js"></script>
                                        <script>
                                            // Get all elements with the 'confirm' class
                                            var confirmButtons = document.getElementsByClassName('confirm');

                                            // Iterate over each confirm button
                                            Array.from(confirmButtons).forEach(function(button) {
                                                button.addEventListener('click', function(event) {
                                                    // Get the closest form to the button
                                                    var form = button.closest('form');

                                                    // Prevent the default form submission
                                                    event.preventDefault();

                                                    // Configure SweetAlert alert as you wish
                                                    Swal.fire({
                                                        title: 'Are you sure you want to delete?',
                                                        text: "You won't be able to revert this!",
                                                        cancelButtonText: "Cancel",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Delete'
                                                    }).then(function(result) {
                                                        // In case of deletion confirmation, submit the form
                                                        if (result.isConfirmed) {
                                                            form.submit();
                                                            Swal.fire({
                                                                position: 'top-end',
                                                                icon: 'success',
                                                                title: 'Deleted Successfully',
                                                                showConfirmButton: false,
                                                                timer: 1500
                                                            });
                                                        }
                                                    });
                                                });
                                            });
                                        </script> -->
                                    </td>
                                        <div class="modal fade" id="verticalycentered-{{$product->id}}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Card with an image on left -->
                                                    <div class="card mb-3" style="background-color: #1A1A1B;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img style="background-color: #1A1A1B;" src="{{ url('product_images/'.$product->image)}}" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body" style="background-color: #1A1A1B;">
                                                                    <h5 class="card-title" style="color:#F2789F">{{$product->name}}</h5>
                                                                    <p class="card-text" style="color:white">Stock: {{$product->quantity}}</p>
                                                                    <p class="card-text" style="color:white">Retailing at: {{$product->price}}</p>
                                                                    <p class="card-text" style="color:white">{{$product->description}}</p>
                                                                    <p class="card-text" style="color:white">Item of: {{$product->shop->name}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Card with an image on left -->
                                                    <div class="modal-footer" style="background-color: #1A1A1B;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End Vertically centered Modal-->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->

@endsection