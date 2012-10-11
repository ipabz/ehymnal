<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
		$models = array('story_handler','hymn_model');
		$this->load->model($models);	$this->load->model('story_handler');
	}
	
	function index() {
		$header_data = array(
			'page_title' => APP_NAME
		);
		
		$search_results = NULL;
		$links = "";
		
		if ($this->input->post('keyword')) {
			
			$this->load->library('pagination');
			
			$config['base_url'] = site_url('search/results/');
			$config['total_rows'] = 2;
			$config['per_page'] = 1; 
			
			$this->pagination->initialize($config);
			$links = $this->pagination->create_links();
			
			$search_results = $this->hymn_model->search($this->input->post('keyword'),TRUE,0,$config['per_page']);
		}
		
		$data = array(
			'categories' => $this->hymn_model->getCategories(0,5),
			'hymns' => $this->hymn_model->mostPopular(0,10),
			'newHymns' => $this->hymn_model->newHymns(0,10),
			'searchResults' => $search_results,
			'links' => $links,
			'keyword' => ''
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('search-main', $data);
		$this->load->view('common/footer');
	}
	
	function results($keyword="",$offset=0) {
		$header_data = array(
			'page_title' => APP_NAME
		);
		
		$search_results = NULL;
		$links = "";
		$keyword = ($this->input->post('keyword')) ? $this->input->post('keyword') : urldecode($keyword);
		
		if ($keyword) {
			
			$this->load->library('pagination');
			
			$config['base_url'] = site_url('search/results/'.$keyword.'/');
			$config['total_rows'] = count($this->hymn_model->search($keyword,FALSE));
			$config['per_page'] = 15; 
			$config['uri_segment'] = 4;
			
			$this->pagination->initialize($config);
			$links = $this->pagination->create_links();
			
			$search_results = $this->hymn_model->search($keyword,TRUE,$offset,$config['per_page']);
		}
		
		$data = array(
			'categories' => $this->hymn_model->getCategories(0,5),
			'hymns' => $this->hymn_model->mostPopular(0,10),
			'newHymns' => $this->hymn_model->newHymns(0,10),
			'searchResults' => $search_results,
			'links' => $links,
			'keyword' => $keyword
		);
		
		$this->load->view('common/header', $header_data);
		$this->load->view('search-main', $data);
		$this->load->view('common/footer');
	}
	
	function signin() {
		$data = array(
			'page_title' => APP_NAME
		);
		
		$this->load->view('common/header', $data);
		$this->load->view('signin');
		$this->load->view('common/footer');
	}
	
	function read($story_id) {
		
		if ($story_id == '') {
			exit('Forbidden Access!');
		}
		
		$story = $this->story_handler->get_story($story_id);
		
		$data = array(
			'page_title' => APP_NAME . ' | ' . $story->title,
			'story' => $story
		);
		
		$this->load->view('common/header', $data);
		$this->load->view('read-story');
		$this->load->view('common/footer');
		
	}
	
}

?>