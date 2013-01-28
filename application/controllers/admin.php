<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
		$this->load->library('grocery_CRUD');	
	}
	
	function index() {}
	
	function categories() {
		
		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table(CATEGORY_TABLE);
			$crud->set_subject('Category');
			$crud->required_fields('name');
			//$crud->set_field_upload('audio', 'assets/uploads/audio');
			$output = $crud->render();
			
			$header_data = array(
				'page_title' => APP_NAME . ''
			);
			
			$this->load->view('common/header', $header_data);
			$this->load->view('admin/categories', $output);
			$this->load->view('common/footer');
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	}
	
	function hymns() {
		
		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table(HYMN_TABLE);
			$crud->set_subject('Hymn');
			$crud->set_relation('category_id',CATEGORY_TABLE,'name');
			$crud->display_as('category_id','Category');
			$crud->columns('category_id','title','description','lyrics','audio','date_added');
			$crud->required_fields('title', 'description', 'lyrics');
			$crud->add_fields('title', 'category_id', 'description', 'lyrics', 'audio');
			$crud->edit_fields('title', 'category_id', 'description', 'lyrics', 'audio');
			$crud->set_field_upload('audio', 'assets/uploads/audio');
			$crud->callback_insert(array($this, 'hymn_insert_callback'));
			$output = $crud->render();
			
			$header_data = array(
				'page_title' => APP_NAME . ''
			);
			
			$this->load->view('common/header', $header_data);
			$this->load->view('admin/hymns', $output);
			$this->load->view('common/footer');
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	}
	
	function hymn_insert_callback($post_array) {
		
		$post_array['date_added'] = date('Y-m-d H:i:s');
		
		return $this->db->insert(HYMN_TABLE, $post_array);
		
	}
	
	
	
	function accounts() {
		
		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table(ADMINISTRATOR_TABLE);
			$crud->set_subject('Account');
			$crud->columns('first_name','last_name','username');
			$crud->required_fields('first_name','last_name','username','password');
			//$crud->set_field_upload('audio', 'assets/uploads/audio');
			$crud->callback_insert(array($this, 'encrypt_password_insert_callback'));
			$crud->callback_update(array($this, 'encrypt_password_update_callback'));
			
			$output = $crud->render();
			
			$header_data = array(
				'page_title' => APP_NAME . ''
			);
			
			$this->load->view('common/header', $header_data);
			$this->load->view('admin/accounts', $output);
			$this->load->view('common/footer');
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	}
	
	function encrypt_password_insert_callback($post_array) {
		
		$post_array['password'] = sha1($post_array['password']);
		
		return $this->db->insert(ADMINISTRATOR_TABLE, $post_array);
		
	}
	
	function encrypt_password_update_callback($post_array,$primary_key) {
		
		if (! empty($post_array['password'])) {
			$post_array['password'] = sha1($post_array['password']);
		} else {
			unset($post_array['password']);
		}
		
		return $this->db->update(ADMINISTRATOR_TABLE, $post_array, array('administrator_id' => $primary_key));
		
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('home');	
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin/admin.php */