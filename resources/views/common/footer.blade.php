<div class="footer">
    <div class="copyright text-center">
        <p class="mb-0">Copyright © Designed & Developed by <a href="https://www.careeramend.com/"
                target="_blank">dexignlabs</a> <span class="current-year">2025</span></p>
    </div>
</div>
<!-- End - Main Wrapper -->

<!-- Start - Page Scripts -->
<script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('assets/vendor/metismenu/dist/metisMenu.min.js') }}"></script>
<script src="{{ url('assets/vendor/@yaireo/tagify/dist/tagify.js') }}"></script>

<!-- Script For Swiper -->
<script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Script For apexchart -->
<script src="{{ url('assets/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>

<!-- Script For Jsvectormap -->
<script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>

<!-- Script For Dashboard -->
<script src="{{ url('assets/js/dashboard/dashboard.js') }}"></script>

<!-- Script For Multiple Languages -->
<script src="{{ url('assets/vendor/i18n/i18n.js') }}"></script>
<script src="{{ url('assets/js/translator.js') }}"></script>
<script src="{{ url('assets/js/custom.js') }}"></script>
<script src="{{ url('assets/js/icnav-init.js') }}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

<!-- jQuery + DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Select2 CSS -->

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Toastr JS -->



<script>
$(document).ready(function() {
    $('#roles').select2({
        placeholder: "Select Role",
        allowClear: true,
        width: '100%'
    });
});
</script>

<script>
$(document).ready(function() {
    $('#multiple-menus').select2({
        placeholder: "Select Menu",
        allowClear: true,
        width: '100%'
    });
});
</script>
