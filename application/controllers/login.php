<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
		$models = array('story_handler','hymn_model');
		$this->load->model($models);
	}
	
	public function index() {
		
		$msg = '';
		
		if ($this->input->post('login'))  {
			
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
	
			$config = array(
						   array(
								 'field'   => 'username', 
								 'label'   => 'Username', 
								 'rules'   => 'required'
							  ),
						   array(
								 'field'   => 'password', 
								 'label'   => 'Password', 
								 'rules'   => 'required'
							  )
						);
			
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() == TRUE) {
				if ($this->security_handler->login($this->input->post('username'), $this->input->post('password'))) {
					redirect('home');
				} else {
					$msg = '<div class="error">Invalid Username or Password.</div><br />';	
				}
			} else {
				$msg = validation_errors() . '<br />';
			}
			
		}
		
		$header_data = array(
			'page_title' => APP_NAME
		);
		
		$data = array(
						'categories' => $this->hymn_model->getCategories(0,5),
						'msg' => $msg
					);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('signin', $data);
		$this->load->view('common/footer');
		
	}
	
	
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */