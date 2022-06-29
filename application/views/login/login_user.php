<style>
.form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de;
}
</style>
<div style="float:right;">
	<a class="btn btn-success" style="color:#FFFFFF;" href="<?php echo base_url('login');?>">Login Admin <i class="fa fa-user-o"></i></a>
</div><br>
<div class="page">

  <div class="container1">
		<div class="box" style="width:300px; border-top: none;">
			<center>
				<div style="margin-top: 1%;">
					<img src="asset/image/logo.jpg" style="width: 100%; padding: 1%;">
				</div>
			</center>
			<?php if($this->session->flashdata('result_login') == true) {  ?>
				<?php echo $this->session->flashdata('result_login'); ?>
			<?php } ?>
			<form action="<?php echo base_url('login_user/login_user_proses'); ?>" method="post" >
				<div class="form1">
					<!-- <label for="username" style="color:#000000; float:left;">Nama Meja</label> -->
						<br/><br/>
						<select class="form-control" name="meja" required="" style="height:35px;">
							<option value="">Pilih Meja</option>
							<?php foreach ($meja as $valu) {?>
								<option value="<?php echo $valu['id_meja'] ?>"><?php echo $valu['nama_meja'] ?></option>
							<?php } ?>
						</select>
						<button id="btnn" class="btn btn-success" style="color:white; float:right; margin-top:20px;">Pilih <i class="fa fa-arrow-right"></i></button>
				</div>
			</form>
    </div>
  </div>
</div>
<script src="<?php echo base_url('asset/new/js/anime.min.js')?>"></script>
<script src="<?php echo base_url('asset/image/js/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
</body>
</html>
