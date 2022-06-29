<?php 
class Insertdata extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
		if (!isset($this->session->userdata['id_admin'])) {
			redirect(base_url("Login"));
		}
	}

	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$config = array(
			'upload_path' => './images/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '10000',
			'max_width' => '20000',
			'file_name' => $nama,
			'max_height' => '20000'
 		);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>"
			. $this->upload->display_errors() ."</div>");
			redirect(site_url('admin/makanan'));
		} else {
			$file = $this->upload->data();
			$selera = $this->input->post('selera');
			$kategori = $this->input->post('kategori');
			$data = array(
					'nama_menu' => ucwords($this->input->post('nama')),
					'harga' => $this->input->post('harga'),
					'stok_menu' => $this->input->post('stok'),
					// 'id_jenis' => $this->input->post('jenis'),
					'id_favorit' => $this->input->post('favorit'),
					'id_selera' => $selera,
					'id_kategori' => $kategori,
					'gambar' => $file['file_name']
			);
			if($selera == '---Pilih Selera---' OR $kategori == '---Pilih Kategori---') {
				$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Kesalahan saat menginput query(Kategori dan Selera)</div>");
				redirect(site_url('admin/snack'));
			} else {
				$this->m_data->insert($data);
			}
		}
		$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil Di Tambah</div>");
			redirect(site_url('admin/makanan'));
	}
	function tambah_aksi_minuman(){
		$nama = $this->input->post('nama');
		$config = array(
			'upload_path' => './images/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '10000',
			'max_width' => '20000',
			'file_name' => $nama,
			'max_height' => '20000'
 		);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
			redirect(site_url('admin/minuman'));
		} else {
			$file = $this->upload->data();
			$selera = $this->input->post('selera');
			$kategori = $this->input->post('kategori');
			$data = array(
					'nama_menu' => ucwords($this->input->post('nama')),
					'id_kategori' => $kategori,
					'id_selera' => $selera,
					'harga' => $this->input->post('harga'),
					'stok_menu' => $this->input->post('stok'),
					'id_favorit' => $this->input->post('favorit'),
					'gambar' => $file['file_name']
			);
			if($selera == '---Pilih Selera---' OR $kategori == '---Pilih Kategori---') {
				$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Kesalahan saat menginput query(Kategori dan Selera)</div>");
				redirect(site_url('admin/snack'));
			} else {
				$this->m_data->insert($data);
			}
		}
		$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil Di Tambah</div>");
		redirect(site_url('admin/minuman'));
	}

	function tambah_aksi_snack(){
		$nama = $this->input->post('nama');
		$config = array(
			'upload_path' => './images/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '10000',
			'max_width' => '20000',
			'file_name' => $nama,
			'max_height' => '20000'
 		);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>"
			. $this->upload->display_errors() ."</div>");
			redirect(site_url('admin/snack'));
		} else {
			$file = $this->upload->data();
			$selera = $this->input->post('selera');
			$kategori = $this->input->post('kategori');
			$favorit = '3';
			$data = array(
					'nama_menu' => ucwords($this->input->post('nama')),
					'harga' => $this->input->post('harga'),
					'stok_menu' => $this->input->post('stok'),
					'id_kategori' => $kategori,
					'id_selera' => $selera,
					'id_favorit' => $favorit,
					'gambar' => $file['file_name']
			);
			if($selera == '---Pilih Selera---' OR $kategori == '---Pilih Kategori---') {
				$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Kesalahan saat menginput query(Kategori dan Selera)</div>");
				redirect(site_url('admin/snack'));
			} else {
				$this->m_data->insert($data);
			}
		}
		$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil Di Tambah</div>");
		redirect(site_url('admin/snack'));
	}

	function edit(){
		$id = $this->uri->segment(3);
		$this->load->database();
		$data['edit']=$this->m_data->get_by_id($id);
		$data['kategori']=$this->m_data->kategori();
		$data['favorit']=$this->m_data->favorit();
		$data['jenis']=$this->m_data->jenis_makanan();
		$data['selera']=$this->m_data->selera();
		$data['rasa']=$this->m_data->rasa();
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/edit/edit_data',$data);
		$this->load->view('admin/html/footer');
	}

	function edit_minuman(){
		$id = $this->uri->segment(3);
		$this->load->database();
		$data['edit']=$this->m_data->get_by_id($id);
		$data['kategori']=$this->m_data->kategori();
		$data['selera']=$this->m_data->selera();
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/edit/edit_minuman',$data);
		$this->load->view('admin/html/footer');
	}

	function edit_snack(){
		$id = $this->uri->segment(3);
		$this->load->database();
		$data['edit']=$this->m_data->get_by_id($id);
		$data['kategori']=$this->m_data->kategori();
		$data['selera']=$this->m_data->selera();
		$id = $this->session->userdata('id_admin');
		$data['profil'] = $this->m_data->getProfil($id);
		$this->load->view('admin/html/html_open');
		$this->load->view('admin/html/header',$data);
		$this->load->view('admin/html/aside');
		$this->load->view('admin/edit/edit_snack',$data);
		$this->load->view('admin/html/footer');
	}

	public function update()
	{
		$id = $this->uri->segment(3);
		$id_baru = $this->input->post('id');
		if ($_FILES AND $_FILES['gambar']['name']) {
				// Start uploading file
				$nama = $this->input->post('nama');
				$config = array(
						'upload_path' => './images/',
						'allowed_types' => 'jpeg|jpg|png',
						'max_size' => '10000',
						'max_width' => '10000',
						'file_name' => $nama,
						'max_height' => '10000'
				);
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>"
			. $this->upload->display_errors() ."</div>");
			redirect(site_url('insertdata/edit/'.$id_baru));
				} else {

						// Remove old image in folder 'images' using unlink()
						// unlink() use for delete files like image.
						unlink('images/'.$id_baru->gambar);

						// Upload file
						$id = $this->uri->segment(3);
						$where = array('id_menu' => $this->input->post('id'));
						$file = $this->upload->data();
						$data = array(
							'nama_menu' => ucwords($this->input->post('nama')),
							'harga' => $this->input->post('harga'),
							'stok_menu' => $this->input->post('stok'),
							'id_favorit' => $this->input->post('favorit'),
							'id_selera' => $this->input->post('selera'),
							// 'id_jenis' => $this->input->post('jenis'),
							'gambar' => $file['file_name']
					);

					$this->m_data->update($data,$where);
				}
		}
		// Do this if there's no image file uploaded
		else {
				$id = $this->uri->segment(3);
				$where = array('id_menu' => $this->input->post('id'));
				$data = array(
					'nama_menu' => ucwords($this->input->post('nama')),
					'harga' => $this->input->post('harga'),
					'stok_menu' => $this->input->post('stok'),
					// 'id_jenis' => $this->input->post('jenis'),
					'id_selera' => $this->input->post('selera'),
					'id_favorit' => $this->input->post('favorit')
				);
				$this->m_data->update($data,$where);
		}
		$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil Di Ubah</div>");
			redirect(site_url('admin/makanan'));
	}

	public function update_minuman()
	{
		$id = $this->uri->segment(3);
		$id_baru = $this->input->post('id');
		if ($_FILES AND $_FILES['gambar']['name']) {
				// Start uploading file
				$nama = $this->input->post('nama');
				$config = array(
						'upload_path' => './images/',
						'allowed_types' => 'jpeg|jpg|png',
						'max_size' => '10000',
						'max_width' => '10000',
						'file_name' => $nama,
						'max_height' => '10000'
				);
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>"
			. $this->upload->display_errors() ."</div>");redirect(site_url('insertdata/edit_minuman/'.$id_baru));
				} else {

						// Remove old image in folder 'images' using unlink()
						// unlink() use for delete files like image.
						unlink('images/'.$id_baru->gambar);

						// Upload file
						$id = $this->uri->segment(3);
						$where = array('id_menu' => $this->input->post('id'));
						$file = $this->upload->data();
						$data = array(
							'nama_menu' => ucwords($this->input->post('nama')),
							'harga' => $this->input->post('harga'),
							'stok_menu' => $this->input->post('stok'),
							'id_kategori' => $this->input->post('kategori'),
							'id_selera' => $this->input->post('selera'),
							'gambar' => $file['file_name']
					);

					$this->m_data->update($data,$where);
				}
		}
		// Do this if there's no image file uploaded
		else {
				$id = $this->uri->segment(3);
				$where = array('id_menu' => $this->input->post('id'));
				$data = array(
					'nama_menu' => ucwords($this->input->post('nama')),
					'harga' => $this->input->post('harga'),
					'stok_menu' => $this->input->post('stok'),
					'id_favorit' => $this->input->post('favorit')
				);
				$this->m_data->update($data,$where);
		}
		$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil Di Ubah</div>");
		redirect(site_url('admin/minuman'));
	}
	public function update_snack()
	{
		$id = $this->uri->segment(3);
		$id_baru = $this->input->post('id');
		if ($_FILES AND $_FILES['gambar']['name']) {
				// Start uploading file
				$nama = $this->input->post('nama');
				$config = array(
						'upload_path' => './images/',
						'allowed_types' => 'jpeg|jpg|png',
						'max_size' => '10000',
						'max_width' => '10000',
						'file_name' => $nama,
						'max_height' => '10000'
				);
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>"
			. $this->upload->display_errors() ."</div>");redirect(site_url('insertdata/edit_snack/'.$id_baru));
				} else {

						// Remove old image in folder 'images' using unlink()
						// unlink() use for delete files like image.
						unlink('images/'.$id_baru->gambar);

						// Upload file
						$id = $this->uri->segment(3);
						$where = array('id_menu' => $this->input->post('id'));
						$file = $this->upload->data();
						$data = array(
							'nama_menu' => ucwords($this->input->post('nama')),
							'harga' => $this->input->post('harga'),
							'stok_menu' => $this->input->post('stok'),
							'id_selera' => $this->input->post('selera'),
							'id_kategori' => $this->input->post('kategori'),
							'gambar' => $file['file_name']
					);

					$this->m_data->update($data,$where);
				}
		}
		// Do this if there's no image file uploaded
		else {
				$id = $this->uri->segment(3);
				$where = array('id_menu' => $this->input->post('id'));
				$data = array(
					'nama_menu' => ucwords($this->input->post('nama')),
					'harga' => $this->input->post('harga'),
					'stok_menu' => $this->input->post('stok'),
					'id_favorit' => $this->input->post('favorit')
				);
				$this->m_data->update($data,$where);
		}
		$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil Di Ubah</div>");
			redirect(site_url('admin/snack'));
	}
	
	function hapus($id){
		$where = array('id_menu' => $id);
		$this->m_data->hapus_data($where,'tb_menu');
		redirect('admin/makanan');
	}

	public function hapus_makanan($id)
	{
		
		$where = array('id_menu' => $id);

		if ($where) {

				// unlink() use for delete files like image.
				unlink('images/'.$where->gambar);

				$this->m_data->hapus_data($where,'tb_menu');
				$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil Di Hapus</div>");
			redirect(site_url('admin/makanan'));
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Tidak Ditemukan</div>");
			redirect(site_url('admin/makanan'));
		}
	}

	public function hapus_minuman($id)
	{
		
		$where = array('id_menu' => $id);

		if ($where) {

				// unlink() use for delete files like image.
				unlink('images/'.$where->gambar);

				$this->m_data->hapus_data($where,'tb_menu');
				$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil DiHapus</div>");
			redirect(site_url('admin/minuman'));
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Tidak Ditemukan</div>");
			redirect(site_url('admin/minuman'));
		}
	}

	public function hapus_snack($id)
	{
		
		$where = array('id_menu' => $id);

		if ($where) {

				// unlink() use for delete files like image.
				unlink('images/'.$where->gambar);

				$this->m_data->hapus_data($where,'tb_menu');
				$this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Berhasil DiHapus</div>");
			redirect(site_url('admin/snack'));
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data Tidak Ditemukan</div>");
			redirect(site_url('admin/snack'));
		}
	}

	


}
