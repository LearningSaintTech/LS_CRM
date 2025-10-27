@if(session()->has('success'))
    <script>
        window.onload = function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('success') }}");
        };
    </script>
@endif

@if(session()->has('error'))
    <script>
        window.onload = function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("{{ session('error') }}");
        };
    </script>
@endif

@if(session()->has('warning'))
    <script>
        window.onload = function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.warning("{{ session('warning') }}");
        };
    </script>
@endif

@if(session()->has('info'))
    <script>
        window.onload = function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.info("{{ session('info') }}");
        };
    </script>
@endif

@if ($errors->any())
    <script>
        window.onload = function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("{{ $errors->first() }}");
        };
    </script>
@endif