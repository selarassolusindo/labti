<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Material</h3>                                    
                                </div><!-- /.box-header -->
                                
                                <?php if($this->session->userdata('level') == "admin"): ?>
                                <form action="<?php echo base_url(); ?>index_material.php/Dani_Material/import" method="post" name="upload_excel" enctype="multipart/form-data">
                                <input type="file" name="file" id="file">
                                <button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>
                                </form>

                                <form action="<?php echo base_url(); ?>index_material.php/Dani_Material/create_csv" method="">
                                <button type="submit" name="ExportCSV" class="btn btn-primary button-loading">ExportCSV</button>
                                </form>
                                <?php endif; ?>

                                <div class="box-header">
                                    <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah</a>                                   
                                </div><!-- /.box-header -->
                                
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Harga Sludge Paper</th>
                                                <th>Harga Avalan Karton</th>
                                                <th>Harga Avalan Gelondongan</th>
                                                <th>Harga Duplek</th>
                                                <th>Harga Plastik Pembungkus</th>
                                                <th>Harga Tali Rafia</th>
                                                <th>Harga Kayu Bakar</th>
                                                <th>Harga Borongan</th>
                                                <th>Harga Harian</th>
                                                <th>Harga Bonus</th>
                                                <th>Harga Listrik</th>
                                                <th>Harga Pemakaian Solar</th>
                                                <th>Harga Transportasi</th>
                                                <th>Harga Solar</th>
                                                <th>Harga Muatan Colt Diesel</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php if($models): ?>
										<?php $no=1; foreach($models as $row): ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->sludge_paper; ?></td>
                                            <td><?php echo $row->avalan_karton; ?></td>
                                            <td><?php echo $row->avalan_gelondongan; ?></td>
                                            <td><?php echo $row->duplek; ?></td>
                                            <td><?php echo $row->plastik_pembungkus; ?></td>
                                            <td><?php echo $row->tali_rafia; ?></td>
                                            <td><?php echo $row->kayu_bakar; ?></td>
                                            <td><?php echo $row->borongan; ?></td>
                                            <td><?php echo $row->harian; ?></td>
                                            <td><?php echo $row->bonus; ?></td>
                                            <td><?php echo $row->listrik; ?></td>
                                            <td><?php echo $row->pemakaian_solar; ?></td>
                                            <td><?php echo $row->transportasi; ?></td>
                                            <td><?php echo $row->solar; ?></td>
                                            <td><?php echo $row->muatan_colt_diesel; ?></td>
											
                                            <td>
                                                <a href="#" class="btn btn-info">Ubah</a>
                                                <a href="#" class="btn btn-danger">Hapus</a>
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
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                    <!-- Modal Tambah -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
                       <div class="modal-dialog">
                          <div class="modal-content">
                             <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Tambah Data</h4>
                             </div>
                             <form class="form-horizontal" action="<?php echo base_url('admin/tambah')?>" method="post" enctype="multipart/form-data" role="form">
                                <div class="modal-body">
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Name</label>
                                      <div class="col-lg-10">
                                         <input type="text" class="form-control" name="nama" placeholder="Tuliskan Name">
                                      </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Spech</label>
                                      <div class="col-lg-10">
                                         <textarea class="form-control" name="alamat" placeholder="Tuliskan Spech"></textarea>
                                      </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Id perangkat</label>
                                      <div class="col-lg-10">
                                         <input type="text" class="form-control" name="pekerjaan" placeholder="Tuliskan Id perangka">
                                      </div>
                                   </div>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                                   <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                                </div>
                             </form>
                          </div>
                       </div>
                    </div>
                    </div>

                   
                </section><!-- /.content -->
            