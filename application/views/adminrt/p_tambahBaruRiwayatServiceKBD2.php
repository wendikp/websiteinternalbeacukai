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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()."assets"?> /plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets"?> /dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets"?> /dist/css/mycss.css">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url().'adminrt'?>" class="logo">
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
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-pencil"></i>
                  <?php

                  foreach ($notif as $row) {
                    $read_stts_izin       = $row->read_stts_izin;
                    $read_stts_cabut      = $row->read_stts_cabut;
                    $read_stts_kbd2       = $row->read_stts_kbd2;
                    $read_stts_kbd4       = $row->read_stts_kbd4;
                    $read_stts_inventaris = $row->read_stts_inventaris;
                    $read_stts_kritik     = $row->read_stts_kritik;
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

      <!-- Left side column. contains the sidebar -->
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
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--Artikel-->
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
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
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-automobile"></i> <span>KBD</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu menu-open" style="display: block;">
                <li class="active"><a href="../../index.html"><i class="fa fa-motorcycle"></i> Roda Dua<i class="fa fa-angle-left pull-right"></i></a>
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
            Kendaraan Bermotor Dinas (KBD) Roda Dua
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url().'adminrt'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url().'proses_data/riwayatServiceRoda2'?>"> Riwayat Servis</a></li>
            <li class="active">Tambah Baru</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Tambah Riwayat Servis KBD Roda Dua</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="<?php echo base_url().'proses_data/insert_tambahBaruRiwayatKBD2'?>" role="form" method="POST">
                    <div class="form-group">
                      <label for="nopol">Plat Nomor</label>
                      <input type="text" class="form-control" name="nopol" placeholder="Plat Nomor" style="width: 230px;" required="required" input list="list">
                      <datalist id="list">
                        <?php
                        foreach ($data as $row) {
                          ?>
                          <option><?php echo $row->nopol?></option>
                          <?php
                        }
                        ?>
                      </datalist>
                    </div>
                    <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input type="text" class="form-control" name="tgl" placeholder="YYYY-MM-DD" style="width: 230px;" required="required">
                    </div>
                    <div class="form-group">
                      <label for="description">Keterangan Servis KBD</label>
                      <textarea class="form-control " name="ket" rows="5" cols="80" style="width: 500px;"></textarea>
                    </div>
                    <div class="form-group">
                      <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        <!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2017 DJBC JATIM II.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
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
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets"?> /bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()."assets"?> /plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."assets"?> /plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url()."assets"?> /plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()."assets"?> /plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets"?> /dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."assets"?> /dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
  </html>
