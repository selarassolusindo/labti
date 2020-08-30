<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Data Praktikum</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Praktikum</a></li>
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
                                <th>NAMA PRAKTIKUM</th>
                                <th>SEMESTER</th>
                                <th>BIAYA</th>
                                <th>AKSI</th>
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
            <h4 class="modal-title" >Tambah Data Praktikum</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" action="#" id="form" method="post">
         <div class="modal-body">
            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">KODE<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <input type="hidden" name="ID_PRAKTIKUM"/>
                      <input type="text" class="form-control form-control-sm" id="KODE_PRAKTIKUM" name="KODE_PRAKTIKUM" >
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">NAMA PRAKTIKUM<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="NAMA_PRAKTIKUM" name="NAMA_PRAKTIKUM">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">SEMESTER<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <select id="SMST_PRAKTIKUM" name="SMST_PRAKTIKUM" class="form-control form-control-sm">
                         <option value="blank">- Pilih -</option>
                         <option value="I">I</option>
                         <option value="II">II</option>
                         <option value="III">III</option>
                         <option value="IV">IV</option>
                         <option value="V">V</option>
                         <option value="VI">VI</option>
                         <option value="VII">VII</option>
                         <option value="VIII">VIII</option>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">BIAYA<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="BIAYA_PRAKTIKUM" name="BIAYA_PRAKTIKUM">
                      <div class="col-form-label">NB : Tulis hanya angka. Contoh : 100000</div>
                  </div>
              </div>
          </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary waves-effect waves-light subm" onclick="save(); return false;" type="submit"> Daftar</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
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
               searchPlaceholder: "Cari : KODE / NAMA PRAK..."
           },
           "ajax": {
               "url": "<?php echo site_url('praktikum/get_data')?>",
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
           ],
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
      $('.modal-title').text('Tambah Data Praktikum'); // Set Title to Bootstrap modal title
      $('.subm').text('Tambah'); // Set Title to Button modal title
    }

    function edit_person(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('praktikum/ajax_edit/')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                $('[name="ID_PRAKTIKUM"]').val(data.ID_PRAKTIKUM);
                $('[name="KODE_PRAKTIKUM"]').val(data.KODE_PRAKTIKUM);
                $('[name="NAMA_PRAKTIKUM"]').val(data.NAMA_PRAKTIKUM);
                $('[name="SMST_PRAKTIKUM"]').val(data.SMST_PRAKTIKUM);
                $('[name="BIAYA_PRAKTIKUM"]').val(data.BIAYA_PRAKTIKUM);

                $('#large-Modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Ubah Data Praktikum'); // Set Title to Bootstrap modal title
                $('.subm').text('Ubah'); // Set Title to Button modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        var url;

        var KODE_PRAKTIKUM = $('#KODE_PRAKTIKUM').val();
        var NAMA_PRAKTIKUM = $('#NAMA_PRAKTIKUM').val();
        var SMST_PRAKTIKUM = $('#SMST_PRAKTIKUM').val();
        var BIAYA_PRAKTIKUM = $('#BIAYA_PRAKTIKUM').val();

        if (save_method == 'add') {
            url = "<?php echo site_url('praktikum/insert')?>";
        } else {
            url = "<?php echo site_url('praktikum/update')?>";
        }

        if (KODE_PRAKTIKUM.trim() == '') {
            // alert('Field Kode Praktikum Kosong!.');
            $("#KODE_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#KODE_PRAKTIKUM").attr("placeholder", "Field Kode Praktikum Kosong!");
            setTimeout(function () {
                $('#KODE_PRAKTIKUM').removeClass('form-control-danger');
                $('#KODE_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#KODE_PRAKTIKUM').focus();
            return false;
        } else if (NAMA_PRAKTIKUM.trim() == '') {
            // alert('Field Nama Praktikum Kosong!');
            $("#NAMA_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#NAMA_PRAKTIKUM").attr("placeholder", "Field Nama Praktikum Kosong!");
            setTimeout(function () {
                $('#NAMA_PRAKTIKUM').removeClass('form-control-danger');
                $('#NAMA_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#NAMA_PRAKTIKUM').focus();
            return false;
        } else if (document.getElementsByName('SMST_PRAKTIKUM')[0].value == 'blank') {
            // alert('Pilih Semester Praktikum!');
            $("#SMST_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            setTimeout(function () {
                $('#SMST_PRAKTIKUM').removeClass('form-control-danger');
            }, 4000);
            $('#SMST_PRAKTIKUM').focus();
            return false;
        } else if (BIAYA_PRAKTIKUM.trim() == '') {
            // alert('Field Biaya Praktikum Kosong!');
            $("#BIAYA_PRAKTIKUM").attr('class', 'form-control form-control-sm form-control-danger');
            $("#BIAYA_PRAKTIKUM").attr("placeholder", "Field Biaya Praktikum Kosong!");
            setTimeout(function () {
                $('#BIAYA_PRAKTIKUM').removeClass('form-control-danger');
                $('#BIAYA_PRAKTIKUM').attr('placeholder','');
            }, 4000);
            $('#BIAYA_PRAKTIKUM').focus();
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
                    url: "<?php echo site_url('praktikum/delete')?>/"+id,
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
