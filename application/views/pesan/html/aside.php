<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li>
				<a href="<?php echo base_url("pesan") ?>">
					<i class="glyphicon glyphicon-cutlery"></i> <span>Makanan</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url("pesan/minuman") ?>">
					<i class="fa fa-coffee"></i> <span>Minuman</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url("pesan/snack") ?>">
					<i class="glyphicon glyphicon-bed"></i> <span>Snack</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url("TransaksiUser") ?>">
					<i class="fa fa-shopping-cart"></i> <span>Order</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="cart1" style="font-size:14px; margin-left: 100px; background: #99CC00; padding-right: 10px;padding-left: 4px;border-radius: 10px; color: #fff;">
										<?php 
										$nol = 0;
										if(!isset($_SESSION['cart']))
										{
											echo $nol;
										} else {
											echo count($_SESSION['cart']);
										} ?>
										</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url("TransaksiUser/laporan") ?>">
					<i class="fa fa-database"></i> <span>Laporan Order</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url("pesan/logout_user") ?>">
					<i class="fa fa-sign-out"></i> <span>Logout</span>
				</a>
			</li>
		</ul>
	</section>
    <!-- /.sidebar -->
</aside>
