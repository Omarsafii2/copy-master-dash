<header class="banner">
    <x-navbar>
        <style>
            .banner {
                background-image: url('{{asset('images/bradcam.png')}}');
                background-size: cover;
                background-position: center;
                padding-top: 80px;
            }

            .card-img-size {
                width: 100%;
                height: 200px;
                object-fit: cover;
                object-position: center;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
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

        <main class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p class="text-white align-self-start">Know More</p>
                    <h1 class="text-white">Contact Us</h1>
                </div>
            </div>
        </main>
    </x-navbar>
</header>

<!-- Success Message Display -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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
