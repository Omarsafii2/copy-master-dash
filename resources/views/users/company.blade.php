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
        <x-userNav :profileImg="$profileImg">
            <x-slot:title>
                Jobs
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
                                <li class="breadcrumb-item"><a href="/users/home"><i class="bi bi-house-door"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Company</li>
                            </ol>
                        </nav>

                        <!-- Title Section -->
                        <div class="mt-3 mb-3">
                            <p class="banner-subtitle mb-2">Explore Companies</p>
                            <h1 class="page-title text-white">Companies</h1>
                        </div>
                    </div>
                </div>
            </main>
        </x-userNav>
    </header>


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



<x-userFooter></x-userFooter>