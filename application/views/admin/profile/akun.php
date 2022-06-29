<style>
	.input-group .input-group-addon1 {
    font-size: 1em;
    width: auto;
    border: 0;
    background-color: transparent;
    width: 40px;
    text-align: center;
}
	.match-icon {
    display: none;
    position: relative;
    top: 3px;
    left: 15px;
    color: #c7003d;
}
.red-color {
    color: rgba(199,0,61,.75);
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
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
							Register Admin
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Akun</a></li>
						</ol>
						<div style="color:red"> 
							<?php echo $this->session->userdata('message'); ?>
						</div>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;">
						</div>
					</div>
				</div>
			</div>
		</div>
  	</section>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-7">
				<div class="box">
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
							<div class="app-form">
									<div class="form-suggestion text-center">
										<h3 class="text-center mtop-0">Register</h3>
										<small class="text-center">Daftar akun Pawon Ndeso</small>
									</div>
									<div style="color:red"> 
										<?php echo $this->session->userdata('message'); ?>
									</div>
										<?php echo form_open_multipart('akun/signup'); ?>
										<div class="form-group">
											<label>Nama Lengkap</label>
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon1">
												<i style="color: #c7003d;" class="fa fa-user" aria-hidden="true"></i></span>
												<input type="text" class="form-control" required="true" placeholder="Nama" name="name" aria-describedby="basic-addon1">
											</div>
										</div>
										<div class="form-group">
											<label>Nama Pengguna (digunakan untuk login)</label>
											<div style="color:red"> 
												<?php echo $this->session->userdata('message_username'); ?>
											</div>
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon2">
												<i style="color: #c7003d;" class="fa fa-user" aria-hidden="true"></i></span>
												<input type="text" id="username" class="form-control" min="5" required="true" placeholder="Username" name="username" aria-describedby="basic-addon2">
											</div>
											<div class="form-group" id="warningUsername" style="display: none;">
												<div class="input-group" style="border:none;">
													<span class="input-group-addon" id="basic-addon4">
													<i id="unmatch" style="color: #c7003d;" class="fa fa-exclamation-triangle" aria-hidden="true"></i> Username hanya huruf dan angka tanpa spasi</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Email Valid</label>
											<div style="color:red"> 
												<?php echo $this->session->userdata('message_email'); ?>
											</div>
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon2">
												<i style="color: #c7003d;" class="fa fa-envelope" aria-hidden="true"></i></span>
												<input type="email" name="email" class="form-control" min="5" required="true" placeholder="Email" aria-describedby="basic-addon2">
											</div>
										</div>
										<div class="form-group">
											<label>Nomor HP Valid</label>
											<div style="color:red"> 
												<?php echo $this->session->userdata('message_telepon'); ?>
											</div>
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon2">
												<i style="color: #c7003d;" class="fa fa-phone" aria-hidden="true"></i></span>
												<input type="text" name="telepon" class="form-control" min="5" required="true" placeholder="Phone" aria-describedby="basic-addon2">
												<input type="hidden" name="status" class="form-control" min="5" required="true" value="1" placeholder="Phone" aria-describedby="basic-addon2">
												<input type="hidden" name="level" class="form-control" min="5" required="true" value="0" placeholder="Phone" aria-describedby="basic-addon2">
											</div>
										</div>
										<div class="form-group">
											<label>Password</label>
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon3">
												<i style="color: #c7003d;" class="fa fa-key" aria-hidden="true"></i></span>
												<input id="password" type="password" name="password" class="form-control" required="true" pattern=".{6,}" title="Password minimal 6 karakter" placeholder="Password" aria-describedby="basic-addon3">
											</div>
										</div>
										<div class="form-group">
											<label>Ulangi Password</label>
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon4">
												<i style="color: #c7003d;" class="fa fa-key" aria-hidden="true"></i></span>
												<input id="password2" type="password" name="password2" class="form-control" required="true" pattern=".{6,}" title="Password minimal 6 karakter" placeholder="Confirm Password" aria-describedby="basic-addon4">
											</div>
										</div>
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
										<div class="form-group">
											<label>Foto</label>
											<img id="image-preview1" src="" style="width:150px;height:150px;">
											<input type="file" id="image-source" name="gambar" onchange="previewImage();" style="margin-top: 10px;"/>
											<script>
												function previewImage() {
													document.getElementById("image-preview1").style.display = "block";
													var oFReader = new FileReader();
													oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

													oFReader.onload = function(oFREvent) {
														document.getElementById("image-preview1").src = oFREvent.target.result;
													};
													};
											</script>
										</div><br><br>
										<div class="text-center">
											<input type="submit" style="width:100%;" class="btn btn-success btn-submit" value="Register">
										</div><br>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
