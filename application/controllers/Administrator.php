<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_akun');
		$this->load->model('m_data');
		$this->load->library(array('form_validation', 'session'));
		// $this->load->model(array('Mod_Login'));
		if (!isset($this->session->userdata['id_admin'])) {
			redirect(base_url("Login"));
		}
	}
	public function index()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		if($this->session->userdata('level') == 1){
			$data['level']=$this->m_data->tampil_data_admin();
			$this->load->view('admin/html/html_open');
			$this->load->view('admin/html/header',$data);
			$this->load->view('admin/html/aside');
			$this->load->view('admin/administrator/administrator',$data);
			$this->load->view('admin/html/footer');
		} else {
			redirect('admin', 'refresh');
		}
	}

	public function edit()
	{
		if($this->session->userdata('level') == 1){
			$id = $this->uri->segment(3);
			$this->load->database();
			$data['edit']=$this->m_akun->get_by_id($id);
			$id = $this->session->userdata('id_admin');
			$data['profil'] = $this->m_data->getProfil($id);
			$this->load->view('admin/html/html_open');
			$this->load->view('admin/html/header',$data);
			$this->load->view('admin/html/aside');
			$this->load->view('admin/administrator/edit_administrator',$data);
			$this->load->view('admin/html/footer');
		} else {
			redirect('admin', 'refresh');
		}
	}

	public function update()
	{
		if($this->session->userdata('level') == 1){
			$where = array('id_admin' => $this->input->post('id'));
			if($where){
				$data = array(
					'name' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'telepon' => $this->input->post('telepon'),
					'status' => $this->input->post('status'),
					'level' => $this->input->post('level')
				);

				$this->m_akun->update($data,$where);
				$this->session->set_flashdata('message_akun', "<div style='color:#ffffff;'>Berhasil Mengubah Data .</div>");
				redirect('administrator');
			} else {
				$this->session->set_flashdata('message_akun', "<div style='color:#ffffff;'>Data Tidak Ditemukan .</div>");
				redirect('administrator');
			}
		} else {
			redirect('admin');
		}
	}

	public function hapus($id)
	{
		if($this->session->userdata('level') == 1){
			$where = array('id_admin' => $id);

			if ($where) {
	
					// unlink() use for delete files like image.
					unlink('images/admin/'.$where->gambar);
	
					$this->m_akun->hapus_data($where,'tb_admin');
					$this->session->set_flashdata('message_akun', "<div style='color:#ffffff;'>!!!Data berhasil dihapus.</div>");
					redirect(site_url('administrator'));
			} else {
					$this->session->set_flashdata('message_akun', "<div style='color:#ffffff;'>!!!Data tidak ditemukan.</div>");
					redirect(site_url('administrator'));
			}
		} else {
			redirect('admin', 'refresh');
		}
	}
}
?>
