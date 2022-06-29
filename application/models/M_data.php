<?php 
class M_data extends CI_Model{

	function __construct()
	{
	  parent::__construct();
		  $this->load->database();
		  $this->db->select('*');    
		  $this->db->from('tb_menu');
		  $this->db->join('tb_kategori', 'tb_menu.id_kategori = tb_kategori.id_kategori');
		  $this->db->join('tb_favorit','tb_favorit.id_favorit=tb_kategori.id_kategori');
		  $query = $this->db->get();
	  return $query->result();
	}

	function get_by_id($id)
	{
	  return $this->db->get_where('tb_menu',array('id_menu'=>$id))->row();
	}

	function tampil_data_profil(){
	  return $this->db->get_where('tb_admin',array('id_admin'=>$id))->row();
	}
	function tampil_data_admin(){
		$this->db->order_by('id_admin DESC');
		return $this->db->get('tb_admin')->result();
	}

	function tampil_data_makanan_favorit(){
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_menu.id_kategori');
		$this->db->join('tb_favorit', 'tb_favorit.id_favorit = tb_menu.id_favorit');
		$this->db->join('tb_selera', 'tb_selera.id_selera = tb_menu.id_selera', 'left');
		$this->db->having('tb_favorit.id_favorit = 1');
		$this->db->having('tb_kategori.id_kategori = 1');
		$this->db->order_by('id_menu DESC');
		return $this->db->get()->result();
	}

	function data($number,$offset){
		$this->db->from('tb_menu');
		$this->db->join('tb_selera', 'tb_selera.id_selera = tb_menu.id_selera');
		$this->db->order_by('id_menu DESC');
		$this->db->limit($number, $offset);
		$query = $this->db->get();
		return $query->result();
		// return $query = $this->db->get_where('tb_menu', array('id_kategori'=>1), $number,$offset)->result();		
	}
	
	function jumlah_makanan(){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu', array('id_favorit'=>4,'id_kategori'=>1))->num_rows();
	}

	function tampil_data_makanan_favorit_umum($number,$offset){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu',$number,$offset, array('id_favorit'=>4,'id_kategori'=>1))->result();
	}

	function tampil_data_makanan(){
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_selera', 'tb_selera.id_selera = tb_menu.id_selera');
		$this->db->where('tb_menu.id_kategori = 1');
		$this->db->order_by('id_menu DESC');
		return $this->db->get()->result();
		// return $this->db->get_where('tb_menu',array('id_kategori'=>1))->result();
	}

	function tampil_data_meja(){
		$this->db->order_by('id_meja DESC');
		return $this->db->get('tb_meja')->result();
	}
	
	function tampil_data_minuman_favorit(){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu',array('id_favorit'=>2,'id_kategori'=>2))->result();
	}

	function tampil_data_minuman_favorit_umum(){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu',array('id_favorit'=>4,'id_kategori'=>2))->result();
	}

	function tampil_data_minuman(){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu',array('id_kategori'=>2))->result();
	}

	function tampil_data_snack_favorit(){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu',array('id_favorit'=>3,'id_kategori'=>3))->result();
	}

	function tampil_data_snack_favorit_umum(){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu',array('id_favorit'=>4,'id_kategori'=>3))->result();
	}

	function tampil_data_snack(){
		$this->db->order_by('id_menu DESC');
		return $this->db->get_where('tb_menu',array('id_kategori'=>3))->result();
	}

function kategori(){
		$query = $this->db->get('tb_kategori');
		return $query->result_array();
	}

	function favorit(){
		$query = $this->db->get('tb_favorit');
		return $query->result_array();
	}

	function selera(){
		$query = $this->db->get('tb_selera');
		return $query->result_array();
	}


	function meja(){
		$query = $this->db->get('tb_meja');
		return $query->result_array();
	}

	function jenis_makanan(){
		$query = $this->db->get('tb_jnsmakanan');
		return $query->result_array();
	}

	function insert($data)
	{
	  $this->db->insert('tb_menu', $data);
	}
 
