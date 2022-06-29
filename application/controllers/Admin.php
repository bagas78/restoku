<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_data');
		$this->load->model('m_transaksi');
		$this->load->model('model_laporan');
		$this->load->library('fungsi');
		$this->load->library(array('form_validation', 'session'));
		// $this->load->model(array('Mod_Login'));
		if (!isset($this->session->userdata['id_admin'])) {
			redirect(base_url("Login"));
		}
	}

	public function index()
	{
		$date = date('Y-m-d');
		$start_date = date("Y-m-1");
		$end_date = date("Y-m-31");
		$data['order'] = $this->db->select('count(id_transaksi) as tb_transaksi')->where('date_time',$date)->get('tb_transaksi')->row('tb_transaksi');
		$data['makanan'] = $this->db->select('count(id_menu) as tb_menu')->where('id_kategori = 1')->get('tb_menu')->row('tb_menu');
		$data['minuman'] = $this->db->select('count(id_menu) as tb_menu')->where('id_kategori = 2')->get('tb_menu')->row('tb_menu');
		$data['snack'] = $this->db->select('count(id_menu) as tb_menu')->where('id_kategori = 3')->get('tb_menu')->row('tb_menu');
		$data['data'] = $this->m_transaksi->transaksi();
		$chart = $this->model_laporan->createChart($start_date,$end_date);
		$data1['period'] = array();
		$data1['pendapatan'] = array();
		foreach ($chart as $key => $value) {
			array_push($data1['period'], date('Y-m-d', strtotime($value->date_time)));
			array_push($data1['pendapatan'], $value->total);
		}
		$query = $this->model_laporan->pie($start_date,$end_date);
		$label= array();
		$jumlah = array();
		foreach ($query as $key => $value) {
			$label[] = $value->menu;
			$jumlah[] = $value->jumlah;
		}
		$data1['label']=$label;
		$data1['jumlah']=$jumlah;
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/admin',$data);
		$this->load->view('admin/html/footer_beranda',$data1);
	}

	public function table()
	{
		$data['data'] = $this->m_transaksi->transaksi();
		
		$this->load->view('admin/admintable',$data);
	}

	public function html()
	{		
		$data = $this->m_transaksi->ordernew();
		if(empty($data)){
			$this->load->view('admin/html/ordernotransaksi');
		} else {
			$this->load->view('admin/html/ordertransaksi');
		}
	}

	public function htmlorder()
	{		
		$data = $this->m_transaksi->orderprosesnew();
		if(empty($data)){
			$this->load->view('admin/html/ordernotransaksi');
		} else {
			$this->load->view('admin/html/ordertransaksi');
		}
	}

	public function order()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/orders');
		$this->load->view('admin/html/footer');
	}

	public function makanan()
	{   
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->database();
		$data['kategori']=$this->m_data->kategori();
		$data['favorit']=$this->m_data->favorit();
		$data['selera']=$this->m_data->selera();
		$data['jenis']=$this->m_data->jenis_makanan();
		$data['images'] = $this->m_data->tampil_data_makanan();
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/makanan',$data);
		$this->load->view('admin/html/footer');
	}

	public function minuman()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->database();
		$data['kategori']=$this->m_data->kategori();
		$data['selera']=$this->m_data->selera();
		$data['images'] = $this->m_data->tampil_data_minuman();
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/minuman',$data);
		$this->load->view('admin/html/footer');
	}

	public function snack()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->database();
		$data['kategori']=$this->m_data->kategori();
		$data['selera']=$this->m_data->selera();
		$data['images'] = $this->m_data->tampil_data_snack();
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/snack',$data);
		$this->load->view('admin/html/footer');
	}

	public function akun()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->database();
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/profile/akun');
		$this->load->view('admin/html/footer');
	}
	public function profil()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/profile/profil',$data);
		$this->load->view('admin/html/footer');
	}

	public function getrasa($id_selera){
		$data = $this->m_data->fetch1rasa($id_selera);
		$html = '';
		foreach ($data as $key => $value) {
			$html .= '<option value="'.$value->id_rasa.'">'.$value->rasa.'</option>';
		}
		echo $html;
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}
?>
