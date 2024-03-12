<?php
class User extends CI_Model {
    function getdata($username,$password) {
		$this->db->select('*');
        $this->db->from('login');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get();
		$ret = $query->result_array();
        return $ret[0];
	}
}
