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
							Data Menu Order
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
	<div style="color:red"> 
							<?php echo $this->session->userdata('message'); ?>
						</div>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
			<?php $id='';?>
				<form method="POST" action="<?php echo base_url() . 'transaksiUser/createSale/'.$id; ?>">
				<div class="box">
          			<div class="box-header">
						<div class="row">
							<div class="col-md-6">
								<table class="noborder">
									<tr>
										<td>
											<label>Meja</label>
										</td>
										<td style="padding: 10px;">
											<input type="hidden" id="meja" name="meja" value="<?php echo $this->session->userdata('nama_meja');?>">
											<a><?php echo $this->session->userdata('nama_meja');?></a>
										</td>
									</tr>
									<tr>
										<td>
											<label>Nama Pembeli</label>
										</td>
										<td style="padding: 10px;">
											<?php if(empty($this->session->userdata('pembeli'))) { ?>
												<input type="text" required id="pembeli" name="pembeli" data-errormessage-value-missing="Mohon isi form ini" >
											<?php } else { ?>
												<input type="text" required="" id="pembeli" name="pembeli" value="<?php echo $this->session->userdata('pembeli');?>">
											<?php } ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;">
							<a href="pesan">
								<button type="button" class="button btn-success button4"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Menu</button>
							</a>
						</div>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<table id="manageTable" class="table table-striped table-bordered">
									<thead>
										<tr role="row">
											<th>No</th>
											<th>Menu</th>
											<!-- <th>Selera</th> -->
											<th>Rasa</th>
											<th>Request (Tuliskan request rasa menu)</th>
											<th>Jumlah</th>
											<th>Harga</th>
											<th>SubTotal</th>
											<th>Batalkan</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($cart as $key => $stock): ?>
										<tr id="tr_<?php echo $key + 1; ?>">
											<td align="center" class="col-md-1 padd-0">
												<?php echo $key + 1; ?>
											</td>
											<td align="center">
												<input name="selera[]" type="hidden" id="selera" value="<?php echo $stock['selera']; ?>">
												<input name="status" type="hidden" id="status" value="1">
												<input name="kategori[]" type="hidden" id="kategori" value="<?php echo $stock['id_kategori']; ?>">
												<input name="stok[]" type="hidden" id="stok" value="<?php echo $stock['stok_menu']; ?>">
												<input name="id_menu[]" type="hidden" id="stok" value="<?php echo $stock['id_menu']; ?>">
												<input name="menu[]" type="hidden" id="nama_menu" value="<?php echo $stock['nama_menu']; ?>">
												<a><strong><?php echo $stock['nama_menu']; ?></strong></a><br>
											</td>
											<td align="center">
												<select class="form-control" id="rasa" name="rasa[]" required  style="height:35px;">
												<option></option>
													<?php foreach ($rasa[$key] as $r): ?>
														<option><?php echo $r["rasa"] ?></option>
													<?php endforeach; ?>
												</select>
											</td>
											<td>
												<input type="text" id="request" name="request" class="form-control">
											</td>
											<td align="center">
											<input type="number" id="jumlah_<?php echo $stock['id_menu']; ?>" name="jumlah[]" class="form-control"  min="1" 
												max="<?php echo $stock['stok_menu']; ?>" 
												onchange="subTotal('<?php echo $stock['id_menu']; ?>', <?php echo $key + 1; ?>)"
												onkeyup="this.onchange();" onpaste="this.onchange();"
												oninput="this.onchange();" 
												data-errormessage-value-missing="Mohon isi jumlah item" 
												data-errormessage-range-overflow="Jumlah maksimal yang dapat di order <?php echo $stock['stok_menu']; ?>" required>
											</td>
											<td align="center">
												<input name="harga[]" type="hidden" id="harga_<?php echo $stock['id_menu']; ?>" value="<?php echo $stock['harga']; ?>">
												<a>Rp. <strong><?php echo $this->fungsi->rupiah($stock['harga']); ?></strong></a><br>
											</td align="center">
											<td align="center">
												<input value="0" type="hidden" name="subtotal[]" class="subTotalvalue"
													id="subTotalvalue_<?php echo $stock['id_menu']; ?>"/>
												<!-- subTotal:text -->
													<a id="subTotalid_<?php echo $stock['id_menu']; ?>">
														<?php echo str_replace(',00', '', number_format(0, 2, ',', '.')); ?>
													</a>
											</td>
											<td align="center" class="col-md-2">
												<a class="text-danger" onclick="removeMenu('<?php echo $key + 1; ?>','<?php echo $stock['id_menu']; ?>');">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
										<?php endforeach; ?>
										<tr>
											<td colspan="2"></td>
											<td colspan="2" align="right">
											</td>
											<td align="center">
											</td>
											<td align="right">
												<strong>Total</strong>
											</td>
											<td align="center">
												<input name="total" type="hidden" required="true"
													   id="TotalValue" value="">
												<a id="TotalText">0</a>
											</td>
											<td></td>
										</tr>
										<tr>
											<td colspan="8" class="text-center">
												<span>Menu yang dibeli <b
																class="red-color cartTotal"><?php echo count($cart); ?>
																item</b></span>
													</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="8" >
													<div class="row">
														<div class="col-sm-4"></div>
														<div class="col-sm-8" style="text-align: right;">
															<?php if (count($cart)) { ?>
																<button style="height: 30px;" type="submit" class="btn btn-success btn-xs" onclick="deleteCookie()">
																	<i class="fa fa-save"></i>&nbsp;<strong>&nbsp;&nbsp;Pesan</strong>
																</button>
															<?php } ?>
														</div>
													</div>
												</td>
											</tr>
										</tfoot>
									</table>
							</div>
						</div>
					</div>
					<form>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
