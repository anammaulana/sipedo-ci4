 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">SipedoApp <sup>CI4</sup></div>
     </a>


     <!-- Heading -->
     <div class="sidebar-heading">
         SipedoApp
     </div>
     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link" href="">
             <i class="far fa-fw fa-building"></i>
             <span>Profile Diskominfo</span></a>
     </li>
     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('/'); ?>">
             <i class="fas fa-fw fa-list-ul"></i>
             <span>Katalog Aplikasi</span></a>
     </li>
     <hr class="sidebar-divider">

     <?php if (in_groups('admin')) : ?>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('user'); ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span> My Dashboard </span></a>
     </li>
     <?php endif; ?>

     <?php if (in_groups('user')) : ?>

         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('user'); ?>">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span> My Dashboard </span></a>
         </li>

         <hr class="sidebar-divider">
         <!-- Nav Item - Tables -->
         <!-- <li class="nav-item">
             <a class="nav-link" href="<?= base_url('logout'); ?>">
                 <i class="fas fa-fw fa-sign-out-alt"></i>
                 <span>Logout</span></a>
         </li>
         <hr class="sidebar-divider"> -->
     <?php endif; ?>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('login'); ?>">
             <i class="fas fa- fw fa-sign-in-alt"></i>
             <span>Sign up or login</span></a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->