<?php

class course extends CI_Controller {

	function index() {
		$data['main_content'] = 'add_course_form';

		$this -> load -> view('includes/template', $data);
	}


	function add() {
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_error_delimiters('<div class="alert alert-error">', '</div>');
		// field name, error message, validation rules
		//look into creating global variables for max and min length, and use those instead of constants
		$this -> form_validation -> set_rules('course_name', 'Course Name', 'trim|required|min_length[4]|max_length[32]|callback_course_check');
		$this -> form_validation -> set_rules('college_name', 'College Name', 'trim|required|min_length[4]|max_length[32]|callback_college_check');
		//look into createing customer validator Valid_coolge_name in the set_rules method
		//$this -> form_validation -> set_rules('college_name', 'College', 'trim|required|valid_college_name');

		if ($this -> form_validation -> run() == FALSE) {
			//reload page with error msg and populate fields.
			$data['main_content'] = 'add_course_form';
			$data['college_name'] = $this -> input -> post('college_name');
			$data['course_name'] = $this -> input -> post('course_name');
			$this -> load -> view('includes/template', $data);
		} else {
			//insert into DB
			$this -> load -> model('Course_model');
			$course_name = $this -> input -> post('course_name');
			$college_name = $this -> input -> post('college_name');

			if ($this -> Course_model -> create_course($course_name, $college_name)) {
				$courseID = $this -> Course_model ->getID($course_name, $college_name);
				$data['main_content'] = 'CourseView';
				$data['courseID'] = $courseID;
				$data['isConfirm'] = TRUE;
				$this -> load -> view('includes/template', $data);
			} else {
				//reload page and show error message
				$data['college_name'] = $this -> input -> post('college_name');
				$data['course_name'] = $this -> input -> post('course_name');
				$data['error_msg'] = 'Unknown Error.  Course could not be added.' . 'Course: ' . $course_name . ' College: ' . $college_name;
				$this -> load -> view('includes/template', $data);
			}
		}
	}

	public function course_check($str) {
		$this -> load -> model('Course_model');
		$result = $this->Course_model ->courseExists($str,$this -> input -> post('college_name'));
		if($result==TRUE){
			$this->form_validation->set_message('course_check', 'The course and college combination you entered already exists.');
			return FALSE;
		}
		else{
			return TRUE;
		}

	}

	public function college_check($str) {
		$this -> load -> model('College_model');
		$result = $this->College_model ->collegeExists($str);
		if($result==TRUE){
			$this->form_validation->set_message('college_check', 'The college you entered was not found.  If the college does not yet exist, the college must be created first.');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

}
