<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}", "Success", {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
        });
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}", "Error", {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
        });
    @endif

    @if (session('info'))
        toastr.info("{{ session('info') }}", "Info", {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
        });
    @endif

    @if (session('warning'))
        toastr.warning("{{ session('warning') }}", "Warning", {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
        });
    @endif
</script>
<style>
    .toast {
        z-index: 999999 !important;
    }
</style>
