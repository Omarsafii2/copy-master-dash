<header class="banner">


    <x-comNav :profileImg="$profileImg">
        <x-slot:title>
            Edit Post
        </x-slot:title>

            
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message" style="transition: opacity 0.5s;">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.opacity = '0'; // Start fading out
                setTimeout(() => successMessage.remove(), 500); // Remove after fade-out
            }
        }, 3000); // 3-second delay before fade-out
    </script>
@elseif (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-message" style="transition: opacity 0.5s;">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(() => {
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.opacity = '0'; // Start fading out
                setTimeout(() => errorMessage.remove(), 500); // Remove after fade-out
            }
        }, 3000); // 3-second delay before fade-out

    </script>
 @elseif (session('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert" id="info-message" style="transition: opacity 0.5s;">
        {{ session('message') }}
    </div>
    <script>
        setTimeout(() => {
            const infoMessage = document.getElementById('info-message');
            if (infoMessage) {
                infoMessage.style.opacity = '0'; // Start fading out
                setTimeout(() => infoMessage.remove(), 500); // Remove after fade-out
            }
        }, 3000); // 3-second delay before fade-out

    </script>
@endif

        <style>
            .banner {
                background-image: url('{{ asset("images/bradcam.png") }}');
                background-size: cover;
                background-position: center;
                padding-top: 80px;
                min-height: 300px;
                /* Ensure the banner height is sufficient */
            }

            .card-img-size {
                width: 100%;
                height: 200px;
                object-fit: cover;
                object-position: center;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .contact-form {
                background: #ffffff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }

            .contact-form h2 {
                color: #0d6efd;
            }

            /* Ensure the form is centered in the viewport */
            .contact-section {
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Responsive image */
            .card-img-size {
                max-width: 250px;
                margin: 0 auto;
            }

            /* Section title */
            .section-title {
                font-size: 24px;
                color: #0d6efd;
                margin-bottom: 30px;
            }
        </style>

        <main class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p class="text-white align-self-start">Your Profile</p>
                    <h1 class="text-white">Edit Post</h1>
                </div>

            </div>
        </main>
    </x-comNav>
</header>



<div class="contact-section ">
    <div class="container text-center mt-4  mb-4 ">
        <h2 class="fw-bold text-primary">Edit Post</h2>
        <div class="row ">
            <div class="col-md-6 offset-md-3 border p-3 ">
                <form action="/company/updatePost/{{$job->id}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="company_id" value="{{ Auth::user()->id }}">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="title" autofocus class="form-control form-control-md" value="{{ $job->title }}" required />

                                @error('title')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>





                        <div class="col-md-6 mb-3 pb-2">

                            <div data-mdb-input-init class="form-outline">
                                <label for="category" class="form-label">Category</label>


                                <select class="form-select pb-2 pt-2 " id="category" name="category">
                                    <option value="">Select Category</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Design">Design</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Education">Education</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="Management">Management</option>
                                    <option value="Tourism">Tourism</option>
                                    <option value="Media">Media</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Public Services">Public Services</option>
                                </select>
                            </div>


                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-6 mb-4 pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <div class="form-group">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="" disabled selected>offer type</option>
                                        <option name="type" value="job">job</option>
                                        <option name="type" value="training">training</option>
                                        <option name="type" value="part-time">part-time</option>"
                                    </select>
                                </div>
                            </div>

                            @error('type')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3 mt-2  pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input id="location" type="text" name="location" value="{{ $job->location }}" class="form-control">
                                </div>
                                @error('location')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3 pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" name="salary" class="form-control form-control-md" value="{{ $job->salary }}" id="salary" placeholder="Enter salary" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="duration">Duration</label>
                                <input type="text" name="duration" id="duration" required value="{{ $job->duration }}" class="form-control form-control-md" placeholder="Enter job duration" />
                            </div>
                        </div>
                    </div>

                    <div class="row">





                        <div class="col-md-6 mb-3 pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="description">Description</label>
                                <textarea name="description" id="description" rows="" class="form-control form-control-md">{{$job->description}}</textarea>
                                @error('description')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6 mb-3 pb-2 ">
                            <div data-mdb-input-init class="form-outline">
                                <div class="form-group">
                                    <label for="status">Opean</label>
                                    <input type="radio" name="status" value="open" class="form-check-input">
                                    <label for="status">Closed</label>
                                    <input type="radio" name="status" value="closed" class="form-check-input">
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class=" pt-2 text-center">
                        <button class="btn btn-primary btn-lg w-100" type="submit">Edit Post</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>


<x-comFooter></x-comFooter>