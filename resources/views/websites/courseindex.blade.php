@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4 rounded">
        <div>
            <div class="page-title mt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Vendor</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Course List </li>
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

            {{-- <div class="table-responsive check-wrapper table-container"> --}}
            <table id="courseTable" class="table table-striped table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID </th>
                        <th>Name</th>
                        <th>URL</th>
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
            {{-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vendor User</h1>
                <button type="reser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                <form id="vendoruser" action="{{ route('course.insert') }}" method="post"
                    onSubmit="document.getElementById('submit').disabled=true;">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="hidden" name="vendor_id" value="{{ $vendor ?? '' }}">
                                    <input type="hidden" name="course_id" id="id">
                                    <label for="recipient-name" class="col-form-label">Name: <strong
                                            class="text-danger"> * </strong> </label>
                                    <input type="text" class="form-control" name="name" maxlength="200"
                                        placeholder="Name" id="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">URL: <strong
                                            class="text-danger"> * </strong></label>
                                    <input type="url" class="form-control" name="url" maxlength="100"
                                        placeholder="url" id="url" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Price: <strong
                                            class="text-danger"> * </strong></label>
                                    <input type="text" class="form-control" name="price" maxlength="20"
                                        placeholder="Price" id="price" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Status: <strong
                                            class="text-danger"> * </strong></label>
                                    <select name="status" id="status" class="form-select"required>
                                        <option value="" class="form-select" disabled selected>Please select
                                            status </option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
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
    $(function() {
        $('#courseTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route(name: 'course.data') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'url',
                    name: 'url'
                },
                { data: 'vendor', name: 'vendor_id' },

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
       
        if (e.target.classList.contains('edit-course')) {
            let id = e.target.dataset.id;
            let url = e.target.dataset.url;
            console.log(id);
            document.getElementById('id').value = id;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('name').value = data.name;
                    document.getElementById('url').value = data.url;
                    document.getElementById('price').value = data.price;
                    document.getElementById('status').value = data.status;
                    document.getElementById('vendor_id').value = data.vendor_id;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });


    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let vendorId = $(this).data('id');
        
        
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to delete this ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>
