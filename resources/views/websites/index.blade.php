@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <div class="page-title mt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('vendor.list') }}">Websites</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Websites List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ route('add.websites' ,[$vendor]) }}" class="btn btn-info btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Add
            </a>
        </div>
    </div>
    <div class="card h-auto">
        <div class="card-body table-card-body pt-0 px-0 pb-1">
            {{-- <div class="table-responsive check-wrapper"> --}}
                <table id="websitesTable" class="table table-striped table-hover table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Site Name</th>
                            <th>Url</th>
                            <th>Vendor Name</th>
                            {{-- <th>Logo</th> --}}
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
        $('#websitesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('websites.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'sitename', name: 'sitename' },
                { data: 'url', name: 'url' },
                { data: 'vendor', name: 'vendor_id' },
                // { data: 'logoUrl', name: 'logoUrl' },
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
