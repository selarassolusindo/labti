  <script type = "text/javascript" >
  document.addEventListener("DOMContentLoaded", function (event) {
    var config = {
      type: 'line',
     data: {
        labels: [<?php foreach($models as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
        endforeach;?>],
        datasets: [{
          label: "Data Total",
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [<?php foreach($models as $garis): echo json_encode($garis->total).",";
        endforeach;?>],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Stok Produksi'
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
            modal.find('#minggu_ke').attr("value",div.data('minggu_ke'));
			modal.find('#produksi').attr("value",div.data('produksi'));
            modal.find('#permintaan').attr("value",div.data('permintaan'));
            modal.find('#persediaan').attr("value",div.data('persediaan'));
            modal.find('#biaya_simpan').attr("value",div.data('biaya_simpan'));
            modal.find('#biaya_lembur').attr("value",div.data('biaya_lembur'));
            modal.find('#kerugian').attr("value",div.data('kerugian'));
           
            // modal.find('#pekerjaan').attr("value",div.data('pekerjaan'));
        });
    });
  </script>
  <section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Stok Produksi</h3>
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
                  <form action="<?php echo site_url(); ?>Dimas/import" method="post" name="upload_excel" enctype="multipart/form-data">
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
                    <a href="<?php echo site_url(); ?>Dimas/create_csv" class="btn btn-warning">
                      <i class="fa fa-file"></i>&nbsp;Export to CSV
                    </a>
                  <?php endif; ?>                                   
                </div>

               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th style="text-align:center">Id</th>
                        <th style="text-align:center">Tanggal</th>
						<th style="text-align:center">Minggu-Ke</th>
                        <th style="text-align:center">Produksi</th>
                        <th style="text-align:center">Permintaan</th>
                        <th style="text-align:center">Persediaan</th>
                        <th style="text-align:center">Biaya Simpan</th>
                        <th style="text-align:center">Biaya Lembur</th>
                        <th style="text-align:center">Kerugian</th>
                        <th style="text-align:center">Total</th>
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
                        <td><?php echo $row->minggu_ke; ?></td>
						<td><?php echo $row->produksi; ?></td>
                        <td><?php echo $row->permintaan; ?></td>
                        <td><?php echo $row->persediaan; ?></td>
                        <td><?php echo $row->biaya_simpan; ?></td>
                        <td><?php echo $row->biaya_lembur; ?></td>
                        <td><?php echo $row->kerugian; ?></td>
                        <td><?php echo $row->total; ?></td>
                        <td>
                           <!-- <a href="<?php echo site_url('Dimas/ubah/'.$row->id);?>" data-toggle="modal"  data-target="#edit-data" class="btn btn-info">Ubah</a> -->
                           <?php if($this->session->userdata('level') == "admin"): ?>
                           <a href=href="javascript:;"
                              data-id="<?php echo $row->id; ?>"
                              data-minggu_ke="<?php echo $row->minggu_ke; ?>"
							  data-produksi="<?php echo $row->produksi; ?>"
                              data-permintaan="<?php echo $row->permintaan; ?>"
                              data-biaya_simpan="<?php echo $row->biaya_simpan; ?>"
                              data-biaya_lembur="<?php echo $row->biaya_lembur; ?>"
                              data-kerugian="<?php echo $row->kerugian; ?>"
                              data-tanggal="<?php echo date(" d-m-Y ", strtotime($row->tanggal)); ?>"
                              data-toggle="modal" data-target="#edit-data" class="btn btn-info">Ubah</a>
                           <a href="<?php echo site_url('Dimas/delete/'.$row->id);?>" onclick="return confirm('Are you sure want delete this data?')" class="btn btn-danger">Hapus</a>
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
   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
               <h4 class="modal-title">Tambah Data Stok Produksi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dimas/insert')?>" method="post" enctype="multipart/form-data" role="form">
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
                     <label class="col-lg-2 col-sm-2 control-label">Minggu-Ke</label>
                     <div class="col-md-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <input type="text" class="form-control" id ="minggu_ke" name="minggu_ke" placeholder="Masukkan Minggu-Ke" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Produksi</label>
                     <div class="col-md-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <input type="text" class="form-control" id ="produksi" name="produksi" placeholder="Masukkan Produksi" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Permintaan</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="permintaan" name="permintaan" placeholder="Masukkan Permintaan" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Biaya Simpan</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="biaya_simpan" name="biaya_simpan" placeholder="Masukkan Biaya Simpan" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Biaya Lembur</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="biaya_lembur" name="biaya_lembur" placeholder="Masukkan Biaya Lembur" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Kerugian</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="kerugian" name="kerugian" placeholder="Masukkan Kerugian" required>
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
               <h4 class="modal-title">Ubah Data Stok Produksi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dimas/ubah')?>" method="post" enctype="multipart/form-data" role="form">
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
                     <label class="col-lg-2 col-sm-2 control-label">Minggu-Ke</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <input type="text" class="form-control" id ="minggu_ke" name="minggu_ke" placeholder="Masukkan Minggu-Ke" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Produksi</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-superscript"></i>
                           </div>
                           <input type="text" class="form-control" id ="produksi" name="produksi" placeholder="Masukkan Produksi" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Permintaan</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="permintaan" name="permintaan" placeholder="Masukkan Permintaan" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Biaya Simpan</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="biaya_simpan" name="biaya_simpan" placeholder="Masukkan Biaya Simpan" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Biaya Lembur</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="biaya_lembur" name="biaya_lembur" placeholder="Masukkan Biaya Lembur" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-2 col-sm-2 control-label">Kerugian</label>
                     <div class="col-lg-10">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                           </div>
                           <input type="text" class="form-control" id ="kerugian" name="kerugian" placeholder="Masukkan Kerugian" required>
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
      <div class="col-md-12">
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
                        <th style="text-align:center">Jumlah Max Stok Produksi</th>
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
</section>