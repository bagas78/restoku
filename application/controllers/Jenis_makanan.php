<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_makanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		if (!isset($this->session->userdata['id_admin'])) {
			redirect(base_url("Login"));
		}
	}

	/*
    * It only redirects to the manage customers page
    */
	public function index()
	{	
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/jenis_makanan');
		$this->load->view('admin/html/footer');
	}

	public function fetchJenis(){
		$result['data'] = $this->m_data->fetchJenis();
		echo json_encode($result);
	}

	public function insert(){
		$this->load->helper('form');
		$this->form_validation->set_rules('jenis_makanan', "Jenis Makanan", 'required');
		$this->form_validation->set_message('required', 'Kolom %s wajib diisi!');
		$id_jenis = $this->input->post('id_jenis');
		if ($this->form_validation->run()){
			if(empty($id_jenis) || $id_jenis == 0 || $id_jenis == 'null'){
				if ($this->m_data->insertJenis($this->input->post())){
					$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data Berhasil Disimpan");
				} else {
					$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => "Terjadi kesalahan ketika mengeksekusi query");
				}
			} else {
				if ($this->form_validation->run()){
					$data = array (
						'jenis_makanan' => ucfirst($this->input->post('jenis_makanan'))
					);
					if ($this->m_data->updateJenis($id_jenis, $data)){
						$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data berhasil diperbaharui!", 'id_jenis' => $id_jenis);
					} else {
						$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => "Terjadi kesalahan ketika mengeksekusi query");
					}
				} else {
					$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => validation_errors());
				}
			}
		} else {
			$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => validation_errors());
		}
		echo json_encode($status);
	}

}
