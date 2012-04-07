<?php

class ProfilePage extends CI_Controller{
	
	function profile()
	{
		parent::CI_Controller;
	}
	
	function index()
	{
		$data['main_content'] = 'ProfilePageView';
		$this->load->view('includes/template', $data);
	}
	
	function show()
	{
		$id = $this -> uri -> segment(3);
		$query = $this -> User_model -> fetch_user($username);
		
		if ($query -> num_rows() == 1)
		{
			$row = $query -> row();
			$data['user']['id'] = $row -> id;
			$data['user']['username'] = $row -> username;
			$data['user']['email_address'] = $row -> email;
			$data['user']['first_name'] = $row -> first;
			$data['user']['last_name'] = $row -> last;
		}
		
		$query -> free_result();
		
		$this -> load -> view('ProfilePageView', $data);
	}
	
	function edit()
	{
		$id = $this -> uri -> segment(3);
		
		if (belongsToGroup('User') && $id === $this -> db_session -> userdata('id'))
		{
			$rules['password'] = 'trim|xss_clean|callback__password_check';
			$rules['password_confirm'] = 'trim|xss_clean|matches[password]';
			$rules['email_address'] = 'trim|required|valid_email|xss_clean|callback__email_duplicate_check';
		}
		
		else
		{
			$msg = 'You must login to access this restricted area.';
			$this -> db_session -> set_flashdata('flashMessage', $msg, 1);
			redirect('', 'location');
		}
	}
}
