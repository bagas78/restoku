<div class="content-wrapper">
	<section class="content-header" style="padding: 0px 0px 0 0px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="">
          			<div class="box-header">
						<div class="col-md-6">
							<p style="font-size:28px; padding: 10px 0px 0 10px;">
								Data Menu Pencarian
							</p>
							<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -1px;">
								<li><a href="#">Beranda</a></li>
								<li><a href="#">Pencarian</a></li>
							</ol>
						</div>
						<div class="col-md-6">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="<?php echo base_url("TransaksiUser") ?>" style="color:#99CC00;">
										<span class="fa fa-shopping-cart fa-3x"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="cart" style="font-size:14px; background: #99CC00; padding: 1px 5px;border-radius: 10px; color: #fff;">
										<?php 
										$nol = 0;
										if(!isset($_SESSION['cart']))
										{
											echo $nol;
										} else {
											echo count($_SESSION['cart']);
										} ?>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</section>
	<section class="content">
		<div style="float:right;">
			<form method="POST" action="<?php echo base_url() . 'pesan/pencarianSnack' ?>">
				<input class="form-control" name="cari" type="text" placeholder="Pencarian Menu...." style="width: 210px;">
				<button type="submit" class="btn btn-primary" style="margin-top: -57px; margin-left: 222px;">Cari</button>
			</form>
		</div><br><br><br>
		<div class="box">
		
			<br>
			<span style="margin: 30px; font-size: 20px; font-family: robooto;"><?php echo $this->session->userdata('messageCari'); ?></span>
			<hr>
			<div style="width: 100%; background-color: #fff; border-radius: 3px; box-shadow: 0 1px 2px #c8d1d3;">
				<div style="padding: 30px; margin-top: -20px;">
					<div class="row">
						<div class="col-xs-12">
							<div class="row">
								<?php foreach($pencarian as $data) : ?>
									<div class="col-md-3 product-container" style="padding-left: 15px; padding-right: 15px;">
										<div class="thumbnail">
											<img class="product-image" style="height:200px;" src="<?php echo base_url('images/'.$data->gambar); ?>">
											<div class="product-detail" style="padding: 10px; text-align: center;">
												<div style="border-bottom: 1px dashed #ddd; height: 46px; overflow: hidden; font-weight: bold;">
													<span><?php echo ucwords(strtolower($data->nama_menu)); ?></span>
												</div>
												<div style="padding-top: 5px; padding-bottom: 5px; border-bottom: 1px dashed #ddd; font-size: 13px;">
													<span class="product-spec-item">
														<?php echo ucwords(strtolower("Rasa: <span class='red-color'> $data->selera</span>&nbsp;&nbsp;")) . "<br>";?>
													</span>
												</div>
												<div style="padding-top: 5px; font-size: 14px; padding-bottom: 5px; margin-bottom: 5px; ">
													<span class="red-color">Harga : Rp.
														<?php echo str_replace(',00', '', number_format($data->harga, 2, ',', '.'));?>
													</span>
													&nbsp;
													<span>Stock :&nbsp; <strong class="product-stock"><?php echo $data->stok_menu; ?></strong></span>
												</div>
												<?php 
												if ($data->stok_menu > 0) { ?>
													<a style="height:25px;" onclick="addCart('<?php echo $data->id_menu;?>')"
													class="btn btn-xs btn-block btn-success add-product-trigger"
													id="<?php echo $data->id_menu; ?>">
														<strong>Pilih Menu</strong>
													</a>
												<?php } else { ?>
													<a style="height:25px;" onclick="stockEmpty()"
													class="btn btn-xs btn-block btn-default add-product-trigger"
													id="<?php echo $data->id_menu; ?>">
														<strong>Stock Kosong</strong>
													</a>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    	
	</section>
</div>
<script>

    //Fix UI list product
    for (var i = 0; i < $(".product-spec-item").length; i++) {
      if ($(".product-spec-item:eq("+ i +") > span").length < 3) {
        $(".product-spec-item:eq("+ i +") > span").last().after("<br><br>");
      }
    }

    function addCart(id_menu) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>cart/add",
            data: {
                id: id_menu
            },
            success: function(response) {
                if (response == 0) {
                    toastr.warning("Ups, Barang sudah ditambahkan");
                } else {
                    changeTotalCart();
                    $("#"+id_menu).html("Sudah ada").css("font-weight","Bold")
                      .attr({
                        class : "btn btn-info btn-xs btn-block  add-product-trigger",
                        onClick : "added()"
                      });
                    toastr.success("Barang sudah dimasukan ke Cart!", "Berhasil");
                }
            }
        });
    }

    function changeTotalCart(){
      var cartTotal = Number($("#cart").html());
      $("#cart").html(cartTotal + 1);
      var cartTotal1 = Number($("#cart1").html());
      $("#cart1").html(cartTotal1 + 1);
	//   console.log(cartTotal);
    }


    function added(){
        toastr.warning('Ups, Barang sudah ditambahkan');
    }
</script>
<script>
if (Cookies.get("cartCookie")) {
        var array = Cookies.get("cartCookie");
        var obj = JSON.parse(array);
		console.log(array);
		// console.log(obj);
        for (var k in obj) {
          // document.getElementById(obj[k]).innerHTML("Sudah ada");
          // console.log(obj[k]);
          if ($("#"+obj[k])) {
            $("#"+obj[k]).html("Sudah ada").css("font-weight","Bold")
              .attr({
                class : "btn btn-info btn-xs btn-block  add-product-trigger",
                onClick : "added()"
              });
          }
        }
    }
</script>
