@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Setting</a>
                        </li>
                        <a href="#">
                            <li class="breadcrumb-item active" aria-current="page">Add User </li>
                        </a>
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
                    <form method="POST" action="{{ route('users.role.update') }}" class="needs-validation">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" name="id" value="{{ $user?->id }}">
                                <label for="name" class="form-label">Name <strong class="text-danger"> * </strong>
                                </label>
                                <input type="text" maxlength="100" name="name" placeholder="Entere Name"
                                    id="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user?->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email <strong class="text-danger"> * </strong>
                                </label>
                                <input type="email" maxlength="70" name="email" placeholder="Entere Email"
                                    id="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user?->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Password</label>

                                <div class="input-group">
                                    <input type="password" maxlength="12" class="form-control" name="password"
                                        id="password" placeholder="Enter Password"
                                        @if (!$user?->id) required @endif>

                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        🙈
                                    </button>
                                </div>

                                <small class="text-danger" id="passwordError"></small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Confirm Password</label>

                                <div class="input-group">
                                    <input type="password" maxlength="12" class="form-control" name="confirm_password"
                                        id="confirm_password" placeholder="Confirm Password"
                                        @if (!$user?->id) required @endif>

                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirm">
                                        🙈
                                    </button>
                                </div>

                                <small class="text-danger" id="confirmError"></small>
                            </div>



                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Phone <strong class="text-danger"> * </strong>
                                </label>
                                <input type="text" name="phone" placeholder="Entere phone number" maxlength="12"
                                    id="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $user?->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Role" class="form-label">Role <s trong class="text-danger"> * </strong>
                                </label>
                                <select name="roles[]" id="roles" class="form-select select2" multiple required>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role?->name }}"
                                            {{ in_array($role?->name, $userRole) ? 'selected' : '' }}>
                                            {{ $role?->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Save User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('common.footer')
@include('user.js')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirm_password");
        const passwordError = document.getElementById("passwordError");
        const confirmError = document.getElementById("confirmError");

        function validatePassword() {
            const value = password.value;

            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,12}$/;

            if (!regex.test(value)) {
                passwordError.innerText =
                    "Password must be 8-12 chars with uppercase, lowercase, number & special character.";
                return false;
            } else {
                passwordError.innerText = "";
                return true;
            }
        }

        function matchPassword() {
            if (password.value !== confirmPassword.value) {
                confirmError.innerText = "Passwords do not match";
                return false;
            } else {
                confirmError.innerText = "";
                return true;
            }
        }

        password.addEventListener("keyup", validatePassword);
        confirmPassword.addEventListener("keyup", matchPassword);

        document.querySelector("form").addEventListener("submit", function(e) {
            if (!validatePassword() || !matchPassword()) {
                e.preventDefault();
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function togglePassword(inputId, buttonId) {
            const input = document.getElementById(inputId);
            const button = document.getElementById(buttonId);
            button.addEventListener("click", function() {
                if (input.type === "password") {
                    input.type = "text";
                    button.innerText = "👁️";
                } else {
                    input.type = "password";
                    button.innerText = "🙈";
                }
            });
        }
        togglePassword("password", "togglePassword");
        togglePassword("confirm_password", "toggleConfirm");
    });
</script>
