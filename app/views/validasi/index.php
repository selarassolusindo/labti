<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Validasi</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Validasi</a></li>
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
                              text: 'Pendaftaran Praktikum berhasil divalidasi',
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
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Jumlah</th>
                                <th>Validasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; if($peserta): ?>
                            <?php
                              if(is_array($peserta)):
                                foreach($peserta as $row):
                            ?>
                            <tr>
                              <td align="center"><?php echo $no++; ?></td>
                              <td style="text-align: center;"><?php echo $row->NIM_PESERTA; ?></td>
                              <td ><?= strtoupper($row->NAMA_TBUSER); ?></td>
                              <td style="text-align: center;"><?php echo "Rp. ".number_format($row->BIAYA_PRAKTIKUM,0,',','.'); ?></td>
                              <td style="text-align: center;">
                                <?php
                                if ($row->KETERANGAN_PESERTA === 'mendaftar') {
                                  echo '<p class="text-danger">Belum</p>';
                                }else{
                                  echo '<p class="text-success">Sudah</p>';
                                }
                                ?>

                                </td>
                              <td style="text-align: center;">
                                <div class="dropdown-default dropdown open">
                                  <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#modal-edit<?=$row->ID_PESERTA;?>"><i class="ti-pencil-alt"></i>Ubah</a>
                                    <!-- <a class="dropdown-item waves-light waves-effect" href="javascript:void(0)" onclick="delete_person('."'".$row->ID_PESERTA."'".')"><i class="ti-brush-alt"> Hapus</i></a> -->
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php
                                endforeach;
                              endif; ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $no=0; if(is_array($peserta)): foreach($peserta as $row): $no++; $nim = $row->NIM_PESERTA; ?>

