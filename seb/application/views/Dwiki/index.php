  <script type = "text/javascript" >
  document.addEventListener("DOMContentLoaded", function (event) {
    var config = {
      type: 'line',
     data: {
        labels: [<?php foreach($models as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
        endforeach;?>],
        datasets: [{
          label: "Data Ampas Awal",
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [<?php foreach($models as $garis): echo json_encode($garis->ampas_saldoawal).",";
        endforeach;?>],
        },
        {
          label: "Data Ampas Keluar",
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.blue,
          data: [<?php foreach($models as $garis): echo json_encode($garis->ampas_keluar).",";
        endforeach;?>],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Ampas'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Date'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value'
            }
          }]
        }
      }
    };

    var config1 = {
      type: 'line',
     data: {
        labels: [<?php foreach($models as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
        endforeach;?>],
        datasets: [{
          label: "Data Gelondongan Awal",
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [<?php foreach($models as $garis): echo json_encode($garis->gelondongan_saldoawal).",";
        endforeach;?>],
        },
        {
          label: "Data Gelondongan Keluar",
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.blue,
          data: [<?php foreach($models as $garis): echo json_encode($garis->gelondongan_keluar).",";
        endforeach;?>],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Gelondongan'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Date'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value'
            }
          }]
        }
      }
    };

    var config2 = {
      type: 'line',
     data: {
        labels: [<?php foreach($models as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
        endforeach;?>],
        datasets: [{
          label: "Data Karton Awal",
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [<?php foreach($models as $garis): echo json_encode($garis->karton_saldoawal).",";
        endforeach;?>],
        },
        {
          label: "Data Karton Keluar",
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.blue,
          data: [<?php foreach($models as $garis): echo json_encode($garis->karton_keluar).",";
        endforeach;?>],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Karton'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Date'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value'
            }
          }]
        }
      }
    };

    

    window.onload = function () {
      var ctx = document.getElementById("canvas").getContext("2d");
      window.myLine = new Chart(ctx, config);

      var ctx1 = document.getElementById("canvas1").getContext("2d");
      window.myLine = new Chart(ctx1, config1);

      var ctx2 = document.getElementById("canvas2").getContext("2d");
      window.myLine = new Chart(ctx2, config2);
    };

    

  }); 
</script>
<script>
     document.addEventListener("DOMContentLoaded", function (event) {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#Date2').attr("value",div.data('tanggal'));
            modal.find('#ampas_saldoawal').attr("value",div.data('ampas_saldoawal'));
            modal.find('#ampas_keluar').attr("value",div.data('ampas_keluar'));
            modal.find('#gelondongan_saldoawal').attr("value",div.data('gelondongan_saldoawal'));
            modal.find('#gelondongan_keluar').attr("value",div.data('gelondongan_keluar'));
            modal.find('#karton_saldoawal').attr("value",div.data('karton_saldoawal'));
            modal.find('#karton_keluar').attr("value",div.data('karton_keluar'));
           
            // modal.find('#pekerjaan').attr("value",div.data('pekerjaan'));
        });
    });
