<style>
    .sidebar-item.active>.sidebar-link {
        background-color: #3d3984;
        color: #fff;
        border-radius: .5rem;
    }
</style>
<div class="icnav">
    <div class="icnav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li class="menu-title" data-i18n="Learning Saint">Learning Saint</li> --}}
            {{-- <li> --}}
            {{-- <a class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-home"></i>
                    </div>
                    <span class="nav-text" data-i18n="Dashboard">Dashboard</span>
                </a> --}}


            <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="fi fi-rr-home"></i>
                    <span class="nav-text" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            {{-- <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}" data-i18n="Dashboard Light">Dashboard Light</a></li>
                    <li><a href="{{ route('dashboard') }}" data-i18n="Dashboard Dark">Dashboard Dark</a></li>
                </ul> --}}
            {{-- </li> --}}
            {{-- start  by amarjeet kushwaha all menu should be same --}}


            {{-- @can('View Customer')
                <x-sidebar-menu-item route="employee.list" icon="fi fi-rs-employees" text="Employees" />
            @endcan --}}

            {{-- <x-sidebar-menu-item route="blog.list" icon="fi fi-rs-book" text="BLog" /> --}}

            {{-- <x-sidebar-menu-item route="settings.index" icon="fi fi-rr-settings" text="Setting" /> --}}

            {{-- <x-sidebar-menu-item route="vendor.list" icon="fi fi-rr-users" text="Vendor"/> --}}

            @can('view-vendor')
                <li
                    class="sidebar-item {{ request()->routeIs('vendor.*', 'websites.list', 'add.websites', 'website.edit', 'course.*') ? 'active' : '' }}">
                    <a href="{{ route('vendor.list') }}" class="sidebar-link">
                        <i class="fi fi-rr-users"></i>
                        <span>Vendor</span>
                    </a>
                </li>
            @endcan

            @can('view-vendor-user')
                <li class="sidebar-item {{ request()->routeIs('user.view') ? 'active' : '' }}">
                    <a href="{{ route('user.view') }}" class="sidebar-link">
                        <i class="fi fi-rr-users"></i>
                        <span>Vendor User</span>
                    </a>
                </li>
            @endcan

            @can('view-setting')
                <li
                    class="sidebar-item {{ request()->routeIs('settings.*', 'user.list', 'role-list', 'permission') ? 'active' : '' }}">
                    <a href="{{ route('settings.index') }}" class="sidebar-link">
                        <i class="fi fi-rr-settings"></i>
                        <span>Setting</span>
                    </a>
                </li>
            @endcan

            @can('View Payment')
                <li class="sidebar-item {{ request()->routeIs('payment') ? 'active' : '' }}">
                    <a href="{{ route('payment') }}" class="sidebar-link">
                        <i class="fi fi-rr-credit-card"></i>
                        <span>Payment</span>
                    </a>
                </li>
            @endcan
            
        </ul>
    </div>
    {{-- <div class="icnav-footer">
        <a href="https://hexabox.dexignlab.com/doc" target="_blank" class="btn btn-docs btn-success w-100">
            <span>Docs & Components</span>
            <i class="fa-solid fa-arrow-up rotate-x"></i>
        </a>
    </div> --}}
</div>
