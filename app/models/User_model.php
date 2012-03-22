<?php
class User_model extends CI_Model {
	function validate($username, $password) {

		$this -> db -> where('username', $username);
		$this -> db -> where('password', md5($password));
		$query = $this -> db -> get('User');
		if ($query -> num_rows() == 1) {
			return TRUE;
		}

	}
	
	function create_user($first, $last, $email, $username, $password)
	{
		
		$new_user_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('User', $new_user_insert_data);
		return $insert;
	}

}
