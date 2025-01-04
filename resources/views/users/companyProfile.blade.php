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
            width: 100%;
            height: 100%;
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

    <header class="banner">
        <x-userNav :profileImg="$profileImg">
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
                                <li class="breadcrumb-item"><a href="/users/company">Company</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Company Profile</li>
                            </ol>
                        </nav>

                        <!-- Title Section -->
                        <div class="mt-3 mb-3">
                            <p class="banner-subtitle mb-2">Know More About Our Company</p>
                            <h1 class="page-title text-white">Company Profile</h1>
                        </div>
                    </div>
                </div>
            </main>
        </x-userNav>
    </header>


<div class="container mt-5">

    <!-- Profile Info Section -->
    <div class="row">
      <div class="col-lg-4 ">
        <div class="card mb-4 bg-light">
          <div class="card-body text-center">
            <img src="{{asset($company->img)}}" style="width:250px ; height:250px; " alt="">
            <h5 class="my-3">{{$company->name}}</h5>
            <p class="text-muted mb-1">{{$company->category}}</p>
            <p class="text-muted mb-2">Address: {{$company->address}}</p>
        </div>
    </div>

   

    
      </div>

      <div class="col-lg-8">
         <div class="card mb-4 bg-light">
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
                <p class="mb-0">Subscription</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$company->subscription_status}}</p>
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
            <div class="card ">
                <div class="card-body">
                    <div class="row  text-center ">
                        <div class="col-lg-12">
                            <h3 class="text-secondary">about</h3>
                        </div>
                    </div>
                    <div class="row  text-center ">
                        <div class="col-lg-12">
                            <p class="text-muted ">{{$company->bio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Job Posts Section -->
     
<div class="row text-center 1 mt-5 mb-5">
        
        <div class="col-lg-12">
            <div class="card">
            <h3 class="section-title text-secondary mt-3">Posts</h3>
       
                <div class="card-body ">
                    <div class="row text-center 1">
                        @forelse($jobs as $job)
                        <div class="col-lg-4">
                            <div class="job-card mb-4 position-relative">
                                <!-- Three-dot button -->
                                
                              

                                <h5 class="me-3 card-title">{{ $job->title }}</h5>
                                <p class="card-text"><small class="text-muted">{{ $job->created_at->diffForHumans() }}</small></p>
                                <p class="card-text"><small class="text-muted">Category: {{ $job->category }}</small></p>
                                <a href="/users/jobProfile/{{ $job->id }}" class="btn btn-primary">Show Details</a>

                                <!-- Show Details Button -->
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
    


    <div class="container mt-4">
    <div class="row">
        <!-- Average Rating -->
        <div class="col-md-6 ">
            <div class="card bg-light shadow-sm d-flex flex-column h-100" >
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
                <div class="card-body bg-light d-flex flex-column text-center">
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

<div class="mt-4">
    <h5>Add a Review</h5>
    <form id="addReviewForm" method="POST" action="/users/reviews">
        @csrf
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        
        <!-- Rating Input -->
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <div id="rating-input">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star text-secondary rate-star" style="font-size: 1.5rem; cursor: pointer;" data-value="{{ $i }}"></i>
                @endfor
                <input type="hidden" name="rating" id="rating" value="0">
            </div>
        </div>

        <!-- Comment Input -->
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>

   
@foreach ($reviews as $review)
    <div class="mt-3">
        <div class="card bg-light shadow-sm p-3 mb-4 d-flex flex-column" >
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
             

              
            </div>
            
            <!-- Delete Button at the bottom of the card -->
          
                
          
             </div>
        </div>
    </div>
@endforeach







    
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    let currentPage = 1; // Keep track of the current page

    $('#load-more-btn').click(function () {
        currentPage++; // Increment the page number
        let url = "{{ route('company.profile') }}?page=" + currentPage;

        // Disable the button while loading
        $(this).prop('disabled', true).text('Loading...');

        $.get(url, function (data) {
            if (data.jobs.length > 0) {
                data.jobs.forEach(function (job) {
                    // Format the created_at date
                    let createdAt = new Date(job.created_at);
                    let formattedDate = createdAt.toLocaleString();

                    // Construct the job card HTML
                    let jobCard = `
                        <div class="col-lg-4">
                            <div class="job-card mb-4 position-relative">
                                <button class="btn btn-link more-options-btn position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/company/editPost/${job.id}">Edit</a></li>
                                    <form action="/company/deletePost/${job.id}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <li><button class="dropdown-item" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button></li>
                                    </form>
                                </ul>
                                <h5 class="card-title me-3">${job.title}</h5>
                                <p class="card-text"><small class="text-muted">${formattedDate}</small></p>
                                <p class="card-text">${job.description}</p>
                                <a href="/company/applications/${job.id}" class="btn btn-primary">Show Applications</a>
                            </div>
                        </div>
                    `;

                    // Append the job card
                    $('.card-body .row.text-center.1').append(jobCard);
                });

                // Check if there are more pages
                if (!data.hasMorePages) {
                    $('#load-more-btn').remove(); // Remove the button if no more pages
                } else {
                    $('#load-more-btn').prop('disabled', false).text('Load More'); // Re-enable button
                }
            }
        }).fail(function () {
            alert('Failed to load more posts.');
            $('#load-more-btn').prop('disabled', false).text('Load More');
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.rate-star');
    const ratingInput = document.getElementById('rating');

    stars.forEach((star) => {
        star.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;

            // Update star colors
            stars.forEach((s, index) => {
                if (index < value) {
                    s.classList.remove('text-secondary');
                    s.classList.add('text-warning'); // Highlight star
                } else {
                    s.classList.remove('text-warning');
                    s.classList.add('text-secondary'); // Un-highlight star
                }
            });
        });
    });
});


</script>


<x-userFooter></x-userFooter>