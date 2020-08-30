<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="page-body">
  <?php 
    date_default_timezone_set('Asia/Jakarta');
    if($this->session->userdata('level') == "mahasiswa"){ 
  ?>
   <div class="row">
       <div class="col-md-12 col-xl-4">
           <div class="card widget-statstic-card borderless-card">
              <a href="<?php echo site_url('#');?>">
               <div class="card-header">
                   <div class="card-header-left">
                       <h5>User yang berkunjung</h5>
                       <p class="p-t-10 m-b-0 text-muted">http://labti.ft.ubhara.ac.id</p>
                   </div>
               </div>
               <div class="card-block">
                   <i class="ti-user st-icon bg-primary"></i>
                   <div class="text-left">
                       <h3 class="d-inline-block"></h3>
                       <!-- <span class="f-right bg-primary">5,456 Orang</span>                        -->
                       <span class="f-right bg-primary"><?php echo number_format($getMemberTraffic);?></span>
                   </div>
               </div>
              </a>
           </div>
       </div>
       <div class="col-md-6 col-xl-4">
           <div class="card widget-statstic-card borderless-card">
               <a href="<?php echo site_url('info');?>">
               <div class="card-header">
                   <div class="card-header-left">
                       <h5>Kartu Hasil Praktikum</h5>
                       <p class="p-t-10 m-b-0 text-muted">Cek nilai praktikum / cetak transkrip</p>                       
                   </div>
               </div>
                <div class="card-block">
                   <i class="ti-layout-list-thumb st-icon bg-warning txt-lite-color"></i>
                   <div class="text-left">
                       <h3 class="d-inline-block"></h3>
                       <span class="f-right bg-warning">Go</span>
                   </div>
                </div>
               </a>
           </div>
       </div>
       <div class="col-md-6 col-xl-4">
           <div class="card widget-statstic-card borderless-card">
              <a href="<?php echo site_url('jadwal');?>">
               <div class="card-header">
                   <div class="card-header-left">
                       <h5>Jadwal</h5>
                       <p class="p-t-10 m-b-0 text-muted">Cek Waktu Pelaksanaan Praktikum</p>
                   </div>
               </div>
               <div class="card-block">
                   <i class="ti-calendar st-icon bg-success"></i>
                   <div class="text-left">
                       <h3 class="d-inline-block"></h3>
                       <span class="f-right bg-success">Go</span>
                   </div>
               </div>
               </a>
           </div>
       </div>
       <div class="col-xl-12 col-md-12">
           <div class="card">
               <div class="card-header" align="center">
                  <?php foreach($getJadwalPembukaan as $row): ?>
                   <h4>Pendaftaran Praktikum Tahun Pelaksanaan : <?php echo $row->TAHUN_JADWAL_PEMBUKAAN;?>, Periode <?php echo $row->PERIODE_JADWAL_PEMBUKAAN;?>
                   </h4>
                  <?php endforeach; ?>
               </div>
               <div class="card-block">
                  <div class="dt-responsive table-responsive">
                      <table id="simpletable1" class="table table-striped table-bordered nowrap" width="100%">
                          <thead>
                             <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Kode</th>
                                <th style="text-align: center;">Praktikum</th>
                                <th style="text-align: center;">Awal Pendaftaran</th>
                                <th style="text-align: center;">Akhir Pendaftaran</th>
                             </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; if($praktikum): ?>
                            <?php foreach($praktikum as $row): ?>
                             <tr>
                                <td style="text-align: center;"><?php echo $no++; ?></td>
                                <td class="text-center"><?php echo $row->KODE_PRAKTIKUM; ?></td>
                                <td><?php echo $row->NAMA_PRAKTIKUM; ?></td>
                                <td class="text-center"><?php echo format_indo($row->AWAL_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM); ?> </td>
                                <td class="text-center"><?php echo format_indo($row->AKHIR_PENDAFTARAN_JADWAL_PEMBUKAAN_PRAKTIKUM); ?> </td>
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
  <?php 
    }elseif($this->session->userdata('level') == "admin"){ 
  ?>
    
    <div class="row">
       <div class="col-md-6 col-xl-3">
           <div class="card widget-statstic-card borderless-card">
               <a href="<?php echo site_url('validasi');?>">
               <div class="card-header">
                   <div class="card-header-left">
                       <h5>Validasi</h5>
                       <p class="p-t-10 m-b-0 text-muted">Validasi Pendaftaran Prak.</p>                       
                   </div>
               </div>
                <div class="card-block">
                   <i class="ti-layout-list-thumb st-icon bg-primary txt-lite-color"></i>
                   <div class="text-left">
                       <h3 class="d-inline-block"></h3>
                       <span class="f-right bg-primary">Go</span>
                   </div>
                </div>
               </a>
           </div>
       </div>
       <div class="col-md-6 col-xl-3">
           <div class="card widget-statstic-card borderless-card">
               <a href="<?php echo site_url('info');?>">
               <div class="card-header">
                   <div class="card-header-left">
                       <h5>Kelompok & Penilaian</h5>
                       <p class="p-t-10 m-b-0 text-muted">Penilaian Peserta Prak.</p>                       
                   </div>
               </div>
                <div class="card-block">
                   <i class="ti-layout-list-thumb st-icon bg-warning txt-lite-color"></i>
                   <div class="text-left">
                       <h3 class="d-inline-block"></h3>
                       <span class="f-right bg-warning">Go</span>
                   </div>
                </div>
               </a>
           </div>
       </div>
       <div class="col-md-6 col-xl-3">
           <div class="card widget-statstic-card borderless-card">
              <a href="<?php echo site_url('jadwal');?>">
               <div class="card-header">
                   <div class="card-header-left">
                       <h5>Pembukaan Praktikum</h5>
                       <p class="p-t-10 m-b-0 text-muted">Pelaksanaan Periode Baru</p>
                   </div>
               </div>
               <div class="card-block">
                   <i class="ti-calendar st-icon bg-success"></i>
                   <div class="text-left">
                       <h3 class="d-inline-block"></h3>
                       <span class="f-right bg-success">Go</span>
                   </div>
               </div>
               </a>
           </div>
       </div>
       <div class="col-md-6 col-xl-3">
           <div class="card widget-statstic-card borderless-card">
              <a href="<?php echo site_url('jadwal');?>">
               <div class="card-header">
                   <div class="card-header-left">
                       <h5>Jadwal Pelaksanan</h5>
                       <p class="p-t-10 m-b-0 text-muted">Waktu Pelaksanaan Prak.</p>
                   </div>
               </div>
               <div class="card-block">
                   <i class="ti-calendar st-icon bg-danger"></i>
                   <div class="text-left">
                       <h3 class="d-inline-block"></h3>
                       <span class="f-right bg-danger">Go</span>
                   </div>
               </div>
               </a>
           </div>
       </div>
   </div>

    <div class="row">
      <div class="col-xl-12 col-md-3">
        <div class="card">
          <div class="card-header" align="center">
            <h4>Grafik Pendaftaran Praktikum <br> Tahun Pelaksanaan : 2018, Periode 2</h4>
          </div>
          <div class="card-block">
            <canvas id="barChart" width="400" height="100"></canvas>
          </div>
        </div>
      </div>
    </div>

  <?php 
    }else{
  ?>

    <div class="row">
    <div class="col-md-6 col-xl-6">
      <div class="card widget-statstic-card borderless-card">
        <a href="<?php echo site_url('info');?>">
          <div class="card-header">
            <div class="card-header-left">
              <h5>Kelompok</h5>
              <p class="p-t-10 m-b-0 text-muted">Lihat Kelompok yang sedang diampu.</p>
            </div>
          </div>
          <div class="card-block">
            <i class="ti-layout-list-thumb st-icon bg-primary txt-lite-color"></i>
            <div class="text-left">
              <h3 class="d-inline-block"></h3>
              <span class="f-right bg-primary">Go</span>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-6 col-xl-6">
      <div class="card widget-statstic-card borderless-card">
        <a href="<?php echo site_url('info');?>">
          <div class="card-header">
            <div class="card-header-left">
              <h5>Penilaian</h5>
              <p class="p-t-10 m-b-0 text-muted">Penilaian Peserta Pada Kelompok yang sedang diampu.</p>
            </div>
          </div>
          <div class="card-block">
            <i class="ti-layout-list-thumb st-icon bg-warning txt-lite-color"></i>
            <div class="text-left">
              <h3 class="d-inline-block"></h3>
              <span class="f-right bg-warning">Go</span>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

    <div class="row">
      <div class="col-xl-12 col-md-3">
        <div class="card">
          <div class="card-header" align="center">
            <h4>Grafik Pendaftaran Praktikum <br> Tahun Pelaksanaan : 2018, Periode 2</h4>
          </div>
          <div class="card-block">
            <canvas id="barChart" width="400" height="100"></canvas>
          </div>
        </div>
      </div>
    </div>

  <?php 
    }
  ?>

</div>

<script type="text/javascript">
  new Chart(document.getElementById("barChart"), {
    type: 'horizontalBar',
    data: {
      labels: ["PTI", "Algoritma & Pemrograman", "Jaringan Komputer"],
      datasets: [{
        label: "Jumlah Peserta ",
        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
        data: [81, 87, 92]
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: false,
        text: 'Predicted world population (millions) in 2050'
      },
      scales: {
        xAxes: [{
          ticks: {
            beginAtZero: true
          }
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }
  });
</script>

<script type="text/javascript">
   var table;
   $(document).ready(function() {   
       //datatables
       table = $('#simpletable').DataTable({ 
          "searching": false,
          "bPaginate": false,
          "bLengthChange": false,
          "bFilter": true,
          "bInfo": false,
          "bAutoWidth": false
       });

   }); 
</script>