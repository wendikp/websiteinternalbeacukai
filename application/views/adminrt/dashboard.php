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
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /dist/css/mycss.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url().'adminhumas'?>" class="logo">
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
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-pencil"></i>
                  <?php
                  
                  foreach ($data as $row) {
                    $read_stts_izin       = $row->read_stts_izin;
                    $read_stts_cabut      = $row->read_stts_cabut;
                    $read_stts_kbd2       = $row->read_stts_kbd2;
                    $read_stts_kbd4       = $row->read_stts_kbd4;
                    $read_stts_inventaris = $row->read_stts_inventaris;
                    $read_stts_kritik     = $row->read_stts_kritik;
                    $jumlah_izin          = $row->jumlah_izin;
                    $jumlah_cabut         = $row->jumlah_cabut;
                    $jumlah_kbd2          = $row->jumlah_kbd2;
                    $jumlah_kbd4          = $row->jumlah_kbd4;
                    $jumlah_inventaris    = $row->jumlah_inventaris;
                    $jumlah_kritik        = $row->jumlah_kritik;
                    break;
                  }

                  $query = $this->db->query("SELECT nosurat FROM permintaan_atk WHERE read_status = 'false' GROUP BY nosurat"); 
                  $read_stts_atk = $query->num_rows();

                  $query = $this->db->query("SELECT nosurat FROM permintaan_atk GROUP BY nosurat"); 
                  $jumlah_atk = $query->num_rows();

                  if (($read_stts_atk) > 0) {
                    ?>
                    <span class="label label-success"><?php echo ($read_stts_atk);?></span>
                    <?php
                  }
                  ?>
                </a>
                <ul class="dropdown-menu notif">
                  <?php
                  if (($read_stts_atk) > 0) {
                    ?>
                    <li class="header">Pemberitahuan ATK <sup><span class="label label-success">Baru</span></sup></li>
                    <?php
                  } else {
                    ?>
                    <li class="header">Belum Ada Pemberitahuan</li>
                    <?php
                  }
                  ?>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="<?php echo base_url().'proses_data/get_daftarPermintaanATK';?>">
                          <div class="pull-left">
                            <i class="fa fa-pencil"></i>
                          </div>
                          <h4>Ada <?php echo $read_stts_atk;?> Permintaan ATK</h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                </ul>
              </li>
              <!-- Rumah Dinas -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-home"></i>
                  <?php
                  if (($read_stts_izin + $read_stts_cabut) > 0) {
                    ?>
                    <span class="label label-success"><?php echo ($read_stts_izin + $read_stts_cabut);?></span>
                    <?php
                  }
                  ?>
                </a>
                <ul class="dropdown-menu notif2">
                  <?php
                  
                  if (($read_stts_izin + $read_stts_cabut) > 0) {
                    ?>
                    <li class="header">Permohonan Rumah Dinas <sup><span class="label label-success">Baru</span></sup></li>
                    <?php
                  } else {
                    ?>
                    <li class="header">Belum Ada Pemberitahuan</li>
                    <?php
                  }
                  ?>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">

                      <li><!-- start message -->
                        <a href="<?php echo base_url().'proses_data/daftarPermohonanRumahDinas'; ?>">
                          <div class="pull-left">
                            <i class="fa fa-home"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_izin; ?> Permohonan Izin Hunian
                          </h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->

                      
                      <li><!-- start message -->
                        <a href="<?php echo base_url().'proses_data/daftarPermohonanCabutIzinHunian'; ?>">
                          <div class="pull-left">
                            <i class="fa fa-home"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_cabut;?> Permohonan Cabut Izin<br/>Hunian
                          </h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->

                    </ul>
                  </li>
                </ul>
              </li>
              <!-- KBD -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-wrench"></i>
                  <?php
                  if (($read_stts_kbd2 + $read_stts_kbd4) > 0) {
                    ?>
                    <span class="label label-success"><?php echo ($read_stts_kbd2 + $read_stts_kbd4);?></span>
                    <?php
                  }
                  ?>
                </a>
                <ul class="dropdown-menu notif3">
                  <?php
                  
                  if (($read_stts_kbd2 + $read_stts_kbd4) > 0) {
                    ?>
                    <li class="header">Permohonan Servis <sup><span class="label label-success">Baru</span></sup></li>
                    <?php
                  } else {
                    ?>
                    <li class="header">Belum Ada Pemberitahuan</li>
                    <?php
                  }
                  ?>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <!-- KBD 2 -->
                      
                      <li><!-- start message -->
                        <a href="<?php echo base_url().'proses_data/daftarPermohonanServisRoda2'; ?>">
                          <div class="pull-left">
                            <i class="fa fa-motorcycle"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_kbd2?> Permohonan Servis KBD<br/>Roda Dua
                          </h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->

                      <!-- KBD 4 -->
                      
                      <li><!-- start message -->
                        <a href="<?php echo base_url().'proses_data/daftarPermohonanServisRoda4'; ?>">
                          <div class="pull-left">
                            <i class="fa fa-car"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_kbd4?> Permohonan Servis KBD<br/>Roda Empat
                          </h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->

                    </ul>
                  </li>
                </ul>
              </li>
              
              <!-- kritik saran -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-comments-o"></i>
                  <?php
                  if (($read_stts_kritik) > 0) {
                    ?>
                    <span class="label label-success"><?php echo ($read_stts_kritik);?></span>
                    <?php
                  }
                  ?>
                </a>
                <ul class="dropdown-menu notif">
                  <?php
                  
                  if (($read_stts_kritik) > 0) {
                    ?>
                    <li class="header">Pemberitahuan Kritik & saran <sup><span class="label label-success">Baru</span></sup></li>
                    <?php
                  } else {
                    ?>
                    <li class="header">Belum Ada Pemberitahuan</li>
                    <?php
                  }
                  ?>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">

                      <li><!-- start message -->
                        <a href="<?php echo base_url().'proses_data/daftarKritikSaran'; ?>">
                          <div class="pull-left">
                            <i class="fa fa-comments-o"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_kritik?> Kritik & Saran
                          </h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->

                    </ul>
                  </li>
                </ul>
              </li>
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
            <li class="active treeview">
              <a href="<?php echo base_url().'proses_data/dashboardRT'?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pencil"></i> <span>ATK</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'proses_data/get_daftarPermintaanATK'?>"><i class="fa fa-files-o"></i> Permintaan ATK</a></li>
                <li><a href="<?php echo base_url().'proses_data/get_daftarATK'?>"><i class="fa fa-list"></i> Daftar ATK</a></li>
              </ul>
            </li>

            <!--Rumah Dinas-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-home"></i> <span>Rumah Dinas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'proses_data/daftarPermohonanRumahDinas'?>"><i class="fa fa-files-o"></i> Permohonan Izin <br/>Penghunian</a></li>
                <li><a href="<?php echo base_url().'proses_data/daftarPermohonanCabutIzinHunian'?>"><i class="fa fa-files-o"></i> Permohonan Pencabutan <br/>Izin Penghunian</a></li>
                <li><a href="<?php echo base_url().'proses_data/get_daftarRumahAraya'?>"><i class="fa fa-info-circle"></i> Daftar Perumahan Araya</a></li>
                <li><a href="<?php echo base_url().'proses_data/get_daftarRumahPakisjajar'?>"><i class="fa fa-info-circle"></i> Daftar Perumahan Pakisjajar</a></li>
              </ul>
            </li>

            <!--KBD-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-automobile"></i> <span>KBD</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-motorcycle"></i> Roda Dua<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'proses_data/daftarPermohonanServisRoda2'?>"><i class="fa fa-files-o"></i> Permohonan Service</a></li>
                    <li><a href="<?php echo base_url().'proses_data/riwayatServiceRoda2'?>"><i class="fa fa-wrench"></i> Riwayat Service</a></li>
                    <li><a href="<?php echo base_url().'proses_data/get_daftarMotor'?>"><i class="fa fa-info-circle"></i> Info Kendaraan Bermotor <br/>Dinas (KBD)</a></li>
                  </ul>
                </li>
                <li><a href="../../index2.html"><i class="fa fa-car"></i> Roda Empat<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'proses_data/daftarPermohonanServisRoda4'?>"><i class="fa fa-files-o"></i> Permohonan Service</a></li>
                    <li><a href="<?php echo base_url().'proses_data/riwayatServiceRoda4'?>"><i class="fa fa-wrench"></i> Riwayat Service</a></li>
                    <li><a href="<?php echo base_url().'proses_data/get_daftarMobil'?>"><i class="fa fa-info-circle"></i> Info Kendaraan Bermotor <br/>Dinas (KBD)</a></li>
                  </ul>
                </li>
              </ul>
            </li>

            <!--Kritik dan Saran-->
            <li class="treeview">
              <a href="<?php echo base_url().'proses_data/daftarKritikSaran'?>">
                <i class="fa fa-comments-o"></i> <span>Kritik dan Saran</span> <i class=""></i>
              </a>
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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active treeview">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $jumlah_atk;?></h3>
                  <p>ATK</p>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="<?php echo base_url().'proses_data/get_daftarPermintaanATK'?>" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3><?php echo ($jumlah_izin + $jumlah_cabut);?></h3>
                  <p>Permohonan Rumah Dinas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-home-outline"></i>
                </div>
                <a href="<?php echo base_url().'proses_data/daftarPermohonanRumahDinas'?>" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo ($jumlah_kbd2 + $jumlah_kbd4);?></h3>
                  <p>Permohonan Servis</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-gear-outline"></i>
                </div>
                <a href="<?php echo base_url().'proses_data/daftarPermohonanServisRoda2'?>" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green-gradient">
                <div class="inner">
                  <h3><?php echo $jumlah_kritik;?></h3>
                  <p>Kritik & Saran</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-chatbubble-outline"></i>
                </div>
                <a href="<?php echo base_url().'proses_data/daftarKritikSaran'?>" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="box box-solid bg-teal-gradient" style="height: 290px">
                <h1 style="text-align: center; padding-top: 80px; font-size: 50pt">ADMIN RUMAH TANGGA</h1>
              </div>
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <section class="col-lg-5 connectedSortable" style="padding-top: 20px;">
              <!-- Calendar -->
              <div class="box box-solid bg-green-gradient" >
                <div class="box-header">
                  <i class="fa fa-calendar"></i>
                  <h3 class="box-title">Calendar</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section> <!-- right col -->
          </div><!-- /.row (main row) -->
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