<div class="modal fade" id="modal-edit<?=$row->ID_PESERTA;?>" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" >Validasi Pendaftaran Praktikum</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" id="form" action="<?php echo site_url('validasi/validasimhs/')?>" method="post" enctype="multipart/form-data" role="form">
         <div class="modal-body">
            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIM<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="ID_TBUSER"/>
                                <input type="text" class="form-control form-control-sm" name="nim" value="<?php echo $row->NIM_PESERTA?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NAMA<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="NAMA" name="NAMA_TBUSER" value="<?php echo strtoupper($row->NAMA_TBUSER)?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">KELAS<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="ID_TBUSER"/>
                                <input type="text" class="form-control form-control-sm" id="KELAS_PESERTA" name="KELAS_PESERTA" value="<?php echo $row->KELAS_TBUSER?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PERIODE<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="PERIODE_PESERTA" name="PERIODE_PESERTA" value="<?php echo "Periode ".$row->PERIODE_PESERTA. ", Tahun " . $row->THNPELAKSANAAN_PESERTA?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="dt-responsive table-responsive">
                <table id="tbprak" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Kode</th>
                            <th style="text-align: center;">Praktikum</th>
                            <th style="text-align: center;">Semester</th>
                            <th style="text-align: center;">Biaya</th>
                            <th style="text-align: center;">Validasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getpriode = $this->validasi_model->getJadwalPembukaan();
                        foreach ($getpriode as $row){
                          $perio = $row->PERIODE_JADWAL_PEMBUKAAN;
                          $th = $row->TAHUN_JADWAL_PEMBUKAAN;
                          $query = $this->db->query("SELECT praktikum.KODE_PRAKTIKUM AS KODE, praktikum.NAMA_PRAKTIKUM AS NAMA, praktikum.SMST_PRAKTIKUM AS SMS, praktikum.BIAYA_PRAKTIKUM AS BIAYA, peserta.KETERANGAN_PESERTA AS `KETERANGAN`, peserta.THNPELAKSANAAN_PESERTA AS THN, peserta.PERIODE_PESERTA AS PERIODE, peserta.NIM_PESERTA, peserta.KELAS_PESERTA FROM peserta LEFT JOIN praktikum ON peserta.PRAK_PESERTA = praktikum.KODE_PRAKTIKUM WHERE peserta.NIM_PESERTA = '$nim' AND peserta.PERIODE_PESERTA = '$perio' AND peserta.THNPELAKSANAAN_PESERTA = '$th'");
                          }

                          $no=1; $i = 0;if($query):
                          foreach ($query->result() as $qer):
                        ?>
                        <tr >
                            <td style="text-align: center;"><?php echo $no++; ?></td>
                            <td style="text-align: center;"><?php echo $qer->KODE; ?></td>
                            <td><?php echo $qer->NAMA; ?></td>
                            <td style="text-align: center;"><?php echo $qer->SMS; ?></td>
                            <td style="text-align: center;"><?php echo "Rp. ".number_format($qer->BIAYA,0,',','.'); ?></td>
                            <td style="text-align: center;">
                              <?php
                              if ($qer->KETERANGAN === 'mendaftar') {
                                echo '<p class="text-danger">Belum</p>';
                              }else{
                                echo '<p class="text-success">Sudah</p>';
                              }
                              ?>

                            </td>
                            <!-- <td> -->
                              <?php //if ($qer->KETERANGAN == 'mendaftar'): ?>
                                <!-- <input  type = "checkbox" name = "kode[<?php echo $i;?>]" value = "<?php echo $qer->KETERANGAN;?>" />
                                <input type="hidden" name="NIM_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $qer->NIM_PESERTA;?>" readonly>
                                <input type="hidden" name="PRAK_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $qer->KODE;?>" readonly>
                                <input type="hidden" name="PERIODE_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $qer->PERIODE;?>" readonly>
                                <input type="hidden" name="THNPELAKSANAAN_PESERTA[<?php echo $i;?>]" class="form-control" value="<?php echo $qer->THN;?>" readonly> -->
                              <?php //else: ?>
                                <input  type = "checkbox" style="display:none" name = "kode[]" value = "<?php echo $qer->KODE;?>" checked/>
                                <input type="hidden" name="NIM_PESERTA[]" class="form-control" value="<?php echo $qer->NIM_PESERTA;?>" readonly>
                                <!-- <input type="hidden" name="PRAK_PESERTA[]" class="form-control" value="<?php echo $qer->KODE;?>" readonly> -->
                                <input type="hidden" name="PERIODE_PESERTA[]" class="form-control" value="<?php echo $qer->PERIODE;?>" readonly>
                                <input type="hidden" name="THNPELAKSANAAN_PESERTA[]" class="form-control" value="<?php echo $qer->THN;?>" readonly>
                              <?php //endif; ?>
                            <!-- </td> -->
                        </tr>
                        <?php ++$i; endforeach; ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
          </div>
         <div class="modal-footer">
            <?php
            if ($qer->KETERANGAN === 'mendaftar') {
              echo
              '<button class="btn btn-grd-info btn-custom subm" type="submit" ><i class="ti-write"></i>Validasi</button>
               <button type="button" class="btn btn-grd-danger btn-custom" data-dismiss="modal">&nbsp;&nbsp;<i class="ti-na"></i>Batal&nbsp;&nbsp;</button>';
            }else{
              echo '';
            }
            ?>

         </div>
         </form>
      </div>
   </div>
</div>
<?php endforeach; endif; ?>

<script type="text/javascript">
  var table;
   $(document).ready(function() {
       table = $('#simpletable').DataTable({
           "order": [],
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : NIM / NAMA...",
               infoFiltered: ""
           },
           "columnDefs": [
           {
               "targets": [ 0 ],
               "width": 25,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 1 ],
               "width": 40,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 3 ],
                "width": 70,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 4 ],
                "width": 50,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 5 ],
                "width": 40,
               "className": "text-center",
               // "orderable": false,
           },
           ],
           responsive: true
       });
   });
</script>
