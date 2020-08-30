<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="breadcrumb-wrapper">
   <div class="container">
      <h1 class="page-title">Beranda</h1>
      <div class="row">
         <div class="col-xs-12 col-sm-8">
            <ol class="breadcrumb">
               <li class="active">Beranda</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="equal-content-sidebar-wrapper">
   <div class="equal-content-sidebar-by-gridLex right-sidebar">
      <div class="container">
         <div class="GridLex-grid-noGutter-equalHeight">
            <div class="GridLex-col-9_sm-8_xs-12_xss-12">
               <div class="content-wrapper">
                  <div class="blog-wrapper">
                     <?php foreach ($desc as $row):?>
                     <div class="blog-item bg-light">
                        <div class="blog-content">
                           <h3><a href="<?php echo site_url();?>beranda/selanjutnya/<?php echo $row->ID_BERITA;?>" class="inverse"><?php echo $row->JUDUL_BERITA;?></a></h3>
                           <ul class="blog-meta">
                              <li>by <a href="#">Admin</a></li>
                              <li><?php echo date("d M Y", strtotime($row->TANGGAL_BERITA));?></li>
                           </ul>
                           <div class="blog-entry">  
                              <?php echo character_limiter($row->ISI_BERITA,200); ?>
                           </div>
                           <a href="<?php echo site_url();?>beranda/selanjutnya/<?php echo $row->ID_BERITA;?>" class="btn btn-primary btn-sm">Baca Lebih Banyak <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                     </div>
                     <?php endforeach;?>
                  </div>
                  <br>
                  <a href="#" class="btn btn-success btn-sm">Lihat Semua Pengumuman <i class="fa fa-long-arrow-right"></i></a>
               </div>
            </div>
            <div class="GridLex-col-3_sm-4_xs-12_xss-12">
               <aside class="sidebar-wrapper for-blog">
                  <div class="clear"></div>
                  <div class="sidebar-module clearfix">
                     <h6 class="sidebar-title">PENGUMUMAM TERBARU</h6>
                     <div class="sidebar-module-inner">
                        <ul class="sidebar-post">
                           <?php foreach ($data as $row):?>
                           <li class="clearfix">
                              <a href="<?php echo site_url();?>beranda/selanjutnya/<?php echo $row->ID_BERITA;?>">
                                 <div class="image">
                                    <img src="<?php echo base_url();?>assets/all-in/images/blog/b1.jpg" alt="Popular Post" />
                                 </div>
                                 <div class="content">
                                    <h6><?php echo $row->JUDUL_BERITA;?></h6>
                                    <p class="recent-post-sm-meta"><i class="fa fa-clock-o mr-5"></i><?php echo date("d M, Y", strtotime($row->TANGGAL_BERITA));?></p>
                                 </div>
                              </a>
                           </li>
                           <?php endforeach;?>
                        </ul>
                     </div>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </div>
</div>