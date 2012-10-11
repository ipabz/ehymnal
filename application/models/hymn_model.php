<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hymn_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function logView($hymn_id) {
		
		$data = array(
			'views_id' => uniqid(),
			'hymn_id' => $hymn_id,
			'date_viewed' => date('Y-m-d H:i:s')
		);
		
		$this->db->insert(VIEWS_TABLE, $data);
		
	}
	
	function getHymn($hymn_id) {
		
		$this->db->where('hymn_id', $hymn_id);
		$query = $this->db->get(HYMN_TABLE);
		
		return $query->row_array();
			
	}
	
	function getHymns($offset=0,$limit=10,$search_keyword='') {
		
		$this->db->limit($limit,$offset);
		
		if ($search_keyword != '') {
			// search condition
		}
		
		$query = $this->db->get(HYMN_TABLE);
		
		return $query->result_array();
		
	}
	
	function getHymnsByCategory($category_id,$queryAll=FALSE,$offset=0,$limit=10) {
		
		if ($queryAll) {
			$this->db->limit($limit,$offset);
		}
		
		$this->db->where('category_id', $category_id);
		$query = $this->db->get(HYMN_TABLE);
		
		return $query->result_array();
		
	}
	
	function getCategories($offset=0,$limit=10) {
		
		$this->db->limit($limit,$offset);
		$query = $this->db->get(CATEGORY_TABLE);
		
		return $query->result_array();
			
	}
	
	function getCategory($category_id) {
		
		$this->db->where('category_id', $category_id);
		$query = $this->db->get(CATEGORY_TABLE);	
		
		return $query->row_array();
		
	}
	
	function mostPopular($offset=0,$limit=10,$noLimit=FALSE) {
		
		$limitSql = '';
		
		if (! $noLimit) {
			$limitSql = " LIMIT $offset, $limit";
		}
		
		$sql = "
			SELECT
				COUNT(".VIEWS_TABLE.".hymn_id) AS num_views,
				".HYMN_TABLE.".*
			FROM
				".VIEWS_TABLE."
			INNER JOIN
				".HYMN_TABLE."
				ON
					".HYMN_TABLE.".hymn_id = ".VIEWS_TABLE.".hymn_id
			GROUP BY
				hymn_id
			ORDER BY
				num_views DESC
		";
		
		$sql .= $limitSql;
		
		$query = $this->db->query($sql);
		
		if ($query->num_rows() == 0) {
			return $this->getHymns($offset,$limit);
		}
		
		return $query->result_array();
		
	}
	
	function newHymns($offset=0,$limit=10) {
		
		$this->db->limit($limit,$offset);
		$this->db->order_by('hymn_id', 'desc');
		$query = $this->db->get(HYMN_TABLE);
		
		return $query->result_array();
		
	}
	
	function search($keyword,$limit=TRUE,$offset=0,$limit=10) {
		
		$result = NULL;
		
		if ($keyword != '') {
			
			$sql = "
				SELECT
					*
				FROM
					".HYMN_TABLE."
				WHERE
					(
						title LIKE '$keyword%' OR
						title LIKE '%$keyword' OR
						title LIKE '%$keyword%'
					) OR
					(
						description LIKE '$keyword%' OR
						description LIKE '%$keyword' OR
						description LIKE '%$keyword%'
					) OR
					(
						lyrics LIKE '$keyword%' OR
						lyrics LIKE '%$keyword' OR
						lyrics LIKE '%$keyword%'
					)
			";
			
			if ($limit) {
				$sql .= " LIMIT $offset, $limit";
			}
			
			$query = $this->db->query($sql);
			
			$result = $query->result_array();
			
		}
		
		return $result;
		
	}
		
}

?>