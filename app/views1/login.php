<!DOCTYPE html>
<html lang="en">
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Title Of Site -->
      <title>Sistem Informasi Praktikum Teknik Informatika</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>logo.jpg" />
      
      <link href="<?php echo base_url();?>assets/insp/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/insp/font-awesome/css/font-awesome.css" rel="stylesheet">
      
      <!-- Toastr style -->
      <link href="<?php echo base_url();?>assets/insp/toastr.css" rel="stylesheet" type="text/css" />
      <!-- Gritter -->
      <link href="<?php echo base_url();?>assets/insp/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

      <link href="<?php echo base_url();?>assets/insp/css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/insp/css/style.css" rel="stylesheet">
      <script src="<?php echo base_url();?>assets/insp/js/jquery-2.1.1.js"></script>

   </head>
   <body class="gray-bg">

      <div class="middle-box text-center loginscreen  animated bounceIn">
        <?php echo $contents; ?>
      </div>

      <!-- Mainly scripts -->
      <script src="<?php echo base_url();?>assets/insp/js/bootstrap.min.js"></script>
      <!-- Toastr -->
      <script src="<?php echo base_url();?>assets/insp/toastr.js"></script>
      <!-- GITTER -->
      <script src="<?php echo base_url();?>assets/insp/js/plugins/gritter/jquery.gritter.min.js"></script>
   </body>
</html>