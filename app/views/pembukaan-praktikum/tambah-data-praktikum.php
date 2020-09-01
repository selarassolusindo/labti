<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   echo $this->session->flashdata('message_danger');
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Detail Praktikum Tahun <?php echo $viewperiod->TAHUN_JADWAL_PEMBUKAAN;?>, Periode <?php echo $viewperiod->PERIODE_JADWAL_PEMBUKAAN;?></h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('pembukaan-praktikum');?>">Pembukaan Praktikum</a></li>
            <li class="breadcrumb-item">Detail Praktikum Tahun <?php echo $viewperiod->TAHUN_JADWAL_PEMBUKAAN;?>, Periode <?php echo $viewperiod->PERIODE_JADWAL_PEMBUKAAN;?></a></li>
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
                    text: 'Tambah Data pembukaan praktikum berhasil',
                    type: 'success'
                });
            }, 1300);
        });
      </script>
      <?php endif; ?>
      <?php if($this->session->flashdata('message_success2')): ?>
      <script>
        $(document).ready(function() {
            setTimeout(function() {
                new PNotify({
                    title: 'Berhasil!',
                    text: 'Data pembukaan praktikum berhasil diubah',
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
                    text: 'Data pembukaan praktikum berhasil dihapus',
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
                    text: 'Penambahan pembukaan praktikum gagal, Tidak ada praktikum yang terpilih',
                    type: 'error'
                });
            }, 1300);
        });
      </script>
      <?php endif; ?>
      <div class="card-block">
        <?php if($viewperiod): ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun</label>
              <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" id="TAHUN_JADWAL_PEMBUKAAN" name="TAHUN_JADWAL_PEMBUKAAN" value="<?php echo $viewperiod->TAHUN_JADWAL_PEMBUKAAN;?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Periode</label>
              <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" id="PERIODE_JADWAL_PEMBUKAAN" name="PERIODE_JADWAL_PEMBUKAAN" value="<?php echo $viewperiod->PERIODE_JADWAL_PEMBUKAAN;?>" readonly>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun Ajaran</label>
              <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" id="TAHUN_AJARAN_JADWAL_PEMBUKAAN" name="TAHUN_AJARAN_JADWAL_PEMBUKAAN" value="<?php echo $viewperiod->TAHUN_AJARAN_JADWAL_PEMBUKAAN;?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Semester</label>
              <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" id="SEMESTER_JADWAL_PEMBUKAAN" name="SEMESTER_JADWAL_PEMBUKAAN" value="<?php echo $viewperiod->SEMESTER_JADWAL_PEMBUKAAN;?>" readonly>
              </div>
            </div>
          </div>
        </div>
        <?php else: ?>
        <?php endif; ?>
        <br>
        <div class="dt-responsive table-responsive">
          <table id="simpletable" class="table table-striped table-bordered nowrap" width="100%">
            <thead>
              <tr>
                <th style="text-align: center;">No</th>
                <th>Kode</th>
                <th>Nama Praktikum</th>
                <th>Awal Pendaftaran</th>
                <th>Akhir Pendaftaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; if($viewprakperiod): ?>
              <?php foreach($viewprakperiod as $row): ?>
              <tr>
                <td align="center">
                  <?php echo $no++; ?>
                </td>
                <td class="text-center">
                  <?php echo $row->KODE_PRAKTIKUM; ?>
                </td>
                <td>
                  <?php echo $row->NAMA_PRAKTIKUM; ?>
                </td>
                <td class="text-center">
                  <?php echo date("d-m-Y", strtotime($row->AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM)); ?>
                </td>
                <td class="text-center">
                  <?php echo date("d-m-Y", strtotime($row->AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM)); ?>
                </td>
                <td class="text-center">
                  <div class="dropdown-default dropdown open">
                    <button class="btn btn-default dropdown-toggle waves-effect waves-light btn-mini" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-view-list-alt"></i></button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                      <a class="dropdown-item waves-light waves-effect" href="" data-toggle="modal" data-target="#ModaleditD<?php echo $row->ID_JADWAL_PEMBUKAAN_PRAKTIKUM;?>"><i class="ti-pencil-alt"></i> Ubah</a>
                      <a class="dropdown-item waves-light waves-effect" href="<?php echo site_url('pembukaan_praktikum/hapus/'.$row->ID_JADWAL_PEMBUKAAN_PRAKTIKUM);?>" data-confirm="Yakin untuk menghapus praktikum <?php echo ucwords($row->NAMA_PRAKTIKUM); ?>"><i class="ti-brush-alt"></i>Hapus</a>
                    </div>
                  </div>
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

