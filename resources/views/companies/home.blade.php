<header class="banner">


    <x-comNav :profileImg="$profileImg">

        <x-slot:title>
            Home
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
                background-image: url('{{ asset('images/banner.png') }}');
                background-size: cover;
                background-position: center;
                height: 100vh;
                padding-top: 80px;
                /* Adjust padding based on navbar height */
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
            }

            .content-box {
                flex: 1;
                padding: 20px;
                color: white;
                z-index: 3;
                /* Ensure it's above the background */
            }

            .foreground-img {
                flex: 1;
                width: 100%;
                max-width: 400px;
                /* Adjust size as needed */
                z-index: 2;
                /* Ensure it's above the background */
                object-fit: cover;
            }

            .card-img-size {
                width: 100%;
                height: 200px;
                /* You can change this height as needed */
                object-fit: cover;
                object-position: center;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }

            .cat-hover:hover {
                transform: scale(1.1);
                transition: transform 0.8s ease;
            }
        </style>

        <!-- Content and Image -->
        <div class="container d-flex align-items-center justify-content-between">
            <!-- Left Section -->
            <div class="content-box">
                <h1>Welcome to Job Scope</h1>
                <p class="fs-4">Looking for talent?</p>
                <button type="button" class="btn btn-light p-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
                    <i class="bi bi-plus-circle me-1"></i> Add Your Post
                </button>
             
            </div>

            <!-- Right Section -->
            <img src="{{ asset('images/illustration.png') }}" alt="Hero Image" class="foreground-img">
        </div>


    </x-comNav>
</header>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Add Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>





                        <div class="modal-body">
                            <form  action="/company/addPost" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="company_id" id="company_id" value="{{ Auth::user()->id }}"  required />

                               
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" name="title" id="title" autofocus class="form-control form-control-lg"  required />
                    
                                            @error('title')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                 
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3 pb-2">

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
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="description">Description</label>
                                            <input type="text" id="description" name="description" required class="form-control form-control-lg"  />
                                            
                                            @error('description')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                    <label for="type" class="form-label">Type</label>
                                                    <select class="form-select" id="type" name="type" required>
                                                        <option  value="" disabled selected>offer type</option>
                                                        <option name="type" value="job" >job</option>
                                                        <option name="type" value="training" >training</option>
                                                        <option name="type" value="part-time" >part-time</option>" 
                                                    </select>
                                            </div>
                                        </div>
                                    
                                            @error('type')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    <div class="col-md-6 mb-3  pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input id="location" type="text"  name="location"  class="form-control">
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
                                            <input type="number" name="salary"  class="form-control form-control-lg" id="salary" placeholder="Enter salary" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="duration">Duration</label>
                                            <input type="text" name="duration" id="duration" required class="form-control form-control-lg" placeholder="Enter job duration" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-3 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="status">Opean</label>
                                               <input type="radio" name="status" value="open"  class="form-check-input" > 
                                               <label for="status">Closed</label>
                                               <input type="radio" name="status" value="closed"  class="form-check-input" > 
                                            </div>    
                                        </div>
                                      </div>
                                </div>
                           

                               

                                <div class=" pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Add Post</button>
                                </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>






<section bg-light>
    <h2 class="text-center text-primary mb-5 mt-5 fw-bold" style="font-size: 3rem">Popular Category</h2>
    <div class="container text-center mt-3  bg-light">
        <div class="row justify-content-center"> <!-- Centers the row content horizontally -->
            @foreach ($totalJobs as $job)
            <div class="col-md-6 col-lg-4 mb-4"> <!-- Adjust the column size for responsive design -->
                <div class="card shadow-sm  cat-hover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->category }}</h5>
                        <p class="card-text">{{ $job->total }} <span class="text-muted">Available Jobs</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>







