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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
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
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-newspaper-o"></i>
                  <?php
                  foreach ($notif as $row) {
                    $read_stts_artikel = $row->read_stts_artikel;
                    $read_stts_foto    = $row->read_stts_foto;
                    $read_stts_video   = $row->read_stts_video;
                    break;
                  }
                  if ($read_stts_artikel > 0) {
                    ?>
                    <span class="label label-success"><?php echo $read_stts_artikel;?></span>
                    <?php
                  }


                  ?>
                </a>
                <ul class="dropdown-menu notif">
                  <?php
                  if ($read_stts_artikel > 0) {
                    ?>
                    <li class="header">Pemberitahuan Artikel <sup style="color: red;">Baru</sup></li>
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
                        <a href="<?php echo base_url().'proses_data/get_daftarArtikel';?>">
                          <div class="pull-left">
                            <i class="fa fa-newspaper-o"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_artikel?> Artikel yang Belum Dibaca
                          </h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-camera"></i>
                  <?php
                  if ($read_stts_foto > 0) {
                    ?>
                    <span class="label label-success"><?php echo $read_stts_foto;?></span>
                    <?php
                  }
                  ?>
                </a>
                <ul class="dropdown-menu notif">
                  <?php
                  if ($read_stts_foto > 0) {
                    ?>
                    <li class="header">Pemberitahuan Foto <sup style="color: red;">Baru</sup></li>
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
                        <a href="<?php echo base_url().'proses_data/get_daftarFoto';?>">
                          <div class="pull-left">
                            <i class="fa fa-camera"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_foto?> Foto Baru
                          </h4>
                          <p>Klik untuk menuju daftar</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-video-camera"></i>
                  <?php
                  if ($read_stts_video > 0) {
                    ?>
                    <span class="label label-success"><?php echo $read_stts_video;?></span>
                    <?php
                  }
                  ?>
                </a>
                <ul class="dropdown-menu notif">
                  <?php
                  if ($read_stts_video > 0) {
                    ?>
                    <li class="header"> Pemberitahuan Video <sup style="color: red;">Baru</sup></li>
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
                        <a href="<?php echo base_url().'proses_data/get_daftarVideo';?>">
                          <div class="pull-left">
                            <i class="fa fa-video-camera"></i>
                          </div>
                          <h4>
                            Ada <?php echo $read_stts_video?> Video yang Belum Dilihat
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
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--Artikel-->
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url().'proses_data/dashboardHumas'?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i> <span>Artikel</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'proses_data/get_daftarArtikel'?>"><i class="fa fa-list"></i> List Artikel</a></li>
              </ul>
            </li>
            
            <!--Foto-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-photo-o"></i> <span>Galeri</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'proses_data/get_daftarFoto'?>"><i class="fa fa-file-photo-o"></i> List Photo</a></li>
                <li><a href="<?php echo base_url().'proses_data/get_daftarVideo'?>"><i class="fa fa-file-video-o"></i> List Video</a></li>
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
            Admin Humas
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url().'adminhumas'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active treeview">Daftar Artikel</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Artikel</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Judul Artikel</th>
                        <th>Penulis</th>
                        <th>Bidang/Bagian</th>
                        <th>Tanggal Upload</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      foreach ($data as $row) {
                        ?>
                        <tr>
                          <?php
                          if ($row->read_status == "false") {
                            ?>
                            <td><?php echo $row->judul?><sup><span class="label label-success">Baru</span></sup></td>
                            <?php
                          } else {
                            ?>
                            <td><?php echo $row->judul?></td>
                            <?php
                          }
                          ?>
                          <td><?php echo $row->penulis;?></td>
                          <td><?php echo $row->bagian;?></td>
                          <td><?php echo $row->tanggal_up;?></td>

                          <?php
                          if ($row->status == "Approved") { 
                            ?>
                            <td><button class="btn success">Approved</button></td>
                            <?php
                          } else { 
                            ?>
                            <td><button class="btn default">Not Approved</button></td>
                            <?php
                          }
                          ?>
                          <td width="110">
                            <div class="btn-group">
                              <a href="<?php echo base_url().'proses_data/viewArtikel/'.$row->id_artikel?>" class="btn btn-default btn-sm btn-size"><i class="fa fa-eye"></i></a>
                              <a href="<?php echo base_url().'proses_data/deleteArtikel/'.$row->id_artikel?>" class="btn btn-default btn-sm btn-size"><i class="fa fa-trash-o"></i></a>
                              <?php 
                              if ($row->status == "Approved") {
                                ?>
                                <a href="<?php echo base_url().'proses_data/undoApprovalArtikel/'.$row->id_artikel?>" class="btn btn-default btn-sm btn-size"><i class="fa fa-thumbs-o-down"></i></a>
                                <?php
                              } else {
                                ?>
                                <a href="<?php echo base_url().'proses_data/approveArtikel/'.$row->id_artikel?>" class="btn btn-default btn-sm btn-size"><i class="fa fa-thumbs-o-up"></i></a>
                                <?php
                              }
                              ?>
                            </div>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>

                  </table>
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
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
  </html>
