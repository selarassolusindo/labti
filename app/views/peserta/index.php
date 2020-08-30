<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Data Peserta - Periode 2 Tahun 2018</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Peserta - Periode 2 Tahun 2018</a></li>
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
                                <th>PTI</th>
                                <th>ALPRO</th>
                                <th>JARKOM</th>
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

<script type="text/javascript">
   var table;
   $(document).ready(function() {
   
       //datatables
       table = $('#simpletable').DataTable({ 
   
           "processing": true, 
           "serverSide": true, 
           "order": [], 
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Cari : NIM / NAMA..."
           },
   
           "ajax": {
               "url": "<?php echo site_url('peserta/get_data')?>",
               "type": "POST"
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
   
</script>