<div class="content-wrapper">
  	<section class="content-header" style="padding: 0px 0px 0 0px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="">
          			<div class="box-header">
						<p style="font-size:28px; padding: 10px 0px 0 10px;">
							Edit Data Menu Snack
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Snack</a></li>
							<li><a href="#">Edit Data</a></li>
						</ol>
						<div style="color:#FF0000;"> 
							<?php echo $this->session->userdata('message'); ?>
						</div>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;">
							<a href="<?php echo base_url('admin/makanan'); ?>">
								<button type="button" class="button btn-success button4" >Kembali</button>
							</a>
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
            			<h3 class="box-title">Edit Data Snack</h3>
						<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success">Tambah Data</button>
						</div>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12"><br>
								<?php echo form_open_multipart('insertdata/update_snack'); ?>
									<label>Nama Snack</label><br>
										<input type="hidden" style="width:100%;" required="" name="id" value="<?php echo $edit->id_menu ?>""/>
										<input type="text" name="nama" style="width:100%;" required="" value="<?php echo $edit->nama_menu; ?>"/><br><br>
										<label>Kategori</label><br>
										<select class="form-control" name="Kategori" required="" style="height:35px;">
										<?php foreach($kategori as $l){ 
												 if($edit->id_kategori==$l['id_kategori']){ ?>
													<option value="<?php echo $l['id_kategori']; ?>" selected>  <?php echo $l['nama_kategori']; ?>  </option>
												<?php }else{ ?>
													<option value="<?php echo $l['id_kategori']; ?>">  <?php echo $l['nama_kategori']; ?>  </option>
													<?php } ?>
											<?php } ?>
										</select><br>
									<label>Selera</label><br>
										<select class="form-control" name="selera" required="" style="height:35px;">
										<?php foreach($selera as $l){ 
												 if($edit->id_selera==$l['id_selera']){ ?>
													<option value="<?php echo $l['id_selera']; ?>" selected>  <?php echo $l['selera']; ?>  </option>
												<?php }else{ ?>
													<option value="<?php echo $l['id_selera']; ?>">  <?php echo $l['selera']; ?>  </option>
													<?php } ?>
											<?php } ?>
										</select><br>
									<label>Harga</label><br>
										<input type="number" style="width:100%;" required="" value="<?php echo $edit->harga; ?>" name="harga"/><br><br>
									<label>Stok Snack</label><br>
										<input type="number" style="width:100%;" required="" value="<?php echo $edit->stok_menu; ?>" name="stok"/><br><br>
									<div class="form-group">
										<label>Gambar Snack</label>
										<div class="avatar-upload1">
											<div class="avatar-preview1">
												<div id="imagePreview" style="background-image: url(<?php echo base_url('images/'.$edit->gambar); ?>);">
												</div>
											</div>
											<div class="avatar-edit1">
												<input type='file' name="gambar" id="imageUpload" accept=".png, .jpg, .jpeg" />
												<label for="imageUpload"></label>
											</div>
										</div>
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
									</div>
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
