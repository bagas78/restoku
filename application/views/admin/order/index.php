<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="10; URL=<?php echo base_url('order') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Restoku</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/Ionicons/css/ionicons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/skins/_all-skins.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/morris.js/morris.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style>
		.button {
				background-color: #99CC00;
				border: none;
				color: white;
				padding-top: 8px;
			padding-bottom: 8px;
			padding-right:15px;
			padding-left:15px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 14px;
				margin: 4px 2px;
		}

		.button1 {border-radius: 2px;}
		.button2 {border-radius: 4px;}
		.button3 {border-radius: 8px;}
		.button4 {border-radius: 12px;}
		.button5 {border-radius: 10%;}

		#image-preview {
			height: 200px;
			width: 300px;
			position: relative;
			overflow: hidden;
			background-color: #ffffff;
			color: #ecf0f1;
		}
		#image-preview input {
			line-height: 200px;
			font-size: 200px;
			position: absolute;
			opacity: 0;
			z-index: 10;
		}
		#image-preview label {
			position: absolute;
			z-index: 5;
			opacity: 0.8;
			cursor: pointer;
			background-color: #bdc3c7;
			width: 200px;
			height: 50px;
			font-size: 20px;
			line-height: 50px;
			text-transform: uppercase;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			text-align: center;
		}
		#image-preview1{
    		display:none;
			width : 250px;
			height : 300px;
		}
	</style>
	<style>
					
		h1 {
		font-size: 20px;
		text-align: center;
		margin: 20px 0 20px;
		}
		h1 small {
		display: block;
		font-size: 15px;
		padding-top: 8px;
		color: gray;
		}
		.avatar-upload {
		position: relative;
		max-width: 205px;
		margin: 50px auto;
		}
		.avatar-upload .avatar-edit {
		position: absolute;
		right: 12px;
		z-index: 1;
		top: 10px;
		}
		.avatar-upload .avatar-edit input {
		display: none;
		}
		.avatar-upload .avatar-edit input + label {
		display: inline-block;
		width: 34px;
		height: 34px;
		margin-bottom: 0;
		border-radius: 100%;
		background: #FFFFFF;
		border: 1px solid transparent;
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
		cursor: pointer;
		font-weight: normal;
		transition: all 0.2s ease-in-out;
		}
		.avatar-upload .avatar-edit input + label:hover {
		background: #f1f1f1;
		border-color: #d6d6d6;
		}
		.avatar-upload .avatar-edit input + label:after {
		content: "\f040";
		font-family: 'FontAwesome';
		color: #757575;
		position: absolute;
		top: 10px;
		left: 0;
		right: 0;
		text-align: center;
		margin: auto;
		}
		.avatar-upload .avatar-preview {
		width: 192px;
		height: 192px;
		position: relative;
		border-radius: 100%;
		border: 6px solid #F8F8F8;
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
		}
		.avatar-upload .avatar-preview > div {
		width: 100%;
		height: 100%;
		border-radius: 100%;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		}
		.avatar-upload1 .avatar-preview1 {
		width: 192px;
		height: 192px;
		position: relative;
		border: 6px solid #F8F8F8;
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
		}
		.avatar-upload1 .avatar-preview1 > div {
		width: 100%;
		height: 100%;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		}
		.avatar-upload1 {
		position: relative;
		max-width: 205px;
		/* margin: 50px auto; */
		}
		</style>
	<script src="<?php echo base_url('asset/new/js/jquery.min.js')?>" charset="utf-8"></script>
	<script>
		$(function() {
			$('.sidebar-menu a[href~="' + location.href + '"]').parents('li').addClass('active');
		});
	</script>
	<script>
	$.widget.bridge('uibutton', $.ui.button);
	</script>
	<script src="<?php echo base_url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('asset/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/raphael/raphael.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/morris.js/morris.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
	<script src="<?php echo base_url('asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
	<script src="<?php echo base_url('asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
	
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo" style="background-color:#99CC00;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>P</b>DS</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url('asset/image/logo.jpg')?>" width="160" style="padding: 5%; margin-top: -7px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#99CC00;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background-color: #99CC00;">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php foreach ($profil as $a) : ?>
							<img src="<?php echo base_url('images/admin/'.$a->gambar); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style="color:#FFFFFF;"><?php echo $a->name; ?></span>
            <?php endforeach;?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background-color: #99CC00;">
			  	<img src="<?php echo base_url('asset/image/logo.jpg')?>" style="width: 100%;">
                <p style="color:#FFFFFF;">
					<?php echo $this->session->userdata('name'); ?>
                  <small style="color:#FFFFFF;">Member since <?php echo date('Y-m-d');?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('admin/profil')?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('admin/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
	<aside class="main-sidebar">
  <section class="sidebar">
  	<!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="<?php echo base_url("admin") ?>">
          <i class="fa fa-home"></i> <span>Beranda</span>
        </a>
      </li>
			<li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo base_url("admin/makanan") ?>"><i class="fa fa-circle-o"></i> Makanan</a></li>
            <li><a href="<?php echo base_url("admin/minuman") ?>"><i class="fa fa-circle-o"></i> Minuman</a></li>
            <li><a href="<?php echo base_url("admin/snack") ?>"><i class="fa fa-circle-o"></i> Snack</a></li>
            <li><a href="<?php echo base_url("jenis_makanan") ?>"><i class="fa fa-circle-o"></i> Jenis Makanan</a></li>
            <li><a href="<?php echo base_url("meja") ?>"><i class="fa fa-circle-o"></i> Meja</a></li>
            <li><a href="<?php echo base_url("selera") ?>"><i class="fa fa-circle-o"></i> Selera</a></li>
            <li><a href="<?php echo base_url("selera/rasa") ?>"><i class="fa fa-circle-o"></i> Rasa</a></li>
          </ul>
        </li>
				<li>
        <a href="<?php echo base_url("order") ?>">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Order Baru</span>
          <span class="pull-right-container" id="liHolder">
            <!-- <small class="label pull-right bg-green">new</small> -->
          </span>
        </a>
			</li>
			<script type="text/javascript">
				$(document).ready(function(){
					refreshLi();
				});
				function refreshLi(){
					$('#liHolder').load('<?php echo base_url("admin/html");?>', function(){
						setTimeout(refreshLi, 1000);
					});
				}
			</script>
			<li>
        <a href="<?php echo base_url('order/orderProses');?>">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Order Proses</span>
          <span class="pull-right-container" id="liHolderorder">
            <!-- <small class="label pull-right bg-green">new</small> -->
          </span>
        </a>
			</li>
			<script type="text/javascript">
				$(document).ready(function(){
					refreshLiorder();
				});
				function refreshLiorder(){
					$('#liHolderorder').load('<?php echo base_url("admin/htmlorder");?>', function(){
						setTimeout(refreshLiorder, 1000);
					});
				}
			</script>
			<li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo base_url('laporan');?>"><i class="fa fa-circle-o"></i> Laporan Pendapatan</a></li>
            <li><a href="<?php echo base_url('laporan/menu');?>"><i class="fa fa-circle-o"></i> Laporan Menu</a></li>
          </ul>
        </li>
			<li>
        <a href="<?php echo base_url('grafik');?>">
				<i class="fa fa-pie-chart" aria-hidden="true"></i> <span>Grafik</span>
        </a>
			</li>
        <?php 
          $level=$this->session->userdata('level');
          if($level == 1) {
            echo "<li><a href=".base_url('administrator')."><i class='fa fa-user'></i> <span>Data Pengguna</span></a></li>";
          } else {
            echo "<li><a href=".base_url('admin/profil')."><i class='fa fa-user'></i> <span>Profil</span></a></li>";
          }
          ?>
					
				<li>
        <a href="<?php echo base_url("admin/logout") ?>">
          <i class="fa fa-sign-out"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<style>
.button {
    background-color: #99CC00;
    border: none;
    color: white;
    padding-top: 8px;
	padding-bottom: 8px;
	padding-right:15px;
	padding-left:15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
}

.button1 {border-radius: 2px;}
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;}
.button4 {border-radius: 12px;}
.button5 {border-radius: 10%;}
</style>
<div class="content-wrapper">
  	<section class="content-header" style="padding: 0px 0px 0 0px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="">
          			<div class="box-header">
						<p style="font-size:28px; padding: 10px 0px 0 10px;">
							Data Order
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Order</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	  </section>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
				<div class="box">
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<table id="example" class="table table-striped table-bordered">
									<thead>
										<tr role="row">
                                            <!-- <th>No</th>
                                            <th>Transaksi</th> -->
                                            <th>No.Transaksi</th>
                                            <th>Meja</th>
                                            <th>Pembeli</th>
                                            <th>Jam</th>
                                            <th>Aksi</th>
                                            <th>Proses</th>
                                        </tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
var manageTable;
var base_url = "<?php echo base_url(); ?>";
$(document).ready(function() {

// initialize the datatable
    manageTable = $('#example').DataTable({
        'ajax': '<?php echo base_url('order/fetchTransaksi') ?>',
        'order': [],
        dom: 'Bfrtip'
    });
}); 
</script>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script> -->

<script src="<?php echo base_url('asset/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/moment/min/moment.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
	<script src="<?php echo base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/fastclick/lib/fastclick.js')?>"></script>
	<script src="<?php echo base_url('asset/dist/js/adminlte.min.js')?>"></script>
	<script src="<?php echo base_url('asset/dist/js/pages/dashboard.js')?>"></script>
	<script src="<?php echo base_url('asset/dist/js/demo.js')?>"></script>

</body>
</html>
