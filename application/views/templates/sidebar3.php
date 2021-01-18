<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #2B4C6B" id="accordionSidebar">
      <!-- warna asli #364663 -->
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

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('k_batik') ?>">
          <i class="fas fa-fw fa-"></i>
          <span>Batik</span></a>
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
        <nav class="navbar navbar-expand bg-black topbar mb-4 static-top shadow" style="background-color: #4982B8">

          <!-- warna #374f7a -->
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

        </form >

          <div style="color: #d9e6ff">Cari</div>
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
               $keranjang = '<div style="color: #A7CBEE" text-center><button class="btn btn-sm btn-light"> Keranjang : '.$this->cart->total_items(). ' items </button></div>'
                ?>
                <?php echo anchor('dashboard/detail_keranjang', $keranjang) ?>
              
             </li>
           </ul> 

                <div class="topbar-divider d-none d-sm-block"></div>
            
            <ul class="navbar-nav navbar-right">

            	<!-- <div class="dropdown">
  				<button class="dropbtn">Profil</button>
  				<div class="dropdown-content"> -->

              <?php if($this->session->userdata('username')) { ?>
              	<div class="dropdown">
                	<li><div style="color: #d9e6ff" class="dropbtn"><i class="fa fa-user-circle"></i> Profil <?php echo $this->session->userdata('username') ?></div></li>
                	<div class="dropdown-content">
                	<li class="ml-2"><?php echo anchor('invoice','<p style="color : #d9e6ff"><i class="fa fa-cart-arrow-down"></i> Pesanan</p>') ?></li>
                	<li class="ml-2"><?php echo anchor('auth/logout','<p style="color : #d9e6ff"><i class="fa fa-sign-out-alt"></i>Logout</p>') ?></li>
                	</div>
                </div>
              <?php } else { ?>
                <li style="margin: 5px"><?php echo anchor('auth/login', '<button class="btn btn-sm btn-primary">Login</button>'); ?></li>
                <li style="margin: 5px"><?php echo anchor('registrasi', '<button class="btn btn-sm btn-primary">Register</button>'); ?></li>
              <?php } ?>

              <!-- </div>
			</div> -->
            </ul>


         </div>

          </ul>

        </nav>
        </div>
        <!-- End of Topbar -->