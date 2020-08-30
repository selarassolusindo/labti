<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Ganti Kata Sandi</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Ganti Kata Sandi</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">

              <?php if(validation_errors()): ?>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            new PNotify({
                                title: 'Gagal!',
                                text: 'Gagal Karena : <br><?php echo form_error('PASSWORD_TBUSER'), form_error('BARU_PASSWORD_TBUSER'), form_error('ULANGI_PASSWORD_TBUSER') ?>Periksa Kembali Inputan Anda',
                                type: 'error'
                            });
                        }, 1300);                        
                    });
                </script>
              <?php endif; ?>

              <?php if($this->session->flashdata('message_error')): ?>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            new PNotify({
                                title: 'Gagal!',
                                text: '<?php echo $this->session->flashdata('message_error')?><br>Periksa Kembali Inputan Anda',
                                type: 'error'
                            });
                        }, 1300);
                    });
                </script>
              <?php endif; ?>

              <?php if($this->session->flashdata('message_success')): ?>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            new PNotify({
                                title: 'Berhasil!',
                                text: '<?php echo $this->session->flashdata('message_success')?>',
                                type: 'success'
                            });
                        }, 1300);
                    });
                </script>
              <?php endif; ?>

              <?php if($this->session->flashdata('message_danger')): ?>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            new PNotify({
                                title: 'Gagal!',                                
                                //text: <?php //echo $this->session->flashdata('message_danger'); ?> ,
                                text: 'Gagal Karena : <br><?php echo $this->session->flashdata('message_danger')?><br>Periksa Kembali Inputan Anda',
                                type: 'error'
                            });
                        }, 1300);
                    });
                </script>
              <?php endif; ?>
              <h4 class="sub-title">Ganti Kata Sandi
                  <?php if($this->session->userdata('level') == "mahasiswa"): ?> Mahasiswa
                  <?php else:?> Dosen
                  <?php endif; ?>
              </h4>

              <?php foreach($models as $row): ?>
              <form action="<?php echo site_url('profil/update_password/'.$this->session->userdata('nim'));?>" method="post" enctype="multipart/form-data">
                  <div class="form-group row" style="display:none">
                      <label class="col-sm-2 col-form-label">NIM</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="NIM_TBUSER" value="<?php  echo $this->session->userdata('nim')?>" readonly>
                      </div>
                  </div>
                  <div class="form-group row" style="display:none">
                      <label class="col-sm-2 col-form-label">NAMA</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="NAMA_TBUSER" value="<?php  echo $this->session->userdata('username')?>" readonly>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">KATA SANDI LAMA</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" name="PASSWORD_TBUSER">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">KATA SANDI BARU</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" name="BARU_PASSWORD_TBUSER">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ULANGI KATA SANDI BARU</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" name="ULANGI_PASSWORD_TBUSER">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-grd-primary m-b-0">Simpan</button>
                      </div>
                  </div>
              </form>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[0-9]|\,./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }  
</script>