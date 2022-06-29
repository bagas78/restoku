<style>
.alert {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
<div class="content-wrapper">
  	<section class="content-header" style="padding: 0px 0px 0 0px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="">
          			<div class="box-header">
						<p style="font-size:28px; padding: 10px 0px 0 10px;">
							Data Pengguna
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Akun</a></li>
							<li><a href="#">Data Pengguna</a></li>
						</ol>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Daftar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
				<div class="box">
          			<div class="box-header">
            			<h3 class="box-title">Data Pengguna</h3>
						<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Daftar</button>
						</div>
          			</div>
					<div><?php  echo $this->session->flashdata('message_akun'); ?></div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<table id="example" class="table table-striped table-bordered">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 3%;">No</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%; height:30%;">Gambar</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 9%;">Nama</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 14%;">Nama&nbsp;Pengguna(login)</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 13%;">Email</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 12%;">Telepon</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 10%;">Status</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 10%;">Level</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 14%;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = $this->uri->segment('3') + 1; ?>
										<?php foreach($level as $data) : ?>
										<tr role="row" class="even">
											<td><center><?=$no++;?></center></td>
											<td> <img src="<?php echo base_url('images/admin/'.$data->gambar); ?>" alt="" style="height=70%; width:100%;"/></td>
											<td><?php echo $data->name; ?></td>
											<td><?php echo $data->username; ?></td>
											<td><?php echo $data->email; ?></td>
											<td><?php echo $data->telepon; ?></td>
											<td>
												<center>
												<?php if($data->status == 1){ ?>
													<span class='label label-success'>Aktif</span>
												<?php } else { ?>
													<span class='label label-danger'>Non-Aktif</span>
												<?php } ?>
												</center>
											</td>
											<td>
												<center>
												<?php if($data->level == 1){ ?>
													<span class='label label-success'>Super Admin</span>
												<?php } else { ?>
													<span class='label label-primary'>Admin</span>
												<?php } ?>
												</center>
											</td>
											<td>
												<a href="<?php echo base_url('administrator/edit/'.$data->id_admin); ?>">
													<i class="fa fa-pencil" title="Edit" style="color:#99CC00; float:left; margin-left:10px;"></i>
												</a>
												<?php
													$hapus = array(
														'class' => 'fa fa-trash',
												     	'title' => 'Hapus',
														'style' => 'color:#99CC00; float:right; margin-right:10px;',
														'onclick' => 'javascript: return confirm(\'Anda yakin menghapus akun ' . $data->name . '?\')'
													);
													echo anchor(site_url('administrator/hapus/' . $data->id_admin), ' ', $hapus);
												?>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal modal-default fade" id="modal-success" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Masukan Data Administrator(Pengguna)</h4>
				</div>
				<div class="modal-body">
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
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
