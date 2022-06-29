<?php 

class M_transaksi extends CI_Model{

	function gettransaksi($menu){
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_selera','tb_selera.id_selera = tb_menu.id_selera');
		$this->db->where_in('id_menu', $menu);
		return $this->db->get()->result_array();
	}

	function gettransaksi1($menu){
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_selera','tb_selera.id_selera = tb_menu.id_selera');
		$this->db->where_in('id_menu', $menu);
		$this->db->order_by('id_menu', 'asc');
		return $this->db->get()->result();
	}

	function transaksi(){
		$date = date('Y-m-d');
		$this->db->select('id_transaksi,no_transaksi,meja,pembeli,time,status,total,date_time');
		$this->db->from('tb_transaksi');
		$this->db->where('date_time',$date);
		$this->db->where('status = 1 OR status = 2 OR status = 4');
		$this->db->order_by('id_transaksi asc');
		return $this->db->get()->result();
	}

	function ordernew(){
		$date = date('Y-m-d');
		$this->db->select('id_transaksi,no_transaksi,meja,pembeli,time,status,total,date_time');
		$this->db->from('tb_transaksi');
		$this->db->having('status = 1 OR status = 4');
		$this->db->order_by('id_transaksi asc');
		return $this->db->get()->result();
	}

	function transaksi2(){
		$date = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->where('date_time',$date);
		$this->db->where('status = 3 OR status = 2');
		$this->db->order_by('status asc');
		return $this->db->get()->result();
	}

	function orderprosesnew(){
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->where('status = 2');
		$this->db->order_by('id_transaksi asc');
		return $this->db->get()->result();
	}

	function rasa($rasa){
		$rasa = array_reverse($rasa);
		$result = array();
		foreach ($rasa as $val){
			$this->db->select('tb_rasa.*');
			$this->db->from('tb_menu');
			$this->db->join('tb_rasa','tb_rasa.id_selera = tb_menu.id_selera');
			$this->db->where('id_menu', $val);
			$result[] = $this->db->get()->result_array();
		}
		return $result;
	}

	function rasa12($rasa){
		$rasa = array_reverse($rasa);
		$result = array();
		foreach ($rasa as $val){
			$this->db->select('tb_rasa.*');
			$this->db->from('tb_menu');
			$this->db->join('tb_rasa','tb_rasa.id_selera = tb_menu.id_selera');
			$this->db->where('id_menu', $val);
			$result[] = $this->db->get()->result();
		}
		return $result;
	}

	function insert($data){
		$query = $this->db->insert('tb_transaksi', $data);
		return ($this->db->affected_rows() > 0);
	}

	function create1($data){
		return	$this->db->insert('tb_transaksi', $data);
	}

	function create2($data2){
		return	$this->db->insert('tb_transaksi_master', $data2);
	}

	function update_stok($abcde,$id_menu){
		$query = $this->db->where('id_menu', $id_menu)->update('tb_menu', $abcde);
		return ($this->db->affected_rows());
	}

	function getorderadmin($no){
		
		$this->db->select('*');
		$this->db->from('tb_transaksi_master');
		// $this->db->join('tb_transaksi','tb_transaksi.id_transaksi = tb_transaksi_master.id_transaksi');
		$this->db->where('tb_transaksi_master.id_transaksi', $no);
		return $this->db->get()->result();
	}

	function gettotal($no){
		
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->where('id_transaksi', $no);
		return $this->db->get()->result();
	}

