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
