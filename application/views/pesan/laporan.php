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
							Laporan Order
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Laporan Order</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
  	</section>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
				<div class="box">
          			<div class="box-header"></div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="app-right-section">
								<table class="noborder">
									<tr>
										<td>
											<label>Meja</label>
										</td>
										<td style="padding: 10px;">
											<input type="hidden" id="meja" name="meja" value="<?php echo $this->session->userdata('nama_meja');?>">
											&nbsp;&nbsp;<a><?php echo $this->session->userdata('nama_meja');?></a>
										</td>
									</tr>
									<tr>
										<td>
											<b>Nama Pembeli</b>
										</td>
										<td style="padding: 10px;">
										&nbsp;&nbsp;<a><?php echo $this->session->userdata('pembeli');?></a>
										</td>
									</tr>
								</table><br>
									<div class="app-info">
										<table id="manageTable" class="table table-striped table-bordered">
											<thead>
												<tr role="row">
													<th>Menu</th>
													<th>Selera</th>
													<th>Rasa</th>
													<th>Jumlah</th>
													<th>Harga</th>
													<th>SubTotal</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($lap_user as $dat) : ?>
													<tr>
														<td><?php echo $dat->menu?></td>
														<td><?php echo $dat->selera?></td>
														<td><?php echo $dat->rasa?></td>
														<td><?php echo $dat->jumlah?></td>
														<td align="center"><?php echo $this->fungsi->rupiah($dat->harga)?></td>
														<td align="center"><?php echo $this->fungsi->rupiah($dat->subtotal)?></td>
													</tr>
												<?php endforeach; ?>
												<tr>
													<td align="right" colspan="5">
														<strong>Total</strong>
													</td>
													<td align="center">
														<?php foreach($total_user as $total) : ?>
															<a id="TotalText"><?php echo $this->fungsi->rupiah($total->total)?></a>
														<?php endforeach; ?>
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
			</div>
		</div>
	</section>
</div>
