<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CRM')</title>
    <meta name="author" content="dexignlabs">
    <meta name="robots" content="index, follow">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="CRM, Customer Relationship Management">
    <meta name="description" content="CRM, Customer Relationship Management">
    <base href="{{ url('/') }}">
    
    {{-- Core CSS --}}
    <link href="{{ url('assets/vendor/metismenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link href="{{ url('assets/vendor/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/@flaticon/flaticon-uicons/css/all/all.css') }}" rel="stylesheet">
    <link class="main-plugins" href="{{ url('assets/css/plugins.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    
    {{-- Toastr & SweetAlert CSS --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    {{-- Early Script Loading (jQuery, Flasher, Toastr, SweetAlert) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ url('vendor/flasher/flasher.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Common Alert Function --}}
    {{-- <script>
        function showAlert(type, message) {
            Swal.fire({
                icon: type,
                title: type.charAt(0).toUpperCase() + type.slice(1),
                text: message,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        }

        function showMultipleErrors(errors) {
            let errorMessage = '<ul style="text-align: left;">';
            errors.forEach(function(error) {
                errorMessage += '<li>' + error + '</li>';
            });
            errorMessage += '</ul>';

            Swal.fire({
                icon: 'error',
                title: 'Validation Errors',
                html: errorMessage,
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        }
    </script> --}}

    @stack('styles')
</head>

<body>
    <div id="main-wrapper">
        @include('layouts.spinner')
        @include('layouts.navbar')
        @include('layouts.topbar')
        @include('layouts.sidebar')
        @yield('content')
    </div>
    </script>

    @stack('scripts')

</body>

</html>
