<li class="{{ request()->routeIs($route) ? 'active' : '' }}">
    <a href="{{ route($route) }}" aria-expanded="false">
        <div class="menu-icon">
            <i class="{{ $icon }}"></i>
        </div>
        <span class="nav-text">{{ $text }}</span>
    </a>
</li>
