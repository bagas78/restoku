<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
    if ($this->session->userdata('username')) {
      redirect(base_url("admin"));
    }
    $this->load->model(array('Mod_login'));
    $this->load->model('m_data');
    $this->load->model('m_akun');
  }

  function index() {
    $valid = $this->form_validation;
    $this->load->view("login/metta_admin");
    $this->load->view('login/login');
    $valid->set_rules('username','Username','required');
    $valid->set_rules('password','Password','required');
    if($valid->run()) {
        $this->simple_login->login($username,$password, base_url('admin'), base_url('login'));
    }
  }
	function proses()
  {
    $username   = strtolower($this->input->post('username'));
    $password   = md5($this->input->post('password'));
    $result     = $this->Mod_login->auth($username, $password);
    if ($result) {
      if ($result[0]['status'] == 1) {
          $sess = array(
							'id_admin'  => $result[0]['id_admin'],
							'name'      => $result[0]['name'],
							'username'  => $result[0]['username'],
							'email'		  => $result[0]['email'],
							'telepon'   => $result[0]['telepon'],
							'status'    => $result[0]['status'],
							'level'    => $result[0]['level'],
							'gambar'    => $result[0]['gambar'],
              'logged_in' => TRUE
          );
          $this->session->set_userdata($sess);
          redirect(base_url('admin'));
        
      } else {
        $this->session->set_flashdata('result_login', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>
				Nama Pengguana Anda ".ucwords($username)." Sedang Dinonaktifkan</div>");
				redirect(base_url('login'));
      }
    } else {
			$this->session->set_flashdata('result_login', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>
			Kombinasi Nama Pengguna dan Pasword Salah</div>");
		redirect(base_url('login'));
    }
	}

	function forgot_pass(){
		
		$cek = $this->db->query("SELECT * FROM tb_admin where username='".$this->input->post('username')."'")->num_rows();
		$cek1 = $this->db->query("SELECT * FROM tb_admin where email='".$this->input->post('email')."'")->num_rows();
		$pass =md5($this->input->post('password'));
		if ($cek == 0) {
			$this->session->set_flashdata('forgot', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Username tidak terdaftar</div>");
			redirect(base_url('login'));
		} else if($cek1 == 0){
			$this->session->set_flashdata('forgot', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Email tidak terdaftar</div>");
			redirect(base_url('login'));
		} else {
			$data = array(
						'password' => $pass
			);
					$this->m_akun->change_pass($data,$username,$email);
					$this->session->set_flashdata('forgot', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Kata sandi berhasil diubah.</div>");
					redirect(base_url('login'));
		}
	}
}
?>
