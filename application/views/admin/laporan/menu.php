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
							Laporan
						</p>
						<form class="form-horizontal" style="margin-top: -45px;">
							<div class="col-md-6 col-md-offset-6">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Periode</label>
									<div class="col-sm-6">
										<input type="text" name="start_date" value="" hidden>
										<div class="input-group">
											<button type="button" class="btn btn-default pull-right" id="daterange_btn">
											<span>
												<i class="fa fa-calendar"></i> Pilih Rentang Tanggal
											</span>
											<i class="fa fa-caret-down"></i>
											</button>
										</div>
									</div>
									<div class="col-md-4">
										<button type="submit" name="button" class="btn btn-primary" onclick="createChart(event)"> <i class="fa fa-search"></i> Tampilkan </button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
  	<section class="content">
								
	<div class="box box-widget" id="hari">
        </div>
	</section>
</div>
<script type="text/javascript">
var manageTable;
var start_date = "0";
var end_date = "0";

$(document).ready(function() {
  $("#chartNav").addClass('active');

  $('#daterange_input').daterangepicker({
    format: "yyyy-mm-dd"
  });

  $('#daterange_btn').daterangepicker(
      {
        ranges   : {
          'Hari ini'       : [moment(), moment()],
          'Pilih Range': [moment().subtract(29, 'days'), moment()],
          'Bulan ini'  : [moment().startOf('month'), moment().endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange_btn span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));
        $("[name='start_date']").val(start.format('YYYY-MM-DD'));
        $("[name='end_date']").val(end.format('YYYY-MM-DD'));
        start_date = start.format('YYYY-MM-DD');
        end_date = end.format('YYYY-MM-DD');
      }
    );
});

function createChart(e){
  console.log(e);
  e.preventDefault();
  $.ajax({
    url : "<?php echo base_url('laporan/createLaporanmenu/') ?>" + start_date + "/" + end_date,
    dataType: "html",
    success: function (result){
      $("#hari").html(result);
      console.log(result);
    }
  });
}

</script>
