<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
	/**	$this->load->model('Home_model');
		$data[] = $this->data_model->getAll();
		
		$this->load->view('HomePage', $data); */
		
		$data['main_content'] = 'HomePage';
		$this->load->view('includes/template', $data);
	}
	
	function learnMore(){
		$this->load->view('LearnMore');
	}
	
	// if first time to site select state
	
	// once select state save to cache or database or find location on map
	
	// now default page for the user use the cache to find the page checks if already selected
	
}

