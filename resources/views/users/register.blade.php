<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration - Job Scope</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                color: #343a40;
                font-family: Arial, sans-serif;
            }

            .form-container {
                width: 100%;
                max-width: 600px;
                background-color: #ffffff;
                padding: 2rem;
                border-radius: 1rem;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .form-container h2 {
                text-align: center;
                margin-bottom: 1.5rem;
                font-weight: bold;
                color: #343a40;
            }

            .form-container .form-label {
                font-weight: 500;
                color: #495057;
            }

            .form-container .form-control {
                border-radius: 0.5rem;
            }

            .form-container .btn-primary {
                width: 100%;
                font-size: 1.2rem;
                padding: 0.75rem;
                border-radius: 0.5rem;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .form-container .btn-primary:hover {
                background-color: #0056b3;
                transform: scale(1.03);
            }

            .form-container .error-message {
                font-size: 0.9rem;
                color: #dc3545;
            }

            .file-info {
                font-size: 0.8rem;
                color: #6c757d;
            }
        </style>
    </head>

    <body class="bg-primary">

        
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


        <div class="m-5">
            <!-- Registration Form Container -->
            <div class="form-container">
                <h2>Register for Job Scope</h2>
                <form action="/user/register" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Company Name -->
                    <div class="mb-3 row">
                        <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">First Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                @error('name')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                                @error('last_name')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>

                       
                    </div>
                      <div class="row">
                        <!-- Email Address -->
                        <div class="col-md-6  mb-2">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="email" id="emailAddress" name="email" class="form-control" required>
                            @error('email')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label" >Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>  

                        <!-- Password and Confirm Password -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="c-password" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" id="c-password" class="form-control" required>
                                @error('cpassword')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                        <!-- Upload Image -->
                        <div class="col-md-6 mb-3">
                            <label for="img" class="form-label">Upload Image</label>
                            <input id="img" type="file" name="img" class="form-control">
                            <div class="file-info">Accepted formats: jpg, png, jpeg</div>
                            @error('img')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address and License -->
                     
                            <div class="col-md-6 mb-3">
                                <label for="education" class="form-label">Education</label>
                                <select class="form-select" id="education" name="education" required>
                                <option value="" disabled selected>Select your highest level of education</option>
                                <option value="bechlore">Bachelor</option>
                                <option value="master">Master</option>
                                <option value="phd">PhD</option>
                                </select>
                                @error('category')
                                <span class="error-message">{{ $message }}</span>
                                @enderror        
                            </select>
                            </div>
                        
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="category" class="form-label">Specialaization</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="IT">Information Technology</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Education">Education</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Construction">Construction</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Transportation">Transportation</option>
                                    <option value="Hospitality">Hospitality</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Energy">Energy</option>
                                    <option value="Telecommunications">Telecommunications</option>
                                    <option value="Media">Media</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Consulting">Consulting</option>
                                    <option value="Government">Government</option>
                                    <option value="Nonprofit">Nonprofit</option>
                                    <option value="Automotive">Automotive</option>
                                    <option value="Aerospace">Aerospace</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Food and Beverage">Food and Beverage</option>
                                    <option value="Pharmaceuticals">Pharmaceuticals</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>