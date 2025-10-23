@include('common.header')
<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="">Setting</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Permission Add</li>
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
                    <form method="post" action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data"
                            class="custom-validation" novalidate>
                        @csrf
                       
                        <div class="row">
                            <!-- Name Input -->
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Menu Setting</label>
                                <select class="form-control form-select select2" name="menu_setting" required>
                                    <option value="">Choose Option</option>
                                    @foreach ($menuset as $menuName)
                                        <option value="{{ $menuName?->id }}"
                                            @if ($permission?->menu_id == $menuName?->id) selected @endif>
                                            {{ $menuName?->menu_name }}</option>
                                    @endforeach
                                </select>
                                @error('menu_setting')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Permission Name</label>
                                @if ($permission?->name)
                                    <input type="text" maxlength="30" name="permission_name" class="form-control"
                                        value="{{ $permission?->name }}" readonly>
                                @else
                                    <input type="text" maxlength="30" name="permission_name" class="form-control">
                                @endif
                                @error('permission_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if ($permission)
                            <input type="hidden" name="permission_id"
                                value="{{ base64_encode(convert_uuencode($permission?->id)) }}">
                            <button type="submit"class="btn btn-sm btn-primary waves-light"><span class="me-1"><i class="mdi mdi-plus-circle-outline"></i></span>Update Permission
                            </button>
                        @else
                            <button type="submit" class="btn btn-primary btn-sm">Save Permission</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('common.footer')