<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Tambah Data Pembukaan Praktikum</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('pembukaan_praktikum/insert_praktikum/')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="p-10 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top">
            <?php $i = 0; if($viewperiod): ?>
            <?php else: ?>
            <?php endif; ?>
            <div class="row">
              <div class="col-sm-10">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Awal Pendaftaran<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Akhir Pendaftaran<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM" required>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group row">
                  <div class="col">
                    <!-- <button class="btn btn-grd-info btn-custom" type="submit"><i class="ti-plus"> Tambah</i></button>  -->
                    <button class="btn btn-grd-info btn-custom" type="submit"><i class="ti-plus"></i>Tambah</button>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col">
                    <button type="button" class="btn btn-grd-danger btn-custom" data-dismiss="modal"><i class="ti-na"></i>Batal</button>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="dt-responsive table-responsive">
              <table id="simpletable1" class="table table-striped table-bordered nowrap" width="100%">
                <thead>
                  <tr >
                    <th style="text-align: center;">Pilih
                    <input type="hidden" class="form-control form-control-sm" id="NO_JADWAL_PEMBUKAAN_GET" name="NO_JADWAL_PEMBUKAAN_GET" value="<?php echo $viewperiod->NO_JADWAL_PEMBUKAAN;?>" /></th>
                    <th style="text-align: center;">Kode</th>
                    <th style="text-align: center;">Nama Praktikum</th>
                    <th style="text-align: center;">Semester</th>
                    <th style="text-align: center;">Biaya</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($praktikum): ?>
                  <?php foreach($praktikum as $row): ?>
                  <tr>
                    <td style="text-align: center;">
                      <input  type="checkbox" name="ID_PRAKTIKUM[<?php echo $i;?>]" value="<?php echo $row->ID_PRAKTIKUM;?>"  class="chk"/>
                      <input type="hidden" class="form-control form-control-sm" id="NO_JADWAL_PEMBUKAAN" name="NO_JADWAL_PEMBUKAAN[<?php echo $i;?>]" value="<?php echo $viewperiod->NO_JADWAL_PEMBUKAAN;?>" readonly>
                      <input type="hidden" class="form-control form-control-sm" id="TAHUN_JADWAL_PEMBUKAAN" name="TAHUN_JADWAL_PEMBUKAAN[<?php echo $i;?>]" value="<?php echo $viewperiod->TAHUN_JADWAL_PEMBUKAAN;?>" readonly>
                      <input type="hidden" class="form-control form-control-sm" id="PERIODE_JADWAL_PEMBUKAAN" name="PERIODE_JADWAL_PEMBUKAAN[<?php echo $i;?>]" value="<?php echo $viewperiod->PERIODE_JADWAL_PEMBUKAAN;?>" readonly>
                    </td>
                    <td class="text-center"><?php echo $row->KODE_PRAKTIKUM; ?></td>
                    <td><?php echo $row->NAMA_PRAKTIKUM; ?></td>
                    <td class="text-center"><?php echo $row->SMST_PRAKTIKUM; ?> </td>
                    <td class="text-center"><?php echo "Rp. ".number_format($row->BIAYA_PRAKTIKUM,0,',','.'); ?></td>
                  </tr>
                  <?php $i++; endforeach; ?>
                  <?php else: ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button class="btn btn-primary waves-effect waves-light" type="submit">Tambah</button>
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        </div> -->
      </form>
    </div>
  </div>