<section class="mt-5 bg-light">
    <div class="container">
        <!-- Header Section -->
        <div class="row text-center mb-4">
            <div class="col ">
                <span class="text-primary fw-bold" style="font-size: 7rem">1000 <i class="fa-solid fa-plus"></i></span>
                <h2 class="fw-bold text-primary">Browse From Our Top Jobs</h2>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <input type="text" id="jobSearch" class="form-control" placeholder="Search jobs...">
            </div>
        </div>


        <!-- Main Content -->
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-3">
                <div class="bg-light p-4 shadow-sm rounded">

                    <!-- Filters -->
                    <h5 class="fw-bold mt-3">Filter Jobs</h5>
                    <form id="filter-form">
                        <!-- Category -->
                        <select name="category" class="form-select mb-3">
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





                        <!-- Job Type -->
                        <select name="type" class="form-select mb-3">
                            <option value="">Select Job Type</option>
                            <option name="type" value="job">job</option>
                            <option name="type" value="training">training</option>
                            <option name="type" value="part-time">part-time</option>"
                        </select>

                        <!-- Location -->
                        <input type="text" name="location" class="form-control mb-3" placeholder="Location">

                        <!-- Salary Range -->
                        <input type="number" name="min_salary" class="form-control mb-2" placeholder="Min Salary">
                        <input type="number" name="max_salary" class="form-control mb-3" placeholder="Max Salary">

                        <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                    </form>
                </div>
            </div>

            <!-- Right Job Display -->
            <div class="col-md-9">
                <!-- Jobs Display -->
                <div id="jobs-container">
                    <div class="row">
                        @foreach ($jobs as $job)
                        @if ($job->status == 'open')
                        <div class="col-md-12 mb-4 job-card">
                            <div class="card shadow-sm border-success">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset($job->company->img) }}" style="width:100px; height:100px;" class="me-3 rounded-circle" alt="Job Image">
                                    <div class="w-100"> <!-- This ensures the content takes full width -->
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title mb-1 job-title">{{ $job->title }}</h5>
                                                <p class="card-text text-muted job-category">{{ $job->category }}</p>
                                            </div>
                                            <!-- Align the 'Apply Now' button to the right -->
                                            <div class="ms-auto">
                                                <a href="{{url('/jobs/'.$job->id.'/jobProfile')}}" class="text-decoration-none btn btn-primary">Apply</a>

                                            </div>
                                        </div>
                                        <div class="d-flex text-muted">
                                            <p class="card-text pe-5"><strong><i class="bi bi-geo-alt"></i></strong> {{ $job->location }}</p>
                                            <p class="card-text pe-5"><strong><i class="bi bi-currency-dollar"></i></strong>{{$job->salary }}</p>
                                            <p class="card-text"><strong><i class="bi bi-clock"></i></strong>&nbsp{{ $job->type }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    {{ $jobs->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container mb-5">
        <h2 class="fw-bold text-primary text-center">Top Companies</h2>
    </div>

    <div id="companyCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#companyCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#companyCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#companyCarousel" data-bs-slide-to="2"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            @foreach ($companies->chunk(3) as $chunkIndex => $chunk)
            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                <div class="container">
                    <div class="row">
                        @foreach ($chunk as $company)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset($company->img) }}" class="card-img-top" alt="Company Logo" style="width: 100px; height: 100px; margin: auto; padding: 10px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">{{ $company->name }}</h5>
                                    <p class="card-text text-muted">{{ $company->category }}</p>
                                    <small class="fw-bold">{{ $company->jobs_count }} <span class="text-muted ms-2">Jobs Available</span></small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#companyCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#companyCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>



<section class="py-5 bg-light mb-5">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-5">What People Are Saying</h2>
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <p class="card-text text-muted fst-italic">
                            <i class="bi bi-quote text-primary"></i>
                            This platform connected me with a verified company that perfectly matched my skills. I landed a great opportunity within days!
                        </p>
                        <div class="d-flex align-items-center mt-4">
                            <img src="{{ asset('images/person1.jpg') }}" class="rounded w-25 h-25 me-3" alt="User Image">
                            <div>
                                <h5 class="fw-bold mb-0">Ahmad Ali</h5>
                                <p class="text-muted mb-0">Software Engineer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <p class="card-text text-muted fst-italic">
                            <i class="bi bi-quote text-primary"></i>
                            Thanks to this site, we found talented individuals for our short-term projects. The verification process ensured we worked with trustworthy professionals.
                        </p>
                        <div class="d-flex align-items-center mt-4">
                            <img src="{{ asset('images/person2.jpg') }}" class="rounded w-25 h-25 me-3" alt="User Image">
                            <div>
                                <h5 class="fw-bold mb-0">Omar Ibrahim</h5>
                                <p class="text-muted mb-0">HR Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <p class="card-text text-muted fst-italic">
                            <i class="bi bi-quote text-primary"></i>
                            I was able to showcase my skills and secure freelance opportunities with ease. The process was smooth and reliable.
                        </p>
                        <div class="d-flex align-items-center mt-5">
                            <img src="{{ asset('images/person3.jpg') }}" class="rounded w-25 h-25 me-3" alt="User Image">
                            <div>
                                <h5 class="fw-bold mb-0">Laila Ahmad</h5>
                                <p class="text-muted mb-0">Freelancer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





</main>

<script>
    document.getElementById('jobSearch').addEventListener('input', function() {
        let searchQuery = this.value.toLowerCase();
        let jobCards = document.querySelectorAll('.job-card');

        jobCards.forEach(function(card) {
            let title = card.querySelector('.job-title').textContent.toLowerCase();
            let category = card.querySelector('.job-category').textContent.toLowerCase();

            if (title.includes(searchQuery) || category.includes(searchQuery)) {
                card.style.display = "block"; // Show matching cards
            } else {
                card.style.display = "none"; // Hide non-matching cards
            }
        });
    });

    $(document).ready(function() {


        // Filter Form Submission
        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            fetchJobs();
        });

        function fetchJobs() {
            let query = {
                search: $('#search-box').val(),
                category: $('[name="category"]').val(),
                type: $('[name="type"]').val(),
                location: $('[name="location"]').val(),
                min_salary: $('[name="min_salary"]').val(),
                max_salary: $('[name="max_salary"]').val(),
            };

            $.ajax({
                url: "{{ route('home') }}",
                method: 'GET',
                data: query,
                success: function(response) {
                    $('#jobs-container').html($(response).find('#jobs-container').html());
                }
            });
        }
    });
</script>










<x-comFooter></x-comFooter>