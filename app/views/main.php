
<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title Of Site -->
        <title>Sistem Informasi Praktikum Teknik Informatika</title>
        <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
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
        <link rel="icon" href="<?php echo base_url();?>logo.jpg" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/bootstrap/css/bootstrap.min.css">
         <!-- Toastr style -->
        <link href="<?php echo base_url();?>assets/all-in/css/toastr/toastr.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/pnotify/css/pnotify.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/pnotify/css/pnotify.brighttheme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/pnotify/css/pnotify.buttons.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/pnotify/css/pnotify.history.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/pnotify/css/pnotify.mobile.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/pages/pnotify/notify.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/icon/themify-icons/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/icon/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/datedropper/css/datedropper.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/spectrum/css/spectrum.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/jquery-minicolors/css/jquery.minicolors.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/ekko-lightbox/css/ekko-lightbox.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/lightbox2/css/lightbox.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/pages/data-table/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/chart.js/js/Chart.js"></script>

<!-- <script src="<?php echo base_url();?>assets/files/assets/pages/chart/chartjs/chartjs-custom.js"></script> -->
        <script src="<?php echo base_url();?>assets/files/bower_components/jquery/js/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>


        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/files/assets/css/jquery.mCustomScrollbar.css">
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
        <div class="theme-loader">
            <div class="loader-track">
                <div class="loader-bar"></div>
            </div>
        </div>
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <nav class="navbar header-navbar pcoded-header">
                    <div class="navbar-wrapper">
                        <div class="navbar-logo">
                            <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                            </a>
                            <div class="mobile-search">
                                <div class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                            <input type="text" class="form-control" placeholder="Enter Keyword">
                                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="index-2.html">
                            <img class="img-fluid" src="<?php echo base_url();?>assets/files/assets/images/Untitled-1.png" alt="Theme-Logo" />
                            </a>
                            <a class="mobile-options">
                            <i class="ti-more"></i>
                            </a>
                        </div>
                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                                </li>
                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-right">
                                <li class="user-profile header-notification">
                                    <a href="#!">
                                    <?php foreach($users as $row): ?>
                                    <?php if ($row->FOTO_TBUSER == ""): ?>
                                        <img src="<?php echo base_url();?>assets/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <?php else: ?>
                                            <img src="<?php echo base_url('uploads/picture/'.$row->FOTO_TBUSER);?>" class="img-radius" alt="User-Profile-Image">
                                    <?php endif ?>
                                    <?php endforeach; ?>

                                    <span><?php echo strtoupper(ucwords($this->session->userdata('username')));?></span>
                                    <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="<?php echo site_url('profil');?>">
                                            <i class="ti-user"></i> Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('ubah-password');?>">
                                            <i class="ti-lock"></i> Ganti Kata Sandi
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('user/logout');?>">
                                            <i class="ti-layout-sidebar-left"></i> Keluar
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        <nav class="pcoded-navbar">
                            <?php echo $navbar; ?>
                        </nav>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <?php echo $contents; ?>
                                            <div class="well">
                                                <ul class="breadcrumb-title p-t-10">
                                                    <div class="pull-right">
                                                      Halaman dimuat dalam <strong>{elapsed_time}</strong> detik.
                                                    </div>
                                                    <div>
                                                      <!-- <strong>Copyright</strong> SIM PRAKTIKUM - TEKNIK INFORMATIKA &copy; 2018, Design & Developed By:<a href="https://www.facebook.com/vienz.keren" target="blank"> IUC_Vienzz</a> -->
                                                      Created, designed & developed by <a href="#"><?php echo CDD ?></a> © 2018-<?php echo date('Y') ?>
                                                    </div>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url();?>assets/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/popper.js/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets/files/assets/js/SmoothScroll.js"></script>
        <script src="<?php echo base_url();?>assets/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>


        <script src="<?php echo base_url();?>assets/files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datedropper/js/datedropper.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/spectrum/js/spectrum.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/jscolor/js/jscolor.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <!-- Toastr -->
        <script src="<?php echo base_url();?>assets/all-in/js/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/assets/pages/data-table/js/data-table-custom.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.desktop.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.buttons.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.confirm.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.callbacks.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.animate.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.history.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.mobile.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/pnotify/js/pnotify.nonblock.js"></script>
        <script src="<?php echo base_url();?>assets/files/assets/pages/pnotify/notify.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/ekko-lightbox/js/ekko-lightbox.js"></script>
        <script src="<?php echo base_url();?>assets/files/bower_components/lightbox2/js/lightbox.js"></script>

        <script src="<?php echo base_url();?>assets/files/assets/pages/advance-elements/custom-picker.js"></script>

        <script src="<?php echo base_url();?>assets/files/assets/js/pcoded.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/assets/js/navbar-image/vertical-layout.min.js"></script>
        <script src="<?php echo base_url();?>assets/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script>
            //light box
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>
        <script src="<?php echo base_url();?>assets/files/assets/js/script.js"></script>
    </body>
</html>
