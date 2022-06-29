<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Akun extends CI_Controller {
     
    function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->model('m_akun');
		$this->load->helper('url');
		if (!isset($this->session->userdata['id_admin'])) {
			redirect(base_url("Login"));
		}
	}

	function signup(){
		$cek = $this->db->query("SELECT * FROM tb_admin where username='".$this->input->post('username')."' and email='".$this->input->post('email')."' and telepon='".$this->input->post('telepon')."'")->num_rows();
		$cek1 = $this->db->query("SELECT * FROM tb_admin where username='".$this->input->post('username')."' and email='".$this->input->post('email')."'")->num_rows();
		$cek2 = $this->db->query("SELECT * FROM tb_admin where username='".$this->input->post('username')."' and telepon='".$this->input->post('telepon')."'")->num_rows();
		$cek3 = $this->db->query("SELECT * FROM tb_admin where email='".$this->input->post('email')."' and telepon='".$this->input->post('telepon')."'")->num_rows();
		$cek4 = $this->db->query("SELECT * FROM tb_admin where username='".$this->input->post('username')."'")->num_rows();
		$cek5 = $this->db->query("SELECT * FROM tb_admin where email='".$this->input->post('email')."'")->num_rows();
		$cek6 = $this->db->query("SELECT * FROM tb_admin where telepon='".$this->input->post('telepon')."'")->num_rows();
		if( $cek > 0 ) {
			$this->session->set_flashdata('message_username', "<div style='color:#00a65a;'>Username Sudah Terdaftar .</div>");
			$this->session->set_flashdata('message_email', "<div style='color:#00a65a;'>Email Sudah Terdaftar .</div>");
			$this->session->set_flashdata('message_telepon', "<div style='color:#00a65a;'>Telepon Sudah Terdaftar .</div>");
			redirect(site_url('admin/akun'));
		} else if( $cek1 > 0) {
			$this->session->set_flashdata('message_username', "<div style='color:#00a65a;'>Username Sudah Terdaftar .</div>");
			$this->session->set_flashdata('message_email', "<div style='color:#00a65a;'>Email Sudah Terdaftar .</div>");
			redirect(site_url('admin/akun'));
		} else if( $cek2 > 0) {
			$this->session->set_flashdata('message_username', "<div style='color:#00a65a;'>Username Sudah Terdaftar .</div>");
			$this->session->set_flashdata('message_telepon', "<div style='color:#00a65a;'>Telepon Sudah Terdaftar .</div>");
			redirect(site_url('admin/akun'));
		} else if( $cek3 > 0) {			
			$this->session->set_flashdata('message_email', "<div style='color:#00a65a;'>Email Sudah Terdaftar .</div>");
			$this->session->set_flashdata('message_telepon', "<div style='color:#00a65a;'>Telepon Sudah Terdaftar .</div>");
			redirect(site_url('admin/akun'));
		} else if( $cek4 > 0) {
			$this->session->set_flashdata('message_username', "<div style='color:#00a65a;'>Username Sudah Terdaftar .</div>");
			redirect(site_url('admin/akun'));
		} else if($cek5 > 0) {
			$this->session->set_flashdata('message_email', "<div style='color:#00a65a;'>Email Sudah Terdaftar .</div>");
			redirect(site_url('admin/akun'));
		} else if($cek6 > 0) {
			$this->session->set_flashdata('message_telepon', "<div style='color:#00a65a;'>Telepon Sudah Terdaftar .</div>");
			redirect(site_url('admin/akun'));
		} else {
		$config = array(
			'upload_path' => './images/admin/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '10000',
			'max_width' => '20000',
			'max_height' => '20000'
 		);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
			redirect(site_url('administrator'));
		} else {
			$file = $this->upload->data();
			$data = array(
				'name' => $this->input->post('name'),
				'username' => strtolower($this->input->post('username')),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'telepon' => $this->input->post('telepon'),
				'status' => $this->input->post('status'),
				'level' => $this->input->post('level'),
			    'gambar' => $file['file_name']
			);

			$this->m_data->daftar($data);
		}
		}
		
		$this->session->set_flashdata('message_akun', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Pengguna Berhasil Di Tambah</div>");
		redirect(site_url('administrator'));
		// $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Pendaftaran Anda Berhasil .</div>");
		// $this->load->view('admin/html/html_open');
		// $this->load->view('admin/html/header');
		// $this->load->view('admin/html/aside_kosong');
		// $this->load->view('admin/profile/sukses');
		// $this->load->view('admin/html/footer');
	}
	function edit_akun($id)
	{
		$data['abc'] = $this->m_data->getProfil($id);
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		if($this->session->userdata('status') == 1){
			$this->load->database();
			$this->load->view('admin/html/html_open');
			$this->load->view('admin/html/header',$data);
			$this->load->view('admin/html/aside');
			$this->load->view('admin/profile/edit_akun',$data);
			$this->load->view('admin/html/footer');
		} else {
			redirect('admin', 'refresh');
		}
	}
	
	function proses_edit_sukses()
	{
		$id = $this->uri->segment(3);
		$id_baru = $this->input->post('id');
		$pass = $this->input->post('newpassword');
		// print_r($pass);
		// $query = $this->m_data->get_by_id($id);
		if ($_FILES AND $_FILES['gambar']['name']) {
				// Start uploading file
				$config = array(
						'upload_path' => './images/admin/',
						'allowed_types' => 'jpeg|jpg|png',
						'max_size' => '10000',
						'max_width' => '10000',
						'max_height' => '10000'
				);
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
					// redirect(site_url('admin/akun/'.$id_baru));
				} else {

						// Remove old image in folder 'images' using unlink()
						// unlink() use for delete files like image.
						// unlink('images/admin/'.$query->gambar);

						// Upload file
						$id = $this->uri->segment(3);
						$where = array('id_admin' => $this->input->post('id'));
						$file = $this->upload->data();
						if (empty($pass)) {
							$data = array(
								'name' => $this->input->post('name'),
								'username' => strtolower($this->input->post('username')),
								'email' => $this->input->post('email'),
								'telepon' => $this->input->post('telepon'),
								'status' => $this->input->post('status'),
								'level' => $this->input->post('level'),
								'gambar' => $file['file_name']
							);
						} else {
							$data = array(
								'name' => $this->input->post('name'),
								'username' => strtolower($this->input->post('username')),
								'email' => $this->input->post('email'),
								'password' => md5($this->input->post('newpassword')),
								'telepon' => $this->input->post('telepon'),
								'status' => $this->input->post('status'),
								'level' => $this->input->post('level'),
								'gambar' => $file['file_name']
							);
						}
						if (empty($pass)) {
							$this->m_akun->update($data,$where);
							$this->session->set_flashdata('message_akun', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Pengguna Berhasil Di Ubah</div>");
							redirect(site_url('admin/profil'));
						} else {
							$this->load->database();
							$this->m_akun->update($data,$where);
							$id = $this->session->userdata('id_admin');
							$data['profil'] = $this->m_data->getProfil($id);
							$this->load->view('admin/html/html_open');
							$this->load->view('admin/html/header',$data);
							$this->load->view('admin/html/aside_kosong');
							$this->load->view('admin/profile/sukses');
							$this->load->view('admin/html/footer');
						}
					// $this->m_akun->update($data,$where);
				}
		}
		// Do this if there's no image file uploaded
		else {
				$id = $this->uri->segment(3);
				$where = array('id_admin' => $this->input->post('id'));
				if (empty($pass)) {
					$data = array(
						'name' => $this->input->post('name'),
						'username' => strtolower($this->input->post('username')),
						'email' => $this->input->post('email'),
						'telepon' => $this->input->post('telepon'),
						'status' => $this->input->post('status'),
						'level' => $this->input->post('level')
					);
				} else {
					$data = array(
						'name' => $this->input->post('name'),
						'username' => strtolower($this->input->post('username')),
						'email' => $this->input->post('email'),
						'password' => md5($this->input->post('newpassword')),
						'telepon' => $this->input->post('telepon'),
						'status' => $this->input->post('status'),
						'level' => $this->input->post('level')
					);
				}
				if (empty($pass)) {
					$this->m_akun->update($data,$where);
					$this->session->set_flashdata('message_akun', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Pengguna Berhasil Di Ubah</div>");
					redirect(site_url('admin/profil'));
				} else {
					$this->load->database();
					$this->m_akun->update($data,$where);
					$id = $this->session->userdata('id_admin');
					$data['profil'] = $this->m_data->getProfil($id);
					$this->load->view('admin/html/html_open');
					$this->load->view('admin/html/header',$data);
					$this->load->view('admin/html/aside_kosong');
					$this->load->view('admin/profile/sukses');
					$this->load->view('admin/html/footer');
				}
				
		}
		// print_r($data);
		$this->session->set_flashdata('message_akun', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Pengguna Berhasil Di Ubah</div>");
		// redirect(site_url('profil'));
		// $this->load->database();
		// $this->load->view('admin/html/html_open');
		// $this->load->view('admin/html/header');
		// $this->load->view('admin/html/aside_kosong');
		// $this->load->view('admin/profile/sukses');
		// $this->load->view('admin/html/footer');
	}
 }
