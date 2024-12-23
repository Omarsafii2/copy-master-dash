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
                    <p class="text-white align-self-start">Show The</p>
                    <h1 class="text-white">Applications</h1>
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