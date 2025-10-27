@include('common.header')


@section('css')
@endsection
@section('page-title')
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection
    @include('common-components.pages-heads')
    @section('content')
    @section('breadcrumb')
        @php echo App\Helpers\MasterHelper::header('Edit Role', 'common.home');  @endphp
        <a href="{{ url('users/roles') }}"><button type="button"class="btn btn-primary btn-sm waves-effect"><i
                    class="mdi mdi-arrow-left-bold-circle-outline"></i> {{ __('common.back') }} </button></a>
        @php echo App\Helpers\MasterHelper::footer(); @endphp
    @endsection
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-3">
            <div class="card">
                <form action="{{ route('roles.update') }}" method="post" class="custom-validation">
                    @csrf
                    <input @if($role?->id) value="{{base64_encode(convert_uuencode($role?->id))}}" @endif name="role_id" id="role_id" type="hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <label for="" class="mb-0">{{ __('common.reference') }} <span class="text-danger">*</span></label>
                                <select class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Choose reference..." id="multiple-menus" required>
                                    <option value="All">{{ __('common.all') }}</option>
                                    @foreach ($all_menus as $menu)
                                        <option value="{{ $menu?->id }}" {{ in_array($menu?->id, $selected_menus) ? 'selected' : '' }}>{{ $menu?->menu_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="" class="mb-0">{{ __('common.role-name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control alphabets-space" required value="{{$role?->name}}" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="" class="mb-0">{{ __('common.description') }} </label>
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
                                                    <th>{{ __('common.permission') }}</th>
                                                    <th>{{ __('common.reference') }}</th>
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
                                    class="btn btn-primary btn-sm waves-effect waves-light">{{ __('common.save') }}</button>
                                <button type="reset"
                                    class="btn btn-sm btn-secondary waves-effect waves-light">{{ __('common.reset') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('internalpagejs')
    @include('keystroke')
    <script>
        $(document).ready(function() {
            $("#multiple-menus").change(function() {
                var ids = $(this).val();
                var role_id = $('#role_id').val();
                $.ajax({
                    url: "{{ route('edit-role-menu') }}",
                    type: "get",
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: ids,
                        role_id:role_id,
                    },
                    cache: false,
                    async: false,
                    success: function(response) {
                        $('#permessions_list').html('');
                        $('#permessions_list').append(response);
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
@endsection
@include('common.footer')
