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
            About Us
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

                            <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                        </ol>
                    </nav>

                    <!-- Title Section -->
                    <div class="mt-3 mb-3">
                        <h1 class="page-title text-white">Edit Post</h1>
                    </div>
                </div>
            </div>
        </main>
    </x-comNav>
</header>



<div class="contact-section ">
    <div class="container text-center mt-4  mb-4 ">
        <h2 class="fw-bold text-primary">Edit Post</h2>
        <div class="row ">
            <div class="col-md-6 offset-md-3 border p-3 ">
                <form action="/company/updatePost/{{$job->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="company_id" value="{{ Auth::user()->id }}">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="title" autofocus class="form-control form-control-md" value="{{ $job->title }}" required />

                                @error('title')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>





                        <div class="col-md-6 mb-3 pb-2">

                            <div data-mdb-input-init class="form-outline">
                                <label for="category" class="form-label">Category</label>


                                <select class="form-select pb-2 pt-2 " id="category" name="category">
                                    <option value="">Select Category</option>
                                    <option value="Information Technology" {{ $job->category == 'Information Technology' ? 'selected' : '' }}>Information Technology</option>
                                    <option value="Design" {{ $job->category == 'Design' ? 'selected' : '' }}>Design</option>
                                    <option value="Marketing" {{ $job->category == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="Education" {{ $job->category == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="Accounting" {{ $job->category == 'Accounting' ? 'selected' : '' }}>Accounting</option>
                                    <option value="Healthcare" {{ $job->category == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Engineering" {{ $job->category == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                    <option value="Logistics" {{ $job->category == 'Logistics' ? 'selected' : '' }}>Logistics</option>
                                    <option value="Management" {{ $job->category == 'Management' ? 'selected' : '' }}>Management</option>
                                    <option value="Tourism" {{ $job->category == 'Tourism' ? 'selected' : '' }}>Tourism</option>
                                    <option value="Media" {{ $job->category == 'Media' ? 'selected' : '' }}>Media</option>
                                    <option value="Agriculture" {{ $job->category == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                    <option value="Manufacturing" {{ $job->category == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="Public Services" {{ $job->category == 'Public Services' ? 'selected' : '' }}>Public Services</option>
                                </select>
                            </div>


                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-6 mb-4 pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <div class="form-group">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="" disabled selected>offer type</option>
                                        <option name="type" value="job" {{ $job->type == 'job' ? 'selected' : '' }}>job</option>
                                        <option name="type" value="training" {{ $job->type == 'training' ? 'selected' : '' }}>training</option>
                                        <option name="type" value="part-time" {{ $job->type == 'part-time' ? 'selected' : '' }}>part-time</option>"
                                    </select>
                                </div>
                            </div>

                            @error('type')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3 mt-2  pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input id="location" type="text" name="location" value="{{ $job->location }}" class="form-control">
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
                                <input type="number" name="salary" class="form-control form-control-md" value="{{ $job->salary }}" id="salary" placeholder="Enter salary" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="duration">Duration</label>
                                <input type="text" name="duration" id="duration" required value="{{ $job->duration }}" class="form-control form-control-md" placeholder="Enter job duration" />
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-12 mb-3 pb-2">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="description">Description</label>
                                <textarea name="description" id="description" rows="" class="form-control form-control-md">{{$job->description}}</textarea>
                                @error('description')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12 mb-3 pb-2 ">
                            <div data-mdb-input-init class="form-outline">
                                <div class="form-group">
                                <label for="status">Open</label>
                                <input type="radio" name="status" value="open" class="form-check-input" {{ $job->status == 'open' ? 'checked' : '' }}>
                                <label for="status">Closed</label>
                                <input type="radio" name="status" value="closed" class="form-check-input" {{ $job->status == 'closed' ? 'checked' : '' }}>

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class=" pt-2 text-center">
                        <button class="btn btn-primary btn-lg w-100" type="submit">Edit Post</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>


<x-comFooter></x-comFooter>