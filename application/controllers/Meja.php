<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller
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
		$this->load->view('admin/meja');
		$this->load->view('admin/html/footer');
	}

	public function fetchMeja(){
		$result['data'] = $this->m_data->fetchMeja();
		echo json_encode($result);
	}

	public function insert(){
		$this->load->helper('form');
		$this->form_validation->set_rules('nama_meja', "Nama Meja", 'required');
		$this->form_validation->set_message('required', 'Kolom %s wajib diisi!');
		$id_meja = $this->input->post('id_meja');
		if ($this->form_validation->run()){
			if(empty($id_meja) || $id_meja == 0 || $id_meja == 'null'){
				if ($this->m_data->insertMeja($this->input->post())){
					$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data Berhasil Disimpan");
				} else {
					$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => "Terjadi kesalahan ketika mengeksekusi query");
				}
			} else {
				if ($this->form_validation->run()){
					$data = array (
						'nama_meja' => strtoupper($this->input->post('nama_meja')),
						'kapasitas' => $this->input->post('kapasitas')
					);
					if ($this->m_data->updateMeja($id_meja, $data)){
						$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data berhasil diperbaharui!", 'id_meja' => $id_meja);
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

	public function deletemeja(){
		$no = $this->input->post('id_meja');
		$result = $this->m_data->deletemeja($no);
		echo json_encode($result);
	}

}
