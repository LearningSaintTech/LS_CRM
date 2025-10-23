@include('common.header')
<style>
    .card-hover {
        transition: all 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
   
</style>
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
        <div class="row g-4 justify-content-center">

            <!-- Card 1 - User -->
            <div class="col-md-4">
                <div class="card card-hover shadow-lg border-0 rounded-4 text-center py-4 h-100">
                    <div class="card-icon mb-3">
                        <i class="fas fa-users fa-3x text-warning"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-2">User</h5>
                    <p class="card-text text-muted mb-4">Assign roles & permissions to users.</p>
                    <a href="{{ route('user.list') }}" class="btn btn-warning text-white px-4 py-2 rounded-pill fw-semibold">
                        Go <i class="fas fa-hand-point-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Card 2 - Role -->
            <div class="col-md-4">
                <div class="card card-hover shadow-lg border-0 rounded-4 text-center py-4 h-100">
                    <div class="card-icon mb-3">
                        <i class="fas fa-user-shield fa-3x text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Role</h5>
                    <p class="card-text text-muted mb-4">Manage user roles and assign permissions.</p>
                    <a href="{{ route('role.index') }}" class="btn btn-primary text-white px-4 py-2 rounded-pill fw-semibold">
                        Go <i class="fas fa-hand-point-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Card 3 - Permission -->
            <div class="col-md-4">
                <div class="card card-hover shadow-lg border-0 rounded-4 text-center py-4 h-100">
                    <div class="card-icon mb-3">
                        <i class="fas fa-key fa-3x text-success"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Permission</h5>
                    <p class="card-text text-muted mb-4">Create and manage permissions for roles.</p>
                    <a href="{{ route('permission.index') }}" class="btn btn-success text-white px-4 py-2 rounded-pill fw-semibold">
                        Go <i class="fas fa-hand-point-right ms-2"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

</main>

@include('common.footer')

