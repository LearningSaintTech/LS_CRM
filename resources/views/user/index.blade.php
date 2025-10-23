@include('common.header')
<main class="content-body">
    <!-- Page Title & Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('index.html') }}">Setting</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
            <a href="" class="btn btn-info btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Add
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body table-card-body px-3 pt-2 pb-3">
            <div class="table-responsive">
                <table id="employeesTable" class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</main>

@include('common.footer')
@include('user.js')
