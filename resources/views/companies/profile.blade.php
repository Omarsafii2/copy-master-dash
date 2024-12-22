<header class="banner">
    

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
@endif




    <x-comNav :profileImg="$profileImg">
        <x-slot:title>
            Profile
        </x-slot:title>
        <style>
            .banner {
                background-image: url('{{ asset('images/bradcam.png') }}');
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

            /* Style for job posts */
            .job-card {
                background-color: #f9f9f9;
                border: 1px solid #ddd;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .job-card h5 {
                font-size: 20px;
                color: #333;
            }

            .job-card p {
                font-size: 16px;
                color: #666;
            }

            /* Button styles */
            #load-more-btn {
                background-color: #0d6efd;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }

            #load-more-btn:hover {
                background-color: #0046d3;
            }
        </style>

        <main class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p class="text-white align-self-start">Your Profile</p>
                    <h1 class="text-white">{{ $company->name }}</h1>
                    <button type="button" class="btn btn-light p-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
                    <i class="bi bi-plus-circle me-1"></i> Add Your Post
                </button>
                </div>
                
            </div>
        </main>
    </x-comNav>
</header>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Add Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>





                        <div class="modal-body">
                            <form  action="/company/addPost" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="company_id" id="company_id" value="{{ Auth::user()->id }}"  required />

                               
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" name="title" id="title" autofocus class="form-control form-control-lg"  required />
                    
                                            @error('title')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                 
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3 pb-2">

                                        <div data-mdb-input-init class="form-outline">
                                                    <label for="category" class="form-label">Category</label>


                                                    <select class="form-select pb-2 pt-2 " id="category" name="category">
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
                                                </div>      


                                    </div>

                                </div>

             

                                <div class="row">
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="description">Description</label>
                                            <input type="text" id="description" name="description" required class="form-control form-control-lg"  />
                                            
                                            @error('description')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                    <label for="type" class="form-label">Type</label>
                                                    <select class="form-select" id="type" name="type" required>
                                                        <option  value="" disabled selected>offer type</option>
                                                        <option name="type" value="job" >job</option>
                                                        <option name="type" value="training" >training</option>
                                                        <option name="type" value="part-time" >part-time</option>" 
                                                    </select>
                                            </div>
                                        </div>
                                    
                                            @error('type')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    <div class="col-md-6 mb-3  pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input id="location" type="text"  name="location"  class="form-control">
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
                                            <input type="number" name="salary"  class="form-control form-control-lg" id="salary" placeholder="Enter salary" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="duration">Duration</label>
                                            <input type="text" name="duration" id="duration" required class="form-control form-control-lg" placeholder="Enter job duration" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-3 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="status">Opean</label>
                                               <input type="radio" name="status" value="open"  class="form-check-input" > 
                                               <label for="status">Closed</label>
                                               <input type="radio" name="status" value="closed"  class="form-check-input" > 
                                            </div>    
                                        </div>
                                      </div>
                                </div>
                           

                               

                                <div class=" pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Add Post</button>
                                </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


<div class="d-flex justify-content-end me-3">
    <div class="mt-2 me-2">
        <button type="button" class="btn btn-primary p-2 d-flex  align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
            <i class="bi bi-building me-1"></i> Edit Profile
        </button>
    </div>

    <form id="deleteForm" class="mt-2 " action="/company/delete/{{Auth::user()->id}}" method="post" style="display: inline;">
        @method('DELETE')
        @csrf


        <button type="button" class="btn btn-danger p-2  delete-button" data-bs-toggle="modal" data-bs-target="#confirmationModal">
            <i class="bi bi-trash3 text-light "></i>
        </button>
    </form>
</div>


