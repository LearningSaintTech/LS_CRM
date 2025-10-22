@include('common.header')

<main class="content-body">

    <!-- Page Title & Breadcrumb -->
    <div class="page-title mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <!-- Row with 3 attractive cards -->
        <div class="row g-4">
            <!-- Card 1 - Role -->

            <!-- Card 3 - User -->
            {{-- <a href=""> --}}
                <div class="col-md-4">
                    <div class="card card-hover shadow-sm rounded-2 border-0 text-center py-4">
                        <div class="card-icon mb-3">
                            <i class="fas fa-users fa-2x text-warning"></i>
                        </div>
                        <h5 class="card-title mb-2">User</h5>
                        <p class="card-text text-muted mb-3">Assign roles & permissions to users.</p>
                        <a href="{{ route('user.list') }}" class="btn btn-outline-warning btn-sm">Go</a>
                    </div>
                </div>
            {{-- </a> --}}

            <div class="col-md-4">
                <div class="card card-hover shadow-sm rounded-2 border-0 text-center py-4">
                    <div class="card-icon mb-3">
                        <i class="fas fa-user-shield fa-2x text-primary"></i>
                    </div>
                    <h5 class="card-title mb-2">Role</h5>
                    <p class="card-text text-muted mb-3">Manage user roles and assign permissions.</p>
                    <a href="{{ route('role.index') }}" class="btn btn-outline-primary btn-sm">Go</a>
                </div>
            </div>


            <!-- Card 2 - Permission -->
            <div class="col-md-4">
                <div class="card card-hover shadow-sm rounded-2 border-0 text-center py-4">
                    <div class="card-icon mb-3">
                        <i class="fas fa-key fa-2x text-success"></i>
                    </div>
                    <h5 class="card-title mb-2">Permission</h5>
                    <p class="card-text text-muted mb-3">Create and manage permissions for roles.</p>
                    <a href="{{ route('permission.index') }}" class="btn btn-outline-success btn-sm">Go</a>
                </div>
            </div>
        </div>
    </div>

</main>

@include('common.footer')
