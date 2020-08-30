<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Profil</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Profil</a></li>
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
                                text: 'Periksa Kembali Inputan Anda, Gagal Karena : <br><?php echo form_error('JENISKELAMIN_TBUSER'), form_error('NOTELP_TBUSER'), form_error('EMAIL_TBUSER'); ?>Catatan:<br>- Nomer HP/WA minimal 10 digits, Maksimal 12 digits<br>- Email Harus Valid',
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
                                text: 'Profil Berhasil Di Update',
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
                                text: 'Gagal Karena : <br><?php echo $this->session->flashdata('message_danger')?><br>Catatan:<br>- Nomer HP/WA minimal 10 digits, Maksimal 12 digits<br>- Email Harus Valid<br><br>Periksa Kembali Inputan Anda',
                                type: 'error'
                            });
                        }, 1300);
                    });
                </script>
              <?php endif; ?>

              <?php if($this->session->flashdata('message_info')): ?>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            new PNotify({
                                title: 'Info!',
                                text: 'Lengkapi profil anda terlebih dahulu untuk bisa mencetak transkrip / formulir pendaftaran praktikum',
                                type: 'info'
                            });
                        }, 1300);
                    });
                </script>
              <?php endif; ?>

              <h4 class="sub-title">Biodata Lengkap
                  <?php if($this->session->userdata('level') == "mahasiswa"): ?> Mahasiswa
                  <?php else:?> Dosen
                  <?php endif; ?>
              </h4>

              <?php foreach($models as $row): ?>
              <form action="<?php echo site_url('profil/update/'.$this->session->userdata('nim'));?>" method="post" enctype="multipart/form-data">
                  <div class="form-group row">
                      <?php if($this->session->userdata('level') == "mahasiswa"): ?>
                        <label class="col-sm-2 col-form-label">NIM</label>
                      <?php else:?>
                        <label class="col-sm-2 col-form-label">NIK</label>
                      <?php endif; ?>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="NIM_TBUSER" value="<?php echo $row->NIM_TBUSER; ?>" readonly>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">NAMA</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="NAMA_TBUSER" value="<?php echo ucwords($row->NAMA_TBUSER); ?>" readonly>
                      </div>
                  </div>

                  <?php if($this->session->userdata('level') == "dosen"): ?>

                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">GELAR DEPAN<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="GELAR_DEPAN_TBUSER" value="<?php echo ucwords($row->GELAR_DEPAN_TBUSER); ?>">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">GELAR BELAKANG<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="GELAR_TBUSER" value="<?php echo ucwords($row->GELAR_TBUSER); ?>">
                      </div>
                  </div>

                  <?php else:?>

                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">KELAS<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <select name="KELAS_TBUSER" class="form-control">
                            <option value="">- Pilh -</option>
                            <option <?php if ($row->KELAS_TBUSER == 'pagi' ) echo 'selected' ; ?> value="pagi">Pagi</option>
                            <option <?php if ($row->KELAS_TBUSER  == 'sore' ) echo 'selected' ; ?> value="sore">Sore</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">JENIS KELAMIN<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <select name="JENISKELAMIN_TBUSER" class="form-control">
                            <option value="">- Pilh -</option>
                            <option <?php if ($row->JENISKELAMIN_TBUSER == 'laki-laki' ) echo 'selected' ; ?> value="laki-laki">Laki-Laki</option>
                            <option <?php if ($row->JENISKELAMIN_TBUSER  == 'perempuan' ) echo 'selected' ; ?> value="perempuan">Perempuan</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">NO HP / WA<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="NOTELP_TBUSER" value="<?php echo ucwords($row->NOTELP_TBUSER); ?>" placeholder="Isikan nomor yang aktif." onkeypress='validate(event)'>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">EMAIL<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="email" class="form-control" name="EMAIL_TBUSER" value="<?php echo ucwords($row->EMAIL_TBUSER); ?>" placeholder="Isikan email yang valid.">
                      </div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">FOTO<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <?php if($row->FOTO_TBUSER == ""): ?>
                          <input type="file" class="form-control" id="picture" name="picture">
                          <div class="col-form-label">Gunakan foto formal. Maksimal ukuran 500 KB, berekstensi .jpg / .png </div>
                          <div class="col-form-label">Foto anda sebagai acuan untuk pendaftaran praktikum selanjutnya dan penilaian dosen maupun asisten. </div>
                        <?php else:?>
                          <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                              <a href="<?php echo base_url('uploads/picture/'.$row->FOTO_TBUSER);?>" data-toggle="lightbox">
                                <img src="<?php echo base_url('uploads/picture/'.$row->FOTO_TBUSER);?>" class="img-fluid m-b-10" alt="">
                              </a> 
                          </div>
                          <div class="col-form-label">Pilih File foto lagi jika ingin merubah data profil kecuali foto.</div><br>
                          <input type="file" class="form-control" id="picture" name="picture">
                          <div class="col-form-label">Gunakan foto formal. Maksimal ukuran 500 KB, berekstensi .jpg / .png </div>
                          <div class="col-form-label">Foto anda sebagai acuan untuk pendaftaran praktikum selanjutnya dan penilaian dosen maupun asisten. </div>
                        <?php endif; ?>
                          <!-- <input type="text" class="form-control" value="<?php //echo ucwords($row->FOTO_TBUSER); ?>"> -->
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-grd-primary m-b-0">Simpan</button>
                      </div>
                  </div>
                  <?php endforeach; ?>
              </form>
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