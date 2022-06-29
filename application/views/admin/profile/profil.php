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
img {
   width: 350px;
   height: 350px;
   border-radius: 50%;
}
</style>
<div class="content-wrapper">
  <section class="content-header" style="padding: 0px 0px 0 0px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="">
          <div class="box-header">
						<p style="font-size:28px; padding: 10px 0px 0 10px; font-family:roboto;">
							Profile
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Akun</a></li>
							<li><a href="#">Profil</a></li>
						</ol>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;"></div>
					</div>
				</div>
			</div>
		</div>
  	</section>
  	<section class="content">
   		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="box">
						<div class="box-header">
							<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;"></div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div><?php  echo $this->session->flashdata('message_akun'); ?></div>
									<div class="">
										<center><strong><span style="font-size:20px;font-weight:normal; font-family:roboto;">Profile </span><label style="text-transform: uppercase;" class="red-color"></label></strong></center>
										<hr>
									</div>
									<?php foreach ($profil as $a):?>
									<center><img src="<?php echo base_url('images/admin/'.$a->gambar) ?>" style="width:150px;height:150px;" class="user-image" alt="User Image"></center><br>
									<a href="<?php echo base_url('akun/edit_akun/'.$a->id_admin) ?>"><button class="pull-right text-right" style="font-family:roboto; margin-right:5%; margin-top:-10%; border-radius:10%; size:14px;"><font color="blue"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Profile</font></button></a>
									<br><br>				
									<div class="app-right-section">
										<div class="app-info">
											<div class="form-suggestion text-center">
												<div class="card-body">
													<table class="table" style="margin-top: -31px; font-family:roboto;">
														<tr>
															<td>Nama</td>
															<td>
																<strong class="red-color"><?php echo $a->name ?> </strong>
															</td>
														</tr>
														<tr>
															<td>Username</td>
															<td><?php echo $a->username ?></td>
														</tr>
														<tr>
															<td>Telepon</td>
															<td><?php echo $a->telepon ?></td>
														</tr>
														<tr>
															<td>Email</td>
															<td><?php echo $a->email?></td>
														</tr>
														<tr>
															<td>Status Admin</td>
															<td>
																<?php if($a->status=1){ ?>
																	<span class='label label-success'>Aktif</span>
																<?php } else { ?>
																	<span class='label label-primary'>Non-Aktif</span>
																<?php } ?>
															</td>
														</tr>
													<?php endforeach;?>
														<tr>
															<td>Password</td>
															<td>
																******
															</td>
														</tr>				
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		
		</div>
	</section>
</div>
