<?php

class ClassPage extends CI_Controller{
	
	function index(){
		$data['main_content'] = 'ClassPage';
		$this->load->view('includes/template', $data);
	}
}