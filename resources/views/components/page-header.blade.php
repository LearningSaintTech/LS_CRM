<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                @foreach($breadcrumbs as $label => $url)
                    @if($loop->last)
                        <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                    @endif
                @endforeach
            </ol>
        </nav>
        <h4 class="mt-2">{{ $title }}</h4>
    </div>
    
    @if($buttonText && $buttonUrl)
        <a href="{{ $buttonUrl }}" class="btn btn-primary">
            @if($buttonIcon)
                <i class="{{ $buttonIcon }}"></i>
            @endif
            {{ $buttonText }}
        </a>
    @endif
</div>
