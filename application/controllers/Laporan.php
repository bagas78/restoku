<?php 
class Laporan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('model_laporan');
		$this->load->model('m_data');
		$this->load->helper('url');
		$this->load->library('fungsi');
		if (!isset($this->session->userdata['id_admin'])) {
			redirect(base_url("Login"));
		}
	}

	function index(){
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/laporan/index');
		$this->load->view('admin/html/footer');
	}

	public function createLaporan($start_date = null, $end_date = null){
// print_r($start_date);
// print_r('<hr>');
// print_r($end_date);
		$tanggal = date('Y-m-d');
		if($start_date == $tanggal &&  $end_date == $tanggal){
			$result['lap'] = $this->model_laporan->createLaporanharidetail($start_date,$end_date);
			$result['laporan'] = $this->model_laporan->createLaporan($start_date,$end_date);
			$this->load->view('admin/laporan/hari',$result);
		} else {
			$result['lap'] = $this->model_laporan->createLaporanbulandetail($start_date,$end_date);
			$result['laporan'] = $this->model_laporan->createLaporanbulan($start_date,$end_date);
			$this->load->view('admin/laporan/bulan',$result);
		}
	}


	function menu(){
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/laporan/menu');
		$this->load->view('admin/html/footer');
	}

	public function createLaporanmenu($start_date = null, $end_date = null){
		// print_r($start_date);
		// print_r('<hr>');
		// print_r($end_date);
				$tanggal = date('Y-m-d');
				if($start_date == $tanggal &&  $end_date == $tanggal){
					$result['lap'] = $this->model_laporan->createLaporanharimenudetail($start_date,$end_date);
					$result['laporan'] = $this->model_laporan->createLaporanmenu($start_date,$end_date);
				// print_r($result);
				$this->load->view('admin/laporan/detailmenuhari',$result);
				} else {
					$result['laporan'] = $this->model_laporan->createLaporanbulanmenudetail($start_date,$end_date);
					$result['lap'] = $this->model_laporan->createLaporanbulan($start_date,$end_date);
					$this->load->view('admin/laporan/detailmenubulan',$result);
				}
			}

}
