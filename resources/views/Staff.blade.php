<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

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
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">{{ $staff->count() }}</h2>
                                            <span class="text-uppercase">Total Staff</span>
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
                                            <h2 class="mb-0">{{ $staff->count() }}</h2>
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
                                            <i class="fas fa-store"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h2 class="mb-0">{{ $staff->count() }}</h2>
                                            <span class="text-uppercase">Stores</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Staff -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-2"></i>
                                Staff Records
                            </h3>
                            <div class="text-center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addStaffModal">
                                    <i class="fas fa-plus"></i> Add Staff
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Store ID</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $member)
                                    <tr>
                                        <td>{{ $member->staff_id }}</td>
                                        <td>{{ $member->first_name }}</td>
                                        <td>{{ $member->last_name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->username }}</td>
                                        <td>{{ $member->store_id }}</td>
                                        <td>
                                            <span class="badge {{ $member->active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $member->active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editStaffModal"
                                                data-id="{{ $member->staff_id }}"
                                                data-first_name="{{ $member->first_name }}"
                                                data-last_name="{{ $member->last_name }}"
                                                data-email="{{ $member->email }}"
                                                data-username="{{ $member->username }}"
                                                data-store_id="{{ $member->store_id }}"
                                                data-active="{{ $member->active }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('staff.destroy', $member->staff_id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
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
                                <li class="page-item {{ $staff->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $staff->previousPageUrl() }}">&laquo;</a>
                                </li>

                                {{-- Números de página --}}
                                @for ($page = 1; $page <= $staff->lastPage(); $page++)
                                    <li class="page-item {{ $page == $staff->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $staff->url($page) }}">{{ $page }}</a>
                                    </li>
                                    @endfor

                                    {{-- Botón Siguiente --}}
                                    <li class="page-item {{ $staff->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $staff->nextPageUrl() }}">&raquo;</a>
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

    <!-- Modal -->
    <div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="addStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">Add New Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('staff.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        </div>

                        <!-- Address ID -->
                        <div class="form-group">
                            <label for="address_id">Address ID</label>
                            <input type="number" class="form-control" id="address_id" name="address_id" value="{{ old('address_id') }}" required>
                        </div>

                        <!-- Picture -->
                        <div class="form-group">
                            <label for="picture">Picture URL</label>
                            <input type="text" class="form-control" id="picture" name="picture" value="{{ old('picture') }}">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <!-- Store ID -->
                        <div class="form-group">
                            <label for="store_id">Store ID</label>
                            <input type="number" class="form-control" id="store_id" name="store_id" value="{{ old('store_id') }}" required>
                        </div>

                        <!-- Active -->
                        <div class="form-group">
                            <label for="active">Active</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Username -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Staff</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="editStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStaffModalLabel">Editar Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('staff.update', $member->staff_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $member->staff_id }}">

                    <div class="modal-body">
                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="first_name">Nombre</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ old('first_name', $member->first_name) }}" required>
                        </div>

                        <!-- Apellido -->
                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ old('last_name', $member->last_name) }}" required>
                        </div>

                        <!-- Dirección -->
                        <div class="form-group">
                            <label for="address_id">Dirección</label>
                            <input type="number" class="form-control" id="address_id" name="address_id"
                                value="{{ old('address_id', $member->address_id) }}" required>
                        </div>

                        <!-- Imagen (URL) -->
                        <div class="form-group">
                            <label for="picture">URL de Imagen</label>
                            <input type="text" class="form-control" id="picture" name="picture"
                                value="{{ old('picture', $member->picture) }}">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $member->email) }}" required>
                        </div>

                        <!-- Tienda ID -->
                        <div class="form-group">
                            <label for="store_id">ID de Tienda</label>
                            <input type="number" class="form-control" id="store_id" name="store_id"
                                value="{{ old('store_id', $member->store_id) }}" required>
                        </div>

                        <!-- Estado Activo -->
                        <div class="form-group">
                            <label for="active">Activo</label>
                            <select class="form-control" id="active" name="active">
                                <option value="1" {{ old('active', $member->active) == 1 ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ old('active', $member->active) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Usuario -->
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ old('username', $member->username) }}" required>
                        </div>

                        <!-- Contraseña (Opcional) -->
                        <div class="form-group">
                            <label for="password">Contraseña (dejar en blanco para no cambiar)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <script>
        $('#editStaffModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var staff_id = button.data('id');
            var first_name = button.data('first_name');
            var last_name = button.data('last_name');
            var email = button.data('email');
            var username = button.data('username');
            var store_id = button.data('store_id');
            var active = button.data('active');

            var modal = $(this);
            modal.find('.modal-body #staff_id').val(staff_id);
            modal.find('.modal-body #first_name').val(first_name);
            modal.find('.modal-body #last_name').val(last_name);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #username').val(username);
            modal.find('.modal-body #store_id').val(store_id);
            modal.find('.modal-body #active').val(active);
            modal.find('form').attr('action', '/staff/' + staff_id);
        });
    </script>
</body>

</html>