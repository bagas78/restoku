<?php 
class Pesan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->model('mod_login'); 
		$this->load->model('m_transaksi');
		$this->load->model('m_pencarian');
		$this->load->model('m_view');
		$this->load->library('cart');
        // verify_session();
        $this->load->library('pagination');
		if (!isset($this->session->userdata['id_meja'])) {
			redirect(base_url("Login_user"));
		}
	}

	function index(){
		$this->load->database();
		$data['fav'] = $this->m_view->favorit();
		$data['umum'] = $this->m_view->umum();
		// $data['rasa'] = $this->m_view->rasa($id);
		if (isset($_SESSION['cart'])) {
			setcookie("cartCookie", json_encode($_SESSION['cart']), time() + 3600, "/");			
		} else {
			setcookie("cartCookie", "", time() - 3600 );
		}
		$list = $this->m_data->ac_id();
		$list1 = $this->m_data->ac_id_fav();
		$asik = array_column($list, 'id_menu');
		$asik1 = array_column($list1, 'id_menu');
		// sort($asik);
		// print_r($asik);
		// print_r('<hr>');
		// print_r($list1);
		$data1['rasa'] = $this->m_transaksi->rasa12($asik);
		$data12['rasa1'] = $this->m_transaksi->rasa12($asik1);
		// print_r($data1['rasa']);
		$data['rasa'] = array_reverse($data1['rasa']);
		$data['rasa1'] = array_reverse($data12['rasa1']);
		// print_r($data['rasa1']);
		$this->load->view('pesan/html/html_open');
		$this->load->view('pesan/html/header');
		$this->load->view('pesan/html/aside');
		$this->load->view('pesan/makanan',$data);
		$this->load->view('pesan/html/footer');
	}

	function minuman(){
		$this->load->database();;
		$data['minuman']=$this->m_view->minuman();
		if (isset($_SESSION['cart'])) {
			setcookie("cartCookie", json_encode($_SESSION['cart']), time() + 3600, "/");
		  }else{
			setcookie("cartCookie", "", time() - 3600 );
			}
			$list = $this->m_data->ac_id_minuman();
			// $list1 = $this->m_data->ac_id_fav();
			$asik = array_column($list, 'id_menu');
			// $asik1 = array_column($list1, 'id_menu');
			$data1['rasa'] = $this->m_transaksi->rasa12($asik);
			// $data12['rasa1'] = $this->m_transaksi->rasa12($asik1);
			$data['rasa'] = array_reverse($data1['rasa']);
			// $data['rasa1'] = array_reverse($data12['rasa1']);
		$this->load->view('pesan/html/html_open');
		$this->load->view('pesan/html/header');
		$this->load->view('pesan/html/aside');
		$this->load->view('pesan/minuman',$data);
		$this->load->view('pesan/html/footer');
	}

	function snack(){
		$this->load->database();;
		$data['Camilan']=$this->m_view->snack();
		if (isset($_SESSION['cart'])) {
			setcookie("cartCookie", json_encode($_SESSION['cart']), time() + 3600, "/");
		  }else{
			setcookie("cartCookie", "", time() - 3600 );
			}
			$list = $this->m_data->ac_id_snack();
			// $list1 = $this->m_data->ac_id_fav();
			$asik = array_column($list, 'id_menu');
			// $asik1 = array_column($list1, 'id_menu');
			$data1['rasa'] = $this->m_transaksi->rasa12($asik);
			// $data12['rasa1'] = $this->m_transaksi->rasa12($asik1);
			$data['rasa'] = array_reverse($data1['rasa']);
			// $data['rasa1'] = array_reverse($data12['rasa1']);
		$this->load->view('pesan/html/html_open');
		$this->load->view('pesan/html/header');
		$this->load->view('pesan/html/aside');
		$this->load->view('pesan/snack',$data);
		$this->load->view('pesan/html/footer');
	}

	function pencarianMakanan(){
		$key = ucwords($this->input->post('cari'));
		$cari = $this->m_pencarian->pencarian($key);
		$data['pencarian'] = $this->m_pencarian->pencarian($key);
		// print_r($key);
		// print_r('<hr>');
		// print_r($cari);
		if($cari == true){
			$this->session->set_flashdata('messageCari', "Kata Kunci&nbsp;<span style='color:##99CC00;'>".$key."</span>&nbsp;Meliputi Menu ini");
			$this->load->view('pesan/html/html_open');
			$this->load->view('pesan/html/header');
			$this->load->view('pesan/html/aside');
			$this->load->view('pesan/pencarian',$data);
			$this->load->view('pesan/html/footer');
		} else {
			$this->session->set_flashdata('messageCari', "Kata Kunci".$key."Tidak ada Dalam Daftar Menu");
			redirect(site_url('pesan'));
		}
	}

	function pencarianMinuman(){
		$key = ucwords($this->input->post('cari'));
		$cari = $this->m_pencarian->pencarianminuman($key);
		$data['pencarian'] = $this->m_pencarian->pencarianminuman($key);
		if($cari == true){
			$this->session->set_flashdata('messageCari', "Kata Kunci&nbsp;<span style='color:##99CC00;'>".$key."</span>&nbsp;Meliputi Menu ini");
			$this->load->view('pesan/html/html_open');
			$this->load->view('pesan/html/header');
			$this->load->view('pesan/html/aside');
			$this->load->view('pesan/pencarianMinuman',$data);
			$this->load->view('pesan/html/footer');
		} else {
			$this->session->set_flashdata('messageCari', "Kata Kunci".$key."Tidak ada Dalam Daftar Menu");
			redirect(site_url('pesan/minuman'));
		}
	}

	function pencarianSnack(){
		$key = ucwords($this->input->post('cari'));
		$cari = $this->m_pencarian->pencariansnack($key);
		$data['pencarian'] = $this->m_pencarian->pencariansnack($key);
		if($cari == true){
			$this->session->set_flashdata('messageCari', "Kata Kunci&nbsp;<span style='color:##99CC00;'>".$key."</span>&nbsp;Meliputi Menu ini");
			$this->load->view('pesan/html/html_open');
			$this->load->view('pesan/html/header');
			$this->load->view('pesan/html/aside');
			$this->load->view('pesan/pencarianSnack',$data);
			$this->load->view('pesan/html/footer');
		} else {
			$this->session->set_flashdata('messageCari', "Kata Kunci&nbsp;".$key."&nbsp;Tidak ada Dalam Daftar Menu");
			redirect(site_url('pesan/snack'));
		}
	}


	public function logout_user()
	{
		// $this->session->sess_destroy();
		// 	$this->cart->destroy();
		// 	delete_cookie('cartCookie');
		// 	redirect('login_user');
		$meja = $this->session->userdata('nama_meja');
		// print_r($meja);
		// print_r('<hr>');
		$status =$this->mod_login->statusUserLog($meja);
// 		print_r($this->mod_login->statusUserLog($meja));
		if($status == true){
			$this->session->sess_destroy();
			$this->cart->destroy();
			delete_cookie('cartCookie');
			redirect('login_user');
		} else {
			print_r('eror');
		}
	}
	
}
