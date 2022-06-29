
<div class="box-header with-border">
    <h3 class="box-title">
	Laporan Bulan ini 
	<?php foreach($lap as $data) : ?>
		<label style="font-family: Roboto;">Rp. <?php echo $this->fungsi->rupiah($data->total);?></label>
	<?php endforeach; ?>
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
                  <th>Tanggal/Waktu</th>
                  <th>No. Transaksi</th>
                  <th>Meja</th>
                  <th>Nama Pembeli</th>
                  <th>Total Harga  (Rp)</th>
                </tr>
              </thead>
			  <tbody>
			  	<?php foreach($laporan as $data) : ?>
					<tr>
						<td><?php echo $data->date_time; ?> / <?php echo $data->time; ?></td>
						<td><?php echo $data->no_transaksi; ?></td>
						<td><?php echo $data->meja; ?></td>
						<td><?php echo $data->pembeli; ?></td>
						<td>Rp. <?php echo $this->fungsi->rupiah($data->total); ?></td>
					</tr>
				<?php endforeach; ?>
			  </tbody>
				<tfoot>
					<tr>
							<td></td>
							<td></td>
							<td></td>
						<td><strong>Total Bulan ini</strong></td>
						<?php foreach($lap as $data) : ?>
							<td>Rp. <?php echo $this->fungsi->rupiah($data->total);?></td>
						<?php endforeach; ?>
					</tr>
				</tfoot>
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
