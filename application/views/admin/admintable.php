<table class="table table-striped" id="tableHolder">
								<thead>
										<tr>
											<td>Tanggal/Waktu</td>
											<td>No. Transaksi</td>
											<td>Meja</td>
											<td>Pembeli</td>
										</tr>
								</thead>
								<tbody>
									<?php foreach($data as $antri) : ?>
										<tr>
											<td><?php echo $antri->date_time ?> / <?php echo $antri->time ?></td>
											<td><?php echo $antri->no_transaksi ?></td>
											<td><?php echo $antri->meja ?></td>
											<td><?php echo $antri->pembeli ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
						</table>
