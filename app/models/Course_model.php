<?php
class Course_model extends CI_Model {
	function validate() {

		$this -> db -> where('college_name', $this -> input -> post('college_name'));
		$this -> db -> where('course_name', $this -> input -> post('course_name'));
		$query = $this -> db -> get('Course');
		if ($query -> num_rows() == 1) {
			return TRUE;
		}

	}

	function create_course($course_name, $college_name) {

		$new_course_insert_data = array('course' => $course_name, 'college' => $college_name);

		$insert = $this -> db -> insert('Course', $new_course_insert_data);
		return $insert;
	}

	function courseExists($course,$college) 
	{
	
		$this->db->where('course',$course);
		$this->db->where('college',$college);
		$q = $this -> db -> get('Course');
		//where college is the same
		if ($q -> num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function getID($course_name, $college_name){
		$this->db->where('course',$course_name);
		$this->db->where('college',$college_name);
		$q = $this -> db -> get('Course');
		//where college is the same
		if ($q -> num_rows() == 0) {
			return NULL;
		} else if ($q -> num_rows() == 1){
			return $q->row()->id;
		}else{
			return 'error';
		}
	}

}


