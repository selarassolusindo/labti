<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title Of Site -->
    <title> <?php
        if(!empty($data2)):
        foreach ($data2 as $row):
            echo $row->JUDUL_BERITA . " - ";
        endforeach;
        endif;
            ?>Sistem Informasi Praktikum Teknik Informatika</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>logo.jpg" />
    <meta name="description" content="<?php
        if(!empty($data2)):
        foreach ($data2 as $row):
            echo html_escape($row->ISIHTML_BERITA) . " - ";
        endforeach;
        else:
            echo "Sistem Informasi Praktikum Teknik Informatika Universitas Bhayangkara Surabaya";
        endif;
            ?>" />
    <meta name="author" content="<?php echo CDD ?>"><!-- <meta name="author" content="IUC_Vienzz"> -->
    <meta name="google-site-verification" content="7vyKjCb2f5IWyxGU4zQnFbLhlomwul3i8rUTDlabA-A" />
    <meta name="keywords" content="si, sim, praktikum, sim praktikum, teknik informatika, sim praktikum teknik informatika ubhara, universitas bhayangkara, labti, ubhara, labti ubhara" />
    <meta name="robot" content="index follow">
    <meta name="DC.title" content="Sistem Informasi Praktikum Teknik Informatika Universitas Bhayangkara Surabaya"/>
    <meta name="DC.identifier" content="labti.ft.ubhara.ac.id"/>
    <meta name="DC.description" content="SIM pendaftaran praktikum teknik informatika universitas bhayangkara surabaya"/>
    <meta name="DC.subject" content="si, sim, praktikum, sim praktikum, teknik informatika, sim praktikum teknik informatika ubhara, universitas bhayangkara, labti, ubhara, labti ubhara"/>
    <meta name="DC.language" scheme="ISO639-1" content="en"/>
    <meta name="DC.creator" content="<?php echo CDD ?>"/><!-- <meta name="DC.creator" content="IUC_Vienzz"/> -->
    <meta name="DC.publisher" content="<?php echo CDD ?>"/><!-- <meta name="DC.publisher" content="IUC_Vienzz"/> -->
    <meta name="DC.license" content="<?php echo CDD ?>"/><!-- <meta name="DC.license" content="IUC_Vienzz"/> -->
    <meta name="DCTERMS.created" scheme="ISO8601" content="2014-06-24"/>
    <meta content='id' name='language'/>
    <meta content='id' name='geo.country'/>
    <meta content='Indonesia' name='geo.placename'/>
    <!-- CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/all-in/bootstrap/css/bootstrap.min.css" media="screen">
    <link href="<?php echo base_url();?>assets/all-in/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/all-in/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/all-in/css/plugin.css" rel="stylesheet">
    <!-- CSS Custom -->
    <link href="<?php echo base_url();?>assets/all-in/css/style.css" rel="stylesheet">
    <!-- For your own style -->
    <link href="<?php echo base_url();?>assets/all-in/css/your-style.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127111566-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-127111566-1');
    </script>


</head>

<body>

    <!-- start Container Wrapper -->
    <div class="container-wrapper">

        <!-- start Header -->
        <header id="header">

            <!-- start Navbar (Header) -->
            <nav class="navbar navbar-primary navbar-fixed-top navbar-sticky-function">
                <?php echo $navbar; ?>
            </nav>
            <!-- end Navbar (Header) -->

        </header>
        <!-- end Header -->

        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">
            <?php echo $contents; ?>
        </div>
        <!-- end Main Wrapper -->

        <!-- start Footer Wrapper -->
        <div class="footer-wrapper scrollspy-footer">

            <footer class="secondary-footer">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-6">
                            <!-- <p class="copy-right">Create by <a href="https://www.facebook.com/InformatikaUbharaCommunity/">Informatika Ubhara Comunity</a> © 2018, Design & Developed By:<a href="#"> IUC_Vienzz</a></p> -->
                            <p class="copy-right">Created, designed & developed by <a href="#"><?php echo CDD ?></a> © 2018-<?php echo date('Y') ?></p>
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <ul class="secondary-footer-menu clearfix">
                                <li><a href="#">Daftar</a></li>
                                <li><a href="<?php echo base_url('user');?>">Masuk</a></li>
                            </ul>
                        </div>

                    </div>

                </div>

            </footer>

        </div>
        <!-- end Footer Wrapper -->

    </div>
    <!-- end Container Wrapper -->


<!-- start Back To Top -->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->

<div id="ajaxLoginModal" class="modal fade login-box-wrapper" data-width="500" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;"></div>

<div id="ajaxRegisterModal" class="modal fade login-box-wrapper" data-width="500" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;">
</div>

<div id="ajaxForgotPasswordModal" class="modal fade login-box-wrapper" data-width="500" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;"></div>


<!-- JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery-migrate-1.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/spin.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/typed.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/placeholderTypewriter.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/select2.full.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/readmore.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/bootstrap-rating.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/creditly.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/all-in/js/customs.js"></script>
<!-- END JS -->

</body>

</html>
