<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Data Mahasiswa</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Mahasiswa</a></li>
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
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Jenis Kel.</th>
                                <th>Foto</th>
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

<div class="modal fade" id="large-Modal-input" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Import Data Mahasiswa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" id="form_input" method="post" enctype="multipart/form-data" role="form">
         <div class="modal-body">
            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FILE<span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                              <input type="file" name="file" id="file" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
         </div>
         </form>
      </div>
   </div>
</div>

<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" >Tambah Data Asisten</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" id="form" action="#" method="post" enctype="multipart/form-data" role="form">
         <div class="modal-body">
            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIK<span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                              <input type="hidden" name="ID_TBUSER"/>
                              <input type="text" class="form-control form-control-sm" id="NIM_TBUSER" name="NIM_TBUSER">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NAMA<span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control form-control-sm" id="NAMA_TBUSER" name="NAMA_TBUSER">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary waves-effect waves-light" onclick="save(); return false;" type="submit"> Daftar</button>
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
               searchPlaceholder: "Cari : NIM / NAMA...",
               infoFiltered: ""
           },
           "ajax": {
               "url": "<?php echo site_url('mahasiswa/get_data')?>",
               "type": "POST"
           },
           dom: 'Bfrtip',
           buttons: [
              {
                text: '<i class="ti-plus"></i>Tambah Baru', // text: '<i class="ti-plus"> Tambah Baru</i>',
                className: "btn hor-grd btn-grd-primary",
                action: function ( e, dt, node, config ) {
                    add_person();
                }
              },
              {
                text: '<i class="ti-import"></i>Import', // text: '<i class="ti-plus"> Tambah Baru</i>',
                className: "btn hor-grd btn-grd-primary",
                action: function ( e, dt, node, config ) {
                    show_input_file();
                }
              },
           ],
           "columnDefs": [
           {
               "targets": [ 0 ],
               "width": 15,
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
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 4 ],
                // "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 5 ],
                // "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 6 ],
                "width": 25,
               "className": "text-center",
               // "orderable": false,
           },
           ],
           responsive: true
       });

       $('#file').change(function(){
         $('#form_input').submit();
       });

       $('#form_input').on('submit', function(event){
         event.preventDefault();
         $.ajax({
           url:"<?php echo site_url('mahasiswa/import_excel') ?>",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           processData:false,
           success:function(data){
             $('#large-Modal-input').modal('hide');
             reload_table();
             swal(
               'Berhasil!',
               'Data Mahasiswa telah diimport !',
               'success'
             );
             $('#file').val('');
           }
         });
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
      $('.modal-title').text('Tambah Data Mahasiswa'); // Set Title to Bootstrap modal title
      $('.subm').text('Tambah'); // Set Title to Button modal title
    }

    function show_input_file(){
      save_method = 'add';
      $('#form_input')[0].reset(); // reset form on modals
      $('#large-Modal-input').modal('show'); // show bootstrap modal
      $('.modal-title').text('Import Data Mahasiswa'); // Set Title to Bootstrap modal title
      $('.subm').text('Import'); // Set Title to Button modal title
    }

    // function edit_person(id) {
    //     save_method = 'update';
    //     $('#form')[0].reset(); // reset form on modals

    //     //Ajax Load data from ajax
    //     $.ajax({
    //         url: "<?php //echo site_url('dosen/ajax_edit/')?>/" + id,
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data) {

    //             $('[name="ID_TBUSER"]').val(data.ID_TBUSER);
    //             $('[name="NAMA_TBUSER"]').val(data.NAMA_TBUSER);
    //             $('[name="NIM_TBUSER"]').val(data.NIM_TBUSER);
    //             if (data.GELAR_DEPAN_TBUSER && data.GELAR_DEPAN_TBUSER.length) {
    //               $('[name="GELAR_DEPAN_TBUSER"]').val(data.GELAR_DEPAN_TBUSER);
    //             }else{
    //               document.forms['form']['GELAR_DEPAN_TBUSER'].value = "-";
    //             }
    //             $('[name="GELAR_TBUSER"]').val(data.GELAR_TBUSER);
    //             $('[name="JENISKELAMIN_TBUSER"]').val(data.JENISKELAMIN_TBUSER);
    //             $('[name="NOTELP_TBUSER"]').val(data.NOTELP_TBUSER);
    //             $('[name="EMAIL_TBUSER"]').val(data.EMAIL_TBUSER);
    //             $('[name="picture"]').val(data.FOTO_TBUSER);
    //             $('[name="KETERANGAN_TBUSER"]').val(data.KETERANGAN_TBUSER);

    //             $('#large-Modal').modal('show'); // show bootstrap modal when complete loaded
    //             $('.modal-title').text('Ubah Data Dosen'); // Set Title to Bootstrap modal title
    //             $('.subm').text('Ubah'); // Set Title to Button modal title

    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // }

    function save() {
        var url;

        var NIM_TBUSER = $('#NIM_TBUSER').val();
        var NAMA_TBUSER = $('#NAMA_TBUSER').val();
        // var GELAR_DEPAN_TBUSER = $('#GELAR_DEPAN_TBUSER').val();
        // var GELAR_TBUSER = $('#GELAR_TBUSER').val();
        // var JENISKELAMIN_TBUSER = $('#JENISKELAMIN_TBUSER').val();
        // var NOTELP_TBUSER = $('#NOTELP_TBUSER').val();
        // var EMAIL_TBUSER = $('#EMAIL_TBUSER').val();
        // var KETERANGAN_TBUSER = $('#KETERANGAN_TBUSER').val();
        // var picture = $('#picture').val();

        if (save_method == 'add') {
            url = "<?php echo site_url('mahasiswa/insert')?>";
        } else {
            url = "<?php //echo site_url('dosen/update')?>";
        }

        if (NIM_TBUSER.trim() == '') {
            // alert('Field Kode Praktikum Kosong!.');
            $("#NIM_TBUSER").attr('class', 'form-control form-control-sm form-control-danger');
            $("#NIM_TBUSER").attr("placeholder", "Field NIM Kosong!");
            setTimeout(function () {
                $('#NIM_TBUSER').removeClass('form-control-danger');
                $('#NIM_TBUSER').attr('placeholder','');
            }, 4000);
            $('#NIM_TBUSER').focus();
            return false;
        } else if (NAMA_TBUSER.trim() == '') {
            // alert('Field Nama Praktikum Kosong!');
            $("#NAMA_TBUSER").attr('class', 'form-control form-control-sm form-control-danger');
            $("#NAMA_TBUSER").attr("placeholder", "Field Nama Lengkap Kosong!");
            setTimeout(function () {
                $('#NAMA_TBUSER').removeClass('form-control-danger');
                $('#NAMA_TBUSER').attr('placeholder','');
            }, 4000);
            $('#NAMA_TBUSER').focus();
            return false;
        // } else if (GELAR_TBUSER.trim() == '') {
        //     // alert('Field Biaya Praktikum Kosong!');
        //     $("#GELAR_TBUSER").attr('class', 'form-control form-control-sm form-control-danger');
        //     $("#GELAR_TBUSER").attr("placeholder", "Field Gelar Belakang Dosen Kosong!");
        //     setTimeout(function () {
        //         $('#GELAR_TBUSER').removeClass('form-control-danger');
        //         $('#GELAR_TBUSER').attr('placeholder','');
        //     }, 4000);
        //     $('#GELAR_TBUSER').focus();
        //     return false;
        // } else if (document.getElementsByName('JENISKELAMIN_TBUSER')[0].value == 'blank') {
        //     // alert('Pilih Semester Praktikum!');
        //     $("#JENISKELAMIN_TBUSER").attr('class', 'form-control form-control-sm form-control-danger');
        //     setTimeout(function () {
        //         $('#JENISKELAMIN_TBUSER').removeClass('form-control-danger');
        //     }, 4000);
        //     $('#JENISKELAMIN_TBUSER').focus();
        //     return false;
        // } else if (NOTELP_TBUSER.trim() == '') {
        //     // alert('Field Biaya Praktikum Kosong!');
        //     $("#NOTELP_TBUSER").attr('class', 'form-control form-control-sm form-control-danger');
        //     $("#NOTELP_TBUSER").attr("placeholder", "Field NO. TELP/HP Dosen Kosong!");
        //     setTimeout(function () {
        //         $('#NOTELP_TBUSER').removeClass('form-control-danger');
        //         $('#NOTELP_TBUSER').attr('placeholder','');
        //     }, 4000);
        //     $('#NOTELP_TBUSER').focus();
        //     return false;
        // } else if (EMAIL_TBUSER.trim() == '') {
        //     // alert('Field Biaya Praktikum Kosong!');
        //     $("#EMAIL_TBUSER").attr('class', 'form-control form-control-sm form-control-danger');
        //     $("#EMAIL_TBUSER").attr("placeholder", "Field Email Dosen Kosong!");
        //     setTimeout(function () {
        //         $('#EMAIL_TBUSER').removeClass('form-control-danger');
        //         $('#EMAIL_TBUSER').attr('placeholder','');
        //     }, 4000);
        //     $('#EMAIL_TBUSER').focus();
        //     return false;
        // } else if (document.getElementsByName('KETERANGAN_TBUSER')[0].value == 'blank') {
        //     // alert('Field Biaya Praktikum Kosong!');
        //     $("#KETERANGAN_TBUSER").attr('class', 'form-control form-control-sm form-control-danger');
        //     $("#KETERANGAN_TBUSER").attr("placeholder", "Field Foto Dosen Kosong!");
        //     setTimeout(function () {
        //         $('#KETERANGAN_TBUSER').removeClass('form-control-danger');
        //         $('#KETERANGAN_TBUSER').attr('placeholder','');
        //     }, 4000);
        //     $('#KETERANGAN_TBUSER').focus();
        //     return false;
        // } else if (picture.trim() == '') {
        //     // alert('Field Biaya Praktikum Kosong!');
        //     $("#picture").attr('class', 'form-control form-control-sm form-control-danger');
        //     $("#picture").attr("placeholder", "Field Foto Dosen Kosong!");
        //     setTimeout(function () {
        //         $('#picture').removeClass('form-control-danger');
        //         $('#picture').attr('placeholder','');
        //     }, 4000);
        //     $('#picture').focus();
        //     return false;
        } else {
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
                        'Data Mahasiswa Telah disimpan!',
                        'success'
                    )
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // alert('Error adding / update data');
                     alert(jqXHR.status);
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
                    url: "<?php echo site_url('mahasiswa/delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        $('#large-Modal').modal('hide');
                        reload_table();
                        swal(
                            'Terhapus!',
                            'Data Mahasiswa Behasil Dihapus.',
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
