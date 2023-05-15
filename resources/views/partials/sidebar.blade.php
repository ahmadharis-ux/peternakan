 <!-- ======= Sidebar ======= -->

 <style>
     .sidebar-custom {
         background-color: white;
         margin: 10px 0px 10px 10px;
         border-radius: .5rem;

     }
 </style>

 <aside id="sidebar" class="sidebar sidebar-custom">

     <ul class="sidebar-nav" id="sidebar-nav">


         @if (auth()->user()->role->name == 'Accounting')
             {{-- DASHBOARD --}}
             <li class="nav-item">
                 <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }} " href="/acc">
                     <i class="bi bi-grid"></i>
                     <span>Dashboard</span>
                 </a>
             </li>

             {{-- PEMBUKUAN --}}
             <li class="nav-item">
                 <a class="nav-link {{ $active != 'buku' ? 'collapsed' : '' }}" data-bs-target="#menuPembukuan"
                     data-bs-toggle="collapse" href="#">
                     <i class="bi bi-menu-button-wide"></i><span>Pembukuan</span><i
                         class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="menuPembukuan"
                     class="nav-content  {{ $active != 'buku' ? 'collapse' : '' }} {{ $active == 'buku' ? 'show' : '' }}"
                     data-bs-parent="#sidebar-nav">
                     <li>
                         <a href="/acc/kas" class="{{ $title == 'Buku - Kas' ? 'active' : '' }}">
                             <i class="bi bi-circle"></i><span>Kas</span>
                         </a>
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
                         <a href="/acc/gaji" class="">
                             <i class="bi bi-circle"></i><span>Tabungan</span>
                         </a>
                     </li>
                     <li>
                         <a href="/acc/pekerja" class="{{ $title == 'Buku - Gaji' ? 'active' : '' }}">
                             <i class="bi bi-circle"></i><span>Gaji</span>
                         </a>
                     </li>
                     <li>
                         <a href="/acc/servis_mobil">
                             <i class="bi bi-circle"></i><span>Servis Mobil</span>
                         </a>
                     </li>
                 </ul>
             </li>

             {{-- USER --}}
             <li class="nav-item">
                 <a class="nav-link {{ $active != 'users' ? 'collapsed' : '' }}" data-bs-target="#menuUser"
                     data-bs-toggle="collapse" href="#">
                     <i class="bi bi-people"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="menuUser"
                     class="nav-content   {{ $active != 'users' ? 'collapse' : '' }} {{ $active == 'users' ? 'show' : '' }}"
                     data-bs-parent="#sidebar-nav">
                     <li>
                         <a href="/acc/customer" class="{{ $title == 'Customer' ? 'active' : '' }}">
                             <i class="bi bi-circle"></i><span>Customer</span>
                         </a>
                     </li>
                     <li>
                         <a href="/acc/supplier_sapi" class="{{ $title == 'Supplier Sapi' ? 'active' : '' }}">
                             <i class="bi bi-circle"></i><span>Supplier Sapi</span>
                         </a>
                     </li>
                     <li>
                         <a href="/acc/supplier_pakan">
                             <i class="bi bi-circle"></i><span>Supplier Pakan</span>
                         </a>
                     </li>
                     <li>
                         <a href="/acc/akuntan">
                             <i class="bi bi-circle"></i><span>Akuntan</span>
                         </a>
                     </li>
                     <li>
                         <a href="/acc/admin">
                             <i class="bi bi-circle"></i><span>Admin</span>
                         </a>
                     </li>
                     <li>
                         <a href="/acc/owner" class="">
                             <i class="bi bi-circle"></i><span>Owner</span>
                         </a>
                     </li>
                 </ul>
             </li>
         @endif

         @if (auth()->user()->role->name == 'Admin')
             <li class="nav-item">
                 <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }} " href="/admin">
                     <i class="bi bi-grid"></i>
                     <span>Dashboard</span>
                 </a>
             </li><!-- End Dashboard Nav -->
             <li class="nav-heading">Pages</li>

             <li class="nav-item">
                 <a class="nav-link {{ $active != 'users' ? 'collapsed' : '' }}" href="/users">
                     <i class="bi bi-person"></i>
                     <span>Users</span>
                 </a>
             </li><!-- End Profile Page Nav -->
         @endif

         @if (auth()->user()->role->name == 'Owner')
             <li class="nav-item">
                 <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }} " href="/owner">
                     <i class="bi bi-grid"></i>
                     <span>Dashboard</span>
                 </a>
             </li><!-- End Dashboard Nav -->
         @endif
     </ul>

 </aside><!-- End Sidebar-->
