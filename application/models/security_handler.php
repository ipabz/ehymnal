<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Security_handler extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function secure_page() {
		
		if ($this->session->userdata('administrator_id')) {
			return TRUE;
		}
		
		return FALSE;
			
	}
	
	function login($username,$password) {
		
		$condition = array(
			'username' => $username,
			'password' => sha1($password)
		);
		
		$query = $this->db->get_where(ADMINISTRATOR_TABLE, $condition);
		
		if ($query->num_rows() > 0) {
			$row_array = $query->row_array();
			unset($row_array['password']);
			
			$this->session->set_userdata($row_array);
			
			return TRUE;
		}
		
		return FALSE;
		
	}
	
}

/* End of file security_handler.php */
/* Location: ./application/models/security_handler.php */