<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {

  function __construct() {
    parent::__construct();
    if ($this->session->userdata('id_meja')) {
      redirect(base_url("pesan"));
    }
    $this->load->model(array('Mod_login'));
		$this->load->model('m_data');
		$this->load->library('cart');
  }

	function index(){
		$valid = $this->form_validation;
		$data['meja']=$this->m_data->meja();
    $this->load->view("login/metta");
    $this->load->view('login/login_user',$data);
    $valid->set_rules('meja','Meja','required');
    if($valid->run()) {
      $this->simple_login->login($meja, base_url('pesan'), base_url('login_user'));
		}
	}
		
	function login_user_proses(){
		$meja = $this->input->post('meja');
		// print_r($meja);print_r('<hr>');
		$proses = $this->Mod_login->authUser($meja);
		$sta = $this->Mod_login->statusUserlogin($meja);
		foreach ($sta as $stat){
			$statu = $stat->status;
		}
		// print_r($statu);
		if ($statu == 0) {
			if ($proses) {
				$newSession = array(
						'id_meja'  => $proses[0]['id_meja'],
						'nama_meja'=> $proses[0]['nama_meja'],
						'kapasitas'=> $proses[0]['kapasitas'],
						'logged_in' => TRUE
					);
				$this->session->set_userdata($newSession);
				$status = $this->Mod_login->statusUser($meja);
				redirect(base_url('pesan'));	
			} else {
				$this->session->set_flashdata('result_login', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>
				Nama Meja Tidak terdaftar</div>");
			redirect(base_url('login_user'));
			}
		} else {
			$this->session->set_flashdata('result_login', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>
				Nomor Meja masih dalam keadaan Login</div>");
			redirect(base_url('login_user'));
		}
		
	}
}
