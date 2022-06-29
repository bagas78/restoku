<div class="content-wrapper">
  	<section class="content-header" style="padding: 0px 0px 0 0px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="">
          			<div class="box-header">
						<p style="font-size:28px; padding: 10px 0px 0 10px;">
							Edit Data Administrator
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Administrator</a></li>
							<li><a href="#">Edit Data Administrator</a></li>
						</ol>
						<div style="color:#FF0000;"> 
							<?php echo $this->session->userdata('message'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</section>
	<section class="content">
    	<div class="row">
			<div class="col-xs-9">
				<div class="box">
          			<div class="box-header">
            			<h3 class="box-title">Edit Data Administrator</h3>
						<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success">Tambah Data</button>
						</div>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12"><br>
								<?php echo form_open_multipart('administrator/update'); ?>
									<label>Nama</label><br>
										<input type="hidden" style="width:100%;" required="" name="id" value="<?php echo $edit->id_admin ?>""/>
										<input type="text" name="nama" style="width:100%;" required="" value="<?php echo $edit->name; ?>"/><br><br>
									<label>Nama Pengguna(login)</label><br>
										<input type="text" name="username" style="width:100%;" required="" value="<?php echo $edit->username; ?>"/><br><br>
									<label>Email</label><br>
										<input type="text" name="email" style="width:100%;" required="" value="<?php echo $edit->email; ?>"/><br><br>
									<label>Telepon</label><br>
										<input type="text" name="telepon" style="width:100%;" required="" value="<?php echo $edit->telepon; ?>"/><br><br>
									<label>Status</label><br>
										<select class="form-control" name="status" required="" style="height:35px;">
											<?php if($edit->status == 1) { ?>
												<option value="1"> Aktif </option>
											<?php } else { ?>
												<option value="0"> Non-Aktif</option>
											<?php } ?>
											<option value="1"> Aktif </option>
											<option value="0"> Non-Aktif </option>
										</select><br>
									<label>Level</label><br>
										<select class="form-control" name="level" required="" style="height:35px;">
											<?php if($edit->level == 1) { ?>
												<option value="1"> Super Admin </option>
											<?php } else { ?>
												<option value="0"> Admin </option>
											<?php } ?>
											<option value="1"> Super Admin </option>
											<option value="0"> Admin </option>
										</select><br>
									</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
									<input type="submit" class="btn btn-primary" value="Simpan">
								</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
