<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="main">

        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Page Content --}}
        <div class="content">

            @yield('content')

        </div>

        {{-- Footer --}}
        @include('partials.footer')

    </div>

</body>

</html>
