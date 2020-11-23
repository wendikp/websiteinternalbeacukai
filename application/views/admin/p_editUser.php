<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets"?> /bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets"?> /dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .notif{
        height: 95px;
      }
    </style>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url().'admin'?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">ADM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Administrator</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url()."assets"?> /dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                    <?php 
                    $username = $this->session->userdata('username');
                    echo "$username";
                    ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url()."assets"?> /dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php 
                      $username = $this->session->userdata('username');
                      echo "$username";
                      ?>
                      <small>Member since August 2017</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a style="text-align: center" href="<?php echo base_url()."logout" ?>" class="btn btn-default btn-flat">Log out</a>
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

      <!-- =============================================== -->

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()."assets"?> /dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <!--<p>Alexander Pierce</p>-->
              <?php 
              $username = $this->session->userdata('username');
              echo "$username";
              ?>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--Artikel-->
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url().'proses_data/dashboard'?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'proses_data/get_daftarAdmin'?>"><i class="fa fa-list"></i> Daftar Admin</a></li>
              </ul>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'proses_data/get_daftarUser'?>"><i class="fa fa-list"></i> Daftar User</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url().'admin' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url().'proses_data/get_daftarUser' ?>"><i class="fa fa-dashboard"></i> Daftar User</a></li>
            <li class="active treeview">Edit</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Edit Admin</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <?php 
                    foreach($data as $row){
                      ?>
                      <form name="edit" action="<?php echo base_url().'proses_data/updateDataUser'?>" role="form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="nopol">Username</label>
                          <input type="text" class="form-control" name="user" placeholder="Username" style="width: 230px;" value="<?php echo $row->username?>">
                        </div>
                        <div class="form-group">
                          <label for="tanggal">Password</label>
                          <input type="text" class="form-control" name="pwd" placeholder="Password" style="width: 230px;" value="<?php echo $row->password?>">
                        </div>
                        <!-- <div class="form-group">
                          <label for="nopol">NIP</label>
                          <input type="text" class="form-control" name="nip" placeholder="NIP" style="width: 230px;" value="<?php echo $row->nip?>">
                        </div> -->
                        <div class="form-group">
                          <label for="nopol">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" style="width: 230px;" value="<?php echo $row->nama_lkp?>">
                        </div>
                        <div class="form-group">
                          <label for="nopol">Jabatan</label>
                          <select class="form-control" name="jabatan" style="width: 230px;" required="required">
                            <option></option>
                            <option value="Kepala Kantor">Kepala Kantor</option>
                            <option value="Kepala Bagian Umum">Kepala Bagian Umum</option>
                            <option value="Kabid Fasilitas Kepabeanan">Kabid Fasilitas Kepabeanan</option>
                            <option value="Kabid Kepatuhan Internal">Kabid Kepatuhan Internal</option>
                            <option value="Kabid Kepabeanan dan Cukai">Kabid Kepabeanan dan Cukai</option>
                            <option value="Kabid Penindakan dan Penyidikan">Kabid Penindakan dan Penyidikan</option>
                            <option value="Kasi Keberatan dan Banding">Kasi Keberatan dan Banding</option>
                            <option value="Kasi Bantuan Hukum">Kasi Bantuan Hukum</option>
                            <option value="Kasi Kepatuhan Pelaksanaan Tugas Pelayanan">Kasi Kepatuhan Pelaksanaan Tugas Pelayanan</option>
                            <option value="Kasi Fasilitas Pabean II">Kasi Fasilitas Pabean II</option>
                            <option value="Kasi Penindakan I">Kasi Penindakan I</option>
                            <option value="Kasi Kepatuhan Pelaksanaan Tugas Administrasi">Kasi Kepatuhan Pelaksanaan Tugas Administrasi</option>
                            <option value="Kasi Fasilitas Pabean III">Kasi Fasilitas Pabean III</option>
                            <option value="Kasi Penindakan II">Kasi Penindakan II</option>
                            <option value="Kasi Informasi Kepabeanan dan Cukai">Kasi Informasi Kepabeanan dan Cukai</option>
                            <option value="Kasubag Humas dan Rumah Tangga">Kasubag Humas dan Rumah Tangga</option>
                            <option value="Kepala Subbagian Kepegawaian">Kepala Subbagian Kepegawaian</option>
                            <option value="Kasubag TU dan Keuangan">Kasubag TU dan Keuangan</option>
                            <option value="Kepala Seksi Penyidikan dan BHP I">Kepala Seksi Penyidikan dan BHP I</option>
                            <option value="Kasi Kepatuhan Pelaksanaan Tugas Pengawasan">Kasi Kepatuhan Pelaksanaan Tugas Pengawasan</option>
                            <option value="Kepala Seksi Penyidikan dan BHP II">Kepala Seksi Penyidikan dan BHP II</option>
                            <option value="Kepala Seksi Fasilitas Pabean I">Kepala Seksi Fasilitas Pabean I</option>
                            <option value="Kepala Seksi Intelijen">Kepala Seksi Intelijen</option>
                            <option value="Kepala Seksi Pabean dan Cukai">Kepala Seksi Pabean dan Cukai</option>
                            <option value="Pelaksana Pemeriksa">Pelaksana Pemeriksa</option>
                            <option value="Pelaksana Administrasi">Pelaksana Administrasi</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="nopol">Pangkat/Golongan</label>
                          <select class="form-control" name="gol" style="width: 230px;" required="required">
                            <option></option>
                            <option value="Pembina Utama/IV E">Pembina Utama/IV E</option>
                            <option value="Pembina Utama Madya/IV D">Pembina Utama Madya/IV D</option>
                            <option value="Pembina Utama Muda/IV C">Pembina Utama Muda/IV C</option>
                            <option value="Pembina Tingkat I/IV B">Pembina Tingkat I/IV B</option>
                            <option value="Pembina/IV A">Pembina/IV A</option>
                            <option value="Penata Tingkat I/III D">Penata Tingkat I/III D</option>
                            <option value="Penata/III C">Penata/III C</option>
                            <option value="Penata Muda Tingkat I/III B">Penata Muda Tingkat I/III B</option>
                            <option value="Penata Muda/III A">Penata Muda/III A</option>
                            <option value="Pengatur Tingkat I/II D">Pengatur Tingkat I/II D</option>
                            <option value="Pengatur/II C">Pengatur/II C</option>
                            <option value="Pengatur Muda Tingkat I/II B">Pengatur Muda Tingkat I/II B</option>
                            <option value="Pengatur Muda/II A">Pengatur Muda/II A</option>
                            <option value="Juru Tingkat I/I D">Juru Tingkat I/I D</option>
                            <option value="Juru/I C">Juru/I C</option>
                            <option value="Juru Muda Tingkat I/I B">Juru Muda Tingkat I/I B</option>
                            <option value="Juru Muda/I A">Juru Muda/I A</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="nopol">Tanggal Lahir</label>
                          <input type="text" class="form-control" name="tgl" placeholder="YYYY-MM-DD" style="width: 230px;" value="<?php echo $row->tgl_lhr?>">
                        </div>
                        <div class="form-group">
                          <label for="nopol">Alamat</label>
                          <textarea class="form-control " name="alamat" rows="5" cols="80" style="width: 500px;"> <?php echo $row->alamat?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="description">Bidang/Bagian</label>
                          <select name="bagian" class="form-control" style="width: 230px;" required="required">
                             <option></option>
                             <option value="1">Umum</option>
                             <option value="2">Fasilitas Kepabeanan</option>
                             <option value="3">Kepatuhan Internal</option>
                             <option value="4">Kepabeanan dan Cukai</option>
                             <option value="5">Penindakan dan Penyidikan</option>
                          </select>
                        </div>
                       <div class="form-group">
                        <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
                      </div>

                    </form>
                    <?php
                  }
                  ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2017 DJBC JATIM II.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar =================================================================================================-->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab"></div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."assets"?> /plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets"?> /bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url()."assets"?> /plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url()."assets"?> /plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url()."assets"?> /plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url()."assets"?> /plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url()."assets"?> /plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url()."assets"?> /plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url()."assets"?> /plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url()."assets"?> /plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url()."assets"?> /plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()."assets"?> /plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets"?> /dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url()."assets"?> /dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."assets"?> /dist/js/demo.js"></script>
  </body>
  </html>
