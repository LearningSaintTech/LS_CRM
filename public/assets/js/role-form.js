$(document).ready(function() {
    // Initialize select2
    $('.select2-multiple').select2();

    // Function to load permissions
    function loadPermissions(ids) {
        if (!ids || ids.length === 0) return;

        $.ajax({
            url: roleMenuSettingUrl,
            type: "get",
            data: {
                _token: csrfToken,
                ids: ids,
                role_id: roleId || null
            },
            cache: false,
            success: function(response) {
                $('#permessions_list').html('');
                $.each(response, function(index, data) {
                    var isChecked = '';
                    if (permissionList && permissionList.includes(data.id)) {
                        isChecked = 'checked';
                    }

                    $('#permessions_list').append(
                        '<tr><td><input type="checkbox" class="checkone" value="' +
                        data.id + '" name="permission[]" ' + isChecked + '></td>' +
                        '<td>' + data.name + '</td><td>' + 
                        (data.menu_details ? data.menu_details.menu_name : '') + '</td></tr>'
                    );
                });
                updateSelectAllCheckbox();
            }
        });
    }

    // Handle menu selection change
    $("#multiple-menus").change(function() {
        loadPermissions($(this).val());
    });

    // Select All functionality
    $("#selectAll").click(function() {
        $(".checkone").prop('checked', $(this).prop('checked'));
    });

    $(document).on('click', '.checkone', function() {
        updateSelectAllCheckbox();
    });

    function updateSelectAllCheckbox() {
        var totalCheckboxes = $(".checkone").length;
        var checkedCheckboxes = $(".checkone:checked").length;
        $("#selectAll").prop('checked', totalCheckboxes > 0 && totalCheckboxes === checkedCheckboxes);
    }

    // Load initial permissions if in edit mode
    var initialMenus = $("#multiple-menus").val();
    if (initialMenus && initialMenus.length > 0) {
        loadPermissions(initialMenus);
    }

    // Form validation
    $('form').on('submit', function(e) {
        if ($(".checkone:checked").length === 0) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please select at least one permission!',
                showConfirmButton: true,
            });
            return false;
        }
        return true;
    });
});