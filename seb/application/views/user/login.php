<div class="login-box">
   <div class="login-logo">
      <img src="<?php echo base_url(); ?>assets/img/logo_seb.jpg">
      <a href="<?php echo base_url();?>"><b>SINAR ERA BOX</b></a>
   </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if(validation_errors()): ?>
      <div class="panel-body">
        <div class="alert alert-danger">
          <?php echo validation_errors(); ?>
        </div>
      </div>
      <?php endif;?>
      <form action="<?php echo site_url('user/login');?>" method="post">
         <div class="form-group has-feedback">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?php echo set_value('username');?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
         </div>
         <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div>
         <div class="row">
            <div class="col-xs-8">
               <div class="checkbox icheck">
                  <label>
                  <input type="checkbox"> Remember Me
                  </label>
               </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
         </div>
      </form>

      <a href="register.html" class="text-center">Register a new membership</a>
   </div>
   <!-- /.login-box-body -->
</div>
<!-- /.login-box -->