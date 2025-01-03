<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Company'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c1df698565.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300..900&display=swap');

        * {
            font-family: "Rubik", sans-serif;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1030;
        }

        .sticky-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content {
            margin-top: 80px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #0d6efd;
            text-decoration: underline;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-navbar p-3 container-fluid">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary" href="/users/home">Job Scope</a>
            <button class="navbar-toggler bg-light text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light {{ Request::is('users/home') ? 'active' : '' }}" href="/users/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light {{ Request::is('users/job') ? 'active' : '' }}" href="/users/job">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light {{ Request::is('users/company') ? 'active' : '' }}" href="/users/company">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light {{ Request::is('users/about') ? 'active' : '' }}" href="/users/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light {{ Request::is('users/contact') ? 'active' : '' }}" href="/users/contact">Contact</a>
                    </li>
                </ul>

                <div class="auth-links d-flex align-items-center mt-2">
                    <a href="/users/profile" class="">
                        <img src="{{ asset($profileImg ?? 'default-profile.png') }}" alt="Profile Image" class="profile-img">
                    </a>
                    <li>
                        <a href="/user/logout" class="text-white fs-3 me-3"><i class="bi bi-box-arrow-right"></i></a>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <div class="content mt-4">
        {{$slot}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
        