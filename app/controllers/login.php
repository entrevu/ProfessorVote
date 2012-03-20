<?php

/**
 *
 */
class Login extends CI_Controller {

	function index() {
		$data['main_content'] = 'login_form';
		$this -> load -> view('includes/template', $data);
	}

	function validate_credentials() {
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		
		if ($this -> form_validation -> run() == FALSE) {
			$data['main_content'] = 'login_form';
			$this -> load -> view('includes/template', $data);
		} else {
			$this -> load -> model('User_model');
			$query = $this -> User_model -> validate();
			if ($query)// if the user's credentials validated...
			{
				$data = array('username' => $this -> input -> post('username'), 'is_logged_in' => true);
				$this -> session -> set_userdata($data);
				redirect('home');
			} else// incorrect username or password
			{
				$data['main_content'] = 'login_form';
				$this -> load -> view('includes/template', $data);
			}
		}
	}

	function signup() {
		$data['main_content'] = 'signup_form';
		$this -> load -> view('includes/template', $data);
	}

	function create_user() {
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_error_delimiters('<div class="alert alert-error">', '</div>');
		// field name, error message, validation rules
		$this -> form_validation -> set_rules('first_name', 'Name', 'trim|required');
		$this -> form_validation -> set_rules('last_name', 'Last Name', 'trim|required');
		$this -> form_validation -> set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this -> form_validation -> set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this -> form_validation -> run() == FALSE) {
			$data['main_content'] = 'signup_form';
			$this -> load -> view('includes/template', $data);
		} else {
			$this -> load -> model('User_model');

			if ($query = $this -> User_model -> create_user()) {
				redirect('home');
			} else {
				$data['main_content'] = 'signup_form';
				$this -> load -> view('includes/template', $data);
			}
		}

	}

}
