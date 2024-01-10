<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SipedoApp <sup>CI4</sup></div>
    </a>
   

    <?php if (in_groups('admin')) : ?>
        <div class="sidebar-heading">
            Admin Panel
        </div>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href=<?= base_url('admin/dashboard'); ?>>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Main Control
        </div>
        <hr class="sidebar-divider">

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/all_domains'); ?>">
                <i class="far fa-folder-open"></i>
                <span>Data Pengajuan Domain</span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Manage Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                    <a class="collapse-item" href="<?= base_url('admin/approval') ?>">Domain Approval</a>
                    <a class="collapse-item" href="<?= base_url('admin/domainDetails') ?>">Manage Domain Detail</a>
                    <a class="collapse-item" href="<?= base_url('admin/domains') ?>">Manage Domains</a>
                    <a class="collapse-item" href="<?= base_url('admin/bahasaProgram') ?>">Manage Bahasa Program</a>
                    <a class="collapse-item" href="<?= base_url('admin/opd') ?>">Manage OPD</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/datausers'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data User</span></a>
        </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Management Profile
    </div>
    <!-- Heading -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="masih on progres">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tahap pengembangan '); ?>">
            <i class="fas fa-fw fa-unlock-alt"></i>
            <span>Change Password</span></a>
    </li>


    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/pengajuan_domain'); ?>">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Pengajuan Domain</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/katalog'); ?>">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Katalog Aplikasi</span></a>
    </li>

    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->