{{-- DASHBOARD --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }}" href="/admin">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>

{{-- PEMBUKUAN --}}
{{-- <li class="nav-item">
    <a class="nav-link {{ $active != 'buku' ? 'collapsed' : '' }}" data-bs-target="#menuPembukuan"
        data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Pembukuan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="menuPembukuan"
        class="nav-content {{ $active != 'buku' ? 'collapse' : '' }} {{ $active == 'buku' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
            <a href="/admin/jurnal" class="{{ $title == 'Jurnal' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Jurnal</span>
            </a>
        </li>



    </ul>
</li> --}}

{{-- USER --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'users' ? 'collapsed' : '' }}" href="/admin/users">
        <i class="bi bi-people"></i><span>User</span>
    </a>
    {{-- <ul id="menuUser"
        class="nav-content {{ $active != 'users' ? 'collapse' : '' }} {{ $active == 'users' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
            <a href="/admin/customer" class="{{ $title == 'Customer' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Customer</span>
            </a>
        </li>
        <li>
            <a href="/admin/supplier_sapi" class="{{ $title == 'Supplier Sapi' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Supplier Sapi</span>
            </a>
        </li>
        <li>
            <a href="/admin/supplier_pakan">
                <i class="bi bi-circle"></i><span>Supplier Pakan</span>
            </a>
        </li>
        <li>
            <a href="/admin/akuntan">
                <i class="bi bi-circle"></i><span>Akuntan</span>
            </a>
        </li>
        <li>
            <a href="/admin/admin">
                <i class="bi bi-circle"></i><span>Admin</span>
            </a>
        </li>
        <li>
            <a href="/admin/owner" class="">
                <i class="bi bi-circle"></i><span>Owner</span>
            </a>
        </li>
    </ul> --}}
</li>

{{-- OPSI --}}
{{-- <li class="nav-item">
    <a class="nav-link {{ $active != 'opsi' ? 'collapsed' : '' }}" data-bs-target="#menuOpsi" data-bs-toggle="collapse"
        href="#">
        <i class="bi bi-gear"></i><span>Opsi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="menuOpsi"
        class="nav-content {{ $active != 'opsi' ? 'collapse' : '' }} {{ $active == 'opsi' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">

        <li>
            <a href="/admin/roles" class="{{ $title == 'Role' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Role</span>
            </a>
        </li>

    </ul>
</li> --}}
