<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Pembukaan Praktikum</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Pembukaan Praktikum</a></li>
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
                                <th>Tahun</th>
                                <th>Periode</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Aksi</th>
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
            <h4 class="modal-title" >Tambah Data  Pembukaan Praktikum</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" action="#" id="form" method="post">
         <div class="modal-body">
            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tahun<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <input type="hidden" name="NO_JADWAL_PEMBUKAAN"/>
                      <input type="text" class="form-control form-control-sm" id="TAHUN_JADWAL_PEMBUKAAN" name="TAHUN_JADWAL_PEMBUKAAN" >
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Periode<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="PERIODE_JADWAL_PEMBUKAAN" name="PERIODE_JADWAL_PEMBUKAAN">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="TAHUN_AJARAN_JADWAL_PEMBUKAAN" name="TAHUN_AJARAN_JADWAL_PEMBUKAAN">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Semester<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <select id="SEMESTER_JADWAL_PEMBUKAAN" name="SEMESTER_JADWAL_PEMBUKAAN" class="form-control form-control-sm">
                        <option >- Pilih -</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                      </select>
                  </div>
              </div>
          </div>
         </div>
         <div class="modal-footer">
            <!-- <button class="btn btn-grd-info btn-custom subm" type="submit" onclick="save(); return false;"><i class="ti-plus"> Tambah</i></button>  -->
            <button class="btn btn-grd-info btn-custom subm" type="submit" onclick="save(); return false;"><i class="ti-plus"></i>Tambah</button>
            <!-- <button type="button" class="btn btn-grd-danger btn-custom" data-dismiss="modal">&nbsp;&nbsp;<i class="ti-na"> Batal</i>&nbsp;&nbsp;</button> -->
            <button type="button" class="btn btn-grd-danger btn-custom" data-dismiss="modal">&nbsp;&nbsp;<i class="ti-na"></i>Batal&nbsp;&nbsp;</button>
         </div>
         </form>
      </div>
   </div>
</div>

<script type="text/javascript">
   var save_method;
   var table, table1;
   $(document).ready(function() {
       //datatables
       table = $('#simpletable').DataTable({
           "processing": true,
           "serverSide": true,
           "order": [],
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : TAHUN / PERIODE..."
           },
           "ajax": {
               "url": "<?php echo site_url('pembukaan_praktikum/get_data')?>",
               "type": "POST"
           },
           dom: 'Bfrtip',
           buttons: [
              {
                text: '<i class="ti-plus"></i>Tambah Baru', // text: '<i class="ti-plus"> Tambah Baru</i>',
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
               "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 2 ],
                "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 3 ],
                "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 4 ],
                "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 5 ],
                "width": 60,
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
      $('.modal-title').text('Tambah Data Pembukaan Praktikum'); // Set Title to Bootstrap modal title
      // $('.subm').text('Tambah'); // Set Title to Button modal title
    }

    function edit_person(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('pembukaan_praktikum/ajax_edit/')?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                $('[name="NO_JADWAL_PEMBUKAAN"]').val(data.NO_JADWAL_PEMBUKAAN);
                $('[name="TAHUN_JADWAL_PEMBUKAAN"]').val(data.TAHUN_JADWAL_PEMBUKAAN);
                $('[name="PERIODE_JADWAL_PEMBUKAAN"]').val(data.PERIODE_JADWAL_PEMBUKAAN);
                $('[name="TAHUN_AJARAN_JADWAL_PEMBUKAAN"]').val(data.TAHUN_AJARAN_JADWAL_PEMBUKAAN);
                $('[name="SEMESTER_JADWAL_PEMBUKAAN"]').val(data.SEMESTER_JADWAL_PEMBUKAAN);

                $('#large-Modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Ubah Data Pembukaan Praktikum'); // Set Title to Bootstrap modal title
                $( ".subm" ).html('<i class="ti-write"></i>Ubah');
                // $('.subm').text('Ubah'); // Set Title to Button modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        var url;


        var TAHUN_JADWAL_PEMBUKAAN = $('#TAHUN_JADWAL_PEMBUKAAN').val();
        var PERIODE_JADWAL_PEMBUKAAN = $('#PERIODE_JADWAL_PEMBUKAAN').val();
        var TAHUN_AJARAN_JADWAL_PEMBUKAAN = $('#TAHUN_AJARAN_JADWAL_PEMBUKAAN').val();
        var SEMESTER_JADWAL_PEMBUKAAN = $('#SEMESTER_JADWAL_PEMBUKAAN').val();

        if (save_method == 'add') {
            url = "<?php echo site_url('pembukaan_praktikum/insert')?>";
        } else {
            url = "<?php echo site_url('pembukaan_praktikum/update')?>";
        }

        if (TAHUN_JADWAL_PEMBUKAAN.trim() == '') {
            // alert('Field Kode Praktikum Kosong!.');
            $("#TAHUN_JADWAL_PEMBUKAAN").attr('class', 'form-control form-control-sm form-control-danger');
            $("#TAHUN_JADWAL_PEMBUKAAN").attr("placeholder", "Field Tahun Pelaksanaan Praktikum Kosong!");
            setTimeout(function () {
                $('#TAHUN_JADWAL_PEMBUKAAN').removeClass('form-control-danger');
                $('#TAHUN_JADWAL_PEMBUKAAN').attr('placeholder','');
            }, 4000);
            $('#TAHUN_JADWAL_PEMBUKAAN').focus();
            return false;
        } else if (PERIODE_JADWAL_PEMBUKAAN.trim() == '') {
            // alert('Field Nama Praktikum Kosong!');
            $("#PERIODE_JADWAL_PEMBUKAAN").attr('class', 'form-control form-control-sm form-control-danger');
            $("#PERIODE_JADWAL_PEMBUKAAN").attr("placeholder", "Field Periode Pelaksanaan Praktikum Kosong!");
            setTimeout(function () {
                $('#PERIODE_JADWAL_PEMBUKAAN').removeClass('form-control-danger');
                $('#PERIODE_JADWAL_PEMBUKAAN').attr('placeholder','');
            }, 4000);
            $('#PERIODE_JADWAL_PEMBUKAAN').focus();
            return false;
        } else if (TAHUN_AJARAN_JADWAL_PEMBUKAAN.trim() == '') {
            // alert('Field Nama Praktikum Kosong!');
            $("#TAHUN_AJARAN_JADWAL_PEMBUKAAN").attr('class', 'form-control form-control-sm form-control-danger');
            $("#TAHUN_AJARAN_JADWAL_PEMBUKAAN").attr("placeholder", "Field Tahun Ajaran Kosong!");
            setTimeout(function () {
                $('#TAHUN_AJARAN_JADWAL_PEMBUKAAN').removeClass('form-control-danger');
                $('#TAHUN_AJARAN_JADWAL_PEMBUKAAN').attr('placeholder','');
            }, 4000);
            $('#TAHUN_AJARAN_JADWAL_PEMBUKAAN').focus();
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
                        'Data Pembukaan Praktikum Telah disimpan!',
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
                    url: "<?php echo site_url('pembukaan_praktikum/delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        $('#large-Modal').modal('hide');
                        reload_table();
                        swal(
                            'Terhapus!',
                            'Data Pembukaan Praktikum Behasil Dihapus.',
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
