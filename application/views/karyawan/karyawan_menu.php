<!DOCTYPE html>
<html>
<head>
      <title></title>
</head>
<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

  <header class="main-header">
  
  
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="assets/img/logo_bnpp.png" width="100%" height="100%"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="assets/img/logo_bnpp.png" width="20%" height="80%">&nbsp;<b>Page Pegawai</b></span>
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

          <!-- Menampilkan waktu -->
          <b class="col-md-4">
            <i class="icon-double-angle-right"></i>
            <br>
              <span id="dates"><span id="the-day">Hari, 00 Bulan 0000</span> 
              <span id="the-time">00:00:00</span> WIB</span>
          </b>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/dist/img/logo_user.png" class="user-image" alt="User Image">
        <!-- Untuk Mengambil Nama Admin Yang Login -->
              <span class="hidden-xs"><?php echo $this->session->userdata('nik');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/dist/img/logo_user.png" class="img-circle" alt="User Image">
        <!-- Untuk Mengambil Nama Admin Yang Login -->
                <p>
                 <?php echo $this->session->userdata('nik');?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="karyawan/edit_password" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="login/logout" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!-- Untuk Mengambil Foto Admin Yang Login -->
        <div class="pull-left image">
          <img src="assets/dist/img/logo_user.png" class="img-circle" alt="User Image">
        </div>
        <!-- Untuk Mengambil Nama Admin Yang Login -->
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nik');?></p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="active treeview">
          <a href="<?php echo base_url('karyawan'); ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="header">MAIN MENU</li>
        <li class="treeview">
       
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('karyawan/home') ?>"><i class="fa fa-chevron-right"></i>Profile</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Permohonan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('karyawan/input_cuty_tahunan') ?>"><i class="fa fa-chevron-right"></i>Cuti Tahunan</a></li>
            <li><a href="<?php echo base_url('karyawan/input_cuty_besar') ?>"><i class="fa fa-chevron-right"></i>Cuti Besar</a></li>
            <li><a href="<?php echo base_url('karyawan/input_cuty_sakit') ?>"><i class="fa fa-chevron-right"></i>Cuti Sakit</a></li>
            <li><a href="<?php echo base_url('karyawan/input_cuty_melahirkan') ?>"><i class="fa fa-chevron-right"></i>Cuti Melahirkan</a></li>
            <li><a href="<?php echo base_url('karyawan/input_cuty_penting') ?>"><i class="fa fa-chevron-right"></i>Cuti Alasan Penting</a></li>
            <li><a href="<?php echo base_url('karyawan/input_cuty_negara') ?>"><i class="fa fa-chevron-right"></i>Di luar Tanggungan Negara</a></li>
          </ul>
        </li>
        
        <li class="active treeview">
          <a href="<?php echo base_url('karyawan/permohonan') ?>">
            <i class="fa  fa-send"></i> <span>Data Permohonan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
         
        

        
        <li class="active treeview">
          <a href="<?php echo base_url('karyawan/histori_cuty') ?>">
            <i class="fa  fa-history"></i> <span>Catatan Cuti</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="header">LOG OUT</li>
        <li class="active treeview">
          <a href="#">
            <i href="login/logout" class="fa fa-power-off"></i> <span>Log Out</span>
            <span class="pull-right-container"></span>
          </a>
        </li>                  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>  
  <!-- /.content-wrapper -->
</body>  
</html>