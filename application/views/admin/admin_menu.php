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
      <span class="logo-mini"><img src="assets/img/logo_bnpp.png" width="50px" height="50px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="assets/img/logo_bnpp.png" width="40px" height="40px">&nbsp;<b>Page Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Menampilkan wwaktu -->
          <b class="col-md-4">
          <i class="icon-double-angle-right"></i><br>
          <span id="dates"><span id="the-day">Hari, 00 Bulan 0000</span> <span id="the-time">00:00:00</span> </span>
          </b>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/dist/img/1.png" class="user-image" alt="User Image">
        <!-- Untuk Mengambil Nama Admin Yang Login -->
              <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/dist/img/1.png" class="img-circle" alt="User Image">
        <!-- Untuk Mengambil Nama Admin Yang Login -->
                <p>
                 <?php echo $this->session->userdata('username');?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php/admin/edit_password" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="index.php/login_adm/logout" class="btn btn-default btn-flat">Log out</a>
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
          <img src="assets/dist/img/1.png" class="img-circle" alt="User Image">
        </div>
        <!-- Untuk Mengambil Nama Admin Yang Login -->
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username');?></p>
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
        <li class="header">MAIN MENU</li>
        <li class="active treeview">
          <a href="admin/home">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="active treeview">
          <a href="admin/tampil_cuty"><i class="fa fa-send"></i>Permohonan Cuti &nbsp; &nbsp;
                  <b style="color:blue">
                    <?php 
                        $tampung= $this->db->query("select * from tbl_cuty where persetujuan=''");
                        $jumlah=$tampung->num_rows();
                        
                     ?>
                  </b>
                 </a>
        </li>
        <?php if ($this->session->userdata('role')!="KABAG") {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tampil_agama"><i class="fa fa-file-text-o"></i>Data Agama</a></li>
            <li><a href="admin/tampil_jabatan"><i class="fa fa-file-text-o"></i>Data Jabatan</a></li>
            <li><a href="admin/tampil_karyawan"><i class="fa fa-file-text-o"></i>Data Pegawai</a></li>
            <!-- <li><a href="admin/tampil_cuty"><i class="fa fa-file-text-o"></i>Data Cuti &nbsp; &nbsp;
                  <b style="color:blue">
                    <?php 
                        $tampung= $this->db->query("select * from tbl_cuty where persetujuan=''");
                        $jumlah=$tampung->num_rows();
                        echo "$jumlah";
                     ?>
                  </b>
                 </a>
            </li> -->
         <!--   <li><a href="admin/tampil_absen"><i class="fa fa-file-text-o"></i>Data Absensi Masuk</a></li>-->
        <!--    <li><a href="admin/tampil_absen_pulang"><i class="fa fa-file-text-o"></i>Data Absensi Pulang</a></li>-->
            <li><a href="admin/tampil_pengumuman"><i class="fa fa-file-text-o"></i>Data Pengumuman</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-o"></i> <span>Report Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php/laporan/laporan_karyawan" target="popup"><i class="fa fa-sticky-note-o"></i>Report Data Pegawai</a></li>
            <li><a href="index.php/laporan/laporan_cuty" target="popup"><i class="fa fa-sticky-note-o"></i>Report Data Cuti</a></li>
          </ul>
        </li>

        <?php }?>
        <li class="header">LOG OUT</li>
        <li class="active treeview">
          <a href="index.php/login_adm/logout">
            <i class="fa fa-power-off"></i> <span>Log Out</span>
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