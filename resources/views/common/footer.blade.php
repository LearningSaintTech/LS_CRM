<div class="footer">
    <div class="copyright text-center">
        <p class="mb-0">
            Copyright © <span class="current-year">{{ date('Y') }}</span>
        </p>
    </div>
</div>

<!-- ========================= -->
<!-- REQUIRED CORE LIBRARIES -->
<!-- ========================= -->

<!-- jQuery (MUST BE FIRST) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- ========================= -->
<!-- JQUERY DEPENDENT PLUGINS -->
<!-- ========================= -->

<script src="{{ url('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('assets/vendor/metismenu/dist/metisMenu.min.js') }}"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- ========================= -->
<!-- OTHER UI / CHART LIBS -->
<!-- ========================= -->

<script src="{{ url('assets/vendor/@yaireo/tagify/dist/tagify.js') }}"></script>
<script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ url('assets/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>

<!-- ========================= -->
<!-- ALERT LIBRARIES -->
<!-- ========================= -->

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- ========================= -->
<!-- APP SCRIPTS -->
<!-- ========================= -->

<script src="{{ url('assets/js/custom.js') }}"></script>
<script src="{{ url('assets/js/icnav-init.js') }}"></script>

<!-- ========================= -->
<!-- FLASH MESSAGE HANDLER -->
<!-- ========================= -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    @if(session()->has('success'))
        toastr.success(@json(session('success')));

        setTimeout(function () {
            if ($.fn.DataTable.isDataTable('#vendoruserTable')) {
                $('#vendoruserTable').DataTable().ajax.reload(null, false);
            }

            $('#exampleModal').modal('hide');

            const form = document.getElementById('vendoruser');
            if (form) form.reset();
        }, 1200);
    @endif

    @if(session()->has('error'))
        toastr.error(@json(session('error')));
    @endif

    @if($errors->any())
        toastr.error(@json($errors->first()));
    @endif

});
</script>

<!-- ========================= -->
<!-- SELECT2 INIT -->
<!-- ========================= -->

<script>
$(document).ready(function () {

    if ($('#roles').length) {
        $('#roles').select2({
            placeholder: "Select Role",
            allowClear: true,
            width: '100%'
        });
    }

    if ($('#multiple-menus').length) {
        $('#multiple-menus').select2({
            placeholder: "Select Menu",
            allowClear: true,
            width: '100%'
        });
    }

});
</script>

@stack('scripts')
