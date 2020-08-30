<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <title>Sinar Era Box</title>
		<?php if($this->session->userdata('level') == "user"): ?>
        <meta http-equiv="refresh" content="30"/>
		<?php endif; ?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>assets/css/file_input.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap datepicker -->
  		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.min.css">
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABLES -->
        <link href="<?php echo base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
        <link href="<?php echo base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Calender style -->
        <link href="<?php echo base_url();?>assets/css/fullcalendar.css" rel="stylesheet" type="text/css" />
	    <!-- Toastr style -->
	    <link href="<?php echo base_url();?>assets/css/toastr/toastr.min.css" rel="stylesheet">
	    <!-- Logo -->
	    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo_seb.jpg" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url();?>assets/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="<?php echo base_url();?>assets/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
    </head>
	<body class="skin-blue">
	
	<header class="header">
		
		<?php echo $navbar; ?>
		
	</header>
	
	<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url();?>assets/img/avatar3.png" class="img-circle" alt="User Image" />
					</div>
					<?php if($this->session->userdata('level') == "admin"): ?>
					<div class="pull-left info">
						<p>Admin</p>

						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
					<?php endif; ?>
					<?php if($this->session->userdata('level') == "user"): ?>
					<div class="pull-left info">
						<p>User</p>

						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
					<?php endif; ?>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search..." />
						<span class="input-group-btn">
									<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
								</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="active">
						<a href="<?php echo base_url(); ?>">
							<i class="fa fa-home"></i> <span>Dashboard</span>
						</a>
					</li>
					<li class="active">
						<a href="<?php echo site_url('adi');?>">
							<i class="fa fa-paperclip"></i> <span>Mixing Bahan Baku</span>
						</a>
					</li>

					<li class="active">
						<a href="<?php echo site_url('Dani_HPProduksi');?>">
							<i class="fa fa-tags"></i> <span>HPP</span>
						</a>
					</li>

					<li class="active">
						<a href="<?php echo site_url('Kharis');?>">
							<i class="fa fa-list-alt"></i> <span>Biaya Produksi</span>
						</a>
					</li>
					<li class="active">
						<a href="<?php echo site_url('Dwiki');?>">
							<i class="fa fa-list"></i> <span>Stok Bahan Baku</span>
						</a>
					</li>
					<li class="active">
						<a href="<?php echo site_url('Dimas');?>">
							<i class="fa fa-list"></i> <span>Stok Produksi</span>
						</a>
					</li>
					<li class="active">
						<a href="<?php echo site_url('Grafik');?>">
							<i class="fa fa-bar-chart-o"></i> <span>Grafik</span>
						</a>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
		
			<?php echo $contents; ?>
		
		</aside>
		<!-- /.right-side -->
	</div>
	<!-- ./wrapper -->
        
		<!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- bootstrap datepicker -->
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		<!-- File input javascript -->
		<script src="<?php echo base_url();?>assets/js/file_input.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url();?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/charts/Chart.bundle.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/charts/utils.js" type="text/javascript"></script>
	    <!-- Toastr -->
	    <script src="<?php echo base_url();?>assets/js/toastr/toastr.min.js"></script>
	      

        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
            } );

             $(document).ready(function(){
                $.fn.datepicker.defaults.format = "dd-mm-yyyy";
                $('#Date').datepicker({
				    autoclose: true,
				    todayHighlight: true,
				    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
				}).datepicker('setDate', new Date());

				$('#Date2').datepicker({
				    autoclose: true,
				    todayHighlight: true,
				    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
				});
            });

              
          </script>
		
    </body>
</html>