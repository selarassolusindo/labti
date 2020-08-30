<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Jadwal Pelaksanaan</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Jadwal Pelaksanaan</a></li>
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
                          text: <?php echo json_encode('<p class="success">'.$this->session->flashdata('message_success').'</p>');?>,
                          type: 'success'
                      });
                  }, 1300);
              });
          </script>
          <?php endif; ?>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th class="text-center">NAMA PRAKTIKUM</th>
                                <th class="text-center">KELAS PAGI</th>
                                <th class="text-center">KELAS SORE</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
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
            <h4 class="modal-title" >Tambah Data Pembukaan Praktikum</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" id="form" action="#" method="post" enctype="multipart/form-data" role="form">
         <div class="modal-body">
            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
            <div class="form-group row">
                <!-- <label class="col-sm-2 col-form-label">SEMESTER<span class="text-danger">*</span></label> -->
                <div class="col-sm-12">
                    <select id="PRAKTIKUM_JADWAL_PRAKTIKUM" name="PRAKTIKUM_JADWAL_PRAKTIKUM" class="form-control form-control-sm">
                        <option value="blank">- Pilih Praktikum -</option>
                      <?php foreach($praktikum as $row): ?>
                        <option value="<?php echo $row->KODE_PRAKTIKUM; ?>"><?php echo $row->NAMA_PRAKTIKUM . ' - ' . $row->KODE_PRAKTIKUM . ' - ' . $row->SMST_PRAKTIKUM; ?></option><!-- <option value="<?php echo $row->KODE_PRAKTIKUM; ?>"><?php echo $row->NAMA_PRAKTIKUM; ?></option> -->
                      <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                  <h4 class="sub-title"><b>Pengajar Kelas Pagi</b></h4>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Dosen<span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                          <select id="DOSEN_PAGI_JADWAL_PRAKTIKUM" name="DOSEN_PAGI_JADWAL_PRAKTIKUM" class="form-control form-control-sm">
                              <option value="blank">- Pilih Dosen Pagi -</option>
                              <?php foreach($dosen as $row): ?>
                                <option value="<?php if($row->GELAR_DEPAN_TBUSER != null || $row->GELAR_DEPAN_TBUSER != ""){ echo $row->GELAR_DEPAN_TBUSER." "; } echo $row->NAMA_TBUSER.", ".$row->GELAR_TBUSER; ?>"><?php if($row->GELAR_DEPAN_TBUSER != null || $row->GELAR_DEPAN_TBUSER != ""){ echo $row->GELAR_DEPAN_TBUSER." "; } echo $row->GELAR_DEPAN_TBUSER." ".$row->NAMA_TBUSER.", ".$row->GELAR_TBUSER; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Asisten<span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" placeholder="Asisten Kelas Pagi" id="ASISTEN_PAGI_JADWAL_PRAKTIKUM" name="ASISTEN_PAGI_JADWAL_PRAKTIKUM">

                          <!-- <select id="ASISTEN_PAGI_JADWAL_PRAKTIKUM" name="ASISTEN_PAGI_JADWAL_PRAKTIKUM" class="form-control form-control-sm">
                              <option value="blank">- Pilih Asisten Pagi -</option>
                              <?php //foreach($asisten as $row): ?>
                                <option value="<?php //echo ucwords($row->NAMA_TBUSER); ?>"><?php //echo ucwords($row->NAMA_TBUSER); ?></option>
                              <?php //endforeach; ?>
                          </select> -->
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jadwal<span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control form-control-sm" placeholder="Jadwal Kelas Pagi" id="PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM" name="PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM">
                      </div>
                  </div>
              </div>
              <div class="col-sm-6">
                  <h4 class="sub-title"><b>Pengajar Kelas Sore</b></h4>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Dosen<span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                          <select id="DOSEN_SORE_JADWAL_PRAKTIKUM" name="DOSEN_SORE_JADWAL_PRAKTIKUM" class="form-control form-control-sm">
                              <option value="blank">- Pilih Dosen Sore -</option>
                              <?php foreach($dosensore as $row): ?>
                                <option value="<?php if($row->GELAR_DEPAN_TBUSER != null || $row->GELAR_DEPAN_TBUSER != ""){ echo $row->GELAR_DEPAN_TBUSER." "; } echo ucwords($row->NAMA_TBUSER).", ".$row->GELAR_TBUSER; ?>"><?php if($row->GELAR_DEPAN_TBUSER != null || $row->GELAR_DEPAN_TBUSER != ""){ echo $row->GELAR_DEPAN_TBUSER." "; } echo $row->GELAR_DEPAN_TBUSER." ".ucwords($row->NAMA_TBUSER).", ".$row->GELAR_TBUSER; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Asisten<span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" placeholder="Asisten Kelas Sore" id="ASISTEN_SORE_JADWAL_PRAKTIKUM" name="ASISTEN_SORE_JADWAL_PRAKTIKUM">

                          <!-- <select id="ASISTEN_SORE_JADWAL_PRAKTIKUM" name="ASISTEN_SORE_JADWAL_PRAKTIKUM" class="form-control form-control-sm">
                              <option value="blank">- Pilih Asisten Sore -</option>
                              <?php //foreach($asisten as $row): ?>
                                <option value="<?php //echo ucwords($row->NAMA_TBUSER); ?>"><?php //echo ucwords($row->NAMA_TBUSER); ?></option>
                              <?php //endforeach; ?>
                          </select> -->
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jadwal<span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control form-control-sm" placeholder="Jadwal Kelas Sore" id="PELAKSANAAN_SORE_JADWAL_PRAKTIKUM" name="PELAKSANAAN_SORE_JADWAL_PRAKTIKUM">
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-sm-12">
                  <select id="PERIODE_JADWAL_PRAKTIKUM" name="PERIODE_JADWAL_PRAKTIKUM" class="form-control form-control-sm">
                      <option value="blank">- Pilih Periode Pelaksaaan -</option>
                      <?php foreach($periode as $row): ?>
                        <option value="<?php echo $row->NO_JADWAL_PEMBUKAAN; ?>"><?php echo $row->TAHUN_JADWAL_PEMBUKAAN.", Periode ".$row->PERIODE_JADWAL_PEMBUKAAN; ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-sm-12">
                  <input type="text" class="form-control form-control-sm" placeholder="Link Daftar Kelompok" id="KELOMPOK_JADWAL_PRAKTIKUM" name="KELOMPOK_JADWAL_PRAKTIKUM">
              </div>
          </div>
          </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary waves-effect waves-light subm" onclick="save(); return false;" type="submit">Ubah Jadwal</button>
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
         </div>
         </form>
      </div>
   </div>
