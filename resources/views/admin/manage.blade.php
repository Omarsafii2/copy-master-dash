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
                <h1 class="text-secondary">Manage Admin</h1>
                <div class="mt-2">
                    <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#formModal">
                        <i class="bi bi-plus-circle"></i> Add Admin
                    </button>
                </div>


              
      

                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h5 class="modal-title text-secondary" id="formModalLabel">Add New Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>



                            <div class="modal-body">
                                <form id="phoneForm" action="/admin/addadmin" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="firstName">First Name</label>
                                                <input type="text" name="name" id="firstName" autofocus class="form-control form-control-lg"  required />
                                                @error('name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="lastName">Last Name</label>
                                                <input type="text" id="lastName" name="last_name" class="form-control form-control-lg"  required />
                                                
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
                                                <input type="email" id="emailAddress" name="email" required class="form-control form-control-lg"  />
                                            
                                                @error('email')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" name="password" id="password" autofocus class="form-control form-control-lg"  required />
                                                @error('password')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="cpassword">Confirm Password</label>
                                                <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg"  required />
                                                
                                                @error('cpassword')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="Address">Address</label>
                                                <input type="text" name="address" id="Address" required class="form-control form-control-lg">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-5 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="role">Super Admin</label>
                                               <input type="radio" name="role" value="super admin"  class="form-check-input" > 
                                               <label for="status">Admin</label>
                                               <input type="radio" name="role" value="admin"  class="form-check-input"> 
                                            </div>    
                                        </div>
                                      </div>
                                    
                                    </div>

                                        <div class="row ">
                                                <div class="col-md-6 mb-3 pb-2">
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
                                                        <input id="phone" type="tel" name="phone_number" class="form-control" >
                                                    </div>
                                                    @error('phone_number')
                                                        <span class="text-danger small">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    
                                    
                                    
                                    

                                    

                                    <div class="mt-3 pt-2 text-center">
                                        <button class="btn btn-primary btn-lg w-100" type="submit">Add Admin</button>
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
    <div class="mb-3">
              <div class="col-md-12">
                        <form action="/admin/manage" method="GET" id="jobSearchForm">
                            <div class="input-group">
                                <input type="text" name="search" id="jobSearch" class="form-control" placeholder="Search jobs..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>            </div>
                <div class="col">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" class="text-secondary">Name</th>
                    <th scope="col" class="text-secondary">Email</th>
                    <th scope="col" class="text-secondary">Role </th>
                    <th scope="col" class="text-secondary">Action </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($admins as $admin) 
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                   
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold   ">{{$admin->name}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                               <a class="text-decoration-none text-secondary" href="mailto:{{$admin->email}}">{{$admin->email}}</a>  
                            </td>

                            <td class="align-middle">
                                <p class="text-secondary">{{$admin->role}}</p>
                            </td>

                            <td class="align-middle gap-2" >
                                @if($admin->role==='admin')
    <!-- View Icon -->
                                <a href="{{url('admin/'.$admin->id.'/adminprofile')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>

                                                        <!-- Delete Button -->
                            <form id="deleteForm" action="/admin/admin/{{$admin->id}}" method="post" style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="bg-transparent border-0 p-0" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                                    <i class="bi bi-trash3 text-danger me-2"></i>
                                </button>
                            </form>

                            @else
                                <a href="{{ url('admin/'.$admin->id.'/adminprofile') }}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>
                            @endif

                            <!-- Modal for Confirmation -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this Admin? This action cannot be undone.
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


                            </td>


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination">
              {{ $admins->links('pagination::bootstrap-4')}}
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

document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(row => {
            const name = row.querySelector('td').innerText.toLowerCase();
            const phone = row.querySelector('td:nth-child(2)').innerText.toLowerCase();

            // Show or hide row based on search query
            if (name.includes(searchValue) || phone.includes(searchValue)) {
                row.style.display = '';  // Show row
            } else {
                row.style.display = 'none';  // Hide row
            }
        });
    });

</script>

</x-layout>