
<header class="banner">

    


    <x-userNav :profileImg="$profileImg">
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
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .content-box {
            flex: 1;
            padding: 20px;
            color: white;
            z-index: 3; /* Ensure it's above the background */
        }

        .content-box h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .content-box p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .foreground-img {
            flex: 1;
            width: 100%;
            max-width: 400px; /* Adjust size as needed */
            z-index: 2; /* Ensure it's above the background */
            object-fit: contain;
        }
    </style>

    <div class="container d-flex align-items-center justify-content-between">
        <!-- Left Section -->
        <div class="content-box">
            <h1>Welcome to MyWebsite</h1>
            <p>This is a description of the website.</p>
            <a href="#" class="btn btn-light">Learn More</a>
        </div>

        <!-- Right Section -->
        <img src="{{ asset('images/illustration.png') }}" alt="Hero Image" class="foreground-img">
    </div>
</header>

<section class="mt-5 " >
    <h2 class="text-center text-primary mb-5 mt-5 fw-bold" style="font-size: 3rem">Popular Category</h2>



    <div class="container text-center mt-3  ">
        <div class="row justify-content-center "> <!-- Centers the row content horizontally -->
            @foreach ($totalJobs as $job)
            <div class="col-md-6 col-lg-4 mb-4"> <!-- Adjust the column size for responsive design -->
                <div class="card shadow-sm bg-light cat-hover">
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






<section class="mt-5 ">
<h2 class="text-center text-primary mb-5 mt-5 fw-bold" style="font-size: 3rem">Browse Jobs</h2>

    <div class="container">
        <!-- Main Content -->
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-3">
                <div class="bg-primary p-4 shadow-sm rounded">

                    <!-- Filters -->
                    <h5 class="fw-bold mt-3 text-light">Filter Jobs</h5>
                    <form id="filter-form">
                        <!-- Category -->
                        <select name="category" class="form-select mb-3">
                            <option value="">All</option>
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

                        <button type="submit" class="btn btn-success w-100">Apply Filters</button>
                    </form>
                </div>
            </div>

            <!-- Right Job Display -->
            <div class="col-md-9">
            <div class="row mb-4">
            <div class="col-md-12">
                <form action="/users/home" method="GET" id="jobSearchForm">
                    <div class="input-group">
                        <input type="text" name="search" id="jobSearch" class="form-control" placeholder="Search jobs..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>

                <!-- Jobs Display -->
                <div id="jobs-container">
                    <div class="row">
                        @foreach ($jobs as $job)
                        @if ($job->status == 'open')
                        <div class="col-md-12 mb-4 job-card ">
                            <div class="card bg-light shadow-sm  border-success">
                                <div class="card-body d-flex  align-items-center">
                                    <img src="{{ asset($job->company->img) }}" style="width:100px; height:100px;" class="me-3 rounded-circle" alt="Job Image">
                                    <div class="w-100"> <!-- This ensures the content takes full width -->
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title mb-1 job-title">{{ $job->title }}</h5>
                                                <p class="card-text text-muted job-category">{{ $job->category }}</p>
                                            </div>
                                            <!-- Align the 'Apply Now' button to the right -->
                                            <div class="ms-auto">
                                                <a href="/users/jobProfile/{{$job->id}}" class="text-decoration-none btn btn-primary">Apply</a>

                                            </div>
                                        </div>
                                        <div class="d-flex text-muted">
                                            <p class="card-text pe-5"><strong><i class="bi bi-geo-alt"></i></strong> {{ $job->location }}</p>
                                            <p class="card-text pe-5"><strong><i class="bi bi-currency-dollar"></i></strong>{{$job->salary }}</p>
                                            <p class="card-text"><strong><i class="bi bi-clock"></i></strong>{{ $job->type }}</p>
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

<section class="py-5 ">
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
                            <div class="card bg-light shadow-sm">
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



<section class="py-5  mb-5">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-5">What People Are Saying</h2>
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="card bg-light shadow-sm h-100">
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
                <div class="card bg-light shadow-sm h-100">
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
                <div class="card bg-light shadow-sm h-100">
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



</x-userNav>

<x-footer>

</x-footer>