</div>

<!-- Begin Modal Update-->
<?php foreach($viewprakperiod as $row): ?>
<div class="modal fade" id="ModaleditD<?php echo $row->ID_JADWAL_PEMBUKAAN_PRAKTIKUM; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Ubah Pelaksanaan Pembukaan Praktikum</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('pembukaan_praktikum/ubah/'.$row->ID_JADWAL_PEMBUKAAN_PRAKTIKUM);?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="p-10 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top">
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Kode Praktikum</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $row->KODE_PRAKTIKUM;?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Praktikum</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $row->NAMA_PRAKTIKUM;?>"readonly>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Semester</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->SMST_PRAKTIKUM;?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Biaya</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->BIAYA_PRAKTIKUM;?>" readonly>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Awal Pendaftaran<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM" value="<?php echo $row->AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM;?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Akhir Pendaftaran<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM" value="<?php echo $row->AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM;?>" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button class="btn btn-grd-info btn-custom" type="submit"><i class="ti-plus"> Ubah</i></button> -->
          <button class="btn btn-grd-info btn-custom" type="submit"><i class="ti-plus"></i>Ubah</button>
          <button type="button" class="btn btn-grd-danger btn-custom" data-dismiss="modal">&nbsp;&nbsp;<i class="ti-na"></i>Batal&nbsp;&nbsp;</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Update-->
<?php endforeach;  ?>

<style>
.modal-lg {
    max-width: 68% !important;
}

.btn-custom {
    border-radius: 1px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 9px 18px;
    cursor: pointer;
}
</style>

<script type="text/javascript">

  $(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        if (!$('#dataConfirmModal').length) {
            $('body').append('<div class="modal inmodal" id="dataConfirmModal" tabindex="-1" role="dialog" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content animated flipInY"> <div class="modal-header"><h4 class="modal-title">Hapus Data Praktikum</h4><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div> <div class="modal-body" style="text-align: center"> </div> <div class="modal-footer"> <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i> Batal</button> <a class="btn btn-danger" id="dataConfirmOK"><i class="ti-brush-alt"></i> Hapus</a> </div> </div> </div> </div>');
        }
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({
            show: true
        });
        return false;
    });
  });
</script>

<script type="text/javascript">
   $(document).ready(function() {
       //datatables
       $('#simpletable').DataTable({
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : KODE / NAMA PRAK..."
           },
           dom: 'Bfrtip',
            buttons: [
              {
                text: '<i class="ti-arrow-left"></i>Kembali', //'<i class="ti-arrow-left"> Kembali</i>',
                className: "btn hor-grd btn-grd-info md-effect-13",
                action: function ( e, dt, node, config ) {
                  window.location='<?php echo site_url('pembukaan-praktikum');?>';
                }
              },
              {
                text: '<i class="ti-plus"></i>Tambah Praktikum', // text: '<i class="ti-plus"> Tambah Praktikum</i>',
                className: "btn hor-grd btn-grd-primary",
                action: function ( e, dt, node, config ) {
                  $('#large-Modal').modal('show');
                }
              },
           ],
           "columnDefs": [
           {
               "targets": [ 0 ],
               "width": 25,
               "className": "text-center",
               // "orderable": false,
           },
           ],
           responsive: true
       });
   });
</script>

<script type="text/javascript">
   $(document).ready(function() {
       $('#simpletable1').DataTable({
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : KODE / NAMA PRAK...."
           },
           "columnDefs": [
           {
               "targets": [ 0 ],
               "width": 20,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 1 ],
               "width": 25,
               "className": "text-center",
               // "orderable": false,
           },
           ],
           responsive: true
       });
   });
</script>
