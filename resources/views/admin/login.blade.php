<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Job Scope</title>
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

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            display: flex;
            animation: slideIn 0.6s ease-out;
        }

        .login-image {
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

        .login-form {
            width: 50%;
            padding: 40px;
            background: white;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-subtitle {
            color: var(--light-text);
            margin-bottom: 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
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

        .btn-login {
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            padding: 0.8rem;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 300px;
            border-radius: 10px;
            animation: slideInRight 0.5s ease-out;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: var(--light-text);
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e9ecef;
        }

        .divider span {
            padding: 0 1rem;
        }

        .social-login {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            flex: 1;
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-color);
            text-decoration: none;
        }

        .social-btn:hover {
            background: #f8f9fa;
            border-color: var(--primary-color);
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 768px) {
            .login-image {
                display: none;
            }
            .login-form {
                width: 100%;
            }
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <!-- Alert Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-message">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @elseif (session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert" id="info-message">
            <i class="bi bi-info-circle me-2"></i>
            {{ session('message') }}
        </div>
    @endif

    <div class="login-container">
        <div class="login-image">
            <h2 class="display-4 fw-bold mb-4">Welcome Back!</h2>
            <p class="lead">Access your account and Find The Talents You Need.</p>
        </div>
        
        <div class="login-form">
            <h2 class="form-title">Login</h2>
            <p class="form-subtitle">Please enter your credentials to continue</p>

            <form action="/loginpost" method="POST">
                @csrf
                
                <div class="form-floating">
                    <input type="email" class="form-control" id="emailAddress" name="email" placeholder="Email Address" required>
                    <label for="emailAddress"><i class="bi bi-envelope me-2"></i>Email Address</label>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

               

                <button type="submit" class="btn btn-login text-white">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>
            </form>

      

      
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Alert auto-dismiss
        const alerts = ['success-message', 'error-message', 'info-message'];
        alerts.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                setTimeout(() => {
                    element.style.opacity = '0';
                    setTimeout(() => element.remove(), 500);
                }, 3000);
            }
        });
    </script>
</body>
</html>