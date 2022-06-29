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
							Data Menu Snack
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Snack</a></li>
						</ol>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </section>
	  <div style="color:red"> 
							<?php echo $this->session->userdata('message'); ?>
						</div>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
				<div class="box">
          			<div class="box-header">
            			<h3 class="box-title">Data Snack</h3>
						<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
						</div>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<table id="example" class="table table-striped table-bordered">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 3%;">No</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%; height:30%;">Gambar</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 20%;">Nama</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 15%;">Harga</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 15%;">Stok / Status</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 8%;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = $this->uri->segment('3') + 1; ?>
										<?php foreach($images as $data) : ?>
										<tr role="row" class="even">
											<td><center><?=$no++;?></center></td>
											<td> <img src="<?php echo base_url('images/'.$data->gambar); ?>" alt="" style="height=70%; width:100%;"/></td>
											<td><?php echo $data->nama_menu; ?></td>
											<td><?php echo $data->harga; ?></td>
											<td><?php echo $data->stok_menu; ?></td>
											<td>
												<a href="<?php echo base_url('insertdata/edit_snack/'.$data->id_menu); ?>">
													<i class="fa fa-pencil" title="Edit" style="color:#99CC00; float:left; margin-left:10px;"></i>
												</a>
												<?php
													$hapus = array(
														'class' => 'fa fa-trash',
														'title' => 'Hapus',
														'style' => 'color:#99CC00; float:right; margin-right:10px;',
														'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $data->nama_menu . '?\')'
													);
													echo anchor(site_url('Insertdata/hapus_snack/' . $data->id_menu), ' ', $hapus);
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
					<h4 class="modal-title">Masukan Data Snack</h4>
				</div>
				<div class="modal-body">
				<?php echo form_open_multipart('insertdata/tambah_aksi_snack'); ?>
					<label>Nama Snack</label><br>
					<input type="text" name="nama" style="width:100%;" required=""/><br><br>
					<label>Kategori</label><br>
						<select class="form-control" name="kategori" required="" style="height:35px;">
							<option>---Pilih Kategori---</option>
							<?php foreach($kategori as $l){ ?>
								<option value="<?php echo $l['id_kategori']; ?>"><?php echo $l['nama_kategori']; ?>   </option>
							<?php } ?>
						</select><br>
					<label>Selera</label><br>
						<select class="form-control" name="selera" required="" style="height:35px;">
							<option>---Pilih Selera---</option>
							<?php foreach($selera as $l){ ?>
								<option value="<?php echo $l['id_selera']; ?>"><?php echo $l['selera']; ?>   </option>
							<?php } ?>
						</select><br>
					<label>Harga</label><br>
					<input type="number" style="width:100%;" required="" name="harga"/><br><br>
					<label>Stok</label><br>
					<input type="number" style="width:100%;" required="" name="stok"/><br><br>
						<div class="form-group">
							<label>Gambar Makanan</label>
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
						</div>																		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
