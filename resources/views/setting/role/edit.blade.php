@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <a href="{{ url('users/roles') }}">
                    <button type="button" class="btn btn-primary btn-sm waves-effect">
                        <i class="mdi mdi-arrow-left-bold-circle-outline"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 mb-3">
            <div class="card">
                <form action="{{ route('roles.update', $role?->id) }}" method="post" class="custom-validation">
                    @csrf
                    @method('PUT')
                    <input @if($role?->id) value="{{base64_encode(convert_uuencode($role?->id))}}" @endif name="role_id" id="role_id" type="hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <label for="" class="mb-0"> Reference <span class="text-danger">*</span></label>
                                <select class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Choose reference..." id="multiple-menus" required>
                                    <option value="All">All</option>
                                    @foreach ($all_menus as $menu)
                                        <option value="{{ $menu?->id }}" {{ in_array($menu?->id, $selected_menus) ? 'selected' : '' }}>{{ $menu?->menu_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="" class="mb-0">Role-Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control alphabets-space" required value="{{$role?->name}}" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="" class="mb-0">Description</label>
                                <input type="text" class="form-control" name="description" value="{{$role?->description}}">
                            </div>
                            <div class="col-md-12 col-md-12">
                                <div class="mb-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="">
                                                <tr>
                                                    <th><input type="checkbox" class="form-control-sm" id="selectAll" style="min-height: 10px;"></th>
                                                    <th>Permission</th>
                                                    <th>Reference</th>
                                                </tr>
                                            </thead>
                                            <tbody id="permessions_list">
                                                    @foreach ($all_permissions as $permission)
                                                        <tr>
                                                            <td><input type="checkbox" class="checkone" value="{{$permission?->id}}" name="permission[]" checked></td>
                                                            <td>{{$permission?->name}}</td>
                                                            <td>{{$permission?->Menu_details?->menu_name}}</td>
                                                        </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="text-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm waves-effect waves-light">Save</button>
                                <button type="reset"
                                    class="btn btn-sm btn-secondary waves-effect waves-light">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
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
                        @if(isset($all_permissions))
                            var existingPermissions = {!! json_encode($all_permissions->pluck('id')->toArray()) !!};
                            if (existingPermissions.includes(data.id)) {
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
                },
                error: function() {
                    console.log('Error loading permissions');
                }
            });
        }

        function updateSelectAllCheckbox() {
            var allChecked = $(".checkone").length > 0 && $(".checkone").length === $(".checkone:checked").length;
            $("#selectAll").prop('checked', allChecked);
        }

        $("#selectAll").click(function() {
            $(".checkone").prop('checked', $(this).prop('checked'));
        });

        $("body").on("click", ".checkone", function() {
            if ($(".checkone:checked").length === $(".checkone").length) {
                $("#selectAll").prop('checked', true);
            } else {
                $("#selectAll").prop('checked', false);
            }
        });

        $("#selectAll").change(function() {
            if (!$(this).prop('checked')) {
                $(".checkone").prop('checked', false);
            }
        });
    });
</script>
