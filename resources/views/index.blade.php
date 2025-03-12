<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CineMetrics Pro</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dist/img/CinemaStudio.png') }}" type="image/x-icon">

    <style>
        :root {
            --primary-dark: #0A0A0A;
            --primary-blue: #00F3FF;
            --accent-blue: #0066FF;
            --gradient-bg: linear-gradient(135deg, #000428 0%, #004e92 100%);
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--primary-dark);
            color: #fff;
        }

        .main-sidebar {
            background: var(--gradient-bg) !important;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .brand-link {
            border-bottom: 2px solid var(--primary-blue);
        }

        .card {
            background: rgba(10, 10, 10, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .table {
            color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.03);
        }

        .img-thumbnail {
            width: 100px;
            height: 150px;
            object-fit: cover;
        }
    </style>

</head>

<body class="dark-mode">
    <div class="wrapper">

        @include('Navbar')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('index') }}" class="brand-link text-center">
                <img src="dist/img/CinemaStudio.png" alt="Logo" class="brand-image pulse-animation">
                <span class="brand-text font-weight-light" style="font-size: 1.4em;">CINEMETRICS</span>
            </a>
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
                                        <div class="icon-box bg-blue">
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
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-line mr-2"></i>
                                        Rental Performance
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="performanceChart" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-fire mr-2"></i>
                                        Top Movies
                                    </h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                            <img src="https://es.web.img2.acsta.net/medias/nmedia/18/66/74/01/20350623.jpg" class="img-thumbnail" alt="Movie">
                                            <div class="ml-3">
                                                <h6 class="mb-1">The Dark Knight</h6>
                                                <small class="text-muted">750 rentals</small>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                            <img src="https://es.web.img3.acsta.net/pictures/14/10/02/11/07/341344.jpg" class="img-thumbnail" alt="Movie">
                                            <div class="ml-3">
                                                <h6 class="mb-1">Interstellar</h6>
                                                <small class="text-muted">390 rentals</small>
                                            </div>
                                        </a>

                                        <!-- Más elementos -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Inventario -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-boxes mr-2"></i>
                                Inventory Overview
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="bg-blue-gradient">
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Inception</td>
                                        <td>Action</td>
                                        <td>24</td>
                                        <td><span class="badge bg-success">Available</span></td>
                                    </tr>
                                    <tr>
                                        <td>The Dark Knight</td>
                                        <td>Action</td>
                                        <td>0</td>
                                        <td><span class="badge bg-danger">Out of Stock</span></td>
                                    </tr>
                                    <tr>
                                        <td>Interstellar</td>
                                        <td>Sci-Fi</td>
                                        <td>12</td>
                                        <td><span class="badge bg-success">Available</span></td>
                                    </tr>
                                    <!-- Más filas -->
                                </tbody>
                            </table>
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
                events: [{
                        title: 'Movie Night',
                        start: '2025-03-10',
                        description: 'Special movie event for members.',
                        color: '#007bff'
                    },
                    {
                        title: 'Release: Movie X',
                        start: '2025-03-15',
                        description: 'Premiere release of Movie X.',
                        color: '#28a745'
                    }
                ]
            });
        });

        // Gráfico con estilo neón
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Rentals',
                    data: [65, 59, 80, 81, 56, 55],
                    borderColor: '#00F3FF',
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: '#00F3FF',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#fff',
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: 'rgba(255,255,255,0.1)'
                        },
                        ticks: {
                            color: '#fff'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255,255,255,0.1)'
                        },
                        ticks: {
                            color: '#fff'
                        }
                    }
                }
            }
        });

        var ctx2 = document.getElementById('rentals-sales-chart').getContext('2d');
        var rentalsSalesChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales',
                    data: [18000, 20000, 22000, 21000, 19000, 25000],
                    backgroundColor: 'rgba(60,141,188,0.5)',
                    borderColor: 'rgba(60,141,188,1)',
                    borderWidth: 1
                }, {
                    label: 'Rentals',
                    data: [1200, 1500, 1800, 1300, 1400, 1600],
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
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