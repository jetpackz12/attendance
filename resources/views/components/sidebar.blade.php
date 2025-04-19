<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Attendance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ session('fullname') }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @php
                   $authorized_pages = explode(', ', session('authorized_page'));
               @endphp
               @if (in_array(1, $authorized_pages))
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link" id="dashboard_link">
                            <i class="fa fa-home nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
               @endif
               @if (in_array(2, $authorized_pages))
                    <li class="nav-item" id="dtr_management">
                        <a href="#" class="nav-link" id="dtr_management_link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                DTR Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('upload_attendance') }}" class="nav-link" id="upload_attendance_link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Upload Attendance</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attendance_tracker') }}" class="nav-link" id="attendance_tracker_link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Attendance Tracker</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (in_array(3, $authorized_pages))
                    <li class="nav-item">
                        <a href="{{ route('teacher_management') }}" class="nav-link" id="teacher_management_link">
                            <i class="fa fa-user-tie nav-icon"></i>
                            <p>Teacher Management</p>
                        </a>
                    </li>
                @endif
                @if (in_array(4, $authorized_pages))
                    <li class="nav-item">
                        <a href="{{ route('pupil_management') }}" class="nav-link" id="pupil_management_link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Pupil Management</p>
                        </a>
                    </li>
                @endif
                @if (in_array(5, $authorized_pages))
                    <li class="nav-item">
                        <a href="{{ route('users') }}" class="nav-link" id="manage_users_link">
                            <i class="fa fa-user-secret nav-icon"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                @endif
                @if (in_array(6, $authorized_pages))
                    <li class="nav-item">
                        <a href="{{ route('reports') }}" class="nav-link" id="reports_link">
                            <i class="fa fa-book nav-icon"></i>
                            <p>Reports</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
