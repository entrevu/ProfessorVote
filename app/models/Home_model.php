<?php
   
class Home_model extends Model {
	
	
	// get all the records
	function getAll(){
		$q = $this->db->query("SELECT * FROM tablename"); // sort in alphabetical order
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
		}
	}
	
	// query with active records
	function getAllFun(){
		$q = $this->db->get('data', 5);
		
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	// query with sql
	function getAllRow(){
		$this->db->select('title contents');
		$q = $this->db->get('data');
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	// raw sql query to interact with database
	function getAll(){
		$sql = "SELECT title, author, contents FROM data WHERE id = ? AND author = ?";
		$q = $this->db->query($sql, array(2, 'David Vu'));
		
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$data[] = $row;
			} // if number or rows == 1 check
			return $data;
		}
	}
	
	// more specific with active records
	// with where and from active records
	function getAllUpdates(){
		$this->db->select('title, contents');
		$this->db->from('data');
		$this->db->where('id', 1);
		
		$q = $this->db->get();
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
}
