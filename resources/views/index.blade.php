<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinema Studio</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dist/img/CinemaStudio.png') }}" type="image/x-icon">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
</head>

<body class="dark-mode">
    <div class="wrapper">
        @include('Navbar')

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('Sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background: url('dist/img/bg-pattern.png')">
            <section class="content pt-4">
                <div class="container-fluid">
                    <!-- Tarjetas de Estadísticas -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-cyan">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">1,240</h2>
                                            <span class="text-uppercase">Rentals Today</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-red">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">$24,560</h2>
                                            <span class="text-uppercase">Daily Revenue</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-purple">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">589</h2>
                                            <span class="text-uppercase">Active Clients</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gráficos y Tablas -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-line mr-2"></i>
                                        Rental Performance
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="rentals-chart" style="height: 250px;"></canvas>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-film mr-2"></i>
                                        Top Movies
                                    </h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                            <img src="dist/img/movie1.png" style="height: 250px;" class="img-thumbnail" alt="Movie">
                                            <div class="ml-3">
                                                <h6 class="mb-1">The Dark Knight</h6>
                                                <small class="text-muted">750 rentals</small>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                            <img src="dist/img/movie2.png" style="height: 250px;" class="img-thumbnail" alt="Movie">
                                            <div class="ml-3">
                                                <h6 class="mb-1">Interstellar</h6>
                                                <small class="text-muted">390 rentals</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-bar mr-2"></i>
                                        Movie Rentals Overview
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="rentals-sales-chart" style="height: 250px;"></canvas>
                                </div>
                            </div>

                            <!-- Calendar -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        Calendar
                                    </h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div id="calendar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('ControlSidebar')
        @include('Footer')
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: [
                    {
                        title: 'Movie Night',
                        start: '2025-03-10',
                        description: 'Special movie event for members.',
                        color: 'var(--accent-red)' // Corregido
                    },
                    {
                        title: 'Release: Movie X',
                        start: '2025-03-15',
                        description: 'Premiere release of Movie X.',
                        color: 'var(--accent-red)' // Corregido
                    }
                ]
            });
        });

        // Rentals Chart
        const ctx = document.getElementById('rentals-chart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Rentals',
                    data: [1200, 1500, 1800, 1300, 1400, 1600],
                    borderColor: 'var(--accent-red)', // Corregido
                    backgroundColor: 'rgba(255, 0, 0, 0.2)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#fff'
                        }
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#fff'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#fff'
                        }
                    }
                }
            }
        });

        // Rentals Sales Chart
        const ctx2 = document.getElementById('rentals-sales-chart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales',
                    data: [18000, 20000, 22000, 21000, 19000, 25000],
                    backgroundColor: 'rgba(255, 0, 0, 0.5)',
                    borderColor: 'var(--accent-red)', // Corregido
                    borderWidth: 1
                }, {
                    label: 'Rentals',
                    data: [1200, 1500, 1800, 1300, 1400, 1600],
                    backgroundColor: 'rgba(255, 255, 255, 0.2)',
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>