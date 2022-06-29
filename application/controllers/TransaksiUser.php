<?php 
class TransaksiUser extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->model('m_data');
		$this->load->library('cart');
		$this->load->library('fungsi');
        $this->load->library('pagination');
		if (!isset($this->session->userdata['id_meja'])) {
			redirect(base_url("Login_user"));
		}
		
	}

	public function index()
    {
		$list = $this->session->userdata('cart');
		if($list == null){
			$this->load->view('pesan/html/html_open');
			$this->load->view('pesan/html/header');
			$this->load->view('pesan/html/aside');
			$this->load->view('pesan/order_user_kosong');
			$this->load->view('pesan/html/footer');
		} else {
			$this->load->view('pesan/html/html_open');
			$list = $this->session->userdata('cart');
			sort($list);
			$data['cart'] = $this->m_transaksi->gettransaksi($list);
			// $abc = $this->m_transaksi->gettransaksi1($list);
			// foreach($abc as $ab){
			// 	$response = $ab->selera;
			// }
			// print_r($response);
			// print_r('<hr>');
			// print_r($abc);
			// print_r($list);
			$data['rasa'] = $this->m_transaksi->rasa($list);
			$data['rasa'] = array_reverse($data['rasa']);
			// print_r($data['rasa']);
			$this->load->view('pesan/html/header');
			$this->load->view('pesan/html/aside');
			$this->load->view('pesan/order_user', $data);
			$this->load->view('pesan/html/footer');
		}
	}

	public function removeMenu()
    {
		$stockId = $this->input->post('id_menu');
        if ($stockId) {
            //remove cart
            $stocks = $this->session->userdata('cart');
            foreach ($stocks as $key => $value) {
                if ($value == $stockId) {
                    unset($stocks[$key]);
                }
            }

            echo "Yoo!";

            // reset cart session
            $this->session->set_userdata('cart', $stocks);
            // return OK
            if ($stocks) {
                print_r(json_encode('OK'));
                exit();
            }
        }
	}
	function createSale(){
		date_default_timezone_set("Asia/Jakarta");
		$number = $this->generateTransaksiCode();
		$ses = $this->session->userdata('no_transaksi');
		$rasa = $this->input->post('rasa');
		// print_r($rasa);
		// print_r('<hr>');
		foreach ($rasa as $rasa) {
			if($rasa == ''){
				$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Gagal Saat Mengeksekusi query!!. Silahkan Pilih Rasa.</div>");
				redirect('transaksiUser');
			} else {
				if(empty($ses)){
					$ses_pem = ucwords($this->input->post('pembeli'));
					$data1 = array(
						'status' => $this->input->post('status'),
						'no_transaksi' => $number,
						'meja' => $this->input->post('meja'),
						'pembeli' => $ses_pem,
						'date_time' => date('Y-m-d H:i:s'),
						'time' => date('H:i:s'),
						'total' => $this->input->post('total')
					);
		
					$response = $this->m_transaksi->create1($data1);
					if ($response) {
						$newSession = array(
								'no_transaksi'  => $number,
								'pembeli'  => $ses_pem,
								'logged_in' => TRUE
							);
							// print_r($newSession);
						$this->session->set_userdata($newSession);
					}
		
				} else {
					$sta = 4;
					$data2 = array(
						'status' => $sta,
						'no_transaksi' => $ses,
						'meja' => $this->input->post('meja'),
						'pembeli' => ucwords($this->input->post('pembeli')),
						'date_time' => date('Y-m-d H:i:s'),
						'time' => date('H:i:s'),
						'total' => $this->input->post('total')
					);
		
					$response = $this->m_transaksi->create1($data2);
				}
				
				
				if(empty($ses)){
					$getid = $this->m_transaksi->endid($number)->result_array();
					// print_r($getid);
					$id_trans = $getid['0']['id_transaksi'];
					$menu = $this->input->post('menu');
					$selera = $this->input->post('selera');
					$rasa = $this->input->post('rasa');
					$jumlah = $this->input->post('jumlah');
					$kategori = $this->input->post('kategori');
					$request = $this->input->post('request');
					$harga = $this->input->post('harga');
					$sub = $this->input->post('subtotal');
					foreach ($this->session->userdata('cart') as $key => $value) {
						$data2 = array(
							'id_transaksi' => $id_trans,
							'menu' => $menu[$key],
							'selera' =>$selera[$key],
							'rasa' => $rasa[$key],
							'jumlah' => $jumlah[$key],
							'id_kategori' => $kategori[$key],
							'request' => $request[$key],
							'harga' => $harga[$key],
							'subtotal' => $sub[$key]
						);
						$res = $this->m_transaksi->create2($data2);
					}
				} else {
					$getid = $this->m_transaksi->endid($ses)->result_array();
					print_r($getid);
					$id_trans = $getid['0']['id_transaksi'];
					$menu = $this->input->post('menu');
					$selera = $this->input->post('selera');
					$rasa = $this->input->post('rasa');
					$kategori = $this->input->post('kategori');
					$request = $this->input->post('request');
					$jumlah = $this->input->post('jumlah');
					$harga = $this->input->post('harga');
					$sub = $this->input->post('subtotal');
					foreach ($this->session->userdata('cart') as $key => $value) {
						$data2 = array(
							'id_transaksi' => $id_trans,
							'menu' => $menu[$key],
							'selera' =>$selera[$key],
							'rasa' => $rasa[$key],
							'jumlah' => $jumlah[$key],
							'id_kategori' => $kategori[$key],
							'request' => $request[$key],
							'harga' => $harga[$key],
							'subtotal' => $sub[$key]
						);
						$res = $this->m_transaksi->create2($data2);
					}
				}
			}
			if ($response && $res) {
				$id_men = $this->input->post('id_menu');
				$jumlah = $this->input->post('jumlah');
				$stoks = $this->input->post('stok');
				// print_r($id_menu);
				foreach ($this->session->userdata('cart') as $key => $value) {
					$id_menu = $id_men[$key];
					$kurang = $stoks[$key]-$jumlah[$key];
					$abcde = array(
						'stok_menu' => $kurang
					);
					// print_r($id_menu);
					$this->m_transaksi->update_stok($abcde,$id_menu);
				}
				$this->session->unset_userdata('cart');
				redirect('transaksiUser/finish');
			} else {
				echo "ups!";
			}
		}
	}

	function generateTransaksiCode(){
		date_default_timezone_set("Asia/Jakarta");
		$query = $this->db->order_by('id_transaksi', 'desc')->limit(1)->get('tb_transaksi');
		if ($query->num_rows() <= 0){
			$last_no = 0;
		} else {
			$last_no = preg_replace('/[^0-9.]+/', '', $query->row('id_transaksi'));
		}
		$current_no = ++$last_no;
		$num = sprintf('%05d', $current_no);
		return "T".date('y').date('d').$num;
	}


	function finish(){
		$this->load->view('pesan/html/html_open');
		$this->load->view('pesan/html/header');
		$this->load->view('pesan/html/aside');
		$this->load->view('pesan/finis');
		$this->load->view('pesan/html/footer');
	}

	function laporan(){		
		$ses = $this->session->userdata('no_transaksi');
		$data['total_user'] = $this->m_transaksi->detailusertotal($ses);
		$data['lap_user'] = $this->m_transaksi->detaillaporanuser($ses);
		$this->load->view('pesan/html/html_open');
		$this->load->view('pesan/html/header');
		$this->load->view('pesan/html/aside');
		$this->load->view('pesan/laporan',$data);
		$this->load->view('pesan/html/footer');
	}
}
