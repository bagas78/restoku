
<div class="box-header with-border">
    <h3 class="box-title">
		Laporan Pengeluaran Stok Menu Hari ini
		</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="chart">

	<table class="table table-bordered" id="manageTable">
              <thead>
                <tr>
                  <th>Waktu/Tanggal</th>
                  <!-- <th>No. Transaksi</th> -->
                  <th>Menu</th>
                  <th>jumlah</th>
                </tr>
              </thead>
			  <tbody>
			  	<?php foreach($laporan as $data) : ?>
					<tr>
						<td><?php echo $data->time; ?> / <?php echo $data->date_time; ?></td>
						<!-- <td><?php echo $data->no_transaksi; ?></td> -->
						<td><?php echo $data->menu; ?></td>
						<td><?php echo $data->jumlah; ?></td>
					</tr>
				<?php endforeach; ?>
			  </tbody>
            </table>

    </div>
  </div>
  </div>
<script>
	$('#manageTable').DataTable({
		dom: 'Bfrtip',
		buttons: [
			// 'copy', 'csv', 'excel', 'pdf', 'print'
      { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true },
            { extend: 'print', footer: true }
		],
		"bDestroy": true
    });
</script>
