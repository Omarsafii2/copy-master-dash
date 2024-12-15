<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
    <div class="d-flex justify-content-between ">   
            
            <h1 class="text-secondary">User Profile</h1>
            <div class="d-flex ">
            <div class="mt-2 m-2">
                <button type="button" class="btn btn-primary p-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
                    <i class="bi bi-pencil-square me-1"></i> Edit User
                </button>
            </div>

            <div class="mt-2">
                <form id="deleteForm" action="/admin/user/{{$users->id}}" method="post" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-danger p-2  delete-button" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                    <i class="bi bi-trash3 text-light "></i>

                    </button>
                </form>
            </div>

            </div>


            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this User? This action cannot be undone.
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
                            <h5 class="modal-title text-secondary" id="formModalLabel">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>



                        <div class="modal-body">
                            <form id="phoneForm" action="/admin/edit" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $users->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input type="text" name="name" id="firstName" autofocus class="form-control form-control-lg" value="{{ $users->name }}" required />
                                            @error('name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" id="lastName" name="last_name" class="form-control form-control-lg" value="{{ $users->last_name }}" required />
                                            
                                            @error('last_name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" id="emailAddress" name="email" required class="form-control form-control-lg" value="{{ $users->email }}" />
                                           
                                            @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="title">jop title</label>
                                            <input type="text" id="title" name="title"  class="form-control form-control-lg" value="{{ $users->title }}" />
                                            
                                    
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                    <div data-mdb-input-init class="form-outline">
                                    <label class="form-label" for="cv">CV Link</label>
                                    <input type="text" id="cv" name="cv" class="form-control form-control-lg" value="{{ $users->cv }}"  >



                                    </div>
                            

                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                            <label for="educationLevel" class="form-label">Education Level</label>
                                            <select class="form-select" id="educationLevel" name="education" required>
                                                <option  value="" disabled selected>education level</option>
                                                <option name="education" value="bechlore" {{ $users->education== 'bechlore' ? 'selected' : '' }}>Bechelor</option>
                                                <option name="education" value="master" {{ $users->education== 'master' ? 'selected' : '' }}>Master</option>
                                                <option name="education" value="phd" {{ $users->education== 'phd' ? 'selected' : '' }}>PhD</option>
                                                <option name="education" value="doctorate" {{ $users->education== 'doctorate' ? 'selected' : '' }}>Doctorate</option>
                                                <option name="education" value="other" {{ $users->education== 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('education')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="experince">experince</label>
                                            <input type="text" name="experince" id="experince" required class="form-control form-control-lg" value="{{ $users->experince }}">
                                            

                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                             <label class="form-label" for="specalaization">specalaization</label>
                                            <input type="text" name="specalaization" id="specalaization" required class="form-control form-control-lg" value="{{ $users->specalaization }}">
                                            
                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-8 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="img">upload images</label>
                                                <input id="img" type="file"  name="img" class="form-control" >
                                                
                                            </div>
                                            @error('img')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="status">Active</label>
                                               <input type="radio" name="is_active" value="active"  class="form-check-input" {{ $users->is_active === 'active' ? 'checked' : ''}}> 
                                               <label for="status">Inactive</label>
                                               <input type="radio" name="is_active" value="Inactive"  class="form-check-input" {{ $users->is_active === 'inactive' ? 'checked' : ''}}> 
                                            </div>    
                                        </div>
                                      </div>

                                <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div data-mdb-input-init class="form-outline">
                                        <div class="form-group">
                                            <label for="phone">Phone Number:</label>
                                            <input id="phone" type="tel" name="phone_number" class="form-control" value="{{ $users->phone_number }}">
                                        </div>
                                        @error('phone_number')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                    <div class="col-md-6 mb-3">
                                        <h6 class="mb-2 pb-1">Gender:</h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female"   {{ $users->gender == 'male' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male"     {{ $users->gender == 'male' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        @error('gender')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="bio">about</label>
                                                <input id="bio" type="text" name="bio" class="form-control" value="{{$users->bio}}">
                                            </div>
                                            @error('phone_number')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                   

                                <div class="mt-3 pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Edit User</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
             </div>                       
        </div>
    </nav>
    <hr>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{asset($users->img)}}" style="width:250px ; height:250px; " alt="">
            <h5 class="my-3">{{$users->name}}</h5>
            <p class="text-muted mb-1">{{$users->title}}</p>
            <p class="text-muted mb-2">loaction: {{$users->country}}</p>
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
                <p class="text-muted mb-0">{{$users->name." ".$users->last_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$users->email}}" class="text-decoration-none">{{$users->email}}</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$users->phone_number}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Education</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$users->education}}</p>
              </div>
            </div>
            
         
          
           <hr>
           <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Experience</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$users->experince}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">CV</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$users->cv}}" target="_blank" class="text-primary mb-0 text-decoration-none">{{$users->name." cv"}}</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                @if($users->is_active === 'active')
                   <p class="text-success mb-0">{{$users->is_active}}</p>
                @else
                   <p class="text-danger mb-0">{{$users->is_active}}</p>  
                @endif
              </div>
            
            </div>
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
                            <p class="text-muted ">{{$users->bio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- to return all comment thar related with the user -->

    <div>
        @foreach ($reviews as $review )
         <!-- #region  -->
         <h1>{{$review->comment}}</h1>
         <h1>{{$review->rate}}</h1>
         <h1>{{$review->companies->name}}</h1>
         <!-- #endregion -->

        @endforeach
    </div>




<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    // Initialize the intl-tel-input plugin
    // Initialize the intl-tel-input plugin
const phoneInput = document.querySelector("#phone");
const iti = intlTelInput(phoneInput, {
  initialCountry: "auto", // Automatically detect the user's country
  geoIpLookup: function (callback) {
    fetch("https://ipapi.co/json/")
      .then((res) => res.json())
      .then((data) => callback(data.country_code))
      .catch(() => callback("US"));
  },
  utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js", // For formatting and validation
});

// Handle form submission
document.querySelector("#phoneForm").addEventListener("submit", function (event) {
  const phoneNumber = iti.getNumber(); // Get the full phone number with the country code
  const isValid = iti.isValidNumber(); // Check if the phone number is valid

  if (!isValid) {
    alert("Please enter a valid phone number.");
    event.preventDefault(); // Stop form submission
  } else {
    // Add the phone number to a hidden input field
    const hiddenPhoneInput = document.createElement("input");
    hiddenPhoneInput.type = "hidden";
    hiddenPhoneInput.name = "phone"; // Use the desired name for the backend
    hiddenPhoneInput.value = phoneNumber;

    // Append the hidden input to the form
    document.querySelector("#phoneForm").appendChild(hiddenPhoneInput);
  }
});
</script>
</x-layout>





