<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_view extends CI_Model {
  
	public function umum(){
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori','tb_menu.id_kategori=tb_kategori.id_kategori');
		// $this->db->join('tb_selera','tb_menu.id_selera=tb_selera.id_selera');
		$this->db->join('tb_selera','tb_selera.id_selera=tb_menu.id_selera');
		$this->db->join('tb_rasa','tb_selera.id_selera=tb_rasa.id_selera');
		$this->db->group_by('tb_rasa.id_selera','tb_rasa.rasa');
		$this->db->Order_by('id_menu DESC');
		$this->db->having('tb_menu.id_favorit = 4 AND tb_menu.id_kategori = 1');
		return $this->db->get()->result();
	}

	public function favorit(){
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori','tb_menu.id_kategori=tb_kategori.id_kategori');
		$this->db->join('tb_selera','tb_menu.id_selera=tb_selera.id_selera');
		// $this->db->join('tb_selera','tb_selera.id_selera=tb_menu.id_selera');
		// $this->db->join('tb_rasa','tb_selera.id_selera=tb_rasa.id_selera');
		$this->db->join('tb_favorit','tb_menu.id_favorit=tb_favorit.id_favorit');
		$this->db->where('tb_menu.id_favorit = 1');
		$this->db->Order_by('id_menu DESC');
		return $this->db->get()->result();
	}

	public function minuman(){
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori','tb_menu.id_kategori=tb_kategori.id_kategori');
		$this->db->join('tb_selera','tb_menu.id_selera=tb_selera.id_selera');
		$this->db->having('tb_menu.id_kategori = 2');
		$this->db->order_by('id_menu DESC');
		return $this->db->get()->result();
	}

	public function snack(){
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori','tb_menu.id_kategori=tb_kategori.id_kategori');
		$this->db->join('tb_selera','tb_menu.id_selera=tb_selera.id_selera');
		$this->db->having('tb_menu.id_kategori = 3');
		$this->db->order_by('id_menu DESC');
		return $this->db->get()->result();
	}

	function id_menu(){
		$this->db->select('id_selera');
		$this->db->from('tb_menu');
		return $this->db->get()->result();
	}
	
	function test($cari){
		$this->db->select('*');
		$this->db->from('tb_rasa');
		$this->db->where('id_selera',$cari);
		$this->db->order_by('id_selera asc');
		return $this->db->get()->result();
	}

}
