<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EMS Dashboard</title>


    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Font Awesome -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">


    <!-- Custom CSS -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>


<body>


    <div class="wrapper">


        @include('partials.sidebar')


        <div class="main">


            @include('partials.navbar')


            <div class="content">


                @yield('content')


            </div>


            @include('partials.footer')


        </div>


    </div>



</body>

</html>