	function getdetailtotal($no){
		
		$this->db->select('*');
		$this->db->from('tb_transaksi_detail');
		$this->db->where('id_transaksi', $no);
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	function gettotal2($no){
		
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->where('id_transaksi', $no);
		return $this->db->get()->result_array();
	}
	
	function updateStatus($cek){
		$a = 2;
		$abcde = array(
			'status' => $a
		);
		$query = $this->db->where('id_transaksi', $cek)->update('tb_transaksi', $abcde);
		return ($this->db->affected_rows());
	}

	function updateStatus2($cek){
		$a = 3;
		$abcde = array(
			'status' => $a
		);
		$query = $this->db->where('id_transaksi', $cek)->update('tb_transaksi', $abcde);
		return ($this->db->affected_rows());
	}

	function save($data){
		$this->db->insert('tb_transaksi_detail', $data);
		return ($this->db->affected_rows());
	}

	function getidtransaksi($id){
		$this->db->select('id_transaksi');
		$this->db->where('id_transaksi',$id);
		$this->db->limit(1);
		$this->db->order_by('no_transaksi asc');
		$query = $this->db->get('tb_transaksi');
		return $query;
	}

	function detaillaporanuser($ses){
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_transaksi_master','tb_transaksi.id_transaksi = tb_transaksi_master.id_transaksi ');
		$this->db->where('no_transaksi',$ses);
		return $this->db->get()->result(); 
	}

	function detailusertotal($no){
		
		$this->db->select('sum(total) as total');
		$this->db->from('tb_transaksi');
		$this->db->where('no_transaksi', $no);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
	

	///
	function getnomor($a){
		$this->db->select('no_transaksi');
		$this->db->from('tb_transaksi');
		$this->db->where('id_transaksi', $a);
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	function endid($a){
		$this->db->select('id_transaksi');
		$this->db->from('tb_transaksi');
		$this->db->where('no_transaksi', $a);
		$this->db->order_by('id_transaksi DESC');
		$this->db->limit(1);
		return $this->db->get();
	}

	function stokId($no){
		$this->db->select('menu,jumlah');
		$this->db->where('id_transaksi',$no);
		return $this->db->get('tb_transaksi_master')->result();
	}

	function updateOrder($jumlah,$menu){
		$data = array(
			'stok_menu' => $jumlah
		);
		$query = $this->db->where('nama_menu', $menu)->update('tb_menu', $data);
		return ($this->db->affected_rows());
	}

	function stokMenuID($menu){
		$this->db->select('stok_menu');
		return $this->db->where('nama_menu',$menu)->get('tb_menu')->row()->stok_menu;
		
	}

	function deleteOrderTransaksi($batal){
		$query = $this->db->where('id_transaksi', $batal)->delete('tb_transaksi');
		return ($this->db->affected_rows());
		
	}

	function deleteOrderTransaksiMaster($batal){
		$query = $this->db->where('id_transaksi', $batal)->delete('tb_transaksi_master');
		return ($this->db->affected_rows());
	}

	function deleteOrderTransaksiMasterMenu($id){
		$query = $this->db->where('id_transaksi_master', $id)->delete('tb_transaksi_master');
		return ($this->db->affected_rows());
	}

	function get($id){
		// $this->db->select('menu,jumlah,request,rasa');
		$query = $this->db->where('id_transaksi_master', $id)->get('tb_transaksi_master');
		return $query->row();
	}

	function updatePesanan($data,$id){
		$query = $this->db->where('id_transaksi_master', $id)->update('tb_transaksi_master', $data);
		return ($this->db->affected_rows());
	}

	function StokBeli($id){
		$this->db->select('jumlah');
		$this->db->where('id_transaksi_master',$id);
		return $this->db->get('tb_transaksi_master')->result();
	}
	function Stok($menu){
		$this->db->select('stok_menu');
		$this->db->where('nama_menu',$menu);
		return $this->db->get('tb_menu')->result();
	}

	function updateOrderTransaksiMasterMenu($nama_menu,$data){
		$query = $this->db->where('nama_menu', $nama_menu)->update('tb_menu', $data);
		return ($this->db->affected_rows());
	}

	function getT($id_trans){
		$this->db->select('total');
		$this->db->where('id_transaksi',$id_trans);
		return $this->db->get('tb_transaksi')->result();
	}

	function getS($id){
		$this->db->select('subtotal');
		$this->db->where('id_transaksi_master',$id);
		return $this->db->get('tb_transaksi_master')->result();
	}

	function updateTotalOrderTransaksiMasterMenu($dataTo,$id){
		$query = $this->db->where('id_transaksi', $id)->update('tb_transaksi', $dataTo);
		return ($this->db->affected_rows());
	}

	// function jum($id){
	// 	$this->db->select('jumlah');
	// 	$this->db->where('id_transaksi_master',$id);
	// 	return $this->db->get('tb_transaksi_master')->result();
	// }

	function updateMenuMaster($updateJumlah,$menu){
		$query = $this->db->where('nama_menu', $menu)->update('tb_menu', $updateJumlah);
		return ($this->db->affected_rows());
	}

	function toooo($id_master){
		$this->db->SELECT('SUM(subtotal) AS subtotal');
		$this->db->FROM('tb_transaksi');
		$this->db->JOIN('tb_transaksi_master','tb_transaksi.id_transaksi = tb_transaksi_master.id_transaksi');
		$this->db->WHERE('tb_transaksi_master.id_transaksi',$id_master);
		$this->db->GROUP_BY ('STATUS');
		return $this->db->get()->result();
	}

	function updateTotalMaster($id_master,$toot){
		$query = $this->db->where('id_transaksi', $id_master)->update('tb_transaksi', $toot);
		return ($this->db->affected_rows());
	}
}
