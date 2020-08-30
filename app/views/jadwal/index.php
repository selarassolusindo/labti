<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Jadwal</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Jadwal</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
               <div class="card-header" align="center">
                   <h4>JADWAL PELAKSANAAN PRAKTIKUM</h4>
               </div>
               <div class="card-block">
                  <div class="dt-responsive table-responsive">
                      <table id="simpletable" class="table table-striped table-bordered nowrap" width="100%">
                          <thead>
                             <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Kode</th>
                                <th style="text-align: center;">Praktikum</th>
                                <th style="text-align: center;">Dosen & Asisten</th>
                                <!-- <th>Asisten</th> -->
                                <th style="text-align: center;">Pelaksanaan</th>
                                <th style="text-align: center;">Kelompok</th>
                             </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; if($models): ?>
                            <?php foreach($models as $row): ?>
                            <tr>
                              <td align="center"><?php echo $no++; ?></td>
                              <td><?php echo ucwords($row->KODE_PRAKTIKUM); ?></td>
                              <td><?php echo $row->NAMA_PRAKTIKUM; ?></td>
                              <td>
                                <?php if($this->session->userdata('kelas') == "pagi"): ?>
                                  <p class="text-primary m-b-0">Dosen</p>
                                  <?php echo $row->DOSEN_PAGI_JADWAL_PRAKTIKUM; ?><br>
                                  <p class="text-primary m-b-0">Asisten</p>
                                  <?php echo $row->ASISTEN_PAGI_JADWAL_PRAKTIKUM; ?>
                                <?php else:?>
                                  <p class="text-primary m-b-0">Dosen</p>
                                  <?php echo $row->DOSEN_SORE_JADWAL_PRAKTIKUM; ?>
                                  <p class="text-primary m-b-0">Asisten</p>                                  
                                  <?php echo $row->ASISTEN_SORE_JADWAL_PRAKTIKUM; ?>
                                <?php endif; ?>
                              </td>
                              <!-- <td>
                                <?php //if($this->session->userdata('kelas') == "pagi"): ?>
                                  <?php //echo $row->ASISTEN_PAGI_JADWAL_PRAKTIKUM; ?>
                                <?php //else:?>
                                  <?php //echo $row->ASISTEN_SORE_JADWAL_PRAKTIKUM; ?>
                                <?php //endif; ?>
                              </td> -->
                              <td>
                                <?php if($this->session->userdata('kelas') == "pagi"): ?>
                                  <?php echo $row->PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM.",<br>".$row->PERIODE_JADWAL_PRAKTIKUM; ?>
                                <?php else:?>
                                  <?php echo $row->PELAKSANAAN_SORE_JADWAL_PRAKTIKUM.",<br>".$row->PERIODE_JADWAL_PRAKTIKUM; ?>
                                <?php endif; ?>
                              </td>
                              <td>
                                <a type="button" href="<?php echo $row->KELOMPOK_JADWAL_PRAKTIKUM; ?>" target="_blank" rel="noopener" class="btn btn-out btn-primary btn-square btn-mini">Lihat Kelompok</a>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <?php endif; ?>
                          </tbody>
                      </table>
                  </div>
               </div>
           </div>
    </div>
</div>

<script type="text/javascript" language="javascript"> 
  $(function() {
      $(this).bind("contextmenu", function(e) {
          e.preventDefault();
      });
  });

  document.onkeydown = function(e) {
      if (e.ctrlKey &&
          (e.keyCode === 85)) {
          return false;
      }
  };
</script>