{{-- DASHBOARD --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }}" href="/owner">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>

{{-- PEMBUKUAN --}}
<li class="d-none nav-item">
    <a class="nav-link {{ $active != 'buku' ? 'collapsed' : '' }}" data-bs-target="#menuPembukuan"
        data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Pembukuan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="menuPembukuan"
        class="nav-content {{ $active != 'buku' ? 'collapse' : '' }} {{ $active == 'buku' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
            <a href="/owner/kas" class="{{ $title == 'Buku - Kas' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Kas</span>
            </a>
        </li>
        <li>
            <a href="/owner/hutang" class="{{ $title == 'Buku - Hutang' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Hutang</span>
            </a>
        </li>
        <li>
            <a href="/owner/piutang" class="{{ $title == 'Buku - Piutang' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Piutang</span>
            </a>
        </li>
        <li>
            <a href="/owner/pakan" class="{{ $title == 'Buku - Pakan' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Pakan</span>
            </a>
        </li>
        <li>
            <a href="/owner/prive" class="{{ $title == 'Buku - Prive' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Prive</span>
            </a>
        </li>
        <li>
            <a href="/owner/gaji" class="">
                <i class="bi bi-circle"></i><span>Tabungan</span>
            </a>
        </li>
        <li>
            <a href="/owner/gaji" class="{{ $title == 'Buku - Gaji' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Gaji</span>
            </a>
        </li>
        <li>
            <a href="/owner/servis_mobil">
                <i class="bi bi-circle"></i><span>Servis Mobil</span>
            </a>
        </li>
    </ul>
</li>

{{-- USER --}}
<li class="d-none nav-item">
    <a class="nav-link {{ $active != 'users' ? 'collapsed' : '' }}" data-bs-target="#menuUser"
        data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="menuUser"
        class="nav-content {{ $active != 'users' ? 'collapse' : '' }} {{ $active == 'users' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
            <a href="/owner/customer" class="{{ $title == 'Customer' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Customer</span>
            </a>
        </li>
        <li>
            <a href="/owner/supplier_sapi" class="{{ $title == 'Supplier Sapi' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Supplier Sapi</span>
            </a>
        </li>
        <li>
            <a href="/owner/supplier_pakan">
                <i class="bi bi-circle"></i><span>Supplier Pakan</span>
            </a>
        </li>
        <li>
            <a href="/owner/akuntan">
                <i class="bi bi-circle"></i><span>Akuntan</span>
            </a>
        </li>
        <li>
            <a href="/owner/admin">
                <i class="bi bi-circle"></i><span>Admin</span>
            </a>
        </li>j
        <li>
            <a href="/owner/owner" class="">
                <i class="bi bi-circle"></i><span>Owner</span>
            </a>
        </li>
    </ul>
</li>

{{-- OPSI --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'opsi' ? 'collapsed' : '' }}" data-bs-target="#menuOpsi" data-bs-toggle="collapse"
        href="#">
        <i class="bi bi-gear"></i><span>Opsi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="menuOpsi"
        class="nav-content {{ $active != 'opsi' ? 'collapse' : '' }} {{ $active == 'opsi' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">

        <li>
            <a href="/owner/rekening" class="{{ $title == 'Rekening' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Rekening</span>
            </a>
        </li>

    </ul>
</li>
