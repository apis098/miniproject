
        <!-- Main Sidebar Container -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin.index')}}" class="brand-link">
                <i class="fa-solid fa-utensils"></i>
                <span class="brand-text font-weight-light text-white" style="margin-left: 5%">HummaCook</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-yellow">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link {{ request()->routeIs('dashboard') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('kategori')}}" class="nav-link {{ request()->is('kategori') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                            Kategori

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/kategori-bahan" class="nav-link {{ request()->is('admin/kategori-bahan') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                            Kategori Bahan

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('specialday')}}" class="nav-link {{ request()->is('specialday') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                   Hari Khusus
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
