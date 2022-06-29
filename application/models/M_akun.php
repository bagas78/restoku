<?php 
class M_akun extends CI_Model{
	public function __construct()
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
	  return $this->db->get_where('tb_admin',array('id_admin'=>$id))->row();
	}

	public function insert($data)
	{
	  $this->db->insert('tb_admin', $data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
 
	function update($data,$where){
		$this->db->update('tb_admin',$data,$where);
	}

	// function forgot_username($user){
	// 	$this->db->select('username');
	// 	$this->db->where('username',$user);
	// 	return $this->db->get('tb_admin')->result();
	// }

	// function forgot_email($mail){
	// 	$this->db->select('email');
	// 	$this->db->where('email',$mail);
	// 	return $this->db->get('tb_admin')->result();
	// }

	function change_pass($data,$username,$email){
		$this->db->update('tb_admin',$data);
		$this->db->where('username',$username AND 'email',$email);
		return ($this->db->affected_rows());
	}

}
