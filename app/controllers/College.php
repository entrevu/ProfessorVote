<?php
include ('Pulse/Pulse.vote.class.php');
class College extends CI_Controller {

	function index() {
		browse();
	}

	function browse() {
		$this -> load -> model('College_model');
		$data['main_content'] = 'BrowseCollegesPage';

		$params = array('table_name' => 'college', 'column_name' => 'Name');
		$this -> load -> library('AbcBar', $params);

		$data['abcBar'] = $this -> abcbar -> CreateAlphabetNavigationBar();
		$this -> load -> view('includes/template', $data);
	}

	function view() {

	}

	function search() {
		$this -> load -> model('College_model');
		$data['records'] = $this -> College_model -> getAll();
		$data['main_content'] = 'CollegeSearchPage';
		$this -> load -> view('includes/template', $data);
	}

}
