<header class="banner">
    <x-comNav :profileImg="$profileImg">
        <x-slot:title>
             About
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
                background-image: url('{{asset('images/bradcam.png')}}');
                background-size: cover;
                background-position: center;
                padding-top: 80px;
                /* Adjust this based on navbar height */
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

        <main class="container ">
            <div class="row ">
                <div class="col-md-6 d-flex flex-column justify-content-center ">
                    <p class="text-white align-self-start">Know More</p>

                    <h1 class="text-white">About Us</h1>
                    
                </div>
            
            </div>
</header>
    </x-comNav>

    <div class="about-section text-center">
        <h1 class="section-heading mb-4">About Us</h1>
        <p class="lead">
            Welcome to <strong>MyWebsite</strong>, your one-stop destination for connecting talent and opportunity. 
            We specialize in empowering students, recent graduates, and professionals by providing access to 
            training programs, temporary projects, and internships that lead to success.
        </p>
    </div>

    <div class="container">
        <!-- Mission Section -->
        <div class="row mb-5">
            <div class="col-lg-6 d-flex align-items-center">
                <div>
                    <h2 class="section-heading">Our Mission</h2>
                    <p>
                        At <strong>MyWebsite</strong>, our mission is to create meaningful connections between 
                        individuals and companies. By providing opportunities for skill development and career growth, 
                        we aim to build a stronger, more vibrant professional community.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{asset('images/2person.webp')}}" class="img-fluid rounded" alt="Mission Image">
            </div>
        </div>

        <!-- Values Section -->
        <div class="row">
            <div class="col-lg-4">
                <div class="values-box text-center">
                    <h3>Innovation</h3>
                    <p>We embrace creativity and technology to deliver unique solutions that drive growth.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="values-box text-center">
                    <h3>Integrity</h3>
                    <p>We uphold the highest standards of ethics and transparency in all our dealings.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="values-box text-center">
                    <h3>Collaboration</h3>
                    <p>We believe in the power of teamwork to create positive, lasting impacts.</p>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="team-section text-center mt-5">
            <h2 class="section-heading">Meet Our Team</h2>
            <p class="mb-5">A dedicated group of professionals passionate about making a difference.</p>
            <div class="row justify-content-center" >
              
                
                <div class="col-lg-4">
                    <img src="{{asset('images/omar.jpg')}}"   class="img-fluid w-75 h-75" alt="Team Member">
                    <h5 class="mt-3">Omar Safi</h5>
                    <p>Lead Developer</p>
                </div>
            </div>
        </div>
    </div>


       



<x-comFooter>

</x-comFooter>