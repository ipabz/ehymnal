<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hymn extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$models = array('hymn_model');
		$this->load->model($models);	
	}
	
	public function index() {
		
	
		
	}
	
	function view($hymn_id=NULL) {
		
		$hymn = $this->hymn_model->getHymn($hymn_id); 
		$category = $this->hymn_model->getCategory($hymn['category_id']);
		
		if(! empty($hymn)) {
			$this->hymn_model->logView($hymn_id);
		} else {
			show_404();	
		}
		
		$header_data = array(
			'page_title' => APP_NAME
		);
		
		$data = array(
			'categories' => $this->hymn_model->getCategories(0,5),
			'hymns' => $this->hymn_model->mostPopular(0,10),
			'theHymn' => $hymn,
			'newHymns' => $this->hymn_model->newHymns(0,10),
			'breadcrumbs' => anchor('hymn/category_view/'.$category['category_id'], $category['name']).'&nbsp;&nbsp;› &nbsp;&nbsp;'.$hymn['title']
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('view-hymn', $data);
		$this->load->view('common/footer');
		
	}
	
	function most_popular($offset=0) {
		
		$this->load->library('pagination');

		$config['base_url'] = site_url('hymn/most_popular/');
		$config['total_rows'] = count($this->hymn_model->mostPopular(0,0,TRUE));
		$config['per_page'] = 15; 
		
		$this->pagination->initialize($config); 
		
		$header_data = array(
			'page_title' => APP_NAME . ''
		);
		
		$data = array(
			'categories' => $this->hymn_model->getCategories(0,5),
			'hymns' => $this->hymn_model->mostPopular($offset,$config['per_page']),
			'pagesLink' => $this->pagination->create_links()
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('most-popular-page', $data);
		$this->load->view('common/footer');
		
	}
	
	function new_songs($offset=0) {
		
		$this->load->library('pagination');

		$config['base_url'] = site_url('hymn/new_songs/');
		$config['total_rows'] = $this->db->count_all(HYMN_TABLE);
		$config['per_page'] = 15; 
		
		$this->pagination->initialize($config); 
		
		$header_data = array(
			'page_title' => APP_NAME . ''
		);
		
		$data = array(
			'categories' => $this->hymn_model->getCategories(0,5),
			'newHymns' => $this->hymn_model->newHymns($offset,$config['per_page']),
			'pagesLink' => $this->pagination->create_links()
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('new-songs-page', $data);
		$this->load->view('common/footer');
		
	}
	
	function song_categories($offset=0) {
		
		$this->load->library('pagination');

		$config['base_url'] = site_url('hymn/song_categories/');
		$config['total_rows'] = $this->db->count_all(CATEGORY_TABLE);
		$config['per_page'] = 15; 
		
		$this->pagination->initialize($config); 
		
		$header_data = array(
			'page_title' => APP_NAME . ''
		);
		
		$data = array(
			'categories' => $this->hymn_model->getCategories($offset,$config['per_page']),
			'hymns' => $this->hymn_model->mostPopular(0,10),
			'pagesLink' => $this->pagination->create_links()
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('categories-page', $data);
		$this->load->view('common/footer');
		
	}
	
	function category_view($category_id,$offset=0) {
		
		$this->load->library('pagination');

		$config['base_url'] = site_url('hymn/song_categories/');
		$config['total_rows'] = count($this->hymn_model->getHymnsByCategory($category_id, TRUE));
		$config['per_page'] = 15; 
		
		$this->pagination->initialize($config); 
		
		$header_data = array(
			'page_title' => APP_NAME . ''
		);
		
		$data = array(
			'categories' => $this->hymn_model->getCategories(0,10),
			'category' => $this->hymn_model->getCategory($category_id),
			'hymns' => $this->hymn_model->getHymnsByCategory($category_id, FALSE, $offset, $config['per_page']),
			'pagesLink' => $this->pagination->create_links()
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('category-view', $data);
		$this->load->view('common/footer');
		
	}
	
}

/* End of file hymn.php */
/* Location: ./application/controllers/hymn.php */