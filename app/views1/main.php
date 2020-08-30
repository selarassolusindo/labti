<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Of Site -->
    <title>Sistem Informasi Praktikum Teknik Informatika</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>logo.jpg" />

    <link href="<?php echo base_url();?>assets/insp/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/insp/font-awesome/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>assets/insp/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/insp//js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/insp/jquery.autocomplete.js"></script>

    <!-- Data Tables -->
    <link href="<?php echo base_url();?>assets/insp/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/insp/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/insp/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url();?>assets/insp/toastr.css" rel="stylesheet" type="text/css" />
    <!-- Gritter -->
    <link href="<?php echo base_url();?>assets/insp/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    
    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href="<?php echo base_url();?>assets/insp/jquery.autocomplete.css" rel='stylesheet' />
    <!-- Morris -->
    <link href="<?php echo base_url();?>assets/insp/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url();?>assets/insp/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/insp/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/insp/css/style.css" rel="stylesheet">

    <script src="<?php echo base_url();?>assets/insp/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url('assets/insp/jquery-2.2.3.min.js')?>"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.js"></script>
</head>

<body>
  <div id="wrapper">
    
    <?php echo $navbar; ?>
    
    <?php echo $contents; ?>
    
    <div class="footer">
        <div class="pull-right">
          Halaman dimuat dalam <strong>{elapsed_time}</strong> detik.
        </div>
        <div>
          <strong>Copyright</strong> SIM PRAKTIKUM - TEKNIK INFORMATIKA &copy; 2018, Design & Developed By:<a href="#"> IUC_Vienzz</a>
        </div>
    </div>
    
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/insp/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>assets/insp/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url();?>assets/insp/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Toastr -->
      <script src="<?php echo base_url();?>assets/insp/toastr.js"></script>

    <!-- Data Tables -->
    <script src="<?php echo base_url();?>assets/insp/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url();?>assets/insp/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/insp/js/insppinia.js"></script>
    <script src="<?php echo base_url();?>assets/insp/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url();?>assets/insp/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Data picker -->
    <script src="<?php echo base_url();?>assets/insp/js/plugins/datapicker/bootstrap-datepicker.js"></script>

</body>
</html>