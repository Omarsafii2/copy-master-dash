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
    </style>

    <header class="banner">
        <x-Navbar>
            <x-slot:title>
                Contact Us
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
                                <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>

                        <!-- Title Section -->
                        <div class="mt-3 mb-3">
                            <p class="banner-subtitle mb-2">Have any questions or feedback? We'd love to hear from you! </p>
                            <h1 class="page-title text-white">Contact Us</h1>
                        </div>
                    </div>
                </div>
            </main>
        </x-Navbar>
    </header>

<!-- Contact Form Section -->
<div class="contact-section mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-sm-12">
                <div class="contact-form">
                    <h2 class="text-center mb-4">Contact Us</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('/contact') }}" method="POST">
                        @csrf
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control w-100" placeholder="Enter subject" value="{{ old('subject') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea name="message" id="message" rows="5" class="form-control" placeholder="Type your message here" required>{{ old('message') }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer></x-footer>
