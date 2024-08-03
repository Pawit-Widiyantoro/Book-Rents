<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-start" href="index.html">
        <div class="sidebar-brand-text mx-3">Rent-Books</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}
    @if (Auth::user()->role_id ==1)
        <!-- Nav Item - Books -->
        <li class="nav-item {{ Request::is('dashboard/books*') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard/books">
                <i class="fas fa-solid fa-book"></i>
                <span>Books</span></a>
        </li>
        <!-- Nav Item - Categories -->
        <li class="nav-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard/categories">
                <i class="fas fa-list-alt"></i>
                <span>Categories</span></a>
        </li>
        <!-- Nav Item - Users -->
        <li class="nav-item {{ Request::is('dashboard/users*') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard/users">
                <i class="fas fa-users"></i>
                <span>Users</span></a>
        </li>
        <!-- Nav Item - Rent Logs -->
        <li class="nav-item {{ Request::is('dashboard/rent-logs*') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard/rent-logs">
                <i class="fas fa-history"></i>
                <span>Rent Logs</span></a>
        </li>
        
    @else        
        <!-- Nav Item - Profile -->
        <li class="nav-item {{ Request::is('profiles*') ? 'active' : '' }}">
            <a class="nav-link" href="/books">
                <i class="fas fa-fw fa-table"></i>
                <span>Profile</span></a>
        </li>
    @endif
        <!-- Nav Item - Tables -->
        <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-dark align-items-center gap-2 text-white ms-3 mt-2" style="border:1px solid #fff;">
                    <i class="bi bi-box-arrow-right mb-1"></i>
                    Logout
                </button>
            </form>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-5 d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>