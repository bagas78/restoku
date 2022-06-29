<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('dashboard/html/html_open');
		$this->load->view('dashboard/html/header',$data);
		$this->load->view('dashboard/html/aside');
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/html/footer');
		$this->load->view('dashboard/html/html_close');
	}

	public function tentang_kami()
	{
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('dashboard/html/html_open');
		$this->load->view('dashboard/html/header',$data);
		$this->load->view('dashboard/html/aside');
		$this->load->view('dashboard/tentang_kami');
		$this->load->view('dashboard/html/footer');
		$this->load->view('dashboard/html/html_close');
	}
}
