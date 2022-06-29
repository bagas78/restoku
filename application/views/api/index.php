<!-- <<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css">
	<script src="main.js"></script>
</head>
<body>
		<?php echo form_open_multipart('api/camera/upload/'); ?>
						<div class="form-group">
							<label>Gambar Makanan</label>
							<img id="image-preview1" src="" style="width:150px;height:150px;">
           					 <input type="file" id="image-source" name="berkas" onchange="previewImage();" style="margin-top: 10px;"/> 
           					  <input type="file" name="gambar" style="margin-top: 10px;"/>
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
						<button type="submit" class="btn btn-default" data-dismiss="modal">Simpan</button>
					</div>
				</form>
</body>
</html>
 -->

 <html>
<head>
	<title>malasngoding.com</title>
</head>
<body>
	<center><h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1></center>

	<?php echo form_open_multipart('api/camera/upload');?>

	<input type="file" name="berkas" />

	<br /><br />

	<input type="submit" value="upload" />

</form>

</body>
</html>