<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Pengumuman</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Pengumuman</a></li>
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
                                <th class="text-center">JUDUL</th>
                                <!-- <th>ISI</th> -->
                                <th class="text-center">TANGGAL</th>
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
            <h4 class="modal-title" >Tambah Pengumuman</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="form-horizontal" action="#" id="form" method="post">
         <div class="modal-body">
            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-0">
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">JUDUL<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                      <input type="hidden" name="ID_BERITA"/>
                      <input type="text" class="form-control form-control-sm" id="JUDUL_BERITA" name="JUDUL_BERITA" >
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ISI<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                      <textarea rows="10" cols="5" class="form-control form-control-sm" id="ISI_BERITA" name="ISI_BERITA"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">TANGGAL<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                      <input type="date" class="form-control form-control-sm" id="TANGGAL_BERITA" name="TANGGAL_BERITA" value="<?php echo date('Y-m-d'); ?>"/>
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
  function getDefaultDate(){

    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

    return today;
}
   var save_method;
   var table;
    $(document).ready(function() {

      $("#TANGGAL_BERITA").val( getDefaultDate());
       //datatables
       table = $('#simpletable').DataTable({
           "processing": true,
           "serverSide": true,
           "order": [],
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : Judul Pengumuman...",
               infoFiltered: ""
           },
           "ajax": {
               "url": "<?php echo site_url('pengumuman/get_data')?>",
               "type": "POST"
           },
           dom: 'Bfrtip',
           buttons: [
              {
                text: '<i class="ti-plus"></i>Tambah Pengumuman', // text: '<i class="ti-plus"> Tambah Pengumuman</i>',
                className: "btn hor-grd btn-grd-primary",
                action: function ( e, dt, node, config ) {
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
               "className": "text-left",
               // "orderable": false,
           },
           {
               "targets": [ 2 ],
                // "width": 140,
               "className": "text-center",
               // "orderable": false,
           },
           {
               "targets": [ 3 ],
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
      $('.modal-title').text('Tambah Pengumuman'); // Set Title to Bootstrap modal title
      $('.subm').text('Tambah'); // Set Title to Button modal title
    }

    function edit_person(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('pengumuman/ajax_edit/')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                $('[name="ID_BERITA"]').val(data.ID_BERITA);
                $('[name="JUDUL_BERITA"]').val(data.JUDUL_BERITA);
                $('[name="ISI_BERITA"]').val(data.ISI_BERITA);
                $('[name="TANGGAL_BERITA"]').val(data.TANGGAL_BERITA);

                $('#large-Modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Ubah Pengumuman'); // Set Title to Bootstrap modal title
                $('.subm').text('Ubah'); // Set Title to Button modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        var url;

        var JUDUL_BERITA = $('#JUDUL_BERITA').val();
        var ISI_BERITA = $('#ISI_BERITA').val();
        var ISIHTML_BERITA = $('#ISI_BERITA').val();
        var TANGGAL_BERITA = $('#TANGGAL_BERITA').val();

        if (save_method == 'add') {
            url = "<?php echo site_url('pengumuman/insert')?>";
        } else {
            url = "<?php echo site_url('pengumuman/update')?>";
        }

        if (JUDUL_BERITA.trim() == '') {
            // alert('Field Kode Praktikum Kosong!.');
            $("#JUDUL_BERITA").attr('class', 'form-control form-control-sm form-control-danger');
            $("#JUDUL_BERITA").attr("placeholder", "Field Judul Kosong!");
            setTimeout(function () {
                $('#JUDUL_BERITA').removeClass('form-control-danger');
                $('#JUDUL_BERITA').attr('placeholder','');
            }, 4000);
            $('#JUDUL_BERITA').focus();
            return false;
        } else if (ISI_BERITA.trim() == '') {
            // alert('Field Nama Praktikum Kosong!');
            $("#ISI_BERITA").attr('class', 'form-control form-control-sm form-control-danger');
            $("#ISI_BERITA").attr("placeholder", "Field Isi Berita kosong!");
            setTimeout(function () {
                $('#ISI_BERITA').removeClass('form-control-danger');
                $('#ISI_BERITA').attr('placeholder','');
            }, 4000);
            $('#ISI_BERITA').focus();
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
                        'Pengumuman Telah disimpan!',
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
                    url: "<?php echo site_url('pengumuman/delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        $('#large-Modal').modal('hide');
                        reload_table();
                        swal(
                            'Terhapus!',
                            'Pengumuman Behasil Dihapus.',
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
