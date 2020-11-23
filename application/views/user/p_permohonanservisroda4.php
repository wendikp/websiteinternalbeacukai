<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rumah Tangga</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()."assets/startbootstrap/"?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()."assets/startbootstrap/"?>css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()."assets/startbootstrap/"?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."assets/"?>bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css"/>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="<?php echo base_url().'c_user/home' ?>">Internal Website of Bea Cukai</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url().'c_user/humas'?>">Humas</a>
                    </li>
                    <li class="dropdown">
                        <a id="dropdownResources" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">ATK<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a class="dropdown-item" href="<?php echo base_url().'c_user/permintaanatk'?>">Permintaan Barang ATK</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a id="dropdownResources" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Rumah Dinas<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a class="dropdown-item" href="<?php echo base_url().'c_user/permohonanrumahdinas'?>">Permohonan Izin Penghunian</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url().'c_user/permohonancabutrumahdinas'?>">Permohonan Pencabutan Izin Penghunian</a></li>
                            <li><a class="dropdown-item" href="#"><b>Daftar Rumah Dinas</b></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url().'proses_data/get_rumahAraya'?>">Araya</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url().'proses_data/get_rumahPakisjajar'?>">Pakis Jajar</a></li>
                        </ul>
                    </li>

                    <!-- KBD -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Kendaraan Bermotor Dinas<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-left">                           
                            <li><a class="dropdown-item" href="#"><b>Kendaraan Roda 2</b></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url().'c_user/permohonanservisroda2'?>">Permohonan Servis Roda 2</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url().'proses_data/get_daftarMotor'?>">Informasi Roda 2</a></li>
                            <li class="divider"></li>
                            <li><a class="dropdown-item" href="#"><strong>Kendaraan Roda 4</strong></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url().'c_user/permohonanservisroda4'?>">Permohonan Servis Roda 4</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url().'proses_data/get_daftarMobil'?>">Informasi Roda 4</a></li>
                            
                        </ul>

                        <li>
                            <a href="<?php echo base_url()."c_user/kritiksaran" ?>">Saran</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()."logout" ?>">Logout</a>
                        </li>
                    </ul>
                </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <div class="intro-headerform">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align: center;">Permohonan Servis KBD Roda Empat</h1>
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.banner -->

    <!-- Page Content -->

    <a  name="about"></a>
    <div class="">
        <img src="<?php echo base_url().'assets/dist/img/grey background.jpg'?>" class="bg2">
        <div class="container ctn1">
            <div class="row"><?php echo $error;?></div>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                      <h3>Silahkan isi data dibawah ini:</h3>
                      <hr>
                      <!-- form start -->
                      <form action="<?php echo base_url().'proses_data/input_permohonan_service_kbd4'?>" method="POST" role="form">
                          <div class="form-group">
                              <label for="namalkp">Nomor Surat</label>
                              <input type="text" class="form-control" name="nosrt" placeholder="Nomor Surat" style="width: 230px;" required="required">
                          </div>
                          <div class="form-group">
                              <label for="namalkp">Tanggal Permohonan</label>
                              <input type="text" class="form-control tanggal" name="tglmohon" placeholder="Tanggal Permohonan" style="width: 230px;" required="required">
                          </div>
                          <div class="form-group">
                              <label for="platno">Plat nomor</label>
                              <input type="text" class="form-control" name="platno" placeholder="Plat Nomor" style="width: 230px;" required="required">
                          </div>
                          <div class="box-footer">
                            <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-default"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->

</div>
<!-- /.container -->

</div>
<!-- /.content-section-a -->


<div class="banner ctn2">

    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <h2>Connect with us:</h2>
            </div>
            <div class="col-lg-8">
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/kwbcjatim2" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/kanwilbcjatim2/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/kwbcjatim2/" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i> <span class="network-name">Instagram</span></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCaeX0BQEnIFxgTqHiQRkeYA" class="btn btn-default btn-lg"><i class="fa fa-youtube fa-fw"></i> <span class="network-name">Youtube</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.banner -->

<!-- Footer -->
<footer class="ctn2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <a href="#home">Back to Top <i class="fa fa-angle-double-up"></i></a>
            </div>
            <div class="col-lg-6">
                <p class="copyright text-muted small pull-right">Copyright &copy; DJBC Jatim II. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="<?php echo base_url()."assets/startbootstrap/"?>js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()."assets/startbootstrap/"?>js/bootstrap.min.js"></script>

<!-- jQuery 2.1.4 -->
<!-- <script src="<?php echo base_url()."assets"?>/plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
<!-- Bootstrap 3.3.5 -->
<!-- <script src="<?php echo base_url()."assets"?>/bootstrap/js/bootstrap.min.js"></script> -->
<!-- FastClick -->
<script src="<?php echo base_url()."assets"?>/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets"?>/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets"?>/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()."assets"?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()."assets"?>/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url()."assets"?>/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- dropdown hover extended -->
<script type="text/javascript">
 $('ul.nav li.dropdown').hover(function() {
     $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
 }, function() {
     $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
 });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('.tanggal').datepicker({
            format: "yyyy-mm-dd",
            autoclose:true,
            todayHighlight: true
        });
    });
</script>

</body>

</html>
