<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/logo-kudus.png" class="img elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('kepala') ?>" class="d-block">KEPALA</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Menu Beranda -->
                <li class="nav-item">
                    <a href="<?= base_url('kepala/beranda') ?>" class="nav-link <?= $this->uri->segment(2) == 'beranda' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <!-- Menu Users -->
                <li class="nav-item <?= $this->uri->segment(2) == 'administrasi' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $this->uri->segment(2) == 'administrasi' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Administrasi
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('kepala/administrasi/') ?>pengajuan" class="nav-link <?= $this->uri->segment(3) == 'pengajuan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kepala/administrasi/') ?>review" class="nav-link <?= $this->uri->segment(3) == 'review' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Review</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kepala/administrasi/') ?>diterima" class="nav-link <?= $this->uri->segment(3) == 'diterima' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Diterima</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kepala/administrasi/') ?>ditolak" class="nav-link <?= $this->uri->segment(3) == 'ditolak' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ditolak</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Button Profile -->
                <li class="nav-item">
                    <a href="<?= base_url('kepala/profile') ?>" class="nav-link <?= $this->uri->segment(2) == 'profile' ? 'active' : '' ?>">
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