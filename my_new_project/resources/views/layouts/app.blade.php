<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My APP')</title>

    <!-- Link to the compiled CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('fee_percentages.index') }}">Calculate Fee Percentage</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('fee-presets.index') }}">Manage Fee presets</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('services.index') }}">Manage Services</a>
            </li>
           
        </ul>
    </div>
</nav>
    <div class="app-container">
        @yield('content')
    </div>
</body>
</html>
