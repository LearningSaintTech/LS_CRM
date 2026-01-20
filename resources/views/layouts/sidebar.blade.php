<div class="icnav">
    <div class="icnav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li class="menu-title" data-i18n="Learning Saint">Learning Saint</li> --}}
            <li>
                <a class="has-arrow" href="{{ route('dashboard') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-home"></i>
                    </div>
                    <span class="nav-text" data-i18n="Dashboard">Dashboard</span>
                </a>
                {{-- <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}" data-i18n="Dashboard Light">Dashboard Light</a></li>
                    <li><a href="{{ route('dashboard') }}" data-i18n="Dashboard Dark">Dashboard Dark</a></li>
                </ul> --}}
            </li>
            {{-- start  by amarjeet kushwaha all menu should be same --}}


            @can('View Customer')
                <x-sidebar-menu-item route="employee.list" icon="fi fi-rs-employees" text="Employees" />
            @endcan

            <x-sidebar-menu-item route="blog.list" icon="fi fi-rs-book" text="BLog" />

            <x-sidebar-menu-item route="settings.index" icon="fi fi-rr-settings" text="Setting"/>

        </ul>
    </div>
    {{-- <div class="icnav-footer">
        <a href="https://hexabox.dexignlab.com/doc" target="_blank" class="btn btn-docs btn-success w-100">
            <span>Docs & Components</span>
            <i class="fa-solid fa-arrow-up rotate-x"></i>
        </a>
    </div> --}}
</div>
