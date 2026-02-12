<script>
    $('#vendor_id').on('change', function() {

        let vendorId = $(this).val();

        $('#website').html('<option value="">Loading...</option>');
        $('#vendorUser_id').html('<option value="">Loading...</option>');

        if (!vendorId) {
            $('#website').html('<option value="">Select Website</option>');
            $('#vendorUser_id').html('<option value="">Select Vendor User</option>');
            return;
        }

        $.ajax({
            url: "{{ route('get.websites.vendoruser') }}",
            type: "GET",
            data: {
                vendor_id: vendorId
            },
            success: function(res) {

                console.log(res); // DEBUG

                /* -------- Websites -------- */
                let websiteOptions = '<option value="">Select Website</option>';
                res.websites.forEach(site => {
                    websiteOptions += `
                    <option value="${site.id}">
                        ${site.sitename}
                    </option>`;
                });
                $('#website').html(websiteOptions);

                /* -------- Vendor Users -------- */
                let vendorOptions = '<option value="">Select Vendor User</option>';
                res.vendor_users.forEach(user => {
                    vendorOptions += `
                    <option value="${user.id}">
                        ${user.name}
                    </option>`;
                });
                $('#vendorUser_id').html(vendorOptions);
            }
        });
    });
</script>