<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stores</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-dark: #0A0A0A;
            --primary-blue: #00F3FF;
            --accent-red: #ff0000;
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

        .card-header {
            background: rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table {
            color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.03);
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-primary:hover {
            background-color: var(--accent-blue);
            border-color: var(--accent-blue);
        }

        .btn-danger {
            background-color: var(--accent-red);
            border-color: var(--accent-red);
        }

        .btn-danger:hover {
            background-color: #cc0000;
            border-color: #cc0000;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-right: 15px;
        }

        .icon-box.bg-cyan {
            background-color: var(--primary-blue);
        }

        .icon-box.bg-red {
            background-color: var(--accent-red);
        }

        .icon-box.bg-purple {
            background-color: #6f42c1;
        }

        #map,
        #map2 {
            height: 350px;
            width: 100%;
            border: 2px solid #ddd;
            border-radius: 8px;
        }
    </style>
</head>

<body class="dark-mode">
    <div class="wrapper">
        @include('Navbar')

        <!-- Main Sidebar Container -->
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
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Stores</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Stores</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Store Records</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Store ID</th>
                                                        <th>Manager Staff ID</th>
                                                        <th>Address ID</th>
                                                        <th>Last Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($stores as $store)
                                                    <tr>
                                                        <td>{{ $store->store_id }}</td>
                                                        <td>{{ $store->manager_staff_id }}</td>
                                                        <td>{{ $store->address_id }}</td>
                                                        <td>{{ $store->last_update }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Store Locations (Laravel)</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div id="map"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Select a Location (MySQL)</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div id="map2"></div>
                                                    <p id="coords"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.content -->
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        @include('ControlSidebar')
        @include('Footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <!-- Leaflet JS desde CDNJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inicializa el primer mapa (Laravel)
            var map = L.map('map').setView([40.7128, -74.0060], 5); // Oficina de Laravel (Nueva York)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Lista de tiendas con coordenadas de Laravel
            var stores = [{
                    name: "123 Laravel St, New York",
                    lat: 40.7128,
                    lng: -74.0060
                },
                {
                    name: "456 Laravel Blvd, NY",
                    lat: 40.7306,
                    lng: -73.9352
                }
            ];

            // Agrega los marcadores en el mapa de Laravel
            stores.forEach(store => {
                L.marker([store.lat, store.lng]).addTo(map)
                    .bindPopup(store.name)
                    .openPopup();
            });

            // Inicializa el segundo mapa (MySQL)
            var map2 = L.map('map2').setView([25.532861, -103.322991], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map2);

            var marker;

            map2.on('click', function(e) {
                if (marker) {
                    map2.removeLayer(marker);
                }
                marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map2);
                document.getElementById('coords').innerText = `Lat: ${e.latlng.lat}, Lng: ${e.latlng.lng}`;
            });
        });
    </script>

</body>

</html>