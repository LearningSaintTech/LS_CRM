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
                        <li class="breadcrumb-item active" aria-current="page">Permission List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
            <a href="{{ route('permission.create') }}" class="btn btn-info btn-sm shadow-sm">
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
                            <th style="width:10%">Permission Name</th>
                            <th style="width:10%">Reference</th>
                            <th style="width:10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_permission as $permission)
                            <tr>
                                <td style="width:10%">{{ $loop->iteration }}</td>
                                <td style="width:10%">{{ $permission->name }}</td>
                                <td style="width:10%">{{ $permission?->Menu_details?->menu_name }}</td>
                                <td style="width:10%">
                                    <a href="{{ route('permission.edit', ['id' => $permission->id]) }}"
                                        class="btn btn-square btn-warning btn-sm me-1">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('permission.destroy', $permission->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="permission_id" value="{{ $permission->id }}">
                                        <button type="submit" class="btn btn-square btn-danger btn-sm delete-user"
                                            onclick="return confirm('Are you sure you want to delete this permission?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
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
