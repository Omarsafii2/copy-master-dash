`<header class="banner mb-4">
    <x-navbar>
        <style>
            .banner {
                background-image: url('{{asset('/images/bradcam.png')}}');
                background-size: cover;
                background-position: center;
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

            .section-heading {
                color: #0d6efd;
                /* Bootstrap primary color */
                font-weight: bold;
            }

            .about-section {
                padding: 60px 20px;
            }

            .values-box {
                background-color: #0d6efd;
                /* Primary color background */
                color: #fff;
                border-radius: 8px;
                padding: 30px;
                margin-top: 30px;
                transition: transform 0.3s ease-in-out;
            }

            .values-box:hover {
                transform: translateY(-10px);
                /* Lift effect on hover */
            }

            .team-section img {
                border-radius: 50%;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        </style>

        <main class="container ">
            <div class="row ">
                <div class="col-md-6 d-flex flex-column justify-content-center ">
                    <p class="text-white align-self-start">Browse</p>

                    <h1 class="text-white">Jobs</h1>

                </div>

            </div>
</header>
</x-navbar>
`

<section class=" bg-light">
    <div class="container">
       

        <div class="row mb-4 ">
            <div class="col-md-6 offset-md-3 ">
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

    $(document).ready(function () {
    // Handle filter form submission
    $('#filter-form').on('submit', function (e) {
        e.preventDefault(); // Prevent page reload
        fetchJobs();
    });

    function fetchJobs() {
        // Collect filter values
        let query = {
            search: $('#jobSearch').val(), // Search box value
            category: $('[name="category"]').val(),
            type: $('[name="type"]').val(),
            location: $('[name="location"]').val(),
            min_salary: $('[name="min_salary"]').val(),
            max_salary: $('[name="max_salary"]').val(),
        };

        // Send AJAX request
        $.ajax({
            url: "{{ route('home') }}", // Ensure this route is defined in web.php
            method: 'GET',
            data: query,
            success: function (response) {
                // Replace the jobs container with the updated HTML
                $('#jobs-container').html(response);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching jobs:', error);
            },
        });
    }
});

</script>



<x-footer></x-footer>