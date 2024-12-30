<style>
    .banner {
                    background-image: url('{{asset('images/bradcam.png')}}');
                    background-size: cover;
                    background-position: center;
                    padding-top: 80px;
                }

        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .banner-content {
            position: relative;
            z-index: 2;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            color: rgba(255, 255, 255, 0.6);
        }

        .breadcrumb-item.active {
            color: #fff;
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #fff;
        }

        .banner-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
    </style>

    <header class="banner">
        <x-Navbar>
            <x-slot:title>
                Job Profile
            </x-slot:title>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message" style="transition: opacity 0.5s;">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(() => {
                        const successMessage = document.getElementById('success-message');
                        if (successMessage) {
                            successMessage.style.opacity = '0';
                            setTimeout(() => successMessage.remove(), 500);
                        }
                    }, 3000);
                </script>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-message" style="transition: opacity 0.5s;">
                    {{ session('error') }}
                </div>
                <script>
                    setTimeout(() => {
                        const errorMessage = document.getElementById('error-message');
                        if (errorMessage) {
                            errorMessage.style.opacity = '0';
                            setTimeout(() => errorMessage.remove(), 500);
                        }
                    }, 3000);
                </script>
            @elseif (session('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert" id="info-message" style="transition: opacity 0.5s;">
                    {{ session('message') }}
                </div>
                <script>
                    setTimeout(() => {
                        const infoMessage = document.getElementById('info-message');
                        if (infoMessage) {
                            infoMessage.style.opacity = '0';
                            setTimeout(() => infoMessage.remove(), 500);
                        }
                    }, 3000);
                </script>
            @endif

            <main class="container">
                <div class="row banner-content">
                    <div class="col-lg-8">
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door"></i> Home</a></li>
                                <li class="breadcrumb-item"><a href="/jobs/job">Jobs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Job Profile</li>
                            </ol>
                        </nav>

                        <!-- Title Section -->
                        <div class="mt-3 mb-3">
                            <p class="banner-subtitle mb-2">Explore Job Details</p>
                            <h1 class="page-title text-white">Job Profile</h1>
                        </div>
                    </div>
                </div>
            </main>
        </x-Navbar>
    </header>

    <section class="container mt-5  mb-5 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Job Details Card -->
            <div class="border rounded shadow-sm p-4">
                <div class="text-center mb-4">
                    <h1 class="fw-bold">{{$job->title}}</h1>
                </div>
                <hr>
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6 ">
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-bookmark  me-3 fs-4 text-primary"></i>
                            <div class="d-flex">
                                <h6 class="mb-0 fw-bold">Category:</h6>
                                <p class="text-muted mb-0 ms-1">{{$job->category}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-briefcase me-3 fs-4 text-primary"></i>
                            <div class="d-flex">
                                <h6 class="mb-0 fw-bold">Job Type:</h6>
                                <p class="text-muted mb-0 ms-1">{{$job->type}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-calendar3 me-3 fs-4 text-success"></i>
                            <div class="d-flex">
                                <h6 class="mb-0 fw-bold">Duration:</h6>
                                <p class="text-muted mb-0 ms-1">{{$job->duration}}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6 mb-3 ">
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-currency-dollar me-3 fs-4 text-warning"></i>
                            <div class="d-flex">
                                <h6 class="mb-0 fw-bold">Salary:</h6>
                                <p class="text-muted mb-0 ms-1">{{$job->salary}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-building me-3 fs-4 text-info"></i>
                            <div class="d-flex">
                                <h6 class="mb-0 fw-bold">Company:</h6>
                                <p class="text-muted mb-0 ms-1">{{$job->company->name}}</p>
                            </div>

                       </div>

                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-geo-alt me-3 fs-4 text-danger"></i>
                            <div class="d-flex">
                                <h6 class="mb-0 fw-bold">Location:</h6>
                                <p class="text-muted mb-0 ms-1">{{$job->location}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-4 ">
                    <h5 class="fw-bold">Job Description</h5>
                    <p class="text-muted">{{$job->description}}</p>
                </div>

                <div class="text-center mt-4">
                    @auth
                        <form action="{{ route('apply.job', $job->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg px-4">Apply Now</button>
                        </form>
                    @else
                        <a href="/user/login" class="btn btn-secondary btn-lg px-4">
                            Login to Apply
                        </a>
                    @endauth
                </div>


            
                
                
            </div>
        </div>
    </div>
</section>
    





<x-footer></x-footer>