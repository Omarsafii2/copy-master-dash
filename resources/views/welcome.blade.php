<header class="banner">
    <x-navbar>
        <style>
            .banner {
                background-image: url('{{asset('images/banner.png')}}');
                background-size: cover;
                background-position: center;
                height: 100vh;
                padding-top: 80px;
                /* Adjust this based on navbar height */
            }

            .card-img-size {
                width: 100%;
                /* تجعل الصورة تمتد على عرض الكارد */
                height: 200px;
                /* يمكنك تغيير هذا الارتفاع حسب الحاجة */
                object-fit: cover;
                /* تجعل الصورة تملأ الحاوية دون تشويه */
                object-position: center;
                /* تضمن أن الصورة تتركز داخل الحاوية */
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }

            .cat-hover:hover {
                transform: scale(1.1);
                transition: transform 0.8s ease;

            }
        </style>

        <main class="container">
            <div class="row ">
                <div class="col-md-6 d-flex flex-column justify-content-center ">
                    <p class="text-white align-self-start">This is a description of the website.</p>

                    <h1 class="text-white">Welcome to MyWebsite</h1>
                    <a href="#" class="btn btn-light">Learn More</a>
                </div>
                <div class="col-md-6 ">
                    <img src="{{ asset('images/illustration.png') }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
</header>

<section>
    <h2 class="text-center text-primary mt-5 fw-bold" style="font-size: 3rem">Popular Category</h2>



    <div class="container text-center mt-3 ">
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







<section class="mt-5">
    <div class="container">
        <!-- Header Section -->
        <div class="row text-center mb-4">
            <div class="col">
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
                <div id="jobs-container ">
                    <div class="row">
                        @foreach ($jobs as $job)
                        @if ($job->status=='open')
                        
                     
                        <div class="col-md-12 mb-4 job-card"> <!-- Add the 'job-card' class here -->
                            <div class="card shadow-sm  border-success">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset($job->company->img) }}" style="width:100px; height:100px;" class="me-3 rounded-circle" alt="Job Image">
                                    <div>
                                        <h5 class="card-title mb-1 job-title">{{ $job->title }}</h5> <!-- Add the 'job-title' class -->
                                        <p class="card-text text-muted job-category">{{ $job->category }}</p> <!-- Add 'job-category' class -->
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



</x-navbar>