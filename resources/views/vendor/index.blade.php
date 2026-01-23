@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <div class="page-title mt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('vendor.list') }}">Vendor</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ route('add.vender') }}" class="btn btn-info btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Add
            </a>
        </div>
    </div>
    <div class="card h-auto">
        <div class="card-body table-card-body pt-0 px-0 pb-1">
            {{-- <div class="table-responsive check-wrapper"> --}}
                <table id="vendorTable" class="table table-striped table-hover table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            {{-- </div> --}}
        </div>
    </div>
</main>

@include('common.footer');

<script>
    $(function() {
        $('#vendorTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('vendor.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'company_name', name: 'company_name' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    // Handle status toggle
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let vendorId = $(this).data('id');
        let currentStatus = $(this).data('status');
        let actionText = currentStatus == 1 ? 'inactive' : 'active';

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${actionText} this vendor?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, ' + actionText,
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>
