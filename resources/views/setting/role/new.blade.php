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
                    <form method="post" action="{{ route('roles.store') }}" class="custom-validation needs-validation" novalidate>
                        @csrf

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
                                    class="btn btn-primary btn-sm waves-effect waves-light" id="createRoleButton">Save</button>
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
            $("#multiple-menus").change(function() {
                var ids = $(this).val();
                $.ajax({
                    url: "{{ route('role-menusetting') }}",
                    type: "get",
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: ids,
                    },
                    cache: false,
                    async: false,
                    success: function(response) {
                        $('#permessions_list').html('');
                        $.each(response, function(index, data) {
                            $('#permessions_list').append(
                                '<tr><td><input type="checkbox" class="checkone" value=' +
                                data['id'] + ' name="permission[]"></td>' +
                                '<td>' + data['name'] + '</td><td>' + data[
                                    'menu_details']['menu_name'] + '</td></tr>');
                        });
                    }
                });
            });
            $("#selectAll").click(function() {
                // Check or uncheck all other checkboxes based on the state of "select all" checkbox
                $(".checkone").prop('checked', $(this).prop('checked'));
            });

            // When any checkbox is clicked
            $(".checkone").click(function() {
                // Check if all checkboxes are checked and update "select all" checkbox accordingly
                if ($(".checkone:checked").length === $(".checkone").length) {
                    $("#selectAll").prop('checked', true);
                } else {
                    $("#selectAll").prop('checked', false);
                }
            });

            // When "select all" checkbox is unchecked
            $("#selectAll").change(function() {
                if (!$(this).prop('checked')) {
                    $(".checkone").prop('checked', false);
                }
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
