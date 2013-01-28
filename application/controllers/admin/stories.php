<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');	
		
		if (! $this->security_handler->secure_page()) {
			redirect('/admin');
		}
	}
	
	function index() {
		
		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table(STORIES_TABLE);
			$crud->set_subject('Stories');
			$crud->required_fields('title', 'contents');
			$crud->set_field_upload('audio', 'assets/uploads/audio');
			$output = $crud->render();
			
			$this->__output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
		//$this->__output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	function __output($output = NULL) {
		$this->load->view('admin/header', $output);
		$this->load->view('admin/stories');
		$this->load->view('admin/footer');
	}
	
	
	
}

/* End of file stories.php */
/* Location: ./application/controllers/admin/stories.php */