<?php 

class Model_laporan extends CI_Model{

	function createChart($start_date = null, $end_date = null)
	{
		$this->db->select('date_time, sum(total) as total');
		$this->db->from('tb_transaksi');
		if (!empty($start_date) && !empty($end_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->group_by('date_time');
		$query = $this->db->get();
		return $query->result();
	}

	function createLaporan($start_date = null,$end_date)
	{
		$this->db->select('id_transaksi,no_transaksi,meja,pembeli,status, sum(total) as total,time,date_time');
		$this->db->from('tb_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->group_by('no_transaksi');
		$query = $this->db->get();
		return $query->result();
	}

	function createLaporanbulan($start_date = null,$end_date)
	{
		$this->db->select('id_transaksi,no_transaksi,meja,pembeli,status, sum(total) as total,time,date_time');
		$this->db->from('tb_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->group_by('no_transaksi');
		$query = $this->db->get();
		return $query->result();
	}

	function createLaporanbulandetail($start_date = null,$end_date)
	{
		$this->db->select('sum(total) as total');
		$this->db->from('tb_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		// $this->db->group_by('no_transaksi');
		$query = $this->db->get();
		return $query->result();
	}

	function createLaporanharidetail($start_date = null,$end_date)
	{
		$this->db->select('sum(total) as total');
		$this->db->from('tb_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		// $this->db->group_by('no_transaksi');
		$query = $this->db->get();
		return $query->result();
	}


	///
	function createLaporanmenu($start_date = null,$end_date)
	{
		$this->db->select('no_transaksi, sum(jumlah) as jumlah,time,date_time,menu');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_transaksi_master','tb_transaksi.id_transaksi = tb_transaksi_master.id_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->group_by('menu');
		$query = $this->db->get();
		return $query->result();
	}

	function createLaporanharimenudetail($start_date = null,$end_date)
	{
		$this->db->select('no_transaksi, sum(jumlah) as jumlah,time,date_time,menu');
		$this->db->from('tb_transaksi_master');
		$this->db->join('tb_transaksi','tb_transaksi.id_transaksi = tb_transaksi_master.id_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->group_by('menu');
		$query = $this->db->get();
		return $query->result();
	}

	function createLaporanbulanmenu($start_date = null,$end_date)
	{
		$this->db->select('sum(jumlah) as jumlah,menu');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_transaksi_master','tb_transaksi.id_transaksi = tb_transaksi_master.id_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->group_by('menu');
		$query = $this->db->get();
		return $query->result();
	}

	function createLaporanbulanmenudetail($start_date = null,$end_date)
	{
		$this->db->select('sum(jumlah) as jumlah,menu');
		$this->db->from('tb_transaksi_master');
		$this->db->join('tb_transaksi','tb_transaksi.id_transaksi = tb_transaksi_master.id_transaksi');
		if (!empty($start_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->group_by('menu');
		$query = $this->db->get();
		return $query->result();
	}

	function pie($start_date = null, $end_date = null){
		$this->db->select('menu,sum(jumlah) as jumlah');
		$this->db->from('tb_transaksi_master');
		$this->db->join('tb_transaksi','tb_transaksi_master.id_transaksi = tb_transaksi.id_transaksi');
		if (!empty($start_date) && !empty($end_date)){
			$this->db->where('date_time >=', date('Y-m-d 00:00:00', strtotime($start_date)));
			$this->db->where('date_time <=', date('Y-m-d 23:59:59', strtotime($end_date)));
		}
		$this->db->where('id_kategori = 1');
		$this->db->group_by('menu');
		return $this->db->get()->result();
	}
}
