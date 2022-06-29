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
	<div style="color:red"> 
		<?php echo $this->session->userdata('message'); ?>
	</div>
	<div id="alert"></div>
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
								<form role="form" action="<?php echo base_url('order/cetak/'.$pro) ?>" method="post">
       								<table id="manageTable" class="table table-striped table-bordered">
									  	<thead>
											<tr>
												<th>Menu</th>
												<th>Rasa</th>
												<th>Request</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>SubTotal</th>
												<th>Aksi</th>
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
													<td style="width: 100px;">
														<!-- <a href="<?php echo base_url('order/edit/'.$proses->id_transaksi_master); ?>"> -->
															<i class="fa fa-pencil" title="Edit" onclick="edit(<?php echo $proses->id_transaksi_master; ?>)" style="color:#99CC00; float:left; margin-left:10px;"></i>
														<!-- </a> -->
														<?php
															$hapus = array(
																'class' => 'fa fa-trash',
																'title' => 'Hapus',
																'style' => 'color:#99CC00; float:right; margin-right:10px;',
																'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $proses->menu . '?\')'
															);
															echo anchor(site_url('order/hapus/' . $proses->id_transaksi_master. '/' . $proses->id_transaksi. '/' .$proses->menu), ' ', $hapus);
														?>
														<input type="hidden" id="idku" value="<?php echo $proses->id_transaksi?>">
														<input type="hidden" id="idkumaster" value="<?php echo $proses->id_transaksi_master?>">
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
										<tfoot>
											<?php foreach($total as $key => $value) : ?>
												<tr>
													<td colspan="5" align="right">
														<strong>Total</strong>
													</td>
													<td align="center">
														<a id="total"><?php echo $this->fungsi->rupiah($value->total)?></a>
														<input id="totalinput" type="hidden" value="<?php echo $value->total ?>">
													</td>
													<td></td>
												</tr>	
											<?php endforeach; ?>
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

<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Pesanan</h4>
      </div>

      <form role="form" action="<?php echo base_url('order/update') ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div id="alert_update"></div>
          <div class="form-group">
            <label for="">Menu</label>
            <input type="text" class="form-control" id="update_buyer_identity_no" readonly name="menu" placeholder="Menu" autocomplete="off">
            <input type="hidden" class="form-control" id="update" name="id_transaksi" placeholder="Menu" autocomplete="off">
            <input type="hidden" class="form-control" id="update_harga" name="harga" placeholder="Menu" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Rasa</label>
            <input type="text" class="form-control" id="update_buyer_name" name="rasa" placeholder="Rasa" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Request</label>
            <input type="text" class="form-control" id="update_buyer_req" name="request" placeholder="Request" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="number" class="form-control" id="update_buyer_jum" name="jumlah" placeholder="Jumlah" autocomplete="off">
						<input type="hidden" class="form-control" id="update_buyer_jumlah" name="jumlah1" placeholder="Jumlah" autocomplete="off">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
var manageTable;

$(document).ready(function() {
  // initialize the datatable
  manageTable = $('#manageTable').DataTable();
	
  
});

function edit(id)
{
	// console.log(menu);
	abc=$("#idku").val();
	// console.log(abc);
  $.ajax({
    url: '../editPesanan/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#update_buyer_identity_no").val(response.menu);
      $("#update").val(response.id_transaksi);
      $("#update_buyer_name").val(response.rasa);
      $("#update_harga").val(response.harga);
      $("#update_buyer_req").val(response.request);
      $("#update_buyer_jum").val(response.jumlah);
      $("#update_buyer_jumlah").val(response.jumlah);
      $("#updateModal").modal('show');

      // submit the edit from
      $("#updateForm").unbind('submit').bind('submit', function() {
        var form = $(this);
        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(),
          dataType: 'json',
          success:function(response) {
            if(response.status == "success") {
              $('#alert').html("<div class='alert alert-"+response.status+" alert-dismissible fade in bs-alert' role='alert' style='display:none'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa "+response.icon+"'></i> "+response.title+"</h4> "+ response.message +" </div>");
              $("#updateModal").modal('hide');
              // reset the form
              $("#updateForm")[0].reset();
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');
            } else {
              $('#alert_update').html("<div class='alert alert-"+response.status+" alert-dismissible fade in bs-alert' role='alert' style='display:none'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa "+response.icon+"'></i> "+response.title+"</h4> "+ response.message +" </div>");
            }
            
						// manageTable.ajax.reload(null, false);
						// manageTable.ajax.reload(null, false);
						window.location.replace(+abc);
						showAlert();
						
          }
        });

        return false;
      });

    }
  });
}

function showAlert(){
  $(".bs-alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".bs-alert").slideUp(500);
});
}
</script>
