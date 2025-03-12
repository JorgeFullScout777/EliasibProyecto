<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

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

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-primary:hover {
            background-color: var(--accent-blue);
            border-color: var(--accent-blue);
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
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
                                            <i class="fas fa-box"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">1,240</h2>
                                            <span class="text-uppercase">Total Inventory</span>
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
                                            <i class="fas fa-film"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">589</h2>
                                            <span class="text-uppercase">Unique Films</span>
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
                                            <i class="fas fa-store"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">24</h2>
                                            <span class="text-uppercase">Stores</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gráficos -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-line mr-2"></i>
                                        Inventory Overview
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="inventoryChart" style="height: 250px;"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-2"></i>
                                        Film Distribution
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="filmDistributionChart" style="height: 250px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Inventario -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-boxes mr-2"></i>
                                Inventory Data
                            </h3>
                        </div>
                        <div class="card-body text-center">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addInventoryModal">
                                <i class="fas fa-plus"></i> Add Inventory
                            </button>
                        </div>
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Inventory ID</th>
                                        <th>Film ID</th>
                                        <th>Store ID</th>
                                        <th>Last Update</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventoriData as $data)
                                    <tr>
                                        <td>{{ $data->inventory_id }}</td>
                                        <td>{{ $data->film_id }}</td>
                                        <td>{{ $data->store_id }}</td>
                                        <td>{{ $data->last_update }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editInventoryModal"
                                                data-id="{{ $data->inventory_id }}"
                                                data-film_id="{{ $data->film_id }}"
                                                data-store_id="{{ $data->store_id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('inventories.destroy', $data->inventory_id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{-- Botón Anterior --}}
                                <li class="page-item {{ $inventoriData->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $inventoriData->previousPageUrl() }}">&laquo;</a>
                                </li>

                                {{-- Números de página --}}
                                @for ($page = 1; $page <= $inventoriData->lastPage(); $page++)
                                    <li class="page-item {{ $page == $inventoriData->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $inventoriData->url($page) }}">{{ $page }}</a>
                                    </li>
                                    @endfor

                                    {{-- Botón Siguiente --}}
                                    <li class="page-item {{ $inventoriData->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $inventoriData->nextPageUrl() }}">&raquo;</a>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('ControlSidebar')
        @include('Footer')
    </div>

    }<!-- Modal -->
    <div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog" aria-labelledby="addInventoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addInventoryModalLabel">Add New Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('inventories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Film ID -->
                        <div class="form-group">
                            <label for="film_id">Film</label>
                            <input type="text" class="form-control" id="film_id" name="film_id" placeholder="Enter Film ID" value="{{ old('film_id') }}" required>
                        </div>

                        <!-- Store ID -->
                        <div class="form-group">
                            <label for="store_id">Store</label>
                            <input type="text" class="form-control" id="store_id" name="store_id" placeholder="Enter Store ID" value="{{ old('store_id') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Inventory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para Editar -->
    <div class="modal fade" id="editInventoryModal" tabindex="-1" role="dialog" aria-labelledby="editInventoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInventoryModalLabel">Edit Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="actorForm" method="POST">
                    @csrf
                    @method('PUT') <!-- Método PUT para la actualización -->
                    <div class="modal-body">
                        <!-- Film ID -->
                        <div class="form-group">
                            <label for="film_id">Film</label>
                            <input type="text" class="form-control" id="film_id" name="film_id" value="{{ old('film_id')}}" required>
                        </div>

                        <!-- Store ID -->
                        <div class="form-group">
                            <label for="store_id">Store</label>
                            <input type="text" class="form-control" id="store_id" name="store_id" value="{{old('store_id') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Gráfico de Línea (Inventory Overview)
        const inventoryChart = new Chart(document.getElementById('inventoryChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Inventory Count',
                    data: [1200, 1500, 1800, 1300, 1400, 1600],
                    borderColor: 'rgba(0, 123, 255, 1)',
                    backgroundColor: 'rgba(0, 243, 255, 0.1)',
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

        // Gráfico de Pie (Film Distribution)
        const filmDistributionChart = new Chart(document.getElementById('filmDistributionChart'), {
            type: 'pie',
            data: {
                labels: ['Action', 'Comedy', 'Drama', 'Sci-Fi'],
                datasets: [{
                    data: [300, 150, 200, 350],
                    backgroundColor: [
                        '#007bff',
                        '#17a2b8',
                        '#6f42c1',
                        '#28a745'
                    ]
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
                }
            }
        });
    </script>

    <script>
        $(function() {
            // AREA CHART
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Dataset 1',
                        backgroundColor: 'rgba(60,141,188,0.7)',
                        borderColor: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Dataset 2',
                        backgroundColor: 'rgba(210, 214, 222, .7)',
                        borderColor: '#c1c7d1',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            };
            var areaChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: true
            };
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            });

            // LINE CHART
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
            var lineChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Dataset 1',
                    fill: false,
                    borderColor: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                }]
            };
            var lineChartOptions = {
                responsive: true,
                maintainAspectRatio: false
            };
            new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            });
        });
    </script>

    <script>
        $('#editInventoryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var inventoryid = button.data('id');
            var film_id = button.data('film_id');
            var store_id = button.data('store_id');

            var modal = $(this);
            modal.find('.modal-body #inventory_id').val(inventoryid);
            modal.find('.modal-body #film_id').val(film_id);
            modal.find('.modal-body #store_id').val(store_id);
            modal.find('form').attr('action', '/inventories/' + inventoryid);
        });
    </script>
</body>

</html>