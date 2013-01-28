<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$models = array('story_handler','hymn_model');
		$this->load->model($models);
		if (! $this->security_handler->secure_page()) {
			redirect('/admin');
		}
	}
	
	function index() {
		$header_data = array(
			'page_title' => APP_NAME . ''
		);
		
		$data = array(
			'categories' => $this->hymn_model->getCategories(0,5),
			'hymns' => $this->hymn_model->mostPopular(0,10),
			'newHymns' => $this->hymn_model->newHymns(0,10)
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('admin/home', $data);
		$this->load->view('common/footer');
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('home');	
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */