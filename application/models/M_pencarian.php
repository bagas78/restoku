<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_pencarian extends CI_Model {

  function pencarian($key){
    $this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori','tb_menu.id_kategori=tb_kategori.id_kategori');
    $this->db->join('tb_selera','tb_menu.id_selera=tb_selera.id_selera');
    $this->db->where('tb_menu.id_kategori = 1');
    $this->db->like('nama_menu', $key);
		return $this->db->get()->result();
  }

  function pencarianminuman($key){
    $this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori','tb_menu.id_kategori=tb_kategori.id_kategori');
    $this->db->join('tb_selera','tb_menu.id_selera=tb_selera.id_selera');
    $this->db->where('tb_menu.id_kategori = 2');
    $this->db->like('nama_menu', $key);
		return $this->db->get()->result();
  }

  function pencariansnack($key){
    $this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori','tb_menu.id_kategori=tb_kategori.id_kategori');
    $this->db->join('tb_selera','tb_menu.id_selera=tb_selera.id_selera');
    $this->db->where('tb_menu.id_kategori = 3');
    $this->db->like('nama_menu', $key);
		return $this->db->get()->result();
  }
  
}