<!-- Modal for Confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your profile? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <!-- Cancel Button -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- Confirm Deletion Button -->
                <button type="submit" form="deleteForm" class="btn btn-danger">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title text-secondary" id="formModalLabel">Edit Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>




            <div class="modal-body">
                <form action="/company/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="row">
                        <div class="col-6 col-sm-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="name">Company Name</label>
                                <input type="text" name="name" id="name" autofocus class="form-control form-control-md" value="{{ $company->name }}" required />

                                @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-6  mb-3">
                            <label for="category" class="form-label">company category</label>
                            <select class="form-select  " id="category" name="category" required>
                                <option value="" disabled selected>company category</option>
                                <option value="IT" {{ $company->category == 'IT' ? 'selected' : ''}}>IT</option>
                                <option value="Finance" {{ $company->category == 'Finance' ? 'selected' : ''}}>Finance</option>
                                <option value="Healthcare" {{ $company->category == 'Healthcare' ? 'selected' : ''}}>Healthcare</option>
                                <option value="Education" {{ $company->category == 'Education' ? 'selected' : ''}}>Education</option>
                                <option value="Retail" {{ $company->category == 'Retail' ? 'selected' : ''}}>Retail</option>
                                <option value="Manufacturing" {{ $company->category == 'Manufacturing' ? 'selected' : ''}}>Manufacturing</option>
                                <option value="Construction" {{ $company->category == 'Construction' ? 'selected' : ''}}>Construction</option>
                                <option value="Real Estate" {{ $company->category == 'Real Estate' ? 'selected' : ''}}>Real Estate</option>
                                <option value="Transportation" {{$company->category == 'Transportation' ? 'selected' : ''}}>Transportation</option>
                                <option value="Hospitality" {{ $company->category == 'Hospitality' ? 'selected' : ''}}>Hospitality</option>
                                <option value="Agriculture" {{ $company->category == 'Agriculture' ? 'selected' : ''}}>Agriculture</option>
                                <option value="Energy" {{ $company->category == 'Energy' ? 'selected' : ''}}>Energy</option>
                                <option value="Telecommunications" {{ $company->category == 'Telecommunications' ? 'selected' : ''}}>Telecommunications</option>
                                <option value="Media" {{ $company->category == 'Media' ? 'selected' : ''}}>Media</option>
                                <option value="Entertainment" {{ $company->category == 'Entertainment' ? 'selected' : ''}}>Entertainment</option>
                                <option value="Legal" {{ $company->category == 'Legal' ? 'selected' : ''}}>Legal</option>
                                <option value="Consulting" {{ $company->category == 'Consulting' ? 'selected' : ''}}>Consulting</option>
                                <option value="Nonprofit" {{ $company->category == 'Nonprofit' ? 'selected' : ''}}>Nonprofit</option>
                                <option value="Government" {{ $company->category == 'Government' ? 'selected' : ''}}>Government</option>
                                <option value="Automotive" {{ $company->category == 'Automotive' ? 'selected' : ''}}>Automotive</option>
                                <option value="Aerospace" {{ $company->category == 'Aerospace' ? 'selected' : ''}}>Aerospace</option>
                                <option value="Fashion" {{ $company->category == 'Fashion' ? 'selected' : ''}}>Fashion</option>
                                <option value="Food and Beverage" {{ $company->category == 'Food and Beverage' ? 'selected' : ''}}>Food and Beverage</option>
                                <option value="Pharmaceuticals" {{ $company->category == 'Pharmaceuticals' ? 'selected' : ''}}>Pharmaceuticals</option>
                                <option value="Insurance" {{    $company->category == 'Insurance' ? 'selected' : ''}}>Insurance</option>
                                <option value="Other" {{ $company->category == 'Other' ? 'selected' : ''}}>Other</option>
                            </select>
                        </div>
                        <div>
                            @error('category')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-md-6  mb-3 ">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="emailAddress">Email</label>
                                <input type="email" id="emailAddress" name="email" required class="form-control form-control-md " value="{{ $company->email }}" />

                                @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-md-6 mb-3 mt-2 ">
                            <div data-mdb-input-init class="form-outline">
                                <div class="form-group">
                                    <label for="img">upload images</label>
                                    <input id="img" type="file" name="img" class="form-control">
                                </div>
                                @error('img')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="Address">Address</label>
                                <input type="text" name="address" id="adress" required class="form-control form-control-md" value="{{ $company->address }}">


                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="license">license</label>
                                <input type="text" name="business_license" id="license" required class="form-control form-control-md" value="{{ $company->business_license }}">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="bio">bio</label>
                                <input type="text" name="bio" id="bio" required class="form-control form-control-md" value="{{ $company->bio }}">
                            </div>
                        </div>
                    </div>



                    <div class="mt-4 pt-2 text-center">
                        <button class="btn btn-primary btn-lg w-100" type="submit">Edit Company</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
