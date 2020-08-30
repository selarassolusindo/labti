<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Daftar Praktikum</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Daftar Praktikum</a></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <?php if($this->session->flashdata('message_success')): ?>
              <script>
                  $(document).ready(function() {
                      setTimeout(function() {
                          new PNotify({
                              title: 'Berhasil!',
                              text: 'Pendaftaran Praktikum berhasil',
                              type: 'success'
                          });
                      }, 1300);
                  });
              </script>
            <?php endif; ?>

            <?php if($this->session->flashdata('message_success1')): ?>
              <script>
                  $(document).ready(function() {
                      setTimeout(function() {
                          new PNotify({
                              title: 'Berhasil!',
                              text: 'Data praktikum berhasil dihapus',
                              type: 'success'
                          });
                      }, 1300);
                  });
              </script>
            <?php endif; ?>

            <?php if($this->session->flashdata('message_danger')): ?>
              <script>
                  $(document).ready(function() {
                      setTimeout(function() {
                          new PNotify({
                              title: 'Gagal!',
                              //text: <?php //echo $this->session->flashdata('message_danger'); ?> ,
                              text: 'Tidak ada praktikum yang terpilih / praktikum sudah terdaftar',
                              type: 'error'
                          });
                      }, 1300);
                  });
              </script>
            <?php endif; ?>
            <div class="card-block">
                <!-- <h5 style="text-align: center;">PRAKTIKUM YANG SUDAH TERPILIH</h5> -->
                <!-- <button class="btn btn-grd-success btn-sm"><i class="ti-zip"> Formulir Pendaftaran Praktikum</i></button> -->
                <div class="dt-responsive table-responsive">
                    <table id="tbprak" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                         <tr style="text-align: center;">
                            <th>No</th>
                            <th>Kode</th>
                            <th style="text-align: center;">Praktikum</th>
                            <th>Pelaksanaan</th>
                            <th>Status</th>
                            <th>Validasi</th>
                            <th>Aksi</th>
                         </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; if($model): ?>
                         <?php foreach($model as $row): ?>
                         <tr>
                            <td style="text-align: center;"><?php echo $no++; ?></td>
                            <td><?php echo $row->KODE_PRAKTIKUM; ?></td>
                            <td><?php echo ucwords($row->NAMA_PRAKTIKUM); ?></td>
                            <td style="text-align: center;"><?php echo "".$row->THNPELAKSANAAN_PESERTA.", Periode ".$row->PERIODE_PESERTA; ?></td>
                            <td style="text-align: center;">
                                <?php echo ucwords($row->STATUS_PESERTA); ?>
                            </td>
                            <td style="text-align: center;">
                                <?php 
                                    if ($row->KETERANGAN_PESERTA == "mendaftar") {
                                       echo "<p class='text-danger'>Belum</p>";
                                    } else {
                                        echo "<p class='text-success'>Validasi</p>";
                                    }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ($row->KETERANGAN_PESERTA == "mendaftar"): ?>
                                  <a href="<?php echo site_url('daftar/delete/'.$row->ID_PESERTA);?>" class="btn hor-grd btn-grd-danger btn-mini" data-confirm="Yakin untuk menghapus praktikum <?php echo ucwords($row->NAMA_PRAKTIKUM); ?>"><i class="ti-brush-alt"> Hapus</i></a>
                                <?php else: ?>
                                  -
                                <?php endif; ?>
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

