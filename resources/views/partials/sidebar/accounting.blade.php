{{-- DASHBOARD --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }}" href="/acc">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>

{{-- PEMBUKUAN --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'buku' ? 'collapsed' : '' }}" data-bs-target="#menuPembukuan"
        data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Pembukuan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <ul id="menuPembukuan"
        class="nav-content {{ $active != 'buku' ? 'collapse' : '' }} {{ $active == 'buku' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
            <a href="/acc/kas" class="{{ $title == 'Buku - Kas' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Kas</span>
            </a>
            {{-- <a onclick="alert('under construction')" href="#"
                class="{{ $title == 'Buku - Kas' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Kas</span>
            </a> --}}

        </li>
        <li>
            <a href="/acc/hutang" class="{{ $title == 'Buku - Hutang' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Hutang</span>
            </a>
        </li>
        <li>
            <a href="/acc/piutang" class="{{ $title == 'Buku - Piutang' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Piutang</span>
            </a>
        </li>
        <li>
            <a href="/acc/pakan" class="{{ $title == 'Buku - Pakan' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Pakan</span>
            </a>
        </li>
        <li>
            <a href="/acc/prive" class="{{ $title == 'Buku - Prive' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Prive</span>
            </a>
        </li>
        <li>
            <a href="/acc/tabungan" class="{{ $title == 'Buku - Tabungan' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Tabungan</span>
            </a>
        </li>
        <li>
            <a href="/acc/gaji" class="{{ $title == 'Buku - Gaji' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Gaji</span>
            </a>
        </li>
        {{-- <li>
            <a href="/acc/servis_mobil">
                <i class="bi bi-circle"></i><span>Servis Mobil</span>
            </a>
        </li> --}}
    </ul>
</li>

{{-- USER --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'users' ? 'collapsed' : '' }}" data-bs-target="#menuUser"
        data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="menuUser"
        class="nav-content {{ $active != 'user' ? 'collapse' : '' }} {{ $active == 'users' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li>
            <a href="/acc/user/all" class="{{ $title == 'User - User' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>All user</span>
            </a>

        <li>
            <a href="/acc/user/customer" class="{{ $title == 'User - Customer' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Customer</span>
            </a>
        </li>
        <li>
            <a href="/acc/user/supplier_sapi" class="{{ $title == 'User - Supplier sapi' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Supplier Sapi</span>
            </a>
        </li>
        <li>
            <a href="/acc/user/supplier_pakan" class="{{ $title == 'User - Supplier pakan' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Supplier Pakan</span>
            </a>
        </li>
        <li>
            <a href="/acc/user/accounting" class="{{ $title == 'User - Accounting' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Akuntan</span>
            </a>
        </li>
        <li>
            <a href="/acc/user/admin" class="{{ $title == 'User - Admin' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Admin</span>
            </a>
        </li>
        <li>
            <a href="/acc/user/owner" class="{{ $title == 'User - Owner' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Owner</span>
            </a>
        </li>
        <li>
            <a href="/acc/user/pekerja" class="{{ $title == 'User - Pekerja' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Pekerja</span>
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
            <a href="/acc/kodejurnal" class="{{ $title == 'Kode Jurnal' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Kode Jurnal</span>
            </a>
        </li>

        <li>
            <a href="/acc/jurnal" class="{{ $title == 'Jurnal' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Jurnal</span>
            </a>
        </li>

        <li>
            <a href="/acc/jenis_sapi" class="{{ $title == 'Jenis sapi' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Jenis sapi</span>
            </a>
        </li>


    </ul>
</li>

{{-- OPERASIONAL KANDANG --}}
<li class="nav-item">
    <a class="nav-link {{ $active != 'operasional kandang' ? 'collapsed' : '' }}"
        data-bs-target="#menuOperasionalKandang" data-bs-toggle="collapse" href="#">
        <i class="bi bi-building-gear"></i><span>Operasional Kandang</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="menuOperasionalKandang"
        class="nav-content {{ $active != 'operasional kandang' ? 'collapse' : '' }} {{ $active == 'operasional kandang' ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">

        <li>
            <a href="/acc/pemakaian_pakan" class="{{ $title == 'Pemakaian pakan' ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Pemakaian pakan</span>
            </a>
        </li>
    </ul>
</li>
