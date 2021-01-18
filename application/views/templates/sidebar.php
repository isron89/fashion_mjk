<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="background-color: #3cd6bf" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
         <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Fashion Mojokerto </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
          <i class="fas fa-fw fa-dashboard"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kategori
      </div>

      

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('k_baju') ?>">
          <i class="fas fa-fw fa-"></i>
          <span>Baju</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('k_jaket') ?>">
          <i class="fas fa-fw fa-"></i>
          <span>Jaket</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('k_celana') ?>">
          <i class="fas fa-fw fa-"></i>
          <span>Celana</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('k_sepatu') ?>">
          <i class="fas fa-fw fa-"></i>
          <span>Sepatu</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

      <!--
        <form action="<?php echo base_url('index.php/cari_barang/hasil')?>" action="GET">
          <div class="form-group">
          <label for="cari">data yang dicari</label>
          <input type="text" class="form-control" id="cari" name="cari" placeholder="cari"> 
          <input class="btn btn-primary" type="submit" value="Cari">
          </div>
      -->

        </form>

          Topbar Search
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?php echo base_url('index.php/cari_barang/hasil')?>" action="GET">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" value="Cari">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           <div class="navbar">
           <ul class="nav navbar-nav navbar-right">
             <li>
               <?php
               $keranjang = 'Keranjang Belanja: '.$this->cart->total_items(). 'items'
                ?>
                <?php echo anchor('dashboard/detail_keranjang', $keranjang) ?>
             </li>
           </ul> 

                <div class="topbar-divider d-none d-sm-block"></div>

            <ul class="na navbar-nav navbar-right">
              <?php if($this->session->userdata('username')) { ?>
                <li><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
                <li class="ml-2"><?php echo anchor('auth/logout','Logout') ?></li>
              <?php } else { ?>
                <li><?php echo anchor('auth/login', 'Login'); ?></li>
              <?php } ?>
              
            </ul>

         </div>

          </ul>

        </nav>
        </div>
        <!-- End of Topbar -->