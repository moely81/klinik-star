<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard')?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-medkit"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMK ver<sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('dashboard')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
       <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Registrasi</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Registrasi:</h6>
              <a class="collapse-item" href="<?php echo base_url('klinik/dmr')?>">DMR</a>
              <a class="collapse-item" href="cards.html">P3K</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pelayanan</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Pelayanan:</h6>
              <a class="collapse-item" href="<?php echo base_url('user/absill')?>">Absen Illness</a>
              <a class="collapse-item" href="utilities-border.html">Medical Claim</a>
            </div>
          </div>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Kamar Obat</span>
          </a>
          <div id="collapse3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kamar Obat:</h6>
              <a class="collapse-item" href="<?php echo base_url('klinik/obat')?>">Data Obat</a>
              <a class="collapse-item" href="utilities-border.html">Input Stock Obat</a>
              <a class="collapse-item" href="utilities-color.html">Input Obat Baru</a>
              <a class="collapse-item" href="utilities-border.html">Stock Opname</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('klinik/ps')?>">
            <i class="fas fa-fw fa-user-injured"></i>
            <span>Pasien</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Addons
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-fw fa-folder"></i>
              <span>Report</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Report Obat:</h6>
                <a class="collapse-item" href="">Kunjungan Pasien</a>
                <a class="collapse-item" href="">Penggunaan Obat</a>
                <a class="collapse-item" href="">Obat Masuk</a>
                <div class="collapse-divider"></div> -->
                <h6 class="collapse-header">Report Lainnya :</h6>
                <a class="collapse-item" href="">Absen Illness</a>
                <!--<a class="collapse-item" href="">Medical Claim</a>
                <a class="collapse-item" href="">P3K</a>-->
              </div>
            </div>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('auth/logout')?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
          </li>

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>
              
         <form  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="form-group row">
           <div class="Tanggal"><script language="JavaScript">document.write(tanggallengkap);</script></div>
           <div class="topbar-divider d-none d-sm-block"></div>
           <div id="output" class="jam" ></div> 
          </div>
        </form>


              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                               <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">1+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">January 10, 2021</div>
                    <span class="font-weight-bold">Mohon yang status masih waiting untuk segera dikirim document nya, trims.</span>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dashboard['nama'];?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/') . $dashboard['image'];?>">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('profile');?>">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>

              </ul>

            </nav>
        <!-- End of Topbar -->