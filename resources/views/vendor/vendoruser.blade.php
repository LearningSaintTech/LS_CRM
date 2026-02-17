@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Vendor</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Vendor User List </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>

            @can('add-vendor-user')
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="btn btn-info btn-sm shadow-sm">
                    <i class="fas fa-plus me-1"></i> Add
                </a>
             @endcan

        </div>
    </div>
    <div class="card h-auto container">
        <div class="card-body table-card-body pt-0 px-0 pb-1">

            {{-- <div class="table-responsive check-wrapper table-container"> --}}
            <table id="vendoruserTable" class="table table-striped table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Vendor Name</th>
                        <th> Status</th>
                        <th> Created At </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
            {{-- </div> --}}
        </div>
    </div>
</main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Vendor User</h1>
                {{-- <button type="reser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form id="vendoruser" action="{{ route('vendoruser.insert') }}" method="post"
                    onSubmit="document.getElementById('submit').disabled=true;">
                    @csrf

                    <div class="col-md-12">
                        {{-- @if ($vendor?->id) --}}

                        @if ($selectedVendor)
                            <input type="hidden" value="{{ $selectedVendor->id }}" name="vendor_id">
                        @else
                            <label class="col-form-label">
                                Select Vendor:
                                <strong class="text-danger">*</strong>
                            </label>

                            <select name="vendor_id" class="form-select" required>
                                <option value="" disabled selected>Please select vendor</option>

                                @foreach ($vendors as $vendordatas)
                                    <option value="{{ $vendordatas->id }}">
                                        {{ $vendordatas->name }}
                                    </option>
                                @endforeach
                            </select>
                        @endif


                        <input type="hidden" name="type" value="vendoruser">

                        {{-- @else
                            <label for="recipient-name" class="col-form-label">Select Vendor: {{ $vendor?->id }}
                                <strong class="text-danger"> * </strong> </label>
                            <select name="vendor_id" id="" class="form-select">
                                <option value="" disabled selected> please select vendor </option>
                                @foreach ($vendordata as $vendordatas)
                                    <option value="{{ $vendordatas?->id }}">{{ $vendordatas?->name }}</option>
                                @endforeach
                            </select>
                        @endif --}}

                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <input type="hidden" name="vendor_user_id" id="vendor_user_id">
                                    <label for="recipient-name" class="col-form-label">Name: <strong
                                            class="text-danger"> * </strong> </label>
                                    <input type="text" class="form-control" name="name" maxlength="200"
                                        placeholder="Name" id="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Email: <strong
                                            class="text-danger"> * </strong></label>
                                    <input type="email" class="form-control" name="email" maxlength="100"
                                        placeholder="Email" id="email" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Phone: <strong
                                            class="text-danger"> * </strong></label>
                                    <input type="text" class="form-control" name="phone" maxlength="20"
                                        placeholder="Phone" id="phone" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Status: <strong
                                            class="text-danger"> * </strong></label>
                                    <select name="status" id="status" class="form-control"required>
                                        <option value="" class="form-control" disabled selected>Please select
                                            status </option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" maxlength="500"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submit">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>

@include('common.footer')

<script>
    $(function() {
        $('#vendoruserTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('vendor.user.data') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone',
                },

                {
                    data: 'vendor',
                    name: 'vendor',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>

<script>
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-vendor-user')) {

            let id = e.target.dataset.id;
            let url = e.target.dataset.url;
            console.log(id);
            document.getElementById('vendor_user_id').value = id;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('name').value = data.name;
                    document.getElementById('email').value = data.email;
                    document.getElementById('phone').value = data.phone;
                    document.getElementById('status').value = data.status;
                    document.getElementById('description').value = data.description;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
</script>
