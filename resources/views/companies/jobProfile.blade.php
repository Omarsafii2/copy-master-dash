<header class="banner ">
<x-comNav :profileImg="$profileImg">
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
                background-image: url('{{asset('/images/bradcam.png')}}');
                background-size:cover;
                background-position:center;
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


        </style>

        <main class="container ">
            <div class="row ">
                <div class="col-md-6 d-flex flex-column justify-content-center ">
                    <p class="text-white align-self-start"> </p>

                    <h1 class="text-white">Job Profile</h1>

                </div>

            </div>
        </x-comNav>
</header>


<section class="container mt-5  mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Job Details Card -->
            <div class="border rounded shadow-sm p-4">
                <div class="text-center mb-4">
                    <h1 class="fw-bold">{{$job->title}}</h1>
                    <p class="text-muted">{{$job->category}}</p>
                </div>
                <hr>
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-briefcase me-3 fs-4 text-primary"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Job Type:</h6>
                                <p class="text-muted mb-0">{{$job->type}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-calendar3 me-3 fs-4 text-success"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Duration:</h6>
                                <p class="text-muted mb-0">{{$job->duration}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt me-3 fs-4 text-danger"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Location:</h6>
                                <p class="text-muted mb-0">{{$job->location}}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-currency-dollar me-3 fs-4 text-warning"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Salary:</h6>
                                <p class="text-muted mb-0">{{$job->salary}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-building me-3 fs-4 text-info"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Company:</h6>
                                <p class="text-muted mb-0">{{$job->company->name}}</p>
                                <p class="text-muted small">Email: {{$job->company->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <h5 class="fw-bold">Job Description</h5>
                    <p class="text-muted">{{$job->description}}</p>
                </div>

            
                 <!-- Apply Button -->
                
            </div>
        </div>
    </div>
</section>
    






<x-footer></x-footer>