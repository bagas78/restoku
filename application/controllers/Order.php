<?php 
class Order extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->model('m_transaksi');
		$this->load->helper('url');
		$this->load->library('fungsi');
		if (!isset($this->session->userdata['id_admin'])) {
			redirect(base_url("Login"));
		}
	}

	function index(){
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/order/index',$data);
	}

	function fetchTransaksi(){
		$result['data'] = array();
		foreach ($this->m_transaksi->transaksi() as $key => $value) {
			if ($value->status == 1){
				$status = "<center><span class='label label-success'>Baru</span></center>";
			} else if ($value->status == 4){
				$status = "<center><span class='label label-info'>Tambah</span></center>";
			} else if ($value->status == 2){
				$status = "<center><span class='label label-warning'>Proses</span></center>";
			} else {
				$status = "<center><span class='label label-primary'>Lunas</span></center>";
			}
			$button = "<center><a href='order/proses/".$value->id_transaksi."'><button type='button' class='btn btn-default' title='Cetak'><i class='fa fa-credit-card'></i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
			$batal = "<a href='order/batal/".$value->id_transaksi."' onclick='javascript: return confirm(&apos;Anda yakin hapus ?&apos;)'><button type='button' class='btn btn-default' title='Batal'><i class='fa fa-remove'></i></button></a></center>";
			
			$result['data'][$key] = array($value->no_transaksi, $value->meja, $value->pembeli, $value->time, $status, $button."".$batal);
		}
		echo json_encode($result);
	}

	function proses($no){
		$result['data']= $this->m_transaksi->getorderadmin($no);
		$result['total']= $this->m_transaksi->gettotal($no);
		if(empty($no)){
			redirect('order');
		} else {
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/order/proses_cetak',$result);
		$this->load->view('admin/html/footer');
		}
	}


	function cetak($cek){
	// print_r($cek);
		$result['data']= $this->m_transaksi->getorderadmin($cek);
		$result['total']= $this->m_transaksi->gettotal($cek);
		// $this->load->view('admin/order/cetak',$result);
		$ceks= $this->m_transaksi->updateStatus($cek);
		if($ceks == 1){
			$this->load->view('admin/order/cetak',$result);
		} else {
			redirect('order');
		}
	}

	function orderProses(){
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/order/order',$data);
	}

	function fetchTransaksi2(){
		$result['data'] = array();
		foreach ($this->m_transaksi->transaksi2() as $key => $value) {
			if ($value->status == 1){
				$status = "<center><span class='label label-success'>Baru</span></center>";
			} else if ($value->status == 4){
				$status = "<center><span class='label label-info'>Tambah</span></center>";
			} else if ($value->status == 2){
				$status = "<center><span class='label label-warning'>Proses</span></center>";
			} else {
				$status = "<center><span class='label label-primary'>Lunas</span></center>";
			}
			if($value->status == 3) {
				$button = "<a href='detailbayar/".$value->id_transaksi."'><center><button type='button' class='btn btn-default' title='Bayar'><i class='fa fa-credit-card'></i></button></center></a>";
			} else {
				$button = "<a href='proses_bayar/".$value->id_transaksi."'><center><button type='button' class='btn btn-default' title='Bayar'><i class='fa fa-credit-card'></i></button></center></a>";
			}
			$result['data'][$key] = array($value->no_transaksi, $value->meja, $value->pembeli, $value->time, $status, $button);
		}
		echo json_encode($result);
	}

	function proses_bayar($no){
		// print_r($no);
		$result['data']= $this->m_transaksi->getorderadmin($no);
		$result['total']= $this->m_transaksi->gettotal2($no);
		// print_r($result);
		if(empty($no)){
			redirect('order');
		} else {
			$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/order/order_proses',$result);
		$this->load->view('admin/html/footer');
		}
	}

	// function fetchProses2($no){
	// 	$result['data'] = array();
	// 	foreach ($this->m_transaksi->getorderadmin($no) as $key => $value) {
	// 		if ($value->status == 1){
	// 			$status = "<center><span class='label label-success'>Baru</span></center>";
	// 		} else if ($value->status == 4){
	// 			$status = "<center><span class='label label-info'>Tambah</span></center>";
	// 		} else {
	// 			$status = "<center><span class='label label-warning'>Proses</span></center>";
	// 		}
	// 		if($value->status == 2 OR $value->status == 3) {
	// 			$button = "";
	// 			$btnEdit = "";
	// 		} else {
	// 			$button = "<a href='detailbayar/".$value->id_transaksi."'><center><button type='button' class='btn btn-default' title='Bayar'><i class='fa fa-credit-card'></i></button></center></a>";
	// 			$btnEdit = "<a href='proses_bayar/".$value->id_transaksi."'><center><button type='button' class='btn btn-default' title='Bayar'><i class='fa fa-credit-card'></i></button></center></a>";
	// 		}
	// 		$result['data'][$key] = array($value->no_transaksi, $value->rasa, $value->request, $value->jumlah, $value->harga,$value->subtotal, $btnEdit."".$button);
	// 	}
	// 	echo json_encode($result);
	// }

	function detailbayar($cek){
		$result['data']= $this->m_transaksi->getorderadmin($cek);
		$result['total']= $this->m_transaksi->gettotal($cek);
		$result['detail']= $this->m_transaksi->getdetailtotal($cek);
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/order/detail',$result);
		$this->load->view('admin/html/footer');
	}

	function bayardetail($a){
		$bay = $this->input->post('bayar');
		$bayar = str_replace(".","","$bay");
		print_r($bayar);
		$data = array(
			'id_transaksi' => $a,
			'bayar' => $bayar,
			'diskon' => $this->input->post('diskon'),
			'kembalian' => $this->input->post('kembalian')
		);
		if($this->m_transaksi->save($data) == true){
			$this->m_transaksi->updatestatus2($a);
			redirect('order/cetak_bayar/'.$a);
		} else {
			redirect('order/bayardetail');
		}
	}


	function cetak_bayar($cek){
		// $getid = $this->m_transaksi->getidtransaksi($cek)->result_array();
		// $id = $getid['0']['id_transaksi'];
		// print_r($cek);
		$result['data']= $this->m_transaksi->getorderadmin($cek);
		$result['total']= $this->m_transaksi->gettotal($cek);
		$result['detail']= $this->m_transaksi->getdetailtotal($cek);
		$this->load->view('admin/order/cetak_bayar',$result);
	}

	function batal($batal){
		$variable = $this->m_transaksi->stokId($batal);
		// print_r($variable);
		foreach ($variable as $key => $value) {
			$jumlah = $value->jumlah;
			$menu =  $value->menu;
			$stok= $this->m_transaksi->stokMenuID($menu);
			$jum = $stok+$jumlah;
			$update = $this->m_transaksi->updateOrder($jum,$menu);
		}
		
		$result = $this->m_transaksi->deleteOrderTransaksi($batal);
		$resultArray = $this->m_transaksi->deleteOrderTransaksiMaster($batal);
		// echo json_encode($result);
		if($result == true ){
			$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil di Hapus</div>");
			redirect(site_url('order'));
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Kesalahan saat mengeksekusi query</div>");
			redirect(site_url('order'));
		}
	}

	function hapus($id,$id_trans,$menu){
		$nama_menu =urldecode($menu);
		$stok = $this->m_transaksi->Stok($nama_menu);
		$stokBeli = $this->m_transaksi->StokBeli($id);
		$total = $this->m_transaksi->getT($id_trans);
		$subtotal = $this->m_transaksi->getS($id);
		foreach ($stok as $a) {
			$abc=$a->stok_menu;
		}
		foreach ($stokBeli as $a) {
			$ab=$a->jumlah;
		}
		$hasil = $abc+$ab;
		foreach ($total as $a) {
			$tot=$a->total;
		}
		foreach ($subtotal as $a) {
			$sub=$a->subtotal;
		}
		$hasilTotal = $tot - $sub;
		$dataTo = array(
			'total' => $hasilTotal
		);
		// print_r($hasilTotal);
		$data = array(
			'stok_menu' =>$hasil
		);
		$updateTotal = $this->m_transaksi->updateTotalOrderTransaksiMasterMenu($dataTo,$id_trans);
		$update = $this->m_transaksi->updateOrderTransaksiMasterMenu($nama_menu,$data);
		$result = $this->m_transaksi->deleteOrderTransaksiMasterMenu($id);
		// echo json_encode($result);
		if($result == true ){
			$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil di Hapus</div>");
			redirect(site_url('order/proses/'. $id_trans));
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Kesalahan saat mengeksekusi query</div>");
			redirect(site_url('order/proses/'. $id_trans));
		}
	}

	function editPesanan($id){
		$result = $this->m_transaksi->get($id);
		echo json_encode($result);
	}

	function update($id){
		$id_master=$this->input->post('id_transaksi');
		$request=$this->input->post('request');
		$rasa=$this->input->post('rasa');
		$jumlah=$this->input->post('jumlah');
		$jumlah1=$this->input->post('jumlah1');
		$harga = $this->input->post('harga');
		$menu=$this->input->post('menu');
		$subtotal = $jumlah*$harga;
		$stok1 = $this->m_transaksi->Stok($menu);
		foreach ($stok1 as $tok){
			$stok = $tok->stok_menu;
		}
		
		if ($jumlah > $jumlah1) {
			$juml = $jumlah-$jumlah1;
			$has = $stok - $juml;
		} else if ($jumlah < $jumlah1){
			$juml = $jumlah1-$jumlah;
			$has = $stok + $juml;
		} else {
			$has = $jumlah;
		}
		$updateJumlah = array(
						'stok_menu' => $has
					);
		
		$data = array(
			'menu' => $menu,
			'rasa' => $rasa,
			'jumlah' => $this->input->post('jumlah'),
			'request' => $request,
			'subtotal' => $subtotal
		);
		$up = $this->m_transaksi->updateMenuMaster($updateJumlah,$menu);
		$succces = $this->m_transaksi->updatePesanan($data,$id);
		if ($succces){
			$su =$this->m_transaksi->toooo($id_master);
			foreach ($su as $as){
				$toots = $as->subtotal;
			}
			$toot = array(
				'total' => $toots
			);
			$abg = $this->m_transaksi->updateTotalMaster($id_master,$toot);
			$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data Berhasil Diupdate");
			
		} else {
			$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => "Terjadi kesalahan ketika mengeksekusi query");
		}
		echo json_encode($status);
	}

}
