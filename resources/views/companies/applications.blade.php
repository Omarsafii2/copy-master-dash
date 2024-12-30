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

<header class="banner">
    <x-comNav :profileImg="$profileImg">
        <x-slot:title>
            Applications
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
                            <li class="breadcrumb-item"><a href="/company/home"><i class="bi bi-house-door"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="/company/profile">Profile</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Applications</li>
                        </ol>
                    </nav>

                    <!-- Title Section -->
                    <div class="mt-3 mb-3">
                        <p class="banner-subtitle mb-2">Show The</p>
                        <h1 class="page-title text-white">Applications</h1>
                    </div>
                </div>
            </div>
        </main>
    </x-comNav>
</header>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3>Applications</h3>
                </div>
                <div class="card-body">
                    @foreach ($applications as $application)
                        <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                            <!-- User Image -->
                            <img src="{{ asset($application->users->img) }}" width="70" height="70" alt="User Image" class="me-4 rounded-circle border">
                            
                            <!-- User Info -->
                            <div class="flex-grow-1">
                                <h4 class="mb-1">{{ $application->users->name }} {{ $application->users->last_name }}</h4>
                                <p class="mb-1"><strong>Email:</strong> {{ $application->users->email }}</p>
                                <p class="mb-1"><strong>Phone:</strong> {{ $application->users->phone_number }}</p>
                                <p class="mb-1"><strong>Education:</strong> {{ $application->users->education }}</p>
                                <p class="mb-1"><strong>Experience:</strong> {{ $application->users->experince }}</p>
                            </div>

                            <!-- Show Profile Button -->
                            <div>
                                <a href="/company/userProfile/{{ $application->users->id }}" class="btn btn-outline-primary">
                                    Show Profile
                                </a>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<x-comFooter></x-comFooter>