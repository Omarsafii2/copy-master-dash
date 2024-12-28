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
        <div class="form-container ">
            <h2>Login Job Scope</h2>
            <form action="/user/login" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="emailAddress" class="form-label">Email Address</label>
                    <input type="email" id="emailAddress" name="email" class="form-control" required>
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password and Confirm Password -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @error('password')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>