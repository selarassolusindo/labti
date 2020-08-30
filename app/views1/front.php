<!doctype html>
<html lang="en">

<!-- Mirrored from crenoveative.com/envato/edutute/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2017 09:51:49 GMT -->
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
            echo "HTML Responsive Landing Page Template for Course Online Based on Twitter Bootstrap 3.x.x";
        endif;
            ?>" />
    <meta name="keywords" content="study, learn, course, tutor, tutorial, teach, college, school, institute, teacher, instructor" />
    <meta name="author" content="crenoveative">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/all-in/bootstrap/css/bootstrap.min.css" media="screen">   
    <link href="<?php echo base_url();?>assets/all-in/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/all-in/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/all-in/css/plugin.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link href="<?php echo base_url();?>assets/all-in/css/style.css" rel="stylesheet">
    
    <!-- For your own style -->
    <link href="<?php echo base_url();?>assets/all-in/css/your-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
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
                            <p class="copy-right">Create by <a href="https://www.facebook.com/InformatikaUbharaCommunity/">Informatika Ubhara Comunity</a> © 2018, Design & Developed By:<a href="#"> IUC_Vienzz</a></p>
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

</body>


<!-- Mirrored from crenoveative.com/envato/edutute/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2017 09:52:23 GMT -->
</html>