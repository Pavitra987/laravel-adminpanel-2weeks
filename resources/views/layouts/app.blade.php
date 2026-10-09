<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Spark Admin</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>

    @include('layouts.sidebar')


    
    <div class="main-wrapper">

        
        @include('layouts.navbar')


        
        @yield('content')


        
        @include('layouts.footer')

    </div>



    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>

</html>