<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Info Praktikum</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url();?>">Beranda</a>
         </li>
         <li class="active">
            <a>Info Praktikum</a>
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
               <h5>Pendaftaran Praktikum Tahun Pelaksanaan : 2018, Periode 2</h5>
            </div>
            <div class="ibox-content table-responsive">
                <table class="table display table-striped table-bordered table-hover dataTables-praktikum" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align: center;">No</th>
                        <th>Kode</th>
                        <th>Praktikum</th>
                        <th>Awal Pendaftaran</th>
                        <th>Akhir Pendaftaran</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td align="center">1</td>
                        <td>TI1340</td>
                        <td>PTI</td>
                        <td>04 Maret 2018</td>
                        <td>30 Maret 2018</td>
                     </tr>
                     <tr>
                        <td align="center">2</td>
                        <td>TI1341</td>
                        <td>Algoritma & Pemrograman</td>
                        <td>04 Maret 2018</td>
                        <td>30 Maret 2018</td>
                     </tr>
                     <tr>
                        <td align="center">3</td>
                        <td>TI1342</td>
                        <td>Jaringan Komputer</td>
                        <td>04 Maret 2018</td>
                        <td>30 Maret 2018</td>
                     </tr>
                     <tr>
                        <td align="center">4</td>
                        <td>TI1343</td>
                        <td>Manajemen Jaringan Komputer</td>
                        <td>Tutup</td>
                        <td>Tutup</td>
                     </tr>
                     <tr>
                        <td align="center">5</td>
                        <td>TI1344</td>
                        <td>Basis Data</td>
                        <td>Tutup</td>
                        <td>Tutup</td>
                     </tr>
                     <tr>
                        <td align="center">6</td>
                        <td>TI1345</td>
                        <td>PBO</td>
                        <td>Tutup</td>
                        <td>Tutup</td>
                     </tr>
                     <tr>
                        <td align="center">7</td>
                        <td>TI1346</td>
                        <td>PKG</td>
                        <td>Tutup</td>
                        <td>Tutup</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- /////////////////////////////////// -->
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Kartu Hasil Praktikum</h5>
            </div>
            <div class="ibox-content table-responsive">
                <div class="">
                  <button class="btn btn-success " type="button" disabled><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak Transkrip</button>
                </div><br> 
                <h4>SISTEM PENILAIAN : A = 4, B = 3, C = 2, D = 1, E = 0.</h4>
                <table class="table display table-striped table-bordered table-hover dataTables-info" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th style="text-align: center;">No</th>
                        <th>Kode</th>
                        <th>Praktikum</th>
                        <th>Pelaksanaan</th>
                        <th>Kelas</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no=1; if($models): ?>
                     <?php foreach($models as $row): ?>
                     <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo ucwords($row->KODE_PRAKTIKUM); ?></td>
                        <td><?php echo $row->NAMA_PRAKTIKUM; ?></td>
                        <td><?php echo "".$row->THNPELAKSANAAN_PESERTA.", Periode ".$row->PERIODE_PESERTA; ?></td>
                        <td><?php echo ucwords($row->KELAS_PESERTA); ?></td>
                        <td><?php echo $row->NILAI_PESERTA; ?></td>
                        <td><?php echo ucwords($row->STATUS_PESERTA); ?></td>
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

<script>
   $(document).ready(function() {
       $('.dataTables-praktikum').dataTable({
           // "bLengthChange": false,
           // bFilter: false,
           // "paging": false,
           // "bInfo" : false,
           "columnDefs": [{
                   "targets": [0],
                   "width": 25,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [1],
                   "width": 30,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [2],
                   "width": 250,
                   // "orderable": false, 
               },
               {
                   "targets": [3],
                   "width": 150,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [4],
                   "width": 150,
                   "className": "text-center",
                   // "orderable": false, 
               },
           ],
           responsive: true
       });

       $('.dataTables-info').dataTable({
          "bLengthChange": false,
            bFilter: false,
           // "paging": false,
           // "bInfo" : false,
           "columnDefs": [{
                   "targets": [0],
                   "width": 35,
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
                   "width": 250,
                   // "orderable": false, 
               },
               {
                   "targets": [3],
                   "width": 110,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [4],
                   "width": 100,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [5],
                   "width": 100,
                   "className": "text-center",
                   // "orderable": false, 
               },
               {
                   "targets": [6],
                   "width": 100,
                   "className": "text-center",
                   // "orderable": false, 
               },
           ],
           responsive: true
       });
   });        
</script>