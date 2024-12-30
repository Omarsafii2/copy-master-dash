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

    .card-img-size {
                width: 100%;
                /* تجعل الصورة تمتد على عرض الكارد */
                height: 200px;
                /* يمكنك تغيير هذا الارتفاع حسب الحاجة */
                object-fit: cover;
                /* تجعل الصورة تملأ الحاوية دون تشويه */
                object-position: center;
                /* تضمن أن الصورة تتركز داخل الحاوية */
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }
            .section-heading {
            color: #0d6efd; /* Bootstrap primary color */
            font-weight: bold;
        }

        .about-section {
            padding: 60px 20px;
        }

        .values-box {
            background-color: #0d6efd; /* Primary color background */
            color: #fff;
            border-radius: 8px;
            padding: 30px;
            margin-top: 30px;
            transition: transform 0.3s ease-in-out;
        }

        .values-box:hover {
            transform: translateY(-10px); /* Lift effect on hover */
        }

        .team-section img {
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

</style>

<header class="banner">
    <x-comNav :profileImg="$profileImg">
        <x-slot:title>
            User Profile
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
                            <li class="breadcrumb-item"><a href="/company/home"><i class="bi bi-house-door"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="/company/profile">Profile</a></li>


                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>

                    <!-- Title Section -->
                    <div class="mt-3 mb-3">
                        <p class="banner-subtitle mb-2">Show The</p>
                        <h1 class="page-title text-white">Profile</h1>
                    </div>
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