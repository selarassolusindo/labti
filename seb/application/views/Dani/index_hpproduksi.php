  <script type = "text/javascript" >
  document.addEventListener("DOMContentLoaded", function (event) {
    var config = {
      type: 'line',
     data: {
        labels: [<?php foreach($formula1 as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
        endforeach;?>],
        datasets: [{
          label : "Data Formula 1",
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [<?php foreach($formula1 as $garis): echo json_encode($garis->hpp).",";
        endforeach;?>],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'HP Produksi'
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
            scale: {
              display: true,
              String: 'Date'
            }
          }],
          yAxes: [{
            display: true,
            scale: {
              display: true,
              String: 'Value HPP'
            }
          }]
        }
      }
    };

    var config1 = {
      type: 'line',
     data: {
        labels: [<?php foreach($formula2 as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
                          endforeach;?>],
        datasets: [{
          label : "Data Formula 2",
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.blue,
          data: [<?php foreach($formula2 as $garis): echo json_encode($garis->hpp).",";
        endforeach;?>],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'HP Produksi'
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
            scale: {
              display: true,
              String: 'Date'
            }
          }],
          yAxes: [{
            display: true,
            scale: {
              display: true,
              String: 'Value HPP'
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
            modal.find('#Date2').datepicker("setDate",div.data('tanggal'));
            modal.find('#formula').attr("value",div.data('formula'));
            modal.find('#hpp').attr("value",div.data('hpp'));
           
            // modal.find('#pekerjaan').attr("value",div.data('pekerjaan'));
        });
    });
</script>

<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">HP Produksi</h3>
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
                  <form action="<?php echo site_url(); ?>Dani_HPProduksi/import" method="post" name="upload_excel" enctype="multipart/form-data">
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
                    <a href="<?php echo site_url(); ?>Dani_HPProduksi/create_csv" class="btn btn-warning">
                      <i class="fa fa-file"></i>&nbsp;Export to CSV
                    </a>
                  <?php endif; ?>                                   
                </div>

               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th style="text-align:center">Id</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Formula</th>
                        <th style="text-align:center">HPP</th>
                        <?php if($this->session->userdata('level') == "admin"): ?>
                        <th style="text-align:center">Aksi</th>
                        <?php endif; ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if($models): ?>
                     <?php $no=1; foreach($models as $row): ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo date(" d-m-Y ", strtotime($row->tanggal)); ?></td>
                        <td><?php echo $row->formula; ?></td>
                        <td><?php echo $row->hpp; ?></td>
                        <td>
                           <!-- <a href="<?php echo site_url('Dani_HPProduksi/ubah/'.$row->id);?>" data-toggle="modal"  data-target="#edit-data" class="btn btn-info">Ubah</a> -->
                           <?php if($this->session->userdata('level') == "admin"): ?>
                           <a href=href="javascript:;"
                              data-id="<?php echo $row->id; ?>"
                              data-formula="<?php echo $row->formula; ?>"
                              data-hpp="<?php echo $row->hpp; ?>"
                              data-tanggal="<?php echo date(" d-m-Y ", strtotime($row->tanggal)); ?>"
                              data-toggle="modal" data-target="#edit-data" class="btn btn-info">Ubah</a>
                           <a href="<?php echo site_url('Dani_HPProduksi/delete/'.$row->id);?>" onclick="return confirm('Are you sure want delete this data?')" class="btn btn-danger">Hapus</a>
                           <?php endif; ?>
                        </td>
                     </tr>
                     <?php $no++; endforeach; ?>
                     <?php else: ?>
                     <tr>
                        <td colspan="6">Data not found</td>
                     </tr>
                     <?php endif; ?>
                     </tr>
                  </tbody>
               </table>

            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
   </div>

   <!-- Tambah -->
   <div aria-hidden="true" aria-ledby="myModal" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
               <h4 class="modal-title">Tambah Data HPP</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dani_HPProduksi/insert')?>" method="post" enctype="multipart/form-data" role="form">
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
                     <label class="col-lg-2 col-sm-2 control-label">Formula</label>
                     <div class="col-md-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <select name="formula" class="form-control">
								<option>formula 1</option>
								<option>formula 2</option>
							</select>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">HPP</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="hpp" name="hpp" placeholder="Masukkan HPP" required>
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
   <div aria-hidden="true" aria-ledby="myModal" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
               <h4 class="modal-title">Ubah Data HPP</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dani_HPProduksi/ubah')?>" method="post" enctype="multipart/form-data" role="form">
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
                     <label class="col-lg-2 col-sm-2 control-label">Formula</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <input type="text" class="form-control" id ="formula" name="formula" placeholder="Masukkan Formula" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">HPP</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="hpp" name="hpp" placeholder="Masukkan HPP" required>
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
      <div class="col-md-6">
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
      <div class="col-md-6">
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
   </div>
   <!-- /.row -->
</section>
<!-- /.content -->

<section class="content">
   <div class="row">
      <div class="col-xs-6">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Nilai Max</h3>
            </div>

               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th style="text-align:center">Id</th>
                        <th style="text-align:center">Waktu</th>
                        <th style="text-align:center">Jumlah Max HPP</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if($max): ?>
                     <?php $no=1; foreach($max as $row): ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo date(" d-m-Y ", strtotime($row->tanggal)); ?></td>
                        <td><?php echo $row->max; ?></td>
                     </tr>
                     <?php $no++; endforeach; ?>
                     <?php else: ?>
                     <tr>
                        <td colspan="6">Data not found</td>
                     </tr>
                     <?php endif; ?>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
   </div>
            
