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
    <meta property="og:url" content="{{ url('/') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <base href="{{ url('/') }}">
    {{-- Vendor CSS --}}
    <link href="{{ url('assets/vendor/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/metismenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/@flaticon/flaticon-uicons/css/all/all.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link class="main-plugins" href="{{ url('assets/css/plugins.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Other CDN CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @stack('styles')
</head>

<body>
    <div id="main-wrapper">

        @include('layouts.spinner')
        @include('layouts.navbar')
        @include('layouts.topbar')
        @include('layouts.sidebar')

        {{-- Page Content --}}
        @yield('content')

    </div>

    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- Toastr JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Toastr Config + Session Messages --}}
    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            preventDuplicates: false,
            timeOut: 3000,
            extendedTimeOut: 1000,
            positionClass: "toast-top-right"
        };

        {{-- Handle toast_type and toast_message format --}}
        @if (session('toast_type') && session('toast_message'))
            toastr.clear();
            toastr["{{ session('toast_type') }}"](@json(session('toast_message')));
        @endif

        {{-- Fallback for individual success/error/warning/info keys --}}
        @if (session('success'))
            toastr.clear();
            toastr.success(@json(session('success')));
        @endif

        @if (session('error'))
            toastr.clear();
            toastr.error(@json(session('error')));
        @endif

        @if (session('warning'))
            toastr.clear();
            toastr.warning(@json(session('warning')));
        @endif

        @if (session('info'))
            toastr.clear();
            toastr.info(@json(session('info')));
        @endif

        {{-- Handle validation errors --}}
        @if ($errors->any())
            toastr.clear();
            toastr.error(@json($errors->first()));
        @endif
    </script>

    @stack('scripts')
</body>
</html>