<div class="container mt-5">

    <!-- Profile Info Section -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="{{ asset($company->img) }}" class="card-img-size" alt="{{ $company->name }}">
                    <h5 class="my-3">{{ $company->name }}</h5>
                    <p class="text-muted mb-1">{{ $company->category }}</p>
                    <p class="text-muted mb-2">Address: {{ $company->address }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Company Details -->
                    <div class="row">
                        <div class="col-sm-3 pb-2">
                            <p class="mb-0">Company Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $company->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 pb-2">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <a href="mailto:{{ $company->email }}" class="text-decoration-none">{{ $company->email }}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 pb-2">
                            <p class="mb-0">License</p>
                        </div>
                        <div class="col-sm-9">
                            <a href="{{ $company->business_license }}" class="mb-0 text-decoration-none text-primary" target="_blank">{{ $company->name . " License" }}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 pb-2">
                            <p class="mb-0">Subscription</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $company->subscription_status }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 pb-2">
                            <p class="mb-0">Expiry</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $company->subscription_expiry }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 pb-3">
                            <p class="mb-0">Status</p>
                        </div>
                        <div class="col-sm-9">
                            @if($company->is_active === 'active')
                            <p class="text-success mb-0">{{ $company->is_active }}</p>
                            @else
                            <p class="text-danger mb-0">{{ $company->is_active }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mb-5 text-center">
        <h3 class="section-title">About</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted">{{ $company->bio }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Posts Section -->
     
    <div class="row text-center mb-5">
        <h3 class="section-title">Your Posts</h3>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="row text-center">
                        @forelse($jobs as $job)
                        <div class="col-lg-12">
                            <div class="job-card mb-4 position-relative">
                                <!-- Three-dot button -->
                                <button class="btn btn-link more-options-btn position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i> <!-- Using Bootstrap Icons -->
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="/company/editPost/{{$job->id}}">Edit</a></li>
                                    <form action="/company/deletePost/{{$job->id}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <li><button class="dropdown-item"  onclick="return confirm('Are you sure you want to delete this job?')">Delete</></li>
                                    </form>
                                </ul>

                                <h5 class="me-3 card-title">{{ $job->title }}</h5>
                                <p class="card-text"><small class="text-muted">{{ $job->created_at }}</small></p>
                                <p class="card-text">{{ $job->description }}</p>

                                <!-- Show Details Button -->
                                <a href="/company/applications/{{$job->id}}" class="btn btn-primary">Show Applications</a>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12">
                            <p class="text-muted">No posts yet</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination Links -->
                    @if ($jobs->hasMorePages())
                    <div class="text-center mt-4">
                        <button class="btn" id="load-more-btn">Load More</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    let currentPage = 1; // Keep track of the current page

    $('#load-more-btn').click(function() {
        currentPage++; // Increment the page number
        let url = "{{ route('company.profile') }}?page=" + currentPage;

        $.get(url, function(data) {
            if (data.jobs.length > 0) {
                data.jobs.forEach(function(job) {
                    // Format the created_at date
                    let createdAt = new Date(job.created_at);
                    let formattedDate = createdAt.toLocaleString();

                    // Construct the job card HTML
                    let jobCard = `
                        <div class="col-lg-12">
                            <div class="job-card mb-4 position-relative">
                                <button class="btn btn-link more-options-btn position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/company/editPost/{{$job->id}}">Edit</a></li>
                                    <li><a class="dropdown-item" href="/job/${job.id}/delete" onclick="return confirm('Are you sure you want to delete this job?')">Delete</a></li>
                                </ul>
                                <h5 class="card-title me-3">${job.title}</h5>
                                <p class="card-text"><small class="text-muted">${formattedDate}</small></p>
                                <p class="card-text">${job.description}</p>
                                <a href="/company/applications/{{$job->id}}" class="btn btn-primary">Show Applications</a>
                            </div>
                        </div>
                    `;

                    // Append the job card
                    $('.card-body.bg-light .row.text-center').append(jobCard);
                });

                // Hide the Load More button if there are no more pages
                if (!data.hasMorePages) {
                    $('#load-more-btn').hide();
                }
            }
        });
    });
});

</script>

<x-comFooter></x-comFooter>