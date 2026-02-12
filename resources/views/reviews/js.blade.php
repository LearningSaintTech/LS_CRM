
<script>
    $(document).on('click', '.editBtn', function () {

    let id = $(this).data('id');

    $.ajax({
        url: "{{ route('reviews.edit') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: id
        },
        success: function (response) {
            $('#reviews_id').val(response.id);
            $('#student_name').val(response.student_name);
            $('#review').val(response.review);
            $('#rating').val(response.rating);
            $('#status').val(response.status);
            $('#course_name').val(response.course_name);
            $('#vendor_id').val(response.vendor_id).trigger('change');
            $.ajax({
                url: "{{ route('get.websites.vendoruser') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    vendor_id: response.vendor_id
                },
                success: function (users) {

                    let options = '<option value="" disabled>Select vendor user</option>';

                    $.each(users, function (key, user) {
                        let selected = (user.id == response.vendor_user_id) ? 'selected' : '';
                        options += `<option value="${user.id}" ${selected}>${user.name}</option>`;
                    });

                    $('#vendorUser_id').html(options);
                }
            });

            var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasExample'));
            offcanvas.show();
        }
    });
});

</script>

<script>
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let enrolment_id = $(this).data('id');
        console.log(url + '-----' + url);
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to delete this ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url + '?id=' + enrolment_id;
            }
        });
    });
</script>