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
            <a href="{{route('create-role')}}"" class="btn btn-info btn-sm shadow-sm">
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
                                <td class="width: 5%">
                                    <a href="" class="btn btn-square btn-warning btn-sm me-1">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="" class="btn btn-square btn-danger btn-sm delete-user">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
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