$(document).ready(function() {
    $('#manageTable').DataTable( {
        "scrollX": true
    } );
} );


var respon = $("input#selera").val();
console.log(respon);
	function generateTransaksinNo(){
		$.ajax({
			url:"<?php echo base_url('transaksiUser/generateOrderNo') ?>",
			method: "post",
			dataType: "json",
			success: function (response) {
				$("#no_order").val(response);
				$("#order_html").html(response);
			}
		});
	}

// BaseURL
	var BASE_URL = "<?php echo base_url();?>";

// Remove Menu from Table
	function removeMenu(trId, id_menu) {
		console.log(id_menu);
		var total = <?php echo count($cart);?>;
		$.ajax({
			type: 'post',
			url: BASE_URL + "transaksiUser/removeMenu",
			data: {id_menu: id_menu},
			success: function (response) {
				console.log(response);
				$('#tr_' + trId).remove();
				Total();
				changeTotalCart();
			}
		});
		var totalTr = $("#manageTable tr").length - 5;
		if (totalTr >= 0) {
			$(".cartTotal").html(totalTr + " item");
		}
	}

	function changeTotalCart() {
		var cartTotal = Number($("#cart").html());
		$("#cart").html(cartTotal - 1);
	}

	function formatNumber(num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	}

	function subTotal(id, trId) {
		// Get subTotal
		var Qty = document.getElementById('jumlah_' + id).value;
		var unitprice = document.getElementById('harga_' + id).value;
		var subTotal = Qty * unitprice;
		// Set Data
		document.getElementById('subTotalvalue_' + id).value = subTotal;
		document.getElementById('subTotalid_' + id).innerHTML = formatNumber(subTotal);

		// Get Total
		Total();
	}

	// Get Total
	function Total() {
		var idArray = [];
		$('.subTotalvalue').each(function () {
			idArray.push(this.id);
		});

		var subTotal = [];
		var Total = 0;
		idArray.forEach(function (entry) {
			Total += Number(document.getElementById(entry).value);
			subTotal.push(document.getElementById(entry).value);
		});

		var a = document.getElementById('TotalValue').value = Total;
		document.getElementById('TotalText').innerHTML = formatNumber(Total);
		console.log(a);

	}

	if (Cookies.get("cookieStock") || Cookies.get("cartCookie") || Cookies.get("session")) {
		Cookies.set('cookieStock', '', {expires: -7, path: '/order'});
		Cookies.set('session', '', {expires: -7, path: '/order'});
		Cookies.remove("cartCookie");
	}
	generateTransaksinNo();
</script>
