<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story_handler extends CI_Model {

	function __construct() {
		parent::__construct();	
	}
	
	function top_10_stories() {
		
		$this->db->limit(10);
		$query = $this->db->get(STORIES_TABLE);
		
		return $query;
			
	}
	
	function get_story($story_id) {
		
		$this->db->where('stories_id', $story_id);
		$query = $this->db->get(STORIES_TABLE);
		
		return $query->row();
		
	}
	
}

?>