@include('common.header')
{{-- @include('common.toster') --}}

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      
        <div class="" style="margin-left:2rem;margin-top:1rem;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Setting</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User List</li>
                </ol>
            </nav>
        </div>

        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
            <a href="{{ route('add.user') }}" class="btn btn-info btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Add
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body table-card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <table id="employeesTable" class="table">
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

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>

                                            {{-- ROLE BADGES --}}
                                            <td>
                                                @php
                                                    $roleColors = [
                                                        'Super Admin' => '#6610f2',
                                                        'Admin' => '#f3b95a',
                                                        'Manager' => '#198754',
                                                        'User' => '#adb5bd',
                                                        'sub-admin' => '#f74900d9',
                                                        'vendor' => '#000000',
                                                    ];
                                                @endphp

                                                @foreach ($user->roles as $role)
                                                    <span
                                                        style="
                                            background-color: {{ $roleColors[$role->name] ?? '#6c757d' }};
                                            color: #fff;
                                            padding: 3px 8px;
                                            border-radius: 7px;
                                            font-size: 12px;
                                            margin-right: 5px;
                                            display: inline-block;
                                        ">
                                                        {{ $role->name }}
                                                    </span>
                                                @endforeach
                                            </td>

                                            <td>
                                                <span
                                                    class="badge {{ $user->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ ucfirst($user->status) }}
                                                </span>
                                            </td>

                                            <td>
                                                <a href="{{ route('users.edit', ['userId' => base64_encode(convert_uuencode($user->id))]) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('users.destroy', $user->id) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@include('common.footer')
{{-- @include('user.js') --}}
