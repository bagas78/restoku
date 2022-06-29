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
/* img .gambar{
   width: 350px;
   height: 350px;
   border-radius: 50%;
} */
</style>
<div class="content-wrapper">
  	<section class="content-header" style="padding: 0px 0px 0 0px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="">
          			<div class="box-header">
						<p style="font-size:28px; padding: 10px 0px 0 10px;">
							Edit Profile
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Profil</a></li>
							<li><a href="#">Edit Profile</a></li>
						</ol>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;"></div>
					</div>
				</div>
			</div>
		</div>
  	</section>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-6">
				<div class="box">
          			<div class="box-header">
						<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;"></div>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
											<div class="col-md-12">
												<div class="">
													<strong>Edit Data Pengguna</strong>
													<a href="<?php echo base_url('admin/profil');?>"><small class="pull-right text-right">Batal</small></a><hr><br>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<form action="<?php echo base_url('akun/proses_edit_sukses')?>" enctype="multipart/form-data" method="post">
											<table class="table" style="margin-top: -31px;">
												<tbody><br><br>
												<?php foreach ($abc as $a):?>
													<tr>
														<td>Nama</td>
														<td style="padding-bottom: 0px;">
															<input type="hidden" style="width:100%;" required="" name="id" value="<?php echo $a->id_admin ?>"/>
															<input class="form-control" type="text" name="name" value="<?php echo $a->name ?>" required="true">
														</td>
													</tr>
													<tr>
														<td>Nama Pengguna(login)</td>
														<td style="padding-bottom: 0px;">
															<input class="form-control" type="text" name="username" value="<?php echo $a->username ?>" required="true">
														</td>
													</tr>
													<tr>
														<td>Email</td>
														<td style="padding-bottom: 0px;">
															<input class="form-control" type="text" name="email" value="<?php echo $a->email ?>" required="true">
															<input class="form-control" type="hidden" name="status" value="<?php echo $a->status ?>" required="true">
															<input class="form-control" type="hidden" name="level" value="<?php echo $a->level ?>" required="true">
														</td>
													</tr>
													<tr>
														<td>Telepon</td>
														<td style="padding-bottom: 0px;">
															<input class="form-control" type="number" name="telepon" value="<?php echo $a->telepon ?>" required="true">
														</td>
													</tr>
													<tr>
														<td>Password Baru</td>
														<td style="padding-bottom: 0px;">
															<input id="password" class="form-control" type="password" name="newpassword" placeholder="******" title="Silahkan Kosongi jika tidak ingin mengganti password">
														</td>
													</tr>
													<tr>
														<td>Konfirmasi Password</td>
														<td style="padding-bottom: 0px;">
															<input id="password2" class="form-control" type="password" name="newpassword1" placeholder="******" title="Silahkan Kosongi jika tidak ingin mengganti password">
														</td>
													</tr>
													<tr>
														<td></td>
														<td style="padding-bottom: 0px;">
															<div class="form-group">
																<div id="warning" class="input-group" style="border:none;display: none;">
																	<span class="input-group-addon1" id="basic-addon4">
																	<i id="unmatch" style="color: #c7003d;display:none;" class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
																	<i id="match" class="fa fa-check match-icon" aria-hidden="true"></i>
																	<label class="red-color">
																		<small style="position:relative;top:3px;left:25px;" id="divCheckPasswordMatch"></small>
																	</label>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td><button class="btn btn-success pull-right" name="ok" type="submit"><small class="text-right">Simpan</small></button></td>
													</tr>
												</tbody>
												<div class="avatar-upload">
													<div class="avatar-edit">
														<input type='file' name="gambar" id="imageUpload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"></label>
													</div>
													<div class="avatar-preview">
														<div id="imagePreview" style="background-image: url(<?php echo base_url('images/admin/'.$a->gambar); ?>);">
														</div>
													</div>
												</div>
												<?php endforeach;?>
											</table>
										</form>
										<script>
											function readURL(input) {
												if (input.files && input.files[0]) {
													var reader = new FileReader();
													reader.onload = function(e) {
														$('#imagePreview').css('background-image', 'url('+e.target.result +')');
														$('#imagePreview').hide();
														$('#imagePreview').fadeIn(650);
													}
													reader.readAsDataURL(input.files[0]);
												}
											}
												$("#imageUpload").change(function() {
													readURL(this);
												});
										</script>
										<script type="text/javascript">
											var regx = /^[A-Za-z0-9]+$/;
											$(document).ready(function () {
												$('#warning').hide();
												$("#password").keyup(checkPasswordMatch);
												$("#password2").keyup(checkPasswordMatch);
												$("#username").keyup(usernameChecker);
											});

											function usernameChecker() {
												if (regx.test($("#username").val())) {
													$(':input[type="submit"]').prop('disabled', false);
													$('#warningUsername').hide();
												} else {
													$(':input[type="submit"]').prop('disabled', true);
													$('#warningUsername').show();
												}
											}

											function checkPasswordMatch() {
												var password = $("#password").val();
												var confirmPassword = $("#password2").val();

												if (password != confirmPassword) {
													$('#unmatch').show();
													$('#match').hide();
													$('#warning').show();
													$("#divCheckPasswordMatch").html("Password masukkan 2x yang sesuai!");
													$(':input[type="submit"]').prop('disabled', true);
												} else {
													$('#match').show();
													$('#unmatch').hide();
													$('#warning').show();
													$("#divCheckPasswordMatch").html("Passwords match.");
													$(':input[type="submit"]').prop('disabled', false);
												}
											}

										</script>
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
