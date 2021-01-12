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
        <img src="<?php echo base_url('assets/img/'); ?>user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!-- Sidebar Working Permit -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-user"></i>
            <p>
              Cuti Pegawai
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('employee/working_permits'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Cuti</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('employee/working_permits/add'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ambil Cuti</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Sidebar Working Permit -->

        <li class="nav-item">
          <a href="<?php echo base_url('employee/report'); ?>" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p class="text">Print Slip Gaji</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('employee/calendar'); ?>" class="nav-link">
            <i class="nav-icon fas fa-calender"></i>
            <p class="text">Kalender</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('login/logout'); ?>" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Log Out</p>
          </a>
        </li>
    </nav>
    <!-- End Sidebar Menu -->
</aside>