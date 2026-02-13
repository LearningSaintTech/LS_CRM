@include('layouts.spinner')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CRM')</title>
    <link href="{{ asset('assets/vendor/metismenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link href="{{ asset('assets/vendor/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/@flaticon/flaticon-uicons/css/all/all.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/learning_logo.svg') }}">
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('styles')
</head>

<body>
    @include('layouts.navbar')
    @include('layouts.topbar')
    @include('layouts.sidebar')
    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function initializeEchoNotifications() {
            if (typeof window.Echo !== 'undefined') {
                @auth
                try {
                    window.Echo.private('App.Models.User.{{ auth()->id() }}')
                        .notification((notification) => {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'info',
                                title: notification.title,
                                text: notification.message,
                                showConfirmButton: false,
                                timer: 30000
                            });
                            console.log('Notification:', notification);
                        });
                    console.log('Echo notifications initialized');
                } catch (error) {
                    console.error('Error initializing Echo notifications:', error);
                }
            @endauth
        } else {
            console.warn('Echo not available yet, will retry');
            setTimeout(initializeEchoNotifications, 1000);
        }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeEchoNotifications);
        } else {
            initializeEchoNotifications();
        }
    </script>

    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            preventDuplicates: true,
            timeOut: 3000,
            positionClass: "toast-top-right"
        };
    </script>

    @if (session('success'))
        <script>
            toastr.success(@json(session('success')));
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error(@json(session('error')));
        </script>
    @endif

    @if (session('warning'))
        <script>
            toastr.warning(@json(session('warning')));
        </script>
    @endif

    @if (session('info'))
        <script>
            toastr.info(@json(session('info')));
        </script>
    @endif

    @stack('scripts')

</body>

</html>
