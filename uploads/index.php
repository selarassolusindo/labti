<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
   include '../template/navbar.php';
?>

<div class="breadcrumb-wrapper">
   <div class="container">
      <h1 class="page-title"> Page not found</h1>
      <div class="row">
         <div class="col-xs-12 col-sm-8">
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url();?>">Beranda</a></li>
               <li class="active">  Page not found</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="error-page-wrapper">
   <div class="container">
      <div class="row">
         <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <div class="error-404 text-primary">
               404
            </div>
            <h3>Oops... Page Not Found!</h3>
            <a href="<?php echo base_url();?>" class="btn btn-primary mt-15">Back to home page</a>
         </div>
      </div>
   </div>
</div>
</div>
<!-- end Main Wrapper -->