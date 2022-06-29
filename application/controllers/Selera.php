<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Selera extends CI_Controller
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
		$data['kategori']=$this->m_data->kategori();
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/selera',$data);
		$this->load->view('admin/html/footer');
	}

	public function fetchSelera(){
		$result['data'] = $this->m_data->fetchSelera();
		echo json_encode($result);
	}

	public function insert(){
		$this->load->helper('form');
		$this->form_validation->set_rules('selera', "Selera", 'required');
		$this->form_validation->set_rules('kategori', "Kategori", 'required');
		$this->form_validation->set_message('required', 'Kolom %s wajib diisi!');
		$id_selera = $this->input->post('id_selera');
		if ($this->form_validation->run()){
			if(empty($id_selera) || $id_selera == 0 || $id_selera == 'null'){
				if ($this->m_data->insertSelera($this->input->post())){
					$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data Berhasil Disimpan");
				} else {
					$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => "Terjadi kesalahan ketika mengeksekusi query");
				}
			} else {
				if ($this->form_validation->run()){
					$data = array (
						'selera' => ucfirst($this->input->post('selera')),
						'id_kategori' => $this->input->post('kategori')
					);
					if ($this->m_data->updateSelera($id_selera, $data)){
						$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data berhasil diperbaharui!", 'id_selera' => $id_selera);
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


	public function rasa()
	{	
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$data['selera']=$this->m_data->selera();
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/rasa',$data);
		$this->load->view('admin/html/footer');
	}

	public function fetchRasa(){
		$result['data'] = $this->m_data->fetchRasa();
		echo json_encode($result);
	}

	public function insert_rasa(){
		$this->load->helper('form');
		$this->form_validation->set_rules('selera', "Selera", 'required');
		$this->form_validation->set_rules('rasa', "Rasa", 'required');
		$this->form_validation->set_message('required', 'Kolom %s wajib diisi!');
		$id_selera = $this->input->post('id_rasa');
		if ($this->form_validation->run()){
			if(empty($id_selera) || $id_selera == 0 || $id_selera == 'null'){
				if ($this->m_data->insertRasa($this->input->post())){
					$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data Berhasil Disimpan");
				} else {
					$status = array('status' => 'danger', 'icon' => 'fa-ban', 'title' => 'Alert!', 'message' => "Terjadi kesalahan ketika mengeksekusi query");
				}
			} else {
				if ($this->form_validation->run()){
					$data = array (
						'id_selera' => $this->input->post('selera'),
						'rasa' => ucfirst($this->input->post('rasa'))
					);
					if ($this->m_data->updateRasa($id_selera, $data)){
						$status = array('status' => 'success', 'icon' => 'fa-check', 'title' => 'Success!', 'message' => "Data berhasil diperbaharui!", 'id_selera' => $id_selera);
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

	public function deleteselera(){
		$no = $this->input->post('id_selera');
		$result = $this->m_data->deleteselera($no);
		echo json_encode($result);
	}

	public function deleterasa(){
		$no = $this->input->post('id_rasa');
		$result = $this->m_data->deleterasa($no);
		echo json_encode($result);
	}
}
