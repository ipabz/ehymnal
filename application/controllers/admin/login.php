<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index() {
		
		$msg = '';
		
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
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$msg = validation_errors();
		}
		else {
			
			if ($this->security_handler->login($this->input->post('username'), $this->input->post('password'))) {
				redirect('admin/home');
			} else {
				$msg = '<div class="error">Invalid Username or Password.</div>';	
			}
			
		}
		
		$data = array(
			'msg' => $msg . '<br />'
		);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/login');
		$this->load->view('admin/footer');
	}
	
	
	
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */