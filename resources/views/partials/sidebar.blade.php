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

         @switch(auth()->user()->role->nama)
             @case('Accounting')
                 @include('partials.sidebar.accounting')
             @break

             @case('Admin')
                 @include('partials.sidebar.admin')
             @break

             @case('Owner')
                 @include('partials.sidebar.owner')
             @break
         @endswitch

         {{-- testpage --}}
         {{-- <li class="nav-item">
             <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }}" href="/test">
                 <i class="bi bi-grid"></i>
                 <span>Testpage</span>
             </a>
         </li> --}}

     </ul>
 </aside>
