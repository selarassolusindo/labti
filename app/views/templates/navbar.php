<!-- start Navbar (Header) -->
<div id="top-header">
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
         </div>
         <div class="col-sm-6">
            <div class="top-header-widget pull-right">
               <a href="<?php echo base_url('user');?>">
               <i class="ion-log-in mr-3"></i> Masuk
               </a>
            </div>
            <div class="top-header-widget pull-right">
               <a href="#">
               <i class="ion-person-add mr-3"></i> Daftar
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>">
         <img src="<?php echo base_url();?>assets/all-in/images/Untitled-3.png" style="width:300px;"/>
      </a>
   </div>
   <div id="navbar" class="collapse navbar-collapse navbar-arrow">
      <ul class="nav navbar-nav navbar-right" id="responsive-menu">
         <li class="<?php if($this->uri->uri_string() == 'beranda') { echo 'active'; } ?>"><a href="<?php echo base_url();?>">Beranda</a></li>
         <li class="<?php if($this->uri->uri_string() == 'praktikum') { echo 'active'; } ?>">
            <a href="<?php echo base_url('praktikum');?>">Praktikum</a>
         </li>
         </li>
      </ul>
   </div>
</div>
<div id="slicknav-mobile"></div>
<!-- end Navbar (Header) -->