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
							Order
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<!-- <li><a href="#">Beranda</a></li> -->
							<li><a href="#">Order</a></li>
						</ol>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;">
							<a href="pesan">
								<button type="button" class="button btn-success button4"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Menu</button>
							</a>
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
						
					  <div class="row">
							<div class="col-md-6">
								<table class="noborder">
									<tr>
										<td>
											<label>Meja</label>
										</td>
										<td>
											<input type="hidden" id="meja" name="meja" value="<?php echo $this->session->userdata('nama_meja');?>">
											<a><?php echo $this->session->userdata('nama_meja');?></a>
										</td>
									</tr>
									<tr>
										<td>
											<label>Nama Pembeli</label>
										</td>
										<td>
											<input type="text" required="" id="pembeli" name="pembeli" readonly>
										</td>
									</tr>
								</table>
							</div>
						</div>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-striped table-bordered" id="example">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 3%;">No</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 20%;">Menu</th>
											<!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 15%;">Selera</th> -->
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 15%;">Rasa</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 15%;">Request</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 15%;">Jumlah</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 15%;">Harga</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 15%;">Total</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 8%;">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="8" class="text-center">
												<span>Barang yang dibeli <b class="red-color cartTotal"> 0 item</b></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>