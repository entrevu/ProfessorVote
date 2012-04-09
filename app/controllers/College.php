<?php

/**
 *
 */
class College extends CI_Controller {

	function index() {
		$data['main_content'] = 'College_Form';
		$this -> load -> view('includes/template', $data);
	}
	
	function addCollege() {
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_error_delimiters('<div class="alert alert-error">', '</div>');
		
		$this -> form_validation -> set_rules('college_name', 'College Name', 'trim|required|min_length[4]|max_length[32]|callback_college_state_check');
		$this -> form_validation -> set_rules('state', 'State', 'trim|required|min_length[2]|max_length[2]');
		$this -> form_validation -> set_rules('city', 'City', 'trim|required|min_length[4]|max_length[32]');

		if ($this -> form_validation -> run() == FALSE) {
			//reload page with error msg and populate fields.
			$data['main_content'] = 'College_Form';
			$data['college_name'] = $this -> input -> post('college_name');
			$data['state'] = $this -> input -> post('state');
			$data['city'] = $this -> input -> post('city');
			$this -> load -> view('includes/template', $data);
		} else {
			//insert into DB
			$this -> load -> model('College_model');			
			$college_name = $this -> input -> post('college_name');
			$state = $this -> input -> post('state');
			$city = $this -> input -> post('city');

			if ($this -> College_model -> create_college($college_name, $state, $city)) {
				//$courseID = $this -> Course_model ->getID($course_name, $college_name);
				$data['main_content'] = 'CollegeConfirm';
				$data['collegeName'] = $college_name;
				$data['isConfirm'] = TRUE;
				$this -> load -> view('includes/template', $data);
			} else {
				//reload page and show error message
				$data['college_name'] = $this -> input -> post('college_name');
				$data['state'] = $this -> input -> post('state');
				$data['city'] = $this -> input -> post('city');
				$data['error_msg'] = 'Unknown Error.  Course could not be added.' . 'College: ' . $college_name . ' State: ' . $state . ' City: ' . $city;
				$this -> load -> view('includes/template', $data);
			}
		}
	}
public function college_state_check($str) {
		$this -> load -> model('College_model');
		$result = $this->College_model ->collegeStateExists($str,$this -> input -> post('state'));
		if($result==TRUE){
			$this->form_validation->set_message('college_state_check', 'The state and college combination you entered already exists.');
			return FALSE;
		}
		else{
			return TRUE;
		}

	}
}