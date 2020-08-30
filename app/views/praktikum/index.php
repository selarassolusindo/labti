<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="breadcrumb-wrapper">
   <div class="container">
      <h1 class="page-title">Praktikum</h1>
      <div class="row">
         <div class="col-xs-12 col-sm-8">
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url();?>">Beranda</a></li>
               <li class="active">Praktikum</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="container pt-60 pb-70">
   <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
         <div class="section-title">
            <h2 class="text-center">PRAKTIKUM</h2>
            <p>Berikut praktikum yang wajib di tempuh selama perkuliahan.</p>
         </div>
      </div>
   </div>
   <div>
      <table id="example" class="table table-striped table-bordered example" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="text-align: center;" width="20">No</th>
                <th style="text-align: center;">Kode</th>
                <th style="text-align: center;">Jenis</th>
                <th style="text-align: center;">Semester</th>
            </tr>
        </thead>
        <tbody>
            <?php if($models): ?>
            <?php $no=1; foreach($models as $row): ?>
            <tr>
                <td align="center" width="20"><?php echo $no; ?></td>
                <td style="text-align: center;" width="70"><?php echo $row->KODE_PRAKTIKUM; ?></td>
                <td><?php echo $row->NAMA_PRAKTIKUM; ?></td>
                <td style="text-align: center;"><?php echo $row->SMST_PRAKTIKUM; ?></td>
            </tr>
            <?php $no++; endforeach; ?>
            <?php else: ?>
            <tr>
               <td colspan="6">Data not found</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
   </div>
</div>