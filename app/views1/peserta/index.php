<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Data Peserta - Periode 2 Tahun 2018</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url();?>">Beranda</a>
         </li>
         <li class="active">
            <a>Data Peserta</a>
         </li>
      </ol>
   </div>
   <div class="col-lg-2">
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Data Peserta</h5>
            </div>
            <div class="ibox-content table-responsive">
               <table id="table1" class="table display table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align: center;">No</th>
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
       table = $('#table1').DataTable({ 
            
           // "bInfo" : false,
           // "processing": true, 
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
               "width": 35, 
               "className": "text-center",
               // "orderable": false, 
           },
           { 
               "targets": [ 1 ], 
               "width": 30, 
               "className": "text-center",
               // "orderable": false, 
           },
           { 
               "targets": [ 3 ], 
                "width": 150, 
               "className": "text-center",
               // "orderable": false, 
           },
           { 
               "targets": [ 4 ], 
                "width": 150, 
               "className": "text-center",
               // "orderable": false, 
           },
           { 
               "targets": [ 5 ], 
                "width": 150, 
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