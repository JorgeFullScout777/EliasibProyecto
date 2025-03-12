<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>City List</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

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

        <!-- Content Wrapper -->
        <div class="content-wrapper" style="background: url('dist/img/bg-pattern.png')">
            <section class="content pt-4">
                <div class="container-fluid">
                    <!-- Content Header -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">List of Cities</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Cities</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">List of Cities and Countries</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center">
                                                <form action="{{ route('citys.index') }}" method="GET" class="w-100">
                                                    <div class="input-group">
                                                        <input type="text" name="search" class="form-control rounded-left" placeholder="Search categories..." value="{{ request('search') }}">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary rounded-right">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                                <table class="table table-bordered table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>City Name</th>
                                                            <th>Country</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cities as $city)
                                                        <tr>
                                                            <td>{{ $city->city_id }}</td>
                                                            <td>{{ $city->city }}</td>
                                                            <td>{{ $city->country->country }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Paginación fuera de la tabla -->
                                    <div class="card-footer">
                                        <ul class="pagination pagination-sm m-0 float-right">
                                            <li class="page-item {{ $cities->onFirstPage() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $cities->previousPageUrl() }}">&laquo;</a>
                                            </li>
                                            @foreach ($cities->getUrlRange(1, $cities->lastPage()) as $page => $url)
                                            <li class="page-item {{ $page == $cities->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                            @endforeach
                                            <li class="page-item {{ $cities->hasMorePages() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ $cities->nextPageUrl() }}">&raquo;</a>
                                            </li>
                                        </ul>
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
</body>

</html>