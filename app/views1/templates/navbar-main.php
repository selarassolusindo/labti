<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
   <div class="sidebar-collapse">
      <ul class="nav" id="side-menu">
         <li class="nav-header" style="text-align: center">
            <div class="dropdown profile-element">
               <span>
               <img alt="image" class="img-circle" 
               <?php if($this->session->userdata('level') == "admin"): ?>
               src="<?php echo base_url();?>assets/insp/img/admin.png"
               <?php elseif($this->session->userdata('level') == "user"): ?>
               src="<?php echo base_url();?>assets/insp/img/user.png"
               <?php else: ?>
               src="<?php echo base_url();?>assets/insp/img/user.png"
               <?php endif; ?> />
               </span>
               <a data-toggle="dropdown" class="dropdown-toggle" href="#">
               <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo strtoupper($this->session->userdata('name'));?></strong>
               </span> <span class="text-muted text-xs block">LEVEL - <?php echo strtoupper($this->session->userdata('level'));?> <b class="caret"></b></span> </span> </a>
               <ul class="dropdown-menu animated fadeInRight m-t-xs">
                  <li><a href="<?php echo site_url('user/logout');?>">Logout</a></li>
               </ul>
            </div>
            <div class="logo-element">
               LAB-TI
            </div>
         </li>
         <li class="<?php if($this->uri->uri_string() == 'beranda-main') { echo 'active'; } ?>">
            <a href="<?php echo site_url('beranda-main');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Beranda</span></a>
         </li>
         <li class="<?php if($this->uri->uri_string() == 'info') { echo 'active'; } ?>">
            <a href="<?php echo site_url('info');?>"><i class="fa fa-info-circle"></i> 
               <span class="nav-label">Info Praktikum</span>
            </a>
         </li>
         <li class="<?php if($this->uri->uri_string() == 'daftar') { echo 'active'; } ?>">
            <a href="<?php echo site_url('daftar');?>"><i class="fa fa-book"></i> 
               <span class="nav-label">Daftar Praktikum</span>
            </a>
         </li>
         <li class="<?php if($this->uri->uri_string() == 'jadwal') { echo 'active'; } ?>">
            <a href="<?php echo site_url('jadwal');?>"><i class="fa fa-calendar"></i> 
               <span class="nav-label">Jadwal Praktikum</span>
            </a>
         </li>
         <li class="<?php if($this->uri->uri_string() == 'profil') { echo 'active'; } ?>">
            <a href="<?php echo site_url('profil');?>"><i class="fa fa-gears"></i> 
               <span class="nav-label">Profil</span>
            </a>
         </li>
         <li>
            <a href="<?php echo site_url('user/logout');?>"><i class="fa fa-sign-out"></i> 
               <span class="nav-label">Log-Out</span>
            </a>
         </li>
         <br>
         <li class="<?php if($this->uri->uri_string() == 'peserta') { echo 'active'; } ?>">
            <a href="<?php echo site_url('peserta');?>"><i class="fa fa-users"></i> 
               <span class="nav-label">Data Peserta</span>
               <span class="label label-info pull-right">Master</span>
            </a>
         </li>
      </ul>
   </div>
</nav>
<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
   <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
         <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
      </div>
      <ul class="nav navbar-top-links navbar-right">
         <li>
            <span class="m-r-sm text-muted welcome-message">Selamat Datang, <?php echo strtoupper(ucwords($this->session->userdata('username')));?>.</span>
         </li>  
         <li>
            <a href="<?php echo site_url('user/logout');?>">
            <i class="fa fa-sign-out"></i>Log out
            </a>
         </li>
      </ul>
   </nav>
</div>