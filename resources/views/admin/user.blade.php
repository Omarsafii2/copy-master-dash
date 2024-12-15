<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
        <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Users</h1>
            <div class="mt-2">
            <button type="button" class="btn btn-primary p-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="bi bi-person-plus me-1"></i> Add User
            </button>
        </div>


           


            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Add New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>



                        <div class="modal-body">
                            <form id="phoneForm" action="/admin/add" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" name="name" id="firstName" autofocus class="form-control form-control-lg" required />
                                            <label class="form-label" for="firstName">First Name</label>
                                            @error('name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="lastName" name="last_name" class="form-control form-control-lg" required />
                                            <label class="form-label" for="lastName">Last Name</label>
                                            @error('last_name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="email" id="emailAddress" name="email" required class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                            @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="password" name="password" id="password" required class="form-control form-control-lg">
                                            <label class="form-label" for="password">Password</label>
                                            @error('password')
                                                <script>alert("{{ $message }}");</script>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="password" name="cpassword" id="c-password" required class="form-control form-control-lg">
                                            <label class="form-label" for="c-password">Confirm Password</label>
                                            @error('cpassword')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-8 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="img">upload images</label>
                                                <input id="img" type="file"  name="img" class="form-control">
                                            </div>
                                            @error('img')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-4 mt-4 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                            <p>jpg,png.jpeg</p>    
                                            </div>
                                            
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="phone">Phone Number:</label>
                                                <input id="phone" type="tel" name="phone_number" class="form-control">
                                            </div>
                                            @error('phone_number')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <h6 class="mb-2 pb-1">Gender:</h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        @error('gender')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="bio">about</label>
                                                <input id="bio" type="text" name="bio" class="form-control">
                                            </div>
                                            @error('phone_number')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                <div class="mt-4 pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Add User</button>
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
              <input type="text" id="searchInput" class="form-control" placeholder="Search users..." />
            </div>
        <div class="col">
            <div class="table-responsive" >
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" class="text-secondary">Users</th>
                    <th scope="col" class="text-secondary">Phone Number</th>
                    <th scope="col" class="text-secondary">Status </th>
                    <th scope="col" class="text-secondary">Action </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user )
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                    <img src="{{ asset($user->img) }}" alt="User Image" width="50px" height="50px" loading="lazy"  class="me-2 rounded-5">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold   ">{{$user['name']." ".$user['last_name']}}</h6>
                                        <a href="mailto:{{$user['email']}}" class="text-xs text-decoration-none text-secondary mb-0">{{$user['email']}}</>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                               <a class="text-decoration-none text-secondary" href="tel:{{$user['phone_number']}}">{{$user['phone_number']}}</a> 
                            </td>

                            <td class="align-middle">
                                @if ($user['is_active']==='active')
                                      <h6 class="text-success">active</h6>
                                 @else
                                      <h6 class="text-danger">inactive</h6>
                                @endif
                            </td>

                            <td class="align-middle gap-2 " >
    <!-- View Icon -->
                                <a href="{{url('admin/'.$user->id.'/userprofile')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>

                               

            </div>


           


                                

                             
                            </td>


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination">
                {{ $users->links('pagination::bootstrap-4')}}
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