<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()."assets/startbootstrap/"?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()."assets/startbootstrap/"?>css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()."assets/startbootstrap/"?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            .navatas{
                color: black;
            }
            .message1{
                text-shadow: 3px 3px 100px;
            }
        </style>

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
                    <a class="navbar-brand topnav" href="#">Internal Website of Bea Cukai Jatim II</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url().'c_user/humas'?>">Humas</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'c_user/rumahtangga'?>">Rumah Tangga</a>
                        </li>
                        <li>
                            <a href="#about">About Us</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
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


        <!-- Header -->
        <a name="home"></a>
        <div class="intro-header">
            <div class="container text1">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-message">
                            <h1>Welcome</h1>
                            <h3>to Internal Website of Bea Cukai</h3>
                            <hr class="intro-divider">
                            <ul class="list-inline intro-social-buttons">
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

            </div>
            <!-- /.container -->

        </div>
        <!-- /.intro-header -->

        <!-- Page Content -->

        <a  name="about"></a>
        <div class="content-section-a">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="clearfix"></div>
                        <h2 class="section-heading">About Us</h2>
                        <hr width="11%" align="left">
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris purus, aliquet eget lacus quis, feugiat congue ante. Donec vulputate erat ac mauris accumsan placerat. Proin porttitor non tellus non bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi pulvinar tempus egestas. Nulla porta a diam in lobortis. Donec imperdiet viverra gravida. Duis felis nulla, vestibulum eu ligula a, semper convallis neque. Duis vehicula, tellus a convallis finibus, nunc augue vehicula neque, eu viverra quam est vel neque. In vulputate venenatis ex, sit amet cursus enim ultrices dictum. Praesent rutrum dolor vitae velit convallis, ut egestas diam suscipit. Integer malesuada lobortis scelerisque. Donec convallis dolor ac nisi facilisis, quis laoreet velit commodo.</p>
                    </div>
                <!-- <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url()."assets/startbootstrap/"?>img/ipad.png" alt="">
                </div> -->
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <!-- <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">3D Device Mockups<br>by PSDCovers</h2>
                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url()."assets/startbootstrap/"?>img/dog.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

        <!-- </div> -->
        <!-- /.content-section-b -->

        <a  name="contact"></a>
        <div class="content-section-b">

            <div class="container">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="clearfix"></div>
                        <h2 class="section-heading">Contact </h2>
                        <hr width="10%" align="left">
                        <p class="lead">Email : <br/> 
                            Telepon : </p>
                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
            <!-- /.content-section-a-->

            <div class="banner">

                <div class="container">

                    <div class="row">
                        <div class="col-lg-6">
                            <h2>Connect with us on:</h2>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-inline banner-social-buttons">
                                <li>
                                    <a href="https://twitter.com/kwbcjatim2" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/kanwilbcjatim2/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/kwbcjatim2/" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCaeX0BQEnIFxgTqHiQRkeYA" class="btn btn-default btn-lg"><i class="fa fa-youtube fa-fw"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
            <!-- /.banner -->

            <!-- Footer -->
            <footer>
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

            <!-- dropdown hover extended -->
            <script type="text/javascript">
             $('ul.nav li.dropdown').hover(function() {
                 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
             }, function() {
                 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
             });
         </script>

     </body>

     </html>
