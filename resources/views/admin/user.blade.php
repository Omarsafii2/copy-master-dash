<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
        <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Users</h1>
          


           


                                 
        </div>
    </nav>

    <hr>
    
    
    <div class="row">
    <div class="mb-3">
    <div class="col-md-12">
                <form action="/admin/user" method="GET" id="jobSearchForm">
                    <div class="input-group">
                        <input type="text" name="search" id="jobSearch" class="form-control" placeholder="Search jobs..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>            </div>
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


  </script>

</x-layout>