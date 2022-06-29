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
							Data Selera
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Selera</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
  	</section>
		<div id="alert"></div>
  	<section class="content">
    	<div class="row">
			<div class="col-xs-6">
				<div class="box">
          <div class="box-header">
           	<h3 class="box-title">Input Data Selera</h3>
          </div>
          <div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<form role="form" action="<?php echo base_url('selera/insert') ?>" method="post" id="insertForm">
          							<table class="table table-striped">
										<tr style="background-color:#FFFFFF;">
											<td>Selera</td>
											<td>
												<input name="selera" class="form-control" id="selera" type="text" placeholder="Nama Selera">
												<input name="id_selera" class="form-control" id="id_selera" type="hidden" placeholder="Nama Meja">
											</td>
										</tr>
										<tr>
										<td>Kategori</td>
											<td>
												<select class="form-control" name="kategori" id="kategori">
													<option valur="1">PILIH KATEGORI</option>
													<?php foreach ($kategori as $value) {?>
                             <option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
									</table>
									<button style="float:right; margin: 10px;" class="btn btn-primary">Simpan</button>
								</form>
								<button style="float:right; margin: 10px;" id="btn-delete" disabled="" class="btn btn-danger">delete</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="box">
          			<div class="box-header">
            			<h3 class="box-title">Data Selera</h3>
						<hr>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<table id="manageTableSelera" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Kategori</th>
                      <th>Selera</th>
                    </tr>
                  </thead>
                </table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
var manageTableSelera;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  // initialize the datatable
  manageTableSelera = $('#manageTableSelera').DataTable({
    'ajax': '<?php echo base_url('selera/fetchSelera') ?>',
    "columns": [
                {"data": "nama_kategori"},
                {"data": "selera"}
            ]
    
  });

  $('#manageTableSelera tbody').on('click', 'tr', function() {
      if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
        resetForm()
      } else {
        manageTableSelera.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        setForm(manageTableSelera.row(this).data());
      }
  });


  // submit the create from
  $("#insertForm").unbind('submit').on('submit', function() {
    var form = $(this);
    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(),
      dataType: 'json',
      success:function(response) {
        if(response.status == "success") {
          $('#alert').html("<div class='alert alert-"+response.status+" alert-dismissible fade in bs-alert' role='alert' style='display:none'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa "+response.icon+"'></i> "+response.title+"</h4> "+ response.message +" </div>");
          // $("#insertModal").modal('hide');
          resetForm();
          $("#insertForm")[0].reset();
          $("#insertForm .form-group").removeClass('has-error').removeClass('has-success');
        } else {
          $('#alert_').html("<div class='alert alert-"+response.status+" alert-dismissible fade in bs-alert' role='alert' style='display:none'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa "+response.icon+"'></i> "+response.title+"</h4> "+ response.message +" </div>");
        }
        showAlert()
        manageTableSelera.ajax.reload(null, false);
      }
    });

    return false;
  });

	$("#btn-delete").click(function(){
		var nama = $("#selera").val();
			swal({
			  title: "Apakah anda yakin?",
			  text: "Data "+nama+" akan dihapus dari database!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
					$.ajax({
						url: "<?php echo base_url('selera/deleteselera') ?>",
						type: "post",
						data: $("#insertForm").serialize(),
						dataType: "json",
						success: function(response){
							if (response){
								swal("Data berhasil dihapus", {
						      icon: "success",
						    });
								manageTableSelera.ajax.reload(null, false);
								resetForm();
							} else {
								swal("Terjadi kesalahan saat mengeksekusi query!", {
						      icon: "warning",
						    });
							}
						}
					})
			  }
			});
});
  function setForm(data){
      console.log(data);
    $("#selera").val(data.selera);
			$("#kategori").val(data.id_kategori);
			$("#kategori").change();
    $("#id_selera").val(data.id_selera);
			$("#btn-delete").attr("disabled", false);
	}

	function resetForm(data){
		$("#selera").val("");
    $("#kategori").change();
    $("#kategori").val("");
		$("#id_selera").val("");
			$("#btn-delete").attr("disabled", true);
	}

	function showAlert(){
  $(".bs-alert").fadeTo(5000, 500).slideUp(500, function(){
    	$(".bs-alert").slideUp(500);
		});
	}


});
</script>
