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
							Data Menu Makanan
						</p>
						<ol class="breadcrumb" style="background-color:#ffffff; margin: -10px 0px 10px -10px;">
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Makanan</a></li>
						</ol>
						<div style="color:red"> 
							<?php echo $this->session->userdata('message'); ?>
						</div>
						<div class="visible-md visible-lg" style="float:right; margin: -65px 10px -90px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
						</div>
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
            			<h3 class="box-title">Data Makanan</h3>
						<div class="visible-md visible-xs" style="float:right; margin: 15px -1px 1px 10px;">
							<button type="button" class="button btn-success button4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
						</div>
          			</div>
          			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<table id="example" class="table table-striped table-bordered">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 3%;">No</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%; height:30%;">Gambar</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 20%;">Nama</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 15%;">Harga</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 15%;">Stok Makanan</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 8%;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = $this->uri->segment('3') + 1; ?>
										<?php foreach($data as $dat) : ?>
										<tr role="row" class="even">
											<td><center><?=$no++;?></center></td>
											<td><?php echo $dat->nama_menu; ?></td>
											<td><?php echo $dat->harga; ?></td>
											<td><?php echo $dat->stok_menu; ?></td>
											<td>
												<a href="<?php echo base_url('insertdata/edit/'.$data->id_menu); ?>">
													<i class="fa fa-pencil" title="Edit" style="color:#99CC00; float:left; margin-left:10px;"></i>
												</a>
												<?php
													$hapus = array(
														'class' => 'fa fa-trash',
														'title' => 'Hapus',
														'style' => 'color:#99CC00; float:right; margin-right:10px;',
														'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $data->nama_menu . '?\')'
													);
													echo anchor(site_url('Insertdata/hapus_makanan/' . $data->id_menu), ' ', $hapus);
												?>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