	function update($data,$where){
		$this->db->update('tb_menu',$data,$where);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function daftar($data)
	{
	  $this->db->insert('tb_admin', $data);
	}

	function jumlah_data(){
		return $this->db->get_where('tb_menu',array('id_kategori'=>1))->num_rows();
	}

	function fetchMeja(){
		$query = $this->db->get('tb_meja');
		return $query->result();
	}

	function insertMeja($post_data){
		$data = array('nama_meja' 		=> strtoupper($post_data['nama_meja']),
						'kapasitas' 		=> $post_data['kapasitas']
					);
		$query = $this->db->insert('tb_meja', $data);
		return ($this->db->affected_rows());
	}

	function updateMeja($id, $data){
		$query = $this->db->where('id_meja', $id)->update('tb_meja', $data);
		return ($this->db->affected_rows());
	}

	function fetchSelera(){
		$this->db->select('*');
		$this->db->from('tb_selera');
		$this->db->join('tb_kategori','tb_selera.id_kategori = tb_kategori.id_kategori');
		return $this->db->get()->result();
	}

	function insertSelera($post_data){
		$data = array('selera' 		=> ucfirst($post_data['selera']),'id_kategori'=> $post_data['kategori']);
		$query = $this->db->insert('tb_selera', $data);
		return ($this->db->affected_rows());
	}

	function updateSelera($id, $data){
		$query = $this->db->where('id_selera', $id)->update('tb_selera', $data);
		return ($this->db->affected_rows());
	}

	function fetchRasa(){
		$this->db->select('*');
		$this->db->from('tb_rasa');
		$this->db->join('tb_selera','tb_rasa.id_selera = tb_selera.id_selera');
		return $this->db->get()->result();
	}

	function insertRasa($post_data){
		$data = array('rasa' 		=> ucfirst($post_data['rasa']),'id_selera'=> $post_data['selera']);
		$query = $this->db->insert('tb_rasa', $data);
		return ($this->db->affected_rows());
	}

	function updateRasa($id, $data){
		$query = $this->db->where('id_rasa', $id)->update('tb_rasa', $data);
		return ($this->db->affected_rows());
	}

	function fetchJenis(){
		$query = $this->db->get('tb_jnsmakanan');
		return $query->result();
	}

	function insertJenis($post_data){
		$data = array('jenis_makanan' 		=> ucfirst($post_data['jenis_makanan'])
					);
		$query = $this->db->insert('tb_jnsmakanan', $data);
		return ($this->db->affected_rows());
	}

	function updateJenis($id, $data){
		$query = $this->db->where('id_jenis', $id)->update('tb_jnsmakanan', $data);
		return ($this->db->affected_rows());
	}

	function fetch1rasa($id_selera = null){
		if (empty($id_selera)){
			$query = $this->db->get('tb_rasa');
		} else {
			$query = $this->db->where('id_selera', $id_selera)->get('tb_rasa');
		}
		return $query->result();
	}
	public function deletemeja($no){
		$query = $this->db->where('id_meja', $no)->delete('tb_meja');
		return ($this->db->affected_rows());
	}

	public function deleteselera($no){
		$query = $this->db->where('id_selera', $no)->delete('tb_selera');
		return ($this->db->affected_rows());
		$query = $this->db->where('id_rasa', $no)->delete('tb_rasa');
		return ($this->db->affected_rows());
	}

	public function deleterasa($no){
		$query = $this->db->where('id_rasa', $no)->delete('tb_rasa');
		return ($this->db->affected_rows());
	}
	function rasa(){
		$this->db->where('id_selera = 8');
		$query = $this->db->get('tb_rasa');
		return $query->result_array();
	}

	function getProfil($id){
		$this->db->where('id_admin',$id);
		return $this->db->get('tb_admin')->result();
	}

	function ac_id(){
		$this->db->select('id_menu');
		$this->db->where('id_kategori = 1 AND id_favorit = 4');
		$this->db->Order_by('id_menu DESC');
		return $this->db->get('tb_menu')->result_array();
	}

	function ac_id_minuman(){
		$this->db->select('id_menu');
		$this->db->where('id_kategori = 2');
		$this->db->Order_by('id_menu DESC');
		return $this->db->get('tb_menu')->result_array();
	}

	function ac_id_snack(){
		$this->db->select('id_menu');
		$this->db->where('id_kategori = 3');
		$this->db->Order_by('id_menu DESC');
		return $this->db->get('tb_menu')->result_array();
	}

	function ac_id_fav(){
		$this->db->select('id_menu');
		$this->db->where('id_kategori = 1 AND id_favorit = 1');
		$this->db->Order_by('id_menu DESC');
		return $this->db->get('tb_menu')->result_array();
	}
}
