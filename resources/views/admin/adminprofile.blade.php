<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">



<!-- Display success or error messages -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <nav class="row">
        <div class="d-flex justify-content-between ">   
                
                <h1 class="text-secondary">Admin Profile</h1>
                
                @if($admin->role == "admin")
               <!-- Edit Admin Button -->
                    <div class="mt-2">
                        <button type="button" class="btn btn-primary p-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
                            <i class="bi bi-pencil-square me-2"></i> <!-- Icon for editing -->
                            Edit Admin
                        </button>
                    </div>

                @endif




                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Edit Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>



                        <div class="modal-body">
                            <form id="phoneForm" action="/admin/editadmin" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input type="text" name="name" id="firstName" autofocus class="form-control form-control-lg" value="{{ $admin->name }}" required />
                                            @error('name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" id="lastName" name="last_name" class="form-control form-control-lg" value="{{ $admin->last_name }}" required />
                                            
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
                                            <input type="email" id="emailAddress" name="email" required class="form-control form-control-lg" value="{{ $admin->email }}" />
                                           
                                            @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                
                                  
                              

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="Address">Address</label>
                                            <input type="text" name="address" id="Address" required class="form-control form-control-lg" value="{{ $admin->address }}">
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
                                        

                                    
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div data-mdb-input-init class="form-outline">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number:</label>
                                                    <input id="phone" type="tel" name="phone_number" class="form-control" value="{{ $admin->phone_number }}">
                                                </div>
                                                @error('phone_number')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
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
            <img src="{{asset($admin->img)}}" style="width:250px ; height:250px; " alt="">
            <h5 class="my-3">{{$admin->name}}</h5>
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
                <p class="text-muted mb-0">{{$admin->name." ".$admin->last_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$admin->email}}" class="text-decoration-none">{{$admin->email}}</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$admin->phone_number}}</p>
              </div>
            </div>
            <hr>
           
            
         
          
           

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                 <p class="text-muted mb-0">{{$admin->address}}</p>
              </div>
            </div>
            <hr>

            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Role</p>
              </div>
              <div class="col-sm-9">
                 <p class="text-muted mb-0">{{$admin->role}}</p>
              </div>
            </div>
            
           
          </div>
         </div>
      </div>
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