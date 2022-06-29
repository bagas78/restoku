<?php
class Model_data_upload extends CI_Model
{
    function cekEmail($id){
		$this->db->select('email');
		$this->db->where('id',$id);
		return $this->db->get('tbl_user_apps')->result();
	}
    
    function upload($data,$id){
		$query = $this->db->where('id',$id)->update('test', $data);
		return ($this->db->affected_rows());
	}
    
}