<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user_md extends CI_Model {
	
	
	public function slide_post_list(){	
		$this->db->from('post');
		$this->db->order_by('post_id', 'desc');
		$this->db->limit(10);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}	
		
	}
	
	
	public function category_view($id){			
		$this->db->where('category_id', $id);
		$query = $this->db->get('category');
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	public function count_post_by_category($category_id){		
		$this->db->from('post');
		$this->db->where('category_id', $category_id);
		$category = $this->db->get();
		return $category->num_rows();
	}
	
	public function top_post_list(){
		$this->db->limit(5);	
		$this->db->order_by('post_id', 'desc');	
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function post_list_by_category($id,$limit,$offset){
		$this->db->where('category_id', $id);
		$this->db->order_by('post_id', 'desc');
		$this->db->limit($limit,$offset);
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	
	}
	
	
	public function post_view($id){			
		$this->db->where('post_id', $id);
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	
	public function search_post($key){			
		$this->db->like('post_title', $key);
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	

 }
?>