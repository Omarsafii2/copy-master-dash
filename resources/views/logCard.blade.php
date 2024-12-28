<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Scope</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .card-container {
      display: flex;
      gap: 2rem;
      margin-top: 2rem;
    }
    .custom-card {
      width: 300px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-radius: 1rem;
    }
    .custom-card:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .custom-card .card-body {
      text-align: center;
    }
    .custom-card .btn-primary {
      transition: background-color 0.3s ease;
    }
    .custom-card .btn-primary:hover {
      background-color: #0056b3; /* Darker blue */
    }
    .heading {
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      color: #343a40; /* Dark gray */
    }
    .subheading {
      font-size: 1.2rem;
      text-align: center;
      color: #6c757d; /* Light gray */
      margin-top: 0.5rem;
    }
  </style>
</head>
<body class="bg-primary">
  <!-- Welcome Heading -->
  <div class="text-center">
    <h1 class="heading text-light">Welcome to Job Scope</h1>
    <p class="subheading text-light">Connecting users and companies for the best opportunities</p>
  </div>

  <!-- Cards Container -->
  <div class="card-container">
    <!-- Companies Card -->
    <div class="card shadow custom-card">
      <div class="card-body">
        <h5 class="card-title">Companies</h5>
        <p class="card-text">Login for registered companies on the platform.</p>
        <a href="/CompanyLog" class="btn btn-primary"> Companies Login</a>
      </div>
    </div>

    <!-- Users Card -->
    <div class="card shadow custom-card">
      <div class="card-body">
        <h5 class="card-title">Users</h5>
        <p class="card-text">Login for registered users on the platform.</p>
        <a href="/user/login" class="btn btn-primary">Users Login</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
