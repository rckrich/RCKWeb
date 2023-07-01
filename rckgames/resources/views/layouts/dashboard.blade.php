<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>RCKgames</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home.index') }}">{{__('general.admin_title')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">{{__('general.session.logout')}}</button>
                    </form>
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
