@include('common.header')
<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="">Setting</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Role Add</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" 
                          action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}" 
                          class="custom-validation needs-validation" 
                          novalidate>
                        @csrf
                        @if(isset($role))
                            @method('PUT')
                            <input type="hidden" name="role_id" value="{{ base64_encode(convert_uuencode($role->id)) }}">
                        @endif

                        <div class="row">
                            <!-- Menu Selection -->
                            <div class="mb-3 col-md-6">
                                <label for="multiple-menus" class="form-label">Menu</label>
                                <select class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Choose Reference..." id="multiple-menus" required>
                                    <option value="All">All</option>
                                    @foreach ($all_menus as $menu)
                                        <option value="{{ $menu?->id }}">{{ $menu?->menu_name }}</option>
                                    @endforeach
                                </select>
                                @error('menu_setting')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Permission Name</label>
                                <label for="" class="mb-0">Role Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control alphabets-space" name="name" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                  <label for="" class="mb-0">Description</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="col-md-12 col-md-12">
                                <div class="mb-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="">
                                                <tr>
                                                    <th><input type="checkbox" class="form-control-sm"
                                                            id="selectAll" style="min-height: 10px;"></th>
                                                    <th>Permission</th>
                                                    <th>Reference</th>
                                                </tr>
                                            </thead>
                                            <tbody id="permessions_list">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="col-lg-12 col-md-12 mb-3">
                            <div class="text-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm waves-effect waves-light" id="createRoleButton">
                                    {{ isset($role) ? 'Update Role' : 'Save Role' }}
                                </button>
                                <button type="reset"
                                    class="btn btn-sm btn-secondary waves-effect waves-light">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('common.footer')

<script>
    $(document).ready(function() {
        // Initialize select2
        $('.select2-multiple').select2();

        // Load initial permissions if in edit mode
        @if(isset($role))
            loadPermissions($("#multiple-menus").val());
        @endif

        $("#multiple-menus").change(function() {
            loadPermissions($(this).val());
        });

        function loadPermissions(ids) {
            if (!ids || ids.length === 0) return;

            $.ajax({
                url: "{{ route('role-menusetting') }}",
                type: "get",
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: ids,
                    @if(isset($role))
                    role_id: '{{ base64_encode(convert_uuencode($role->id)) }}'
                    @endif
                },
                cache: false,
                success: function(response) {
                    $('#permessions_list').html('');
                    $.each(response, function(index, data) {
                        var isChecked = '';
                        @if(isset($permission_list))
                            if (@json($permission_list).includes(data.id)) {
                                isChecked = 'checked';
                            }
                        @endif

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

        // Initialize select all state
        updateSelectAllCheckbox();

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
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'error!',
            text: '{{ session('error') }}',
            showConfirmButton: true,

        });
    </script>

@endif