<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" >Formulir Pendaftaran Praktikum</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" action="<?php echo site_url('daftar/insert/')?>" method="post" enctype="multipart/form-data" role="form">
         <div class="modal-body">
                <?php foreach($users as $row): 
                  $nim = ucwords($row->NIM_TBUSER);
                  $kelas = ucwords($row->KELAS_TBUSER);
                ?>
                <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" value="<?php echo ucwords($row->NAMA_TBUSER); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" value="<?php echo $row->NIM_TBUSER; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">KELAS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" value="<?php echo $kelas; ?>" readonly>
                            <div class="col-form-label">Catatan : Pilihan kelas otomatis sama dengan profil yang anda simpan. <a href="<?php echo site_url('profil/')?>"> (ubah?)</a></div>
                        </div>
                    </div>
                    <?php                       
                      foreach($jadprak as $row1): 
                      $periode = $row1->PERIODE_JADWAL_PEMBUKAAN;                      
                      $tahun = $row1->TAHUN_JADWAL_PEMBUKAAN;
                    ?>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>

                <br>

                    <div class="dt-responsive table-responsive">
                        <table id="tbprak1" class="table table-striped table-bordered nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Pilih</th>
                                    <th style="text-align: center;">Kode</th>
                                    <th style="text-align: center;">Praktikum</th>
                                    <th style="text-align: center;">Biaya</th>
                                    <!-- <th style="text-align: center;">Akhir Pendaftaran</th> -->
                                    <th style="text-align: center;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; $no=1; if($openprak): ?>
                                <?php foreach($openprak as $row): ?>
                                <?php if ($row->AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM < date('Y-m-d') ): ?>

                                <?php 
                                  else: 
                                  $kode =$row->KODE_PRAKTIKUM;
                                ?>
                                      <tr>
                                          <?php                                            
                                            $query = $this->db->query("SELECT DISTINCT NIM_PESERTA, PRAK_PESERTA, PERIODE_PESERTA, THNPELAKSANAAN_PESERTA, NILAI_PESERTA FROM peserta WHERE NIM_PESERTA = '$nim' AND PRAK_PESERTA = '$kode'");
                                          ?>
                                          <?php 
                                              if ($query->num_rows() == 0): 
                                          ?>
                                            <td style="text-align: center;">
                                              <input  type = "checkbox" name = "kode[<?php echo $i;?>]" value = "<?php echo $row->KODE_PRAKTIKUM;?>" />
                                            </td>
                                          <?php else: ?>
                                          <?php                                            
                                            $i = 0;
                                            foreach ($query->result() as $qer): 
                                            if ($qer->NILAI_PESERTA == 'F'): 
                                          ?>
                                            <td style="text-align: center;">
                                              <input  type = "checkbox" name = "kode" value = "<?php echo $row->KODE_PRAKTIKUM;?>" disabled/>
                                            </td>
                                          <?php else: ?>
                                            <td style="text-align: center;">
                                              <input  type = "checkbox" name = "kode[<?php echo $i;?>]" value = "<?php echo $row->KODE_PRAKTIKUM;?>" />
                                            </td>
                                          <?php endif; ?>
                                          <?php endforeach; ?>
                                          <?php endif; ?>
                                          <td style="text-align: center;">
                                            <?php echo $row->KODE_PRAKTIKUM; ?>

                                              <input type="hidden" name="NIM_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $nim; ?>" readonly>
                                              <input type="hidden" name="KELAS_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $kelas; ?>" readonly>
                                              <input type="hidden" name="TGLDAFTAR_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                                              <input type="hidden" name="PERIODE_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $periode; ?>" readonly>
                                              <input type="hidden" name="TAHUN_PELAKSANAN_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $tahun; ?>" readonly> 
                                              <input type="hidden" name="STATUS_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php if ($query->num_rows() == 0){
                                                echo "baru";
                                              }elseif($query->num_rows() >=1){
                                                echo "ulang";                                                    
                                              } 
                                              ?>">

                                          </td>
                                          <td><?php echo ucwords($row->NAMA_PRAKTIKUM); ?></td>
                                          <td style="text-align: center;"><?php echo "Rp. ".$row->BIAYA_PRAKTIKUM; ?></td>
                                          <!-- <td style="text-align: center;"><?php echo date("d-m-Y", strtotime($row->AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM));
                                          ; ?></td> -->
                                            <?php 
                                              if ($query->num_rows() == 0): 
                                            ?>
                                              <td style="text-align: center;" >
                                                Baru
                                              </td>
                                            <?php else: ?>
                                              <?php
                                                foreach ($query->result() as $qer): 
                                                if ($qer->NILAI_PESERTA == 'F'): 
                                              ?>
                                                <td style="text-align: center;">Didaftar</td>
                                              <?php else: ?>
                                                <td style="text-align: center;">
                                                  Ulang
                                                </td>
                                              <?php endif; ?>
                                              <?php endforeach; ?>
                                            <?php endif; ?>
                                      </tr> 
                                <?php endif; ?>
                                <?php ++$i;  endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
         </div>
         <div class="modal-footer">            
            <button class="btn btn-primary waves-effect waves-light" type="submit"> Daftar</button>
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
         </div>        
         </form>
      </div>
   </div>
</div>

<script type="text/javascript" language="javascript"> 
  // $(function() {
  //     $(this).bind("contextmenu", function(e) {
  //         e.preventDefault();
  //     });
  // });

  // document.onkeydown = function(e) {
  //     if (e.ctrlKey &&
  //         (e.keyCode === 85)) {
  //         return false;
  //     }
  // };
</script>

<script>
   $(document).ready(function() {
        $('a[data-confirm]').click(function(ev) {
          var href = $(this).attr('href');
          if (!$('#dataConfirmModal').length) {
            $('body').append('<div class="modal inmodal" id="dataConfirmModal" tabindex="-1" role="dialog" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content animated flipInY"> <div class="modal-header"><h4 class="modal-title">Hapus Data Praktikum</h4><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div> <div class="modal-body" style="text-align: center"> </div> <div class="modal-footer"> <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i> Batal</button> <a class="btn btn-danger" id="dataConfirmOK"><i class="ti-brush-alt"></i> Hapus</a> </div> </div> </div> </div>');
          } 
          $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
          $('#dataConfirmOK').attr('href', href);
          $('#dataConfirmModal').modal({show:true});
          return false;
        });
        
       $('#tbprak').dataTable({
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Cari : KODE / NAMA PRAK..."
            },
            dom: 'Bfrtip',
            buttons: [
              {
                text: '<i class="ti-files"> Formulir Pendaftaran</i>',
                className: "btn hor-grd btn-grd-success md-effect-13",
                action: function ( e, dt, node, config ) {
                      $('#large-Modal').modal('show');
                }
              },
              {
                text: '<i class="ti-zip"> Cetak Formulir Pendaftaran</i>',
                className: "btn hor-grd btn-grd-info",
                action: function ( e, dt, node, config ) {
                      window.location='<?php echo site_url('daftar/cetak_formulir');?>';
                }
              },
           ],
           "columnDefs": [{
                   "targets": [0],
                   "width": 10,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [1],
                   "width": 40,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [2],
                   "width": 170,
                   // "orderable": false, 
               },
               {
                   "targets": [3],
                   "width": 60,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [4],
                   "width": 40,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [5],
                   "width": 40,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [6],
                   "width": 40,
                   "className": "text-center",
                   // "orderable": false, 
               },
           ],
           responsive: true
       });

       
   });       

   $(document).ready(function() {  
      $('#tbprak1').dataTable({        
           "lengthChange": false,
           "columnDefs": [{
                   "targets": [0],
                   "width": 15,
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
                   "width": 50,
                   // "orderable": false, 
               },
               {
                   "targets": [3],
                   "width": 110,
                   "className": "text-center",
                   // "orderable": false, 
               },
           ],
           responsive: true
       });
   });   
</script>