@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Payment</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Payment Status </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>

            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                class="btn btn-info btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Add
            </a>
        </div>
    </div>
    <div class="card h-auto container">
        <div class="card-body table-card-body pt-0 px-0 pb-1">

            <div class="table-responsive check-wrapper table-container">
                <table id="vendoruserTable" class="table table-striped table-hover table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID </th>
                            <th>Name</th>
                            <th>Secret Key</th>
                            <th>key</th>
                            <th>Website Name</th>
                            <th>Status</th>
                            <th>Created At </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payment as $payments)
                            <tr>
                                <td>{{ $payments?->id }}</td>
                                <td>{{ $payments?->name }}</td>
                                <td class="blur-text" style="filter: blur(1px);user-select: none;">{{ Str::mask($payments?->secret_key ,'*' ,4) }}</td>
                                <td class="blur-text" style="filter: blur(1px);user-select: none;">{{ Str::mask($payments?->key , '*' ,4) }}</td>
                                <td>{{ $payments?->website?->sitename }}</td>
                                <td>
                                    <span class="badge badge-success light">
                                        @if ($payments?->status == 1)
                                            Active
                                        @else
                                            In-Active
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $payments?->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-primary light btn-square"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item edit-payment-user"
                                                    data-url="{{ route('payment.edit', $payments->id) }}"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"
                                                    data-id="{{ $payments->id }}">Edit</a></li>
                                            <li><a class="dropdown-item text-danger"
                                                    href="javascript:void(0);">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
                {{-- <button type="reser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form id="vendoruser" action="{{ route('payment.insert') }}" method="post"
                    onSubmit="document.getElementById('submit').disabled=true;">
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" value="" name="payment_id" id="payment_id">
                        <input type="hidden" name="type" value="payment">
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="col-form-label">Name: <strong class="text-danger"> *
                                        </strong> </label>
                                    <input type="text" class="form-control" name="name" maxlength="200"
                                        placeholder="Name" id="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Vendor Name: <strong
                                            class="text-danger"> * </strong></label>
                                    <select name="vendor_id" id="vendorSelect" class="form-select">
                                        <option value="" selected disabled>PLease select vendor</option>
                                        @foreach ($vendor as $vendors)
                                            <option value="{{ $vendors?->id }}">{{ $vendors?->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Website Name</label>
                                    <select id="websiteSelect" name="website_id" class="form-select">
                                        <option value="">Select Website</option>
                                    </select>
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

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Phone: <strong
                                            class="text-danger"> * </strong></label>
                                    <input type="text" class="form-control" name="phone" maxlength="20"
                                        placeholder="Phone" id="phone" required>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label"> Key:</label>
                                    <input type="text" class="form-control" name="key" maxlength="100"
                                        placeholder="Secret Key" id="key" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Secret Key:</label>
                                    <input type="text" class="form-control" name="secret_key" maxlength="100"
                                        placeholder="Secret Key" id="secret_key" required>
                                </div>
                            </div>
                        </div>
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
    $('#vendorSelect').on('change', function() {
        let vendorId = $(this).val();
        $('#websiteSelect').html('<option value="">Loading...</option>');
        if (vendorId) {
            $.ajax({
                url: "{{ route('get.websites') }}",
                type: "get",
                data: {
                    _token: "{{ csrf_token() }}",
                    vendor_id: vendorId
                },
                success: function(data) {
                    let options = '<option value="">Select Website</option>';
                    $.each(data, function(key, website) {
                        options += `<option value="${website.id}">
                                    ${website.sitename}
                                </option>`;
                    });
                    $('#websiteSelect').html(options);
                }
            });
        } else {
            $('#websiteSelect').html('<option value="">Select Website</option>');
        }
    });
</script>


<script>
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.edit-payment-user');
        if (!btn) return;
        let id = btn.dataset.id;
        let url = btn.dataset.url;
        document.getElementById('vendoruser').reset();
        document.getElementById('payment_id').value = id;
        document.getElementById('exampleModalLabel').innerText = 'Edit Payment';

        fetch(url)
            .then(res => res.json())
            .then(data => {
                console.log(data);
                document.getElementById('name').value = data.name;
                document.getElementById('vendorSelect').value = data.vendor_id;
                document.getElementById('status').value = data.status;
                document.getElementById('key').value = data.key;
                document.getElementById('secret_key').value = data.secret_key;

                // Load website & auto select
                loadWebsites(data.vendor_id, data.website_id);
            })
            .catch(err => console.error(err));
    });
</script>

<script>
    function loadWebsites(vendorId, selectedWebsite = null) {
        if (!vendorId) {
            $('#websiteSelect').html('<option value="">Select Website</option>');
            return;
        }

        $.ajax({
            url: "{{ route('get.websites') }}",
            type: "GET",
            data: {
                vendor_id: vendorId
            },
            success: function(data) {
                let options = '<option value="">Select Website</option>';
                $.each(data, function(key, website) {
                    let selected = selectedWebsite == website.id ? 'selected' : '';
                    options += `<option value="${website.id}" ${selected}>
                                ${website.sitename}
                            </option>`;
                });
                $('#websiteSelect').html(options);
            }
        });
    }
</script>
