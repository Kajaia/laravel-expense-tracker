<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0d6efd">
    <title>{{ config('app.name') }}</title>
    <link rel="manifest" href="manifest.json">
    <link rel="shortcut icon" href="/assets/icons/icon-96x96.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    @yield('styles')
    @livewireStyles
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 my-3">
                <div class="card rounded-3 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div title="{{ 'Logged in user: ' . Auth::user()->name }}">
                                <h1 class="mb-0 fs-5">Hello, {{ Auth::user()->name }}!</h1>
                                <livewire:activity-balance />
                            </div>
                            <div>
                                <form class="d-inline" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary rounded-3 shadow-sm" title="Logout">
                                        <i class="fas fa-power-off"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="mt-3">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/ac59870ee9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="main.js"></script>
    @yield('scripts')
    @livewireScripts
</body>
</html>