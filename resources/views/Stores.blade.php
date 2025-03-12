<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stores</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />

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

        #map,
        #map2 {
            height: 350px;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-primary:hover {
            background-color: var(--accent-blue);
            border-color: var(--accent-blue);
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

        .icon-box.bg-blue {
            background-color: var(--accent-blue);
        }

        .icon-box.bg-purple {
            background-color: #6f42c1;
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
                    <!-- Tarjetas de Estadísticas -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stats-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-cyan">
                                            <i class="fas fa-store"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">{{ $stores->count() }}</h2>
                                            <span class="text-uppercase">Total Stores</span>
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
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">{{ $stores->count() }}</h2>
                                            <span class="text-uppercase">Managers</span>
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
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">{{ $stores->count() }}</h2>
                                            <span class="text-uppercase">Locations</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Tiendas -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-store mr-2"></i>
                                Store Records
                            </h3>
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

                    <!-- Mapas -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-map-marked-alt mr-2"></i>
                                        Store Locations (Laravel)
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-map-pin mr-2"></i>
                                        Select a Location (MySQL)
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div id="map2"></div>
                                    <p id="coords" class="mt-2"></p>
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
            }, ];

            // Agrega los marcadores en el mapa de Laravel
            stores.forEach(store => {
                L.marker([store.lat, store.lng]).addTo(map)
                    .bindPopup(store.name)
                    .openPopup();
            });

            // Inicializa el segundo mapa (MySQL)
            var initialLat = 25.529788493968248;
            var initialLng = -103.3211213350296;
            var map2 = L.map('map2').setView([initialLat, initialLng], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map2);

            // Agrega un marcador inicial en el mapa de MySQL
            var marker = L.marker([initialLat, initialLng]).addTo(map2)
                .bindPopup("UTT")
                .openPopup();
            document.getElementById('coords').innerText = `Lat: ${initialLat}, Lng: ${initialLng}`;

            map2.on('click', function(e) {
                if (marker) {
                    map2.removeLayer(marker);
                }
                var name = prompt("UTT");
                marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map2)
                    .bindPopup(name)
                    .openPopup();
                document.getElementById('coords').innerText = `Lat: ${e.latlng.lat}, Lng: ${e.latlng.lng}`;
                map2.setView([e.latlng.lat, e.latlng.lng], 15); // Zoom in on the clicked coordinates
            });
        });
    </script>
</body>

</html>