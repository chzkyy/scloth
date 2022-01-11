<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">Scloth Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $title === 'Dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ $title === 'Category' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.category') }}">
            <i class="fas fa-tasks"></i>
            <span>Category</span></a>
    </li>

    <li class="nav-item {{ $title === 'Catalogue' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.catalogue') }}">
            <i class="fas fa-tshirt"></i>
            <span>Catalogue</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
