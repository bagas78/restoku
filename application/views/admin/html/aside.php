<aside class="main-sidebar">
  <section class="sidebar">
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
          <span class="pull-right-container" id="liHolder1">
            <!-- <small class="label pull-right bg-green">new</small> -->
          </span>
        </a>
			</li>
			<script type="text/javascript">
				$(document).ready(function(){
					refreshLi();
				});
				function refreshLi(){
					$('#liHolder1').load('<?php echo base_url("admin/html");?>', function(){
						setTimeout(refreshLi, 100);
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
