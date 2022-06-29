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
							Detail Pemesanan
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Order</a></li>
							<li><a href="#">Detail</a></li>
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
					<div class="box-header">
						<h3 class="box-title">Detail Pesanan</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<?php $pro = $this->uri->segment('3');?>
								<form role="form" action="<?php echo base_url('order/bayardetail/'.$pro) ?>" method="post">
       								<table id="example" class="table table-striped table-bordered">
									  	<thead>
											<tr>
												<th>Menu</th>
												<th>Rasa</th>
												<th>Request</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>SubTotal</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($data as $proses) : ?>
												<tr>
													<td><?php echo $proses->menu; ?></td>
													<td><?php echo $proses->rasa; ?></td>
													<td><?php echo $proses->request; ?></td>
													<td align="center"><?php echo $proses->jumlah; ?></td>
													<td align="center"><?php echo $this->fungsi->rupiah($proses->harga); ?></td>
													<td align="center"><?php echo $this->fungsi->rupiah($proses->subtotal); ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="5" align="right">
													<strong>Total</strong>
												</td>
												<td align="center">
													<?php foreach($total as $key => $value) : ?>
														<a id="total"><?php echo $this->fungsi->rupiah($value['total'])?></a>
														<input id="totalinput" type="hidden" value="<?php echo $value['total'] ?>">
													<?php endforeach; ?>
												</td>
											</tr>
											<tr>
												<td colspan="5" align="right">
													<strong>Pembayaran</strong>
												</td>
												<td align="right" style="width:23%;">
													<div class="input-group">
                          								<span class="input-group-addon">Rp</span>
														<input type="text" id="bayar" name="bayar" class="form-control" required="" 				
															onchange="subTotal()"
															onkeyup="this.onchange();" onpaste="this.onchange();"
															oninput="this.onchange();"
															data-errormessage-value-missing="Mohon isi jumlah item">
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="5" align="right">
													<strong>Diskon(%)</strong>
												</td>
												<td align="right">
													<div class="input-group">
                          								<span class="input-group-addon">%</span>
														<input type="number" id="diskon" name="diskon" max="100" class="form-control" value="0"
														onchange="subTotal2()"
														onkeyup="this.onchange();" onpaste="this.onchange();"
														oninput="this.onchange();"
														data-errormessage-value-missing="Mohon isi jumlah item">
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="5" align="right">
													<strong>Kembalian</strong>
												</td>
												<td align="right">
													<input name="kembalian" id="kembalian" type="hidden" value="0">
													<a id="kembalianhtml">0</a>
												</td>
											</tr>
										</tfoot>
									</table>
									<button style="float:right; margin: 10px;" class="btn btn-primary">Cetak</button>
								</form>
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
		$('#example').DataTable();
	} );

    $(document).ready(function(){
        // Format mata uang.
        $( '#bayar' ).mask('000.000.000.000', {reverse: true});
	});
</script>
<script>
	function formatNumber(num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	}
	function subTotal() {
		// Get subTotal
		var Qty = document.getElementById('bayar').value.replace(/\D/g,'');
		var unitprice = document.getElementById('totalinput').value;
		console.log(Qty);

		var subTotal = Qty - unitprice;
		if (subTotal == undefined || subTotal == '' || subTotal == NaN){
			subTotal = '0';
    	}
		// Set Data
		document.getElementById('kembalian').value = subTotal;
		document.getElementById('kembalianhtml').innerHTML = formatNumber(subTotal);
		// document.getElementById('subtooo').value = subTotal;
	}
	function subTotal2() {
		// Get subTotal
		var Qty = document.getElementById('bayar').value.replace(/\D/g,'');
		var unitprice = document.getElementById('totalinput').value;
		var diskon = document.getElementById('diskon').value;
		var persen =100;
		
		var kembali = Qty-(unitprice-(unitprice/persen*diskon));
		// Set Data
		document.getElementById('kembalian').value = kembali;
		document.getElementById('kembalianhtml').innerHTML = formatNumber(kembali);
		document.getElementById('subtooo').value = subTotal;
		// Get Total
		// Total();
	}
</script>

