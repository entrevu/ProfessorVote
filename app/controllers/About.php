<?php
	
class About extends CI_Controller{
	
	function index()
	{
		 $data['main_content'] = 'AboutPage';
		 $this->load->view('includes/template', $data);
	}
	
	
}
