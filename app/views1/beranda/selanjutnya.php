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
                     <div class="blog-item blog-single">
                        <div class="blog-content">
                           <?php foreach ($data2 as $row):?>
                           <h3><a href="blog-single.html" class="inverse"><?php $jdl =$row->JUDUL_BERITA; echo $row->JUDUL_BERITA;?></a></h3>
                           <ul class="blog-meta">
                              <li>by <a href="#">Admin</a></li>
                              <li><?php echo date("d M Y", strtotime($row->TANGGAL_BERITA));?></li>
                           </ul>
                           <div class="blog-entry">
                                 <?php echo $row->ISIHTML_BERITA;?>
                              
                           </div>
                           <?php endforeach;?>
                        </div>
                     </div>
                     <div class="blog-extra">
                        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-7 xs-mb">
            </div>
                           <div class="col-xs-12 col-sm-6 col-md-5 xs-mb">
                              <ul class="social-share-sm mt-5 pull-right pull-left-xs mt-20-xs">
                                 <li><span><i class="fa fa-share-square"></i> share</span></li>
                                 <li class="the-label"><a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo urlencode(current_url()); ?>&p[title]=<?php echo urlencode($jdl); ?>" target="_blank">Facebook</a></li>
                              </ul>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                  </div>
                  <!-- End Comment -->
                  <div class="clear mb-40"></div>
               </div>
            </div>
            <div class="GridLex-col-3_sm-4_xs-12_xss-12">
               <aside class="sidebar-wrapper for-blog">
                  <div class="clear"></div>
                  <div class="sidebar-module clearfix">
                     <h6 class="sidebar-title">PENGUMUMAM TERBARU</h6>
                     <div class="sidebar-module-inner">
                        <ul class="sidebar-post">
                           <?php foreach ($datalatest as $row):?>
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