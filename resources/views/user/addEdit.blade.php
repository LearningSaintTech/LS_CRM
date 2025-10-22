@include('common.header')

<main class="content-body">
   <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('index.html') }}">Setting</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add User </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
            
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                      <form method="post" action="{{ route('users.role.update', $user->id) }}" class="needs-validation" novalidate>
                        @csrf
                        @method('patch')
                        <div class="row">
                            <!-- Name Input -->
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" maxlength="100" name="name" placeholder="Entere Name"
                                    id="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user?->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" maxlength="70" name="email" placeholder="Entere Email"
                                    id="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user?->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Phone</label>
                                <input type="text" name="phone" placeholder="Entere phone number" maxlength="12"
                                    id="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $user?->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Role" class="form-label">Role</label>
                                <select name="roles[]" id="roles" class="form-select select2" multiple required>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ in_array($role->name, $userRole) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-sm">Save User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('common.footer')
@include('user.js')
