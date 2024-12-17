<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'any'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c1df698565.js" crossorigin="anonymous"></script>
    <style>
           @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Playwrite+DE+VA+Guides&family=Playwrite+NL+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
  *{
    font-family: "Rubik", sans-serif;

  }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1030; /* Ensures the navbar stays above other content */
            
        }

        .form-control {
            max-width: 300px;
        }

        .auth-links a {
            margin-left: 15px;
        }

        /* Make the navbar stick to the top of the page */
        .sticky-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%; /* Full width */
            z-index: 1030; /* Keep it above other content */
            background-color: white; /* Navbar background color */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }


        /* To prevent content from being hidden behind the navbar */
        .content {
            margin-top: 80px; /* Adjust this value based on the height of your navbar */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light sticky-navbar p-3 container-fluid">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">MyWebsite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Web Development</a></li>
                            <li><a class="dropdown-item" href="#">SEO</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Support</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex me-3    " role="search">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search users...">
                </form>
                <div class="auth-links d-flex align-items-center mt-2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="content mt-4">
        {{$slot}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('table tbody tr');

            rows.forEach(row => {
                const name = row.querySelector('td').innerText.toLowerCase();
                const phone = row.querySelector('td:nth-child(2)').innerText.toLowerCase();

                // Show or hide row based on search query
                if (name.includes(searchValue) || phone.includes(searchValue)) {
                    row.style.display = '';  // Show row
                } else {
                    row.style.display = 'none';  // Hide row
                }
            });
        });
    </script>
</body>
</html>
