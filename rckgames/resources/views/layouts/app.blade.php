<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>RCKgames</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>   
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('projects.index') }}">{{__('general.admin_title')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->routeIs('projects.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('projects.index') }}">{{__('general.nav_projects')}}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('clients.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('clients.index') }}">{{__('general.nav_clients')}}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('sw_types.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('sw_types.index') }}">{{__('general.nav_swtypes')}}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('texts.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('texts.index') }}">{{__('general.nav_texts')}}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('info.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('info.index') }}">{{__('general.nav_info')}}</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
