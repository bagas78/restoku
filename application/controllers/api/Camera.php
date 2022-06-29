<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camera extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api/model_data_upload');
		$this->load->library('upload');
	}
	
	function index() {
		$this->load->view('api/index');
	}
	
	function upload(){
	   $idorder = 22;
	   $img_name = "file_".$idorder;
	  $config['upload_path']          = './konfirmasi/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name']           = $img_name;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$responseJson["error"] = false;
			$responseJson["user"]["message"] = "Gambar Null";
			echo json_encode($responseJson);
		}else{
			$file = $this->upload->data();
			$data = array(
				'foto_konfirm' => $img_name
			);
			$img = $this->model_data_upload->upload($data,$idorder);
			if ($img) {
			    echo 'berhasil';
			} else {
			    echo 'gagal';
			}
			$responseJson["error"] = false;
			$responseJson["user"]["message"] = "Gambar Yess";
			echo json_encode($responseJson);
		}
	 //   //print_r($img_name);
	 //    $config = array(
		// 	'upload_path' => '././konfirmasi/',
		// 	'allowed_types' => 'jpeg|jpg|png|webp',
  //   		'overwrite' => TRUE,
  //   		'max_size' => "2048000",
  //   		'max_height' => "10000",
  //   		'max_width' => "20000"
		// 	// 'file_name' => $img_name
 	// 	);
		// $this->load->library('upload', $config);
		// if ($this->upload->do_upload('image')) {
		// 	$file = $this->upload->data();
		// 	$data = array(
		// 		'foto_konfirm' => $img_name
		// 	);
		// 	$img = $this->model_data_upload->upload($data,$idorder);
		// 	if ($img) {
		// 	    echo 'berhasil';
		// 	} else {
		// 	    echo 'gagal';
		// 	}$responseJson["error"] = false;
		// 	$responseJson["user"]["message"] = "Gambar Yess";
		// } else {
		//     $responseJson["error"] = true;
		// 	$responseJson["user"]["message"] = "Gambar Null";
		// }
		// echo json_encode($responseJson);
	}
}