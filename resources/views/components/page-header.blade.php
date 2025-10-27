<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <div class="page-title mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ $homeUrl ?? url('/') }}">{{ $homeText ?? 'Home' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="me-3">
        @if(!empty($back))
            <a href="{{ $back }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        @endif
        @if(!empty($addRoute))
            <a href="{{ $addRoute }}" class="btn btn-info btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Add
            </a>
        @endif
    </div>
</div>
