<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url(''); ?>" class="brand-link">
    <img src="<?php echo base_url('assets/img/'); ?>AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIP Online</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/img/'); ?>icon.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo ($this->session->userdata('username')) ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- Sidebar Pegawai -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-user"></i>
            <p>
              Pegawai
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/users'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Pegawai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/users/add'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Pegawai</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Sidebar Pegawai -->

        <!-- Sidebar RFID -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-user"></i>
            <p>
              RFID
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/rfids'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List RFID</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/rfids/add'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add RFID</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Sidebar RFID -->

        <!-- Sidebar Calender -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-user"></i>
            <p>
              Calender
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/calendar'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Kegiatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/calendar/add'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Kegiatan</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Sidebar Calendar -->

        <!-- Sidebar New -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-user"></i>
            <p>
              Berita
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/news'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Berita</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/news/add'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Berita</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Berita Calendar -->

        <li class="nav-item">
          <a href="<?php echo base_url('login/logout'); ?>" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Log Out</p>
          </a>
        </li>
    </nav>
    <!-- End Sidebar Menu -->
</aside>