<header class="banner">


    <x-comNav :profileImg="$profileImg">
        <x-slot:title>
            Edit Post
        </x-slot:title>

            
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
 @elseif (session('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert" id="info-message" style="transition: opacity 0.5s;">
        {{ session('message') }}
    </div>
    <script>
        setTimeout(() => {
            const infoMessage = document.getElementById('info-message');
            if (infoMessage) {
                infoMessage.style.opacity = '0'; // Start fading out
                setTimeout(() => infoMessage.remove(), 500); // Remove after fade-out
            }
        }, 3000); // 3-second delay before fade-out

    </script>
@endif

        <style>
            .banner {
                background-image: url('{{ asset("images/bradcam.png") }}');
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
        </style>

        <main class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p class="text-white align-self-start">Show The</p>
                    <h1 class="text-white">Applications</h1>
                </div>

            </div>
        </main>
    </x-comNav>
</header>

<div class="container mt-5 mb-5">
<div class="row ">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{asset($user->img)}}" style="width:250px ; height:250px; " alt="">
            <h5 class="my-3">{{$user->name}}</h5>
            <p class="text-muted mb-1">{{$user->title}}</p>
            <p class="text-muted mb-2">loaction: {{$user->country}}</p>
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
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->phone_number}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Education</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->education}}</p>
              </div>
            </div>
            
         
          
           <hr>
           <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Experience</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->experince}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">CV</p>
              </div>
              <div class="col-sm-9">
                  <a href="{{$user->cv}}" target="_blank" class="text-primary mb-0 text-decoration-none">{{$user->name." cv"}}</a>
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
                            <p class="text-muted ">{{$user->bio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 </div>   

    <x-comFooter></x-comFooter>