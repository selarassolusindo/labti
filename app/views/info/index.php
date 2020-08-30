<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Kartu Hasil Praktikum</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Kartu Hasil Praktikum</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                         <tr>
                            <th style="text-align: center;">No</th>
                            <th>Kode</th>
                            <th style="text-align: center;" >Praktikum</th>
                            <th>Pelaksanaan</th>
                            <th>Kelas</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                         </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; if($models): ?>
                         <?php foreach($models as $row): ?>
                         <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo ucwords($row->KODE_PRAKTIKUM); ?></td>
                            <td><?php echo $row->NAMA_PRAKTIKUM; ?></td>
                            <td><?php echo "".$row->THNPELAKSANAAN_PESERTA.", Periode ".$row->PERIODE_PESERTA; ?></td>
                            <td><?php echo ucwords($row->KELAS_PESERTA); ?></td>
                            <td><?php echo $row->NILAI_PESERTA; ?></td>
                            <td><?php echo ucwords($row->STATUS_PESERTA); ?></td>
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

<script>
   $(document).ready(function() {
       $('#simpletable').dataTable({
          language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : KODE / NAMA PRAK..."
           },
           dom: 'Bfrtip',
           buttons: [
              {
                text: '<i class="ti-zip"> Cetak Transkrip</i>',
                className: "btn hor-grd btn-grd-primary",
                action: function ( e, dt, node, config ) {
                  <?php //foreach($users as $row): ?>
                  <?php //if ($row->KELAS_TBUSER == "" || $row->JENISKELAMIN_TBUSER == ""): ?>
                      //window.location='<?php //echo site_url('profil');?>';
                  <?php //else: ?>
                      // window.location = "http://www.youtube.com";
                      window.location='<?php echo site_url('info/cetak_transkrip');?>';
                      //window.open('<?php //echo site_url('info/cetak_transkrip');?>');
                  <?php //endif ?>                  
                  <?php //endforeach; ?>

                }
              },
           ],
           "columnDefs": [{
                   "targets": [0],
                   "width": 35,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [1],
                   "width": 50,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [2],
                   "width": 250,
                   // "orderable": false, 
               },
               {
                   "targets": [3],
                   "width": 110,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [4],
                   "width": 100,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [5],
                   "width": 100,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [6],
                   "width": 100,
                   "className": "text-center",
                   // "orderable": false, 
               },
           ],
           responsive: true
       });
   });        
</script>