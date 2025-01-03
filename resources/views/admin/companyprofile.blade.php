<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
    <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Company Profile</h1>
           
         <div class="d-flex">
            <div class="mt-2 me-2">
                <button type="button" class="btn btn-primary p-2 d-flex  align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
                    <i class="bi bi-building me-1"></i> Edit Company
                </button>
            </div>

            <form id="deleteForm" class="mt-2 " action="/admin/company/{{$company->id}}" method="post" style="display: inline;">
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
                Are you sure you want to delete this company? This action cannot be undone.
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
                            <form  action="/admin/editcompany" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $company->id }}">
                                
                                        <div class="col-md-6 mt-4 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="status">Active</label>
                                               <input type="radio" name="is_active" value="active"  class="form-check-input" {{ $company->is_active === 'active' ? 'checked' : ''}}> 
                                               <label for="status">Inactive</label>
                                               <input type="radio" name="is_active" value="Inactive"  class="form-check-input" {{ $company->is_active === 'inactive' ? 'checked' : ''}}> 
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
    </nav>
    <hr>
<!-- ************************************************************************** -->
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{asset($company->img)}}" style="width:250px ; height:250px; " alt="">
            <h5 class="my-3">{{$company->name}}</h5>
            <p class="text-muted mb-1">{{$company->category}}</p>
            <p class="text-muted mb-2">Address: {{$company->address}}</p>
        </div>
    </div>

   

    
      </div>

      <div class="col-lg-8">
         <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Company Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$company->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$company->email}}" class="text-decoration-none">{{$company->email}}</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">License</p>
              </div>
              <div class="col-sm-9">
                <a href="{{$company->business_license}}"class=" mb-0 text-decoration-none text-primary">{{$company->name." license"}}</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Subscription</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$company->subscription_status}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Expiry</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$company->subscription_expiry}}</p>
              </div>
            </div>
           <hr>
           <div class="row">
              <div class="col-sm-3 pb-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                @if($company->is_active === 'active')
                   <p class="text-success mb-0">{{$company->is_active}}</p>
                @else
                   <p class="text-danger mb-0">{{$company->is_active}}</p>  
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
                            <p class="text-muted ">{{$company->bio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
    <div class="row">
        <!-- Average Rating -->
        <div class="col-md-6">
            <div class="card shadow-sm d-flex flex-column h-100" >
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title" style="font-size: 1.25rem;">Average Rating</h5>
                    <div class="my-3">
                        <!-- Dynamic Stars -->
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= round($averageRating))
                                    <i class="bi bi-star-fill text-warning" style="font-size: 1.5rem;"></i> <!-- Filled Star -->
                                @else
                                    <i class="bi bi-star text-secondary" style="font-size: 1.5rem;"></i> <!-- Empty Star -->
                                @endif
                            @endfor
                        </div>
                        <p class="mt-4 mb-0" style="font-size: 1.25rem;"><strong>{{ number_format($averageRating, 1) }}</strong> / 5</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Number of Reviews -->
        <div class="col-md-6">
            <div class="card shadow-sm d-flex flex-column" style="height: 100%">
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title" style="font-size: 1.25rem;">Total Reviews</h5>
                    <div class="my-3">
                        <i class="bi bi-chat-dots-fill text-primary" style="font-size: 2rem;"></i>
                        <p class="mt-2 mb-0" style="font-size: 1.25rem;"><strong>{{ $totalReviews }}</strong> Reviews</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




   
@foreach ($reviews as $review)
    <div class="mt-3">
        <div class="card shadow-sm p-3 mb-4 d-flex flex-column" style="height: 100%;">
            <div class="d-flex">
                <!-- User Image -->
                <img src="{{ asset($review->users->img) }}" alt="User Image" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                
                <div class="w-100">
                    <!-- User Name and Time -->
                    <h6 class="mb-1">{{ $review->users->name }}</h6>
                    <small class="text-muted">{{ $review->updated_at ? $review->updated_at->diffForHumans() : 'Not updated yet' }}</small>
                    
                    <!-- Star Rating -->
                    <div class="mt-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="bi bi-star-fill text-warning"></i> <!-- Filled Star -->
                            @else
                                <i class="bi bi-star text-secondary"></i> <!-- Empty Star -->
                            @endif
                        @endfor
                    </div>
                    
                    <hr class="my-2">
                    <div>
                    <!-- Comment Text -->
                    <p class="mb-0">{{ $review->comment }}</p>
              </div>
              <div class="mt-2 text-end">
                  <form action="/admin/review/{{$review->id}}   " method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-transparent border-0 p-0">
                         <i class="bi bi-trash3 text-danger me-2 fs-4"></i>
                      </button>                
                  </form>
              </div>


              
            </div>
            
            <!-- Delete Button at the bottom of the card -->
          
                
          
             </div>
        </div>
    </div>
@endforeach


   


    




   
  

    




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





