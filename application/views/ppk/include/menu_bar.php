<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/logo-kudus.png" class="img elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('ppk') ?>" class="d-block">USER PPK</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Menu Beranda -->
                <li class="nav-item">
                    <a href="<?= base_url('ppk/beranda') ?>" class="nav-link <?= $this->uri->segment(2) == 'beranda' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <!-- Menu Pengajuan -->
                <li class="nav-item">
                    <a href="<?= base_url('ppk/administrasi/pengajuan') ?>" class="nav-link <?= $this->uri->segment(2) == 'administrasi' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Administrasi
                        </p>
                    </a>
                </li>
                <!-- Button Profile -->
                <li class="nav-item">
                    <a href="<?= base_url('ppk/profile') ?>" class="nav-link <?= $this->uri->segment(2) == 'profile' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <!-- Button Profile -->
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>