<header class="banner">
    <x-userNav :profileImg="$profileImg">
        <x-slot:title>
             About
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
                background-image: url('{{asset('images/bradcam.png')}}');
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
            color: #0d6efd; /* Bootstrap primary color */
            font-weight: bold;
        }

        .about-section {
            padding: 60px 20px;
        }

        .values-box {
            background-color: #0d6efd; /* Primary color background */
            color: #fff;
            border-radius: 8px;
            padding: 30px;
            margin-top: 30px;
            transition: transform 0.3s ease-in-out;
        }

        .values-box:hover {
            transform: translateY(-10px); /* Lift effect on hover */
        }

        .team-section img {
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }


            
        </style>

        <main class="container ">
            <div class="row ">
                <div class="col-md-6 d-flex flex-column justify-content-center ">
                    <p class="text-white align-self-start">Know More</p>

                    <h1 class="text-white">Companies</h1>
                    
                </div>
            
            </div>
</header>
    </x-userNav>


    <section class=" py-4">
    <div class="container">
        <div class="row ">
            <!-- Filter Section -->
            <div class="col-md-3 ">
                <div class="card shadow-sm  ">
                    <div class="card-body py-4 rounded bg-primary">
                        <h5 class="card-title text-light mb-3">Filters</h5>

                        <!-- Filter Form -->
                        <form action="/users/company/" method="GET">
                            <!-- Category Filter -->
                            <div class="mb-3">
                                <select name="category" id="category" class="form-select">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Address Filter -->
                            <div class="mb-3">
                               
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="{{ request('address') }}">
                            </div>

                            <!-- Filter Button -->
                            <button type="submit" class="btn btn-success w-100">Apply Filters</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Companies Section -->
            <div class="col-md-9">
 <!-- Companies List -->
                <div id="jobs-container">
                <div class="row mb-2">
                <div class="col-md-12">
                    <form action="/users/company/" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" id="jobSearch" class="form-control" placeholder="Search companies..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
                    <div class="row">
                        @foreach ($companies as $company)
                        <div class="col-md-12 mb-4 job-card">
                            <div class="card shadow-sm  border-success">
                                <div class="card-body rounded bg-light d-flex align-items-center">
                                    <img src="{{ asset($company->img) }}" style="width:100px; height:100px;" class="me-3 rounded-circle" alt="Company Image">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title mb-1 job-title">{{ $company->name }}</h5>
                                                <p class="card-text text-muted job-category">{{ $company->category }}</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="{{ url('/users/companyProfile/'.$company->id.'') }}" class="text-decoration-none btn btn-primary">Show Profile</a>
                                            </div>
                                        </div>
                                        <div class="d-flex text-muted">
                                            <p class="card-text pe-5"><strong><i class="bi bi-geo-alt"></i></strong> {{ $company->address }}</p>
                                            <p class="card-text pe-5"><strong><i class="bi bi-bookmark"></i></strong> {{ $company->category }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination  ">
                    {{ $companies->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>



<x-comFooter></x-comFooter>