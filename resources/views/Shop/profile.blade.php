@extends('layout.app')



@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" style="color:#F9C5D5;">Home</a></li>
                <li class="breadcrumb-item" style="color:#F2789F">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xl-4">
                <div class="card" style="background-color:#000000; height: auto">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ url('shop_images/'.Auth::user()->image)}}" height="150" width="150" alt="Profile" class="rounded-circle">
                        <h2 style="color:#F2789F">{{Auth::user()->name}}</h2>
                        <div class="social-links mt-2">
                            @if(Auth::user()->twitter)
                            <a href="{{Auth::user()->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
                            @endif
                            @if(Auth::user()->facebook)
                            <a href="{{Auth::user()->facebook}}" class="facebook"><i class="bi bi-facebook"></i></a>
                            @endif
                            @if(Auth::user()->instagram)
                            <a href="{{Auth::user()->instagram}}" class="instagram"><i class="bi bi-instagram"></i></a>
                            @endif
                            @if(Auth::user()->linkedin)
                            <a href="{{Auth::user()->linkedin}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card" style="background-color:#000000; height: auto">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" style="color:#F2789F">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" style="color:#F2789F">Edit Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title" style="color:#F2789F">About</h5>
                                <p class="small fst-italic" style="color: #F9C5D5;">{{Auth::user()->description}}</p>

                                <h5 class="card-title" style="color:#F2789F">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label" style="color: white;">Organization:</div>
                                    <div class="col-lg-9 col-md-8" style="color: #F9C5D5;">{{Auth::user()->name}}</div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label" style="color: white;">Phone:</div>
                                    <div class="col-lg-9 col-md-8" style="color: #F9C5D5;">{{Auth::user()->phone}}</div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label" style="color: white;">Email:</div>
                                    <div class="col-lg-9 col-md-8" style="color: #F9C5D5;">{{Auth::user()->email}}</div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label" style="color: white;">State:</div>
                                    <div class="col-lg-9 col-md-8" style="color: #F9C5D5;">{{Auth::user()->state}}</div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label" style="color: white;">Address:</div>
                                    <div class="col-lg-9 col-md-8" style="color: #F9C5D5;">{{Auth::user()->address}}</div>
                                </div>
                                <br />
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{route('updateprofile', Auth::user()->id)}}" method="post" id="profileForm" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img height="150" width="150" src="{{ url('shop_images/'.Auth::user()->image)}}" alt="Profile">
                                            <div class="col-md-12">
                                                <label for="updateImage" class="form-label" style="color:white">Update Image?</label>
                                                <input type="checkbox" id="updateImage" name="update_image" value="1">
                                            </div>
                                            <div class="pt-2 hidden-image-input" style="display: none;">
                                            <input class="form-control block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" name="image" type="file" id="formFile" style="background-color: lightgrey; ">
                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <script>
                                                const updateImageCheckbox = document.getElementById('updateImage');
                                                const hiddenImageInput = document.querySelector('.hidden-image-input');
                                                const imageIcon = document.querySelector('image-icon');

                                                updateImageCheckbox.addEventListener('click', function() {
                                                    hiddenImageInput.style.display = this.checked ? 'block' : 'none'
                                                    imageIcon.style.display = this.checked? 'block':'none'
                                                });
                                            </script>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Organization Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName" value="{{Auth::user()->name}}">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea maxlength="234" name="description" class="form-control" id="about" style="height: 100px">{{Auth::user()->description}}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">State</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="state" type="text" class="form-control" id="company" value="{{Auth::user()->state}}">
                                            @error('state')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Job" value="{{Auth::user()->phone}}">
                                            @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{Auth::user()->email}}">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="address" class="form-control" id="Email" value="{{Auth::user()->address}}">
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Twitter Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input value="{{Auth::user()->twitter}}" name="twitter" type="text" class="form-control" id="Twitter">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Facebook Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input value="{{Auth::user()->facebook}}" name="facebook" type="text" class="form-control" id="Facebook">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Instagram Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input value="{{Auth::user()->instagram}}" name="instagram" type="text" class="form-control" id="Instagram">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label" style="color: #F9C5D5;">Linkedin Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input value="{{Auth::user()->linkedin}}" name="linkedin" type="text" class="form-control" id="Linkedin">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                                <script src="sweetalert2.all.min.js"></script>
                                <script src="sweetalert2/dist/sweetalert2.min.js"></script>
                                <script>
                                    // Get the device form element
                                    var form = document.getElementById('profileForm');

                                    // Submit event listener for the form
                                    form.addEventListener('submit', function(event) {
                                        // Prevent the form from submitting
                                        event.preventDefault();

                                        // Check if the form is valid
                                        if (form.checkValidity()) {
                                            // Configure SweetAlert alert
                                            Swal.fire({
                                                title: 'Proceed to update?',
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

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>


@endsection