</script>
<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Stok Bahan Baku</h3>
            </div>
            <?php if($this->session->flashdata('message_success')): ?>
            <script>
               $(document).ready(function() {  
                  setTimeout(function() {
                   toastr.options = {
                       closeButton: true,
                       progressBar: true,
                       showMethod: 'slideDown',
                       timeOut: 4000
                   };
                   toastr.success('<?php echo $this->session->flashdata('message_success') ?>', 'Berhasil');
               
               }, 1300);  
               });  
            </script>
            <?php endif; ?>  
            <?php if($this->session->flashdata('message_danger')): ?>
            <script>
               $(document).ready(function() {  
                  setTimeout(function() {
                   toastr.options = {
                       closeButton: true,
                       progressBar: true,
                       showMethod: 'slideDown',
                       timeOut: 4000
                   };
                   toastr.error('<?php echo $this->session->flashdata('message_danger') ?>','Gagal');
               
               }, 1300);  
               });  
            </script>
            <?php endif; ?>
            <div class="box-body table-responsive">

                <?php if($this->session->userdata('level') == "admin"): ?>
                <div class="box-header">
                  <form action="<?php echo site_url(); ?>Dwiki/import" method="post" name="upload_excel" enctype="multipart/form-data">
                       <input type="file" name="file" id="file">
                       <button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>
                    </form>
                </div>
                <?php endif; ?>

                <div class="box-header">
                  <?php if($this->session->userdata('level') == "admin"): ?>
                  <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">
                    <i class="fa fa-plus-square"></i>&nbsp;Tambah
                  </a>
                  <?php endif; ?>  
                   
                  <?php if($this->session->userdata('level') == "admin"): ?>
                    <a href="<?php echo site_url(); ?>Dwiki/create_csv" class="btn btn-warning">
                      <i class="fa fa-file"></i>&nbsp;Export to CSV
                    </a>
                  <?php endif; ?>                                   
                </div>

               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th style="text-align:center" rowspan="2">Id</th>
                        <th style="text-align:center" rowspan="2">Tanggal</th>
                        <th style="text-align:center" colspan="2">Ampas</th>
                        <th style="text-align:center" colspan="2">Gelondongan</th>
                        <th style="text-align:center" colspan="2">Karton</th>
                        <?php if($this->session->userdata('level') == "admin"): ?>
                        <th style="text-align:center" rowspan="2">Aksi</th>
                        <?php endif; ?> 
                     </tr>
                     <tr>
                        <th style="text-align:center">S. Awal</th>
                        <th style="text-align:center">S. Keluar</th>
                        <th style="text-align:center">S. Awal</th>
                        <th style="text-align:center">S. Keluar</th>
                        <th style="text-align:center">S. Awal</th>
                        <th style="text-align:center">S. Keluar</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if($models): ?>
                     <?php $no=1; foreach($models as $row): ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo date(" d-m-Y ", strtotime($row->tanggal)); ?></td>
                        <td><?php echo $row->ampas_saldoawal; ?></td>
                        <td><?php echo $row->ampas_keluar; ?></td>
                        <td><?php echo $row->gelondongan_saldoawal; ?></td>
                        <td><?php echo $row->gelondongan_keluar; ?></td>
                        <td><?php echo $row->karton_saldoawal; ?></td>
                        <td><?php echo $row->karton_keluar; ?></td>
                        <td>
                           <!-- <a href="<?php echo site_url('Dwiki/ubah/'.$row->id);?>" data-toggle="modal"  data-target="#edit-data" class="btn btn-info">Ubah</a> -->
                           <?php if($this->session->userdata('level') == "admin"): ?>
                           <a href=href="javascript:;"
                              data-id="<?php echo $row->id; ?>"
                              data-ampas_saldoawal="<?php echo $row->ampas_saldoawal; ?>"
                              data-ampas_keluar="<?php echo $row->ampas_keluar; ?>"
                              data-gelondongan_saldoawal="<?php echo $row->gelondongan_saldoawal; ?>"
                              data-gelondongan_keluar="<?php echo $row->gelondongan_keluar; ?>"
                              data-karton_saldoawal="<?php echo $row->karton_saldoawal; ?>"
                              data-karton_keluar="<?php echo $row->karton_keluar; ?>"
                              data-tanggal="<?php echo date(" d-m-Y ", strtotime($row->tanggal)); ?>"
                              data-toggle="modal" data-target="#edit-data" class="btn btn-info">Ubah</a>
                           <a href="<?php echo site_url('Dwiki/delete/'.$row->id);?>" onclick="return confirm('Are you sure want delete this data?')" class="btn btn-danger">Hapus</a>
                           <?php endif; ?>
                        </td>
                     </tr>
                     <?php $no++; endforeach; ?>
                     <?php else: ?>
                     <tr>
                        <td colspan="9">Data not found</td>
                     </tr>
                     <?php endif; ?>
                  
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
   </div>

   <!-- Tambah -->
   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
               <h4 class="modal-title">Tambah Data Stok Bahan Baku</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dwiki/insert')?>" method="post" enctype="multipart/form-data" role="form">
               <div class="modal-body">
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                     <div class="col-md-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input type="text" class="form-control" id="Date" name="tanggal" placeholder="Masukkan Tanggal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Ampas Awal</label>
                     <div class="col-md-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <input type="text" class="form-control" id ="ampas_saldoawal" name="ampas_saldoawal" placeholder="Masukkan Ampas Awal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Ampas Keluar</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="ampas_keluar" name="ampas_keluar" placeholder="Masukkan Ampas Keluar" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Gelondongan Awal</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="gelondongan_saldoawal" name="gelondongan_saldoawal" placeholder="Masukkan Gelondongan Awal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Gelondongan Keluar</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="gelondongan_keluar" name="gelondongan_keluar" placeholder="Masukkan Gelondongan Keluar" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Karton Awal</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="karton_saldoawal" name="karton_saldoawal" placeholder="Masukkan Karton Awal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Karton Keluar</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="karton_keluar" name="karton_keluar" placeholder="Masukkan Karton Keluar" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                  <button class="btn btn-info" type="submit"> Tambah&nbsp;</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- End Tambah -->

   <!-- Update -->
   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
               <h4 class="modal-title">Ubah Data Stok Bahan Baku</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dwiki/ubah')?>" method="post" enctype="multipart/form-data" role="form">
               <div class="modal-body">
                  <div class="form-group">
                     <input type="hidden" id="id" name="id">
                     <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input type="text" class="form-control" id="Date2" name="tanggal" placeholder="Masukkan Tanggal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Ampas Awal</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <input type="text" class="form-control" id ="ampas_saldoawal" name="ampas_saldoawal" placeholder="Masukkan Ampas Awal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Ampas Keluar</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="ampas_keluar" name="ampas_keluar" placeholder="Masukkan Ampas Keluar" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Gelondongan Awal</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="gelondongan_saldoawal" name="gelondongan_saldoawal" placeholder="Masukkan Gelondongan Awal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Gelondongan Keluar</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="gelondongan_keluar" name="gelondongan_keluar" placeholder="Masukkan Gelondongan Keluar" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Karton Awal</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="karton_saldoawal" name="karton_saldoawal" placeholder="Masukkan Karton Awal" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Karton Keluar</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="karton_keluar" name="karton_keluar" placeholder="Masukkan Karton Keluar" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                  <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- End Update -->

   <div class="row">
      <div class="col-md-4">
         <!-- Line chart -->
         <div class="box box-primary">
            <div class="box-header">
               <i class="fa fa-bar-chart-o"></i>
               <h3 class="box-title">Line Chart</h3>
            </div>
            <div class="box-body">
               <canvas id="canvas" style="height: 300px;"></canvas>
            </div>
            <!-- /.box-body-->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
         <!-- Donut chart -->
         <div class="box box-primary">
            <div class="box-header">
               <i class="fa fa-bar-chart-o"></i>
               <h3 class="box-title">Line Chart</h3>
            </div>
            <div class="box-body">
               <canvas id="canvas1" style="height: 300px;"></canvas>
            </div>
            <!-- /.box-body-->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
         <!-- Donut chart -->
         <div class="box box-primary">
            <div class="box-header">
               <i class="fa fa-bar-chart-o"></i>
               <h3 class="box-title">Line Chart</h3>
            </div>
            <div class="box-body">
               <canvas id="canvas2" style="height: 300px;"></canvas>
            </div>
            <!-- /.box-body-->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</section>
<!-- /.content -->
            
