<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Go to web</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Modules</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{route('admin.routes')}}">Routes</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Users-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
{{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
                <a class="collapse-item" href="{{route('admin.users.index')}}">User List</a>
                <a class="collapse-item" href="{{route('admin.users.create')}}">Add User</a>
            </div>
        </div>
    </li>
    <!-- Roles-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true" aria-controls="collapseRoels">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Roles</span>
        </a>
        <div id="collapseRoles" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
{{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
                <a class="collapse-item" href="{{route('admin.roles.index')}}">Roles List</a>
                <a class="collapse-item" href="{{route('admin.roles.create')}}">Add Role</a>
            </div>
        </div>
    </li>
    <!-- Permissions-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermissions" aria-expanded="true" aria-controls="collapsePermissions">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Permissions</span>
        </a>
        <div id="collapsePermissions" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
{{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
                <a class="collapse-item" href="{{route('admin.permissions.index')}}">Permissions List</a>
                <a class="collapse-item" href="{{route('admin.permissions.create')}}">Add Permission</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlogs" aria-expanded="true" aria-controls="collapseBlogs">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseBlogs" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
                <a class="collapse-item" href="{{route('admin.categories.index')}}">Category Lists</a>
                <a class="collapse-item" href="{{route('admin.posts.index')}}">Posts Lists</a>
                <a class="collapse-item" href="{{route('admin.tags.index')}}">Tag Lists</a>
                <a class="collapse-item" href="{{route('admin.comments.index')}}">Comment Lists</a>
            </div>
        </div>
    </li>

    <!-- Pages-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
{{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
                <a class="collapse-item" href="#">P</a>
                <a class="collapse-item" href="#">A</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">





    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('tables')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
