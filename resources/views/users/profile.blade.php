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
                User Profile
            </x-slot:title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">


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
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>

                        <!-- Title Section -->
                        <div class="mt-3 mb-3">
                            <p class="banner-subtitle mb-2">Hello, {{ auth()->user()->name }}</p>
                            <h1 class="page-title text-white">Profile</h1>
                        </div>
                    </div>
                </div>
            </main>
        </x-userNav>
    </header>

    @if ($user->phone_number == null || $user->cv == null || $user->bio == null ||$user->experince==null || $user->country==null ) 

<div class="alert alert-warning alert-dismissible fade show container mt-2" role="alert" id="info-message" style="transition: opacity 0.5s;">
              <p>Please Complete Your Profile</p>
</div>

@endif



<div class="d-flex justify-content-end mt-3 container card-flex shadow">
    <div class="mt-2 me-2">
        <button type="button" class="btn btn-primary p-2 d-flex  align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
            <i class="bi bi-building me-1"></i> Edit Profile
        </button>
    </div>

<form id="deleteForm" class="mt-2 ms-2 " action="/users/delete" method="post" style="display: inline;">
        @method('DELETE')
        @csrf

        <button type="button" class="btn btn-danger p-2  delete-button" data-bs-toggle="modal" data-bs-target="#confirmationModal">
            <i class="bi bi-trash3 text-light "></i> Delete 
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
                <h5 class="modal-title text-secondary" id="formModalLabel">Edit Your Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>




            <div class="modal-body">
    <form action="/users/edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ Auth::user()->id }}">

        <!-- Row for First and Last Name -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" for="name">First Name</label>
                <input type="text" name="name" id="name" autofocus class="form-control form-control-md shadow-sm" value="{{ $user->name }}" required>
                @error('name')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" for="lastName">Last Name</label>
                <input type="text" name="last_name" id="lastName" class="form-control form-control-md shadow-sm" value="{{ $user->last_name }}" required>
                @error('last_name')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Row for Email -->
        <div class="row ">
            <div class="col-md-12 mb-3">
            <label class="form-label" for="emailAddress">Email Address</label>
            <input type="email" id="emailAddress" name="email" class="form-control form-control-md shadow-sm" value="{{ $user->email }}" required>
            @error('email')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        </div>
       

        <!-- Row for Password and Confirm Password -->
        <div class="row ">
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-md shadow-sm" >
                @error('password')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" id="password_confirmation" class="form-control form-control-md shadow-sm">
            </div>
        </div>

        <!-- Row for Profile Image and Phone Number -->
        <div class="row ">
            <div class="col-md-6 mb-3">
                <label for="img" class="form-label">Upload Profile Image</label>
                <input id="img" type="file" name="img" class="form-control shadow-sm">
                @error('img')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input id="phone" type="tel" name="phone_number" value="{{ $user->phone_number }}" class="form-control shadow-sm">
                @error('phone_number')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6 mb-3 ">
            <label for="category" class="form-label">Specialaization</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" disabled selected >Specialization</option>
                                    <option value="IT"  {{ $user->category == 'IT' ? 'selected' : '' }} >Information Technology</option>
                                    <option value="Finance" {{ $user->category == 'Finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="Healthcare" {{ $user->category == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Education" {{ $user->category == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="Retail" {{ $user->category == 'Retail' ? 'selected' : '' }}>Retail</option>
                                    <option value="Manufacturing" {{ $user->category == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="Construction" {{ $user->category == 'Construction' ? 'selected' : '' }}>Construction</option>
                                    <option value="Real Estate" {{ $user->category == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                                    <option value="Transportation" {{ $user->category == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                    <option value="Hospitality" {{ $user->category == 'Hospitality' ? 'selected' : '' }}>Hospitality</option>
                                    <option value="Agriculture" {{ $user->category == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                    <option value="Energy" {{ $user->category == 'Energy' ? 'selected' : '' }}>Energy</option>
                                    <option value="Telecommunications" {{ $user->category == 'Telecommunications' ? 'selected' : '' }}>Telecommunications</option>
                                    <option value="Media" {{ $user->category == 'Media' ? 'selected' : '' }}>Media</option>
                                    <option value="Entertainment" {{ $user->category == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                                    <option value="Legal" {{ $user->category == 'Legal' ? 'selected' : '' }}>Legal</option>
                                    <option value="Consulting" {{ $user->category == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                                    <option value="Government" {{ $user->category == 'Government' ? 'selected' : '' }}>Government</option>
                                    <option value="Nonprofit" {{ $user->category == 'Nonprofit' ? 'selected' : '' }}>Nonprofit</option>
                                    <option value="Automotive" {{ $user->category == 'Automotive' ? 'selected' : ''}}>Automotive</option>
                                    <option value="Aerospace" {{ $user->category == 'Aerospace' ? 'selected' : ''}}>Aerospace</option>
                                    <option value="Fashion" {{ $user->category == 'Fashion' ? 'selected' : ''}}>Fashion</option>
                                    <option value="Food and Beverage" {{ $user->category == 'Food and Beverage' ? 'selected' : ''}}>Food and Beverage</option>
                                    <option value="Pharmaceuticals" {{ $user->category == 'Pharmaceuticals' ? 'selected' : ''}}>Pharmaceuticals</option>
                                    <option value="Insurance" {{    $user->category == 'Insurance' ? 'selected' : ''}}>Insurance</option>
                                    <option value="Other" {{ $user->category == 'Other' ? 'selected' : ''}}>Other</option>
                                </select>
                
            </div>
            <div class="col-md-6 mb-3">
                <label for="cv" class="form-label">Your CV <small>(Link)</small></label>
                <input type="text" name="cv" value="{{ $user->cv }}" class="form-control shadow-sm">

            </div>

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="country" class="form-label">City</label>
                <input type="text" name="country" value="{{ $user->country }}" class="form-control shadow-sm">
            </div>
            <div class="col-md-6 mb-3">
                <label for="experince" class="form-label">Experince</label>
                <input type="text" name="experince" value="{{ $user->experince }}" class="form-control shadow-sm">
            </div>
        </div>

        <!-- Row for Bio -->
        <div class="mb-3">
            <label class="form-label" for="bio">Bio</label>
            <textarea name="bio" id="bio" rows="3" class="form-control shadow-sm" required>{{ $user->bio }}</textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button class="btn btn-primary btn-lg shadow-sm w-100" type="submit">Save Changes</button>
        </div>
    </form>
</div>


        </div>
    </div>
</div>


<div class="container mt-5 mb-5">
<div class="row ">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{asset($user->img)}}" style="width:250px ; height:250px; " class="rounded-4" alt="">
            <h5 class="my-3">{{$user->name}}</h5>
            <p class="text-muted mb-1">{{$user->title}}</p>
            @if ($user->country != null)
            
            
            <p class="text-muted mb-2">loaction: {{$user->country}}</p>
            @endif
        </div>
    </div>

   

    
      </div>

      <div class="col-lg-8">
         <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->name." ".$user->last_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$user->email}}" class="text-decoration-none">{{$user->email}}</a>
              </div>
            </div>
            @if ($user->phone_number != null)
            <hr>
            
            
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->phone_number}}</p>
              </div>
            </div>
            @endif
            @if ($user->education != null)
            <hr>
           
            
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Education</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->education}}</p>
              </div>
            </div>
            
         
           @endif
           @if ($user->experince != null)
           <hr>
          
           
           
           <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Experience</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->experince}}</p>
              </div>
            </div>
              @endif
                @if ($user->cv != null)
            <hr>  
              
            
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">CV</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$user->cv}}" target="_blank" class="text-primary mb-0 text-decoration-none">{{$user->name." cv"}}</a>
              </div>
            </div>
            @endif
            
       
          </div>
         </div>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <h3 class="text-muted">about</h3>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <p class="text-muted ">{{$user->bio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 </div> 

 <div class="container mt-5 mb-5">
    <h3 class="text-secondary mb-4">Your Applications</h3>

    @if($user->applications->isEmpty())
        <p class="text-muted">You have not applied for any jobs yet.</p>
    @else
        <div class="row">
            @foreach ($user->applications as $application)
                @php
                    $modalId = "confirmationModal" . $application->id;
                    $deleteFormId = "deleteForm" . $application->id;
                @endphp
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-primary">
                        <div class="card-body">
                            <!-- Job Title -->
                            <h5 class="card-title text-primary">{{ $application->jobs->title }}</h5>
                            <p class="card-text text-muted"><i class="bi bi-building"></i> {{ $application->jobs->company->name }}</p>
                            
                            <!-- Job Details -->
                            <div class="mb-3">
                                <p class="mb-1"><strong>Category:</strong> {{ $application->jobs->category }}</p>
                                <p class="mb-1"><strong>Location:</strong> {{ $application->jobs->location }}</p>
                                
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="/users/jobProfile/{{ $application->jobs->id }}" class="btn btn-primary">Show Job</a>
                                <!-- Trigger Delete Modal -->
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">Withdraw</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Confirmation -->
                <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to withdraw this application? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <!-- Cancel Button -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <!-- Confirm Deletion Button -->
                                <form id="{{ $deleteFormId }}" action="/users/application/{{ $application->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes, Withdraw</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

                        
                    
 


 <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const phoneInput = document.querySelector("#phone");

        // Initialize intl-tel-input
        const iti = intlTelInput(phoneInput, {
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                fetch("https://ipapi.co/json/") // Detect user's country using IP
                    .then((response) => response.json())
                    .then((data) => callback(data.country_code))
                    .catch(() => callback("US"));
            },
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js", // For validation and formatting
        });

        // Preload the country and phone number if available
        const storedPhoneNumber = "{{ $user->phone_number }}";
        if (storedPhoneNumber) {
            iti.setNumber(storedPhoneNumber); // Set the phone number
        }

        // Handle form submission
        const form = document.querySelector("#phoneForm");
        form.addEventListener("submit", function (event) {
            const fullPhoneNumber = iti.getNumber(); // Get full international number
            const isValid = iti.isValidNumber(); // Validate phone number

            if (!isValid) {
                alert("Please enter a valid phone number.");
                event.preventDefault(); // Prevent form submission if invalid
            } else {
                // Update the phone number input with the full international number
                phoneInput.value = fullPhoneNumber;
            }
        });
    });
</script>

 
 

<x-userFooter></x-userFooter>

   