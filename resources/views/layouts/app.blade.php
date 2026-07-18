<!DOCTYPE html>
<html>

<head>

    <title>Employee Management System</title>

    @include('layouts.styles')

</head>

<body>

    <div class="wrapper">

        @include('layouts.sidebar')

        <div class="content">

            @include('layouts.navbar')

            <div class="page-content">

                @yield('content')

            </div>

            @include('layouts.footer')

        </div>

    </div>


    <script>
        document.querySelectorAll('.has-submenu > a').forEach(function(menu) {

            menu.addEventListener('click', function(e) {

                e.preventDefault();

                this.parentElement.classList.toggle('active');

            });

        });
    </script>

</body>

</html>