</div>

<script type="text/javascript">
   var save_method;
   var table;
   $(document).ready(function() {
       //datatables
       table = $('#simpletable').DataTable({
           "processing": true,
           "serverSide": true,
           "order": [],
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : KODE / NAMA PRAK...",
               infoFiltered: ""
           },
           "ajax": {
               "url": "<?php echo site_url('jadwal/get_data')?>",
               "type": "POST"
           },
           dom: 'Bfrtip',
           buttons: [
              {
                text: '<i class="ti-plus"></i>Tambah Jadwal', // text: '<i class="ti-plus"> Tambah Jadwal</i>',
                className: "btn hor-grd btn-grd-primary",
                action: function ( e, dt, node, config ) {
                    //window.location='<?php //echo site_url('info/cetak_transkrip');?>';
                    //$('#large-Modal').modal('show');
                    add_person();
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
           {
               "targets": [ 1 ],
               // "width": 30,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 3 ],
                // "width": 140,
               // "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 4 ],
                // "width": 140,
               // "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 5 ],
                // "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           ],
           responsive: true
       });
   });

   function reload_table()
   {
     table.ajax.reload(null,false); //reload datatable ajax
   }

    function add_person(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#large-Modal').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Jadwal Praktikum'); // Set Title to Bootstrap modal title
      $('.subm').text('Tambah Jadwal'); // Set Title to Button modal title
    }

    function edit_person(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('jadwal/ajax_edit/')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                console.log(data.DOSEN_PAGI_JADWAL_PRAKTIKUM);
                $('[name="PRAKTIKUM_JADWAL_PRAKTIKUM"]').val(data.PRAKTIKUM_JADWAL_PRAKTIKUM);
                $('[name="DOSEN_PAGI_JADWAL_PRAKTIKUM"]').val(data.DOSEN_PAGI_JADWAL_PRAKTIKUM);
                $('[name="ASISTEN_PAGI_JADWAL_PRAKTIKUM"]').val(data.ASISTEN_PAGI_JADWAL_PRAKTIKUM);
                $('[name="PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM"]').val(data.PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM);
                $('[name="DOSEN_SORE_JADWAL_PRAKTIKUM"]').val(data.DOSEN_SORE_JADWAL_PRAKTIKUM);
                $('[name="ASISTEN_SORE_JADWAL_PRAKTIKUM"]').val(data.ASISTEN_SORE_JADWAL_PRAKTIKUM);
                $('[name="PELAKSANAAN_SORE_JADWAL_PRAKTIKUM"]').val(data.PELAKSANAAN_SORE_JADWAL_PRAKTIKUM);
                $('[name="PERIODE_JADWAL_PRAKTIKUM"]').val(data.IDPERIODE_JADWAL_PRAKTIKUM);
                $('[name="KELOMPOK_JADWAL_PRAKTIKUM"]').val(data.KELOMPOK_JADWAL_PRAKTIKUM);

                $('#large-Modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Ubah Jadwal Praktikum'); // Set Title to Bootstrap modal title
                $('.subm').text('Ubah Jadwal'); // Set Title to Button modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        var url;

        var PRAKTIKUM_JADWAL_PRAKTIKUM = $('#PRAKTIKUM_JADWAL_PRAKTIKUM').val();
        var DOSEN_PAGI_JADWAL_PRAKTIKUM = $('#DOSEN_PAGI_JADWAL_PRAKTIKUM').val();
        var ASISTEN_PAGI_JADWAL_PRAKTIKUM = $('#ASISTEN_PAGI_JADWAL_PRAKTIKUM').val();
        var PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM = $('#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM').val();
        var DOSEN_SORE_JADWAL_PRAKTIKUM = $('#DOSEN_SORE_JADWAL_PRAKTIKUM').val();
        var ASISTEN_SORE_JADWAL_PRAKTIKUM = $('#ASISTEN_SORE_JADWAL_PRAKTIKUM').val();
        var PELAKSANAAN_SORE_JADWAL_PRAKTIKUM = $('#PELAKSANAAN_SORE_JADWAL_PRAKTIKUM').val();
        var PERIODE_JADWAL_PRAKTIKUM = $('#PERIODE_JADWAL_PRAKTIKUM').val();
        var KELOMPOK_JADWAL_PRAKTIKUM = $('#KELOMPOK_JADWAL_PRAKTIKUM').val();

        if (save_method == 'add') {
            url = "<?php echo site_url('jadwal/insert')?>";
        } else {
            url = "<?php echo site_url('jadwal/update')?>";
        }

        if (document.getElementsByName('PRAKTIKUM_JADWAL_PRAKTIKUM')[0].value == 'blank') {
            // alert('Field Kode Praktikum Kosong!.');
            $("#PRAKTIKUM_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            setTimeout(function () {
                $('#PRAKTIKUM_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
            }, 4000);
            $('#PRAKTIKUM_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (DOSEN_PAGI_JADWAL_PRAKTIKUM.trim() == '') {
            // alert('Field Nama Praktikum Kosong!');
            $("#DOSEN_PAGI_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#DOSEN_PAGI_JADWAL_PRAKTIKUM").attr("placeholder", "Field Dosen Kelas Pagi Kosong!");
            setTimeout(function () {
                $('#DOSEN_PAGI_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
                $('#DOSEN_PAGI_JADWAL_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#DOSEN_PAGI_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (ASISTEN_PAGI_JADWAL_PRAKTIKUM.trim() == '') {
            // alert('Pilih Semester Praktikum!');
            $("#ASISTEN_PAGI_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#ASISTEN_PAGI_JADWAL_PRAKTIKUM").attr("placeholder", "Field Asisten Kelas Pagi Kosong!");
            setTimeout(function () {
                $('#ASISTEN_PAGI_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
            }, 4000);
            $('#ASISTEN_PAGI_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM.trim() == '') {
            // alert('Field Biaya Praktikum Kosong!');
            $("#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM").attr("placeholder", "Field Pelaksanaan Kelas Pagi Kosong!");
            setTimeout(function () {
                $('#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
                $('#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (DOSEN_SORE_JADWAL_PRAKTIKUM.trim() == '') {
            // alert('Field Biaya Praktikum Kosong!');
            $("#DOSEN_SORE_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#DOSEN_SORE_JADWAL_PRAKTIKUM").attr("placeholder", "Field Dosen Kelas Sore Kosong!");
            setTimeout(function () {
                $('#DOSEN_SORE_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
                $('#DOSEN_SORE_JADWAL_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#DOSEN_SORE_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (ASISTEN_SORE_JADWAL_PRAKTIKUM.trim() == '') {
            // alert('Field Biaya Praktikum Kosong!');
            $("#ASISTEN_SORE_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#ASISTEN_SORE_JADWAL_PRAKTIKUM").attr("placeholder", "Field Asisten Kelas Sore Kosong!");
            setTimeout(function () {
                $('#ASISTEN_SORE_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
                $('#ASISTEN_SORE_JADWAL_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#ASISTEN_SORE_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (PELAKSANAAN_SORE_JADWAL_PRAKTIKUM.trim() == '') {
            // alert('Field Biaya Praktikum Kosong!');
            $("#PELAKSANAAN_SORE_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#PELAKSANAAN_SORE_JADWAL_PRAKTIKUM").attr("placeholder", "Field Pelaksanaan kelas sore Kosong!");
            setTimeout(function () {
                $('#PELAKSANAAN_SORE_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
                $('#PELAKSANAAN_SORE_JADWAL_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (document.getElementsByName('PERIODE_JADWAL_PRAKTIKUM')[0].value == 'blank') {
            // alert('Field Biaya Praktikum Kosong!');
            $("#PERIODE_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            setTimeout(function () {
                $('#PERIODE_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
            }, 4000);
            $('#PERIODE_JADWAL_PRAKTIKUM').focus();
            return false;
        } else if (KELOMPOK_JADWAL_PRAKTIKUM.trim() == '') {
            // alert('Field Biaya Praktikum Kosong!');
            $("#KELOMPOK_JADWAL_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#KELOMPOK_JADWAL_PRAKTIKUM").attr("placeholder", "Field Link Kelompok Praktikum Kosong!");
            setTimeout(function () {
                $('#KELOMPOK_JADWAL_PRAKTIKUM').removeClass('form-control-danger');
                $('#KELOMPOK_JADWAL_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#PELAKSANAAN_PAGI_JADWAL_PRAKTIKUM').focus();
            return false;
        } else {
            $('.statusMsg').hide();
            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#large-Modal').modal('hide');
                    reload_table();
                    swal(
                        'Berhasil!',
                        'Data Praktikum Telah disimpan!',
                        'success'
                    )
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                }
            });
        }
    }

    function delete_person(id) {
        swal({
            title: 'Apa anda yakin?',
            text: "Aksi ini tidak dapat dibatalkan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm) {

                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('jadwal/delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        $('#large-Modal').modal('hide');
                        reload_table();
                        swal(
                            'Terhapus!',
                            'Data Praktikum Behasil Dihapus.',
                            'success'
                        );
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error adding / update data');
                    }
                });


            }
        })
    }
</script>
