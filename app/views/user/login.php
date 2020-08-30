        <br><br><br><br><br>
  <div>
      <!--<p>PROSES PEREKRUTAN TENAGA KEPERAWATAN MENGGUNAKAN PENGGABUNGAN METODE SIMPLE ADDITIVE WEIGHTING (SAW) DAN TECHNIQUE FOR ORDER PREFERENCE BY SIMILARITY TO IDEAL SOLUTION (TOPSIS)</p>-->
      <div>
        <img src="<?php echo base_url();?>assets/all-in/images/Untitled-3---Copy.jpg" style="width:300px;"/>
      </div><br>
      <p><strong>LOGIN TO YOUR ACCOUNT</strong></p>
      <?php if(validation_errors()): ?>
      <script>
          $(document).ready(function() {
            toastr.options = {
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                showMethod: 'slideDown',
                rtl: false,
                preventDuplicates: false,
                onclick: null,
                showDuration: 300,
                hideDuration: 1000,
                timeOut: 4000,
                extendedTimeOut: 1000
            };
            toastr.error("NIM/Password Salah", 'Gagal');
          });
      </script>
     <?php endif;?>
      <form class="m-t" role="form" action="<?php echo site_url('user/login');?>" method="post">
        <div class="form-group">
           <input type="text" class="form-control" placeholder="NIM" id="username" name="username" value="<?php echo set_value('username');?>">
        </div>
        <div class="form-group">
           <input type="password" class="form-control" id="password" placeholder="PASSWORD" name="password">
        </div>
        <button type="submit" class="btn btn-success block full-width m-b">Login</button>
      </form>
        <a class="btn btn-sm btn-danger btn-block" href="<?php echo site_url('beranda');?>">Batal</a>
        <hr>
        <p class="text-muted text-center"><small>Belum punya akun ?</small></p>
        <a class="btn btn-sm btn-default btn-block" href="">Daftar Akun Baru</a>

      <div class="d-flex justify-content-between">
        <div>
          <small>Created, designed & developed by</small><!-- <small>Create by <a href="#" target="_blank">INFORMATIKA UBHARA COMMUNITY </a>&copy; 2018.</small> -->
        </div>
        <div>
          <small><a href="#"><?php echo CDD ?></a> &copy; 2018-<?php echo date('Y') ?></small><!-- <small>Design & Developed By:<a href="#"> IUC_Vienzz</a></small> -->
        </div>
        <div>
          <small>Halaman dimuat dalam <strong>{elapsed_time}</strong> detik.</small>
        </div>
      </div>
  </div>
