<?php
  class Mod_login extends CI_Model {

      function cek($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("tb_admin");
			}
			
			function auth($username, $password)
			{
				return $this->db->get_where("tb_admin", array('username' => $username, 'password' => $password))
								->result_array();
			}
		
      function getLoginData($user, $pass) {
        $user;
        $password = md5($pass);
        $q_cek_login = $this->db->get_where("tb_admin", array('username' => $user, 'password' => $password));
        if (count($q_cek_login->result()) > 0) {
          foreach ($q_cek_login->result() as $qck) {
            foreach ($q_cek_login->result() as $qad) {
              $sess_data['logged_in'] = TRUE;
              $sess_data['id_admin'] = $qad->id_admin;
              $sess_data['name'] = $qad->name;
              $sess_data['username'] = $qad->username;
							$sess_data['password'] = $qad->password;
							$sess_data['status'] = $qad->status;
              $this->session->set_userdata($sess_data);
            }
          redirect('admin');
          }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login');
          }
			}
			
			function authUser($meja)
			{
				return $this->db->get_where("tb_meja", array('id_meja' => $meja))->result_array();
			}

			function getLoginDataUser($meja) {
        $meja;
        $q_cek_login = $this->db->get_where("tb_meja", array('nama_meja' => $meja));
        if (count($q_cek_login->result()) > 0) {
          foreach ($q_cek_login->result() as $qck) {
            foreach ($q_cek_login->result() as $qad) {
              $sess_data['logged_in'] = TRUE;
              $sess_data['id_meja'] = $qad->id_meja;
              $sess_data['nama_meja'] = $qad->nama_meja;
              $sess_data['kapasitas'] = $qad->kapasitas;
              $this->session->set_userdata($sess_data);
            }
          redirect('pesan');
          }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login/login_user');
          }
      }
      
      function statusUser($meja){
        $data = array(
          'status' => 1
        );
        $query = $this->db->where('id_meja', $meja)->update('tb_meja', $data);
		    return ($this->db->affected_rows());
      }

      function statusUserlogin($meja){
       $this->db->select('status');
       $this->db->where('id_meja',$meja);
        return $this->db->get('tb_meja')->result();
      }      

      function statusUserLog($meja){
        $data = array(
          'status' => 0
        );
        $query = $this->db->where('nama_meja', $meja)->update('tb_meja', $data);
		    return ($this->db->affected_rows());
      }
  }
?>
