@include('common.header')

<main class="content-body">
    <!-- Page Title & Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="">Setting</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Role List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
            <a href="{{ route('create-role') }}"" class="btn btn-info btn-sm shadow-sm">
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
                            <th style="width:10%">Sr-No</th>
                            <th style="width: 10%">Role Name</th>
                            <th style="width: 15%">Total Permissions</th>
                            <th style="width: 5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td style="width:10%">{{ $loop->iteration }}</td>
                                <td style="width: 20%">{{ $role->name }}</td>
                                <td style="width: 15%">
                                    <span class=" ">
                                        {{ $role->permissions_count }}</span>
                                </td>
                                <td style="width: 5%">
                                    <a href="{{ route('create-role', [ 'id' , $role->id]) }}" class="btn btn-square btn-warning btn-sm me-1" title="Edit Role">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    @if($role->name !== 'Super Admin')
                                        <a href="#" 
                                           onclick="if(confirm('Are you sure you want to delete this role?')) { event.preventDefault(); document.getElementById('delete-role-{{ $role->id }}').submit(); }"
                                           class="btn btn-square btn-danger btn-sm"
                                           title="Delete Role">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <form id="delete-role-{{ $role->id }}" 
                                              action="{{ route('roles.destroy', $role->id) }}" 
                                              method="POST" 
                                              style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@include('common.footer')

<script>
    // Initialize DataTables
    $(document).ready(function() {
        $('#employeesTable').DataTable({
            language: {
                search: "_INPUT_",_INPUT_
                searchPlaceholder: "Search roles...",
                lengthMenu: "Show _MENU_ entries"
            },
            order: [[0, 'asc']],
            pageLength: 10
        });
    });
</script>
