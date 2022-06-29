<?php 
class Grafik extends CI_Controller{

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
		$this->load->view('admin/grafik/index');
		$this->load->view('admin/html/footer');
	}

	public function createChart($start_date = null, $end_date = null)
	{
		$result = $this->model_laporan->createChart($start_date, $end_date);
		$data['period'] = array();
		$data['pendapatan'] = array();
		foreach ($result as $key => $value) {
			array_push($data['period'], date('Y-m-d', strtotime($value->date_time)));
			array_push($data['pendapatan'], $value->total);
		}
		$this->load->view('admin/grafik/chart',$data);
	}
}
