<?php

class College_model extends CI_Model {
    
    function getAll() {
        $q = $this -> db -> get('College');
        if ($q -> num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
	function collegeExists($college){
		$q = $this -> db -> get('College');
        if ($q -> num_rows() > 0) {
            foreach ($q->result() as $row) {
                if($row->Name==$college){
                return TRUE;	
                }
            }
			return FALSE;
        }
	}
	
	function collegeStateExists($college, $state){ // function to see if there is a college of a certain name that already exists in a state.
		$q = $this -> db -> query("SELECT * FROM `COLLEGE` Where Name = '".$college."' AND State = '".$state."'");
        if ($q -> num_rows() > 0) {
            return TRUE;
        }
		else{
		return FALSE;
		}
	}
	
	function create_college($college_name, $state, $city) {

		$new_college_insert_data = array('name' => $college_name, 'city' => $city, 'state' => $state);

		$insert = $this -> db -> insert('College', $new_college_insert_data);
		return $insert;
	}

}
