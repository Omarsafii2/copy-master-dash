<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Job Scope</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

   <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --text-color: #2b2d42;
            --light-text: #8d99ae;
        }

        body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            display: flex;
            animation: slideIn 0.6s ease-out;
        }

        .register-image {
            background: linear-gradient(135deg, var(--accent-color), var(--secondary-color)),
                url('https://your-image-url.jpg');
            background-size: cover;
            background-position: center;
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            color: white;
        }

        .register-form {
            width: 50%;
            padding: 20px;
            background: white;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem;
            text-align: left;
        }

        .form-subtitle {
            color: var(--light-text);
            margin-bottom: 1rem;
        }

        .form-floating {
            margin-bottom: 1rem;
        }

        .form-floating .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 1rem 0.75rem;
            height: auto;
            font-size: 1rem;
        }

        .form-floating .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: none;
        }

        .form-floating label {
            padding: 1rem 0.75rem;
        }

        .btn-register {
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            padding: 0.8rem;
            font-weight: 600;
            width: 100%;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .register-image {
                display: none;
            }

            .register-form {
                width: 100%;
            }
        }
        </style>
</head>

<body>

    <div class="form-container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="register-container">
        <div class="register-image">
            <h2 class="display-4 fw-bold mb-4">Join Us!</h2>
            <p class="lead">Create your account and discover new opportunities today.</p>
        </div>

        <div class="register-form">
            <h2 class="form-title">Register</h2>
            <p class="form-subtitle">Fill in the details to create your account</p>


        <form action="/user/register" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" name="name" id="name" class="form-control shadow-sm" required>
                    @error('name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control shadow-sm" required>
                    @error('last_name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control shadow-sm" required>
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control shadow-sm" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm " required>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword" class="form-control shadow-sm " required>
                    @error('cpassword')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
               
                <div class="col-md-6 mb-3">
                    <label for="img" class="form-label">Upload Image <small>(Optional)</small></label>
                    <input id="img" type="file" name="img" class="form-control shadow-sm">
                    @error('img')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
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

            <div class="row">

              

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

            <!-- Submit -->
            <button type="submit" class="btn btn-primary w-100">Register</button>

            <!-- Link to Login -->
            <div class="link-container mt-3">
                <p>Already have an account? <a href="/user/login" class="text-decoration-none fw-bold" >Login</a></p>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>




