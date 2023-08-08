@extends('layout.app')

@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color:#F9C5D5;" href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item" style="color:#F2789F">Customers</li>
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
                        <h5 class="card-title" style="color:#F9C5D5">List of all customers</h5>
                        <a href="{{route('addcustomer')}}" style="float: right;">
                            <button type="button" class="btn btn-outline-light">
                                New Customer
                                <i class="bi bi-plus"></i>
                            </button>
                        </a>
                        <br>
                        <br>
                        <!-- Table with stripped rows -->
                        <table class="datatable striped-table" style="background-color: #000000;">
                            <thead>
                                <tr>
                                    <th scope="col">UiD</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <th scope="row">{{$customer->id}}</th>
                                    <td>{{$customer->name}}</td>
                                    <td>
                                        <a href="{{route('editcustomer', $customer->id)}}">
                                            <button type="button" class="btn btn-info">
                                                <i class="bi bi-pen"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('deletecustomer', $customer->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger confirm"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <script src="sweetalert2.all.min.js"></script>
                                    </td>
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