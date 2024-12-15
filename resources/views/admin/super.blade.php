<x-layout>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <x-slot:title>
        Super Admin Dashboard
    </x-slot:title>

    <!-- Header Section -->
    <div class="container mt-4">
        <h1 class="text-center text-secondary mb-5">Welcome to the Super Admin Dashboard</h1>
    </div>
    <hr>

    <!-- Statistics Cards Section -->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Total Users Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted">Users</h5>
                            <p class="card-text fs-4 text-dark">{{ $totalUsers }}</p>
                        </div>
                        <i class="bi bi-person-circle fs-2 text-primary"></i>
                    </div>
                </div>
            </div>

            <!-- Total Companies Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted">Companies</h5>
                            <p class="card-text fs-4 text-dark">{{ $totalCompanies }}</p>
                        </div>
                        <i class="bi bi-building fs-2 text-info"></i>
                    </div>
                </div>
            </div>

            <!-- Total Jobs Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted">Jobs</h5>
                            <p class="card-text fs-4 text-dark">{{ $totalJobs }}</p>
                        </div>
                        <i class="bi bi-briefcase fs-2 text-success"></i>
                    </div>
                </div>
            </div>

            <!-- Total Subscriptions Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted">Subscriptions</h5>
                            <p class="card-text fs-4 text-dark">{{ $totalSubscriptions }}</p>
                        </div>
                        <i class="bi bi-file-earmark-text fs-2 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Users and Companies Statistics Chart -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Users and Companies Statistics</h5>
                        <canvas id="usersCompaniesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Jobs and Subscriptions Statistics Chart -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Jobs and Subscriptions</h5>
                        <canvas id="jobsSubscriptionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newest Companies and Job Posts Section -->
    <div class="container mt-5">
        <div class="row">
            <!-- Newest Companies -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Newest Companies</h5>
                        <ul class="list-group">
                            @foreach ($newestCompanies as $company)
                                <li class="list-group-item">
                                    <strong>{{ $company->name }}</strong> - {{ $company->created_at->format('M d, Y') }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Newest Job Posts -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-light rounded-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Newest Job Posts</h5>
                        <ul class="list-group">
                            @foreach ($newestJobs as $job)
                                <li class="list-group-item">
                                    <strong>{{ $job->title }}</strong> - {{ $job->created_at->format('M d, Y') }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Initialize Charts -->
    <script>
        // Users and Companies Chart
        var ctx1 = document.getElementById('usersCompaniesChart').getContext('2d');
        var usersCompaniesChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Users', 'Companies'],
                datasets: [{
                    label: 'Total Count',
                    data: [{{ $totalUsers }}, {{ $totalCompanies }}],
                    backgroundColor: ['#007bff', '#17a2b8'],
                    borderColor: ['#0056b3', '#138496'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff'
                    }
                }
            }
        });

        // Jobs and Subscriptions Chart
        var ctx2 = document.getElementById('jobsSubscriptionsChart').getContext('2d');
        var jobsSubscriptionsChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Jobs', 'Subscriptions'],
                datasets: [{
                    data: [{{ $totalJobs }}, {{ $totalSubscriptions }}],
                    backgroundColor: ['#28a745', '#ffc107'],
                    borderColor: ['#218838', '#e0a800'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff'
                    }
                }
            }
        });
    </script>
</x-layout>
