<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class admin_md extends CI_Model {
	
	
	
	
	//counting for dashboard
	
	public function total_slide(){		
		$query = $this->db->get('slider');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}else{}
	}
	
	public function total_portfolio(){		
		$query = $this->db->get('portfolio');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}else{}
	}
	
	public function total_category(){		
		$query = $this->db->get('category');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}else{}
	}
	
	public function total_post(){		
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}else{}
	}
	//end counting for dashboard
	
	
	
	public function add_slider($data){
		$this->db->insert('slider',$data);
	}
	
	public function slider_list(){	
		$this->db->from('slider');
		$this->db->order_by('slider_id', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}	
		
	}
	
	public function single_slide($id){	
		$this->db->from('slider');
		$this->db->where('slider_id', $id);
		$slide = $this->db->get();
		if ($slide->num_rows() > 0) {
			return $slide->row();
		}else{}			
	}
	
	public function update_slider($data, $id){
		$this->db->where(['slider_id'=>$id]);
		$this->db->update('slider', $data);	
		return true;				
	}
	
	public function delete_slider($id){
		$this->db->where(['slider_id'=>$id]);
		$this->db->delete('slider');
		return true;				
	}
	//end slider
	
	
	
	public function add_portfolio($data){
		$this->db->insert('portfolio',$data);
	}
	
	public function portfolio_list(){	
		$this->db->from('portfolio');
		$this->db->order_by('portfolio_id', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}	
		
	}
	
	public function single_portfolio($id){	
		$this->db->from('portfolio');
		$this->db->where('portfolio_id', $id);
		$slide = $this->db->get();
		if ($slide->num_rows() > 0) {
			return $slide->row();
		}else{}			
				
	}
	
	public function update_portfolio($data, $id){
		$this->db->where(['portfolio_id'=>$id]);
		$this->db->update('portfolio', $data);	
		return true;				
	}
	
	public function delete_portfolio($id){
		$this->db->where(['portfolio_id'=>$id]);
		$this->db->delete('portfolio');
		return true;				
	}
	//end portfolio_list
	
	
	public function add_category($data){
		$this->db->insert('category',$data);
	}
	
	public function category_list(){	
		$this->db->from('category');
		$this->db->order_by('category_id', 'desc');
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
	
	public function post_list_by_category($id,$limit,$offset){
		$this->db->where('category_id', $id);
		$this->db->order_by('post_id', 'desc');
		$this->db->limit($limit,$offset);
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}	
	}
	
	
	public function update_category($data, $id){
		$this->db->where(['category_id'=>$id]);
		$this->db->update('category', $data);	
		return true;				
	}
	
	public function delete_category($id){
		$this->db->where(['category_id'=>$id]);
		$this->db->delete('category');
		return true;				
	}
	//end category
	
	
	public function category_name_for_post($category_id){		
		$this->db->from('category');
		$this->db->where('category_id', $category_id);
		$category = $this->db->get();			
		if ($category->num_rows() > 0) {
			  //return $category->result();
			$category_data = array(
				'category_title' => $category -> row(0) -> category_title
			);	
			return $category_data;
		}else{}	
		
	}
	
	public function add_post($data){
		$this->db->insert('post',$data);
	}
	
	public function post_list(){	
		$this->db->from('post');
		$this->db->order_by('post_id', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}	
		
	}
	
	
	public function single_post($id){	
		$this->db->from('post');
		$this->db->where('post_id', $id);
		$slide = $this->db->get();		
		if ($slide->num_rows() > 0) {
			return $slide->row();
		}else{}			
				
	}
	
	public function update_post($data, $id){
		$this->db->where(['post_id'=>$id]);
		$this->db->update('post', $data);	
		return true;				
	}
	
	public function delete_post($id){
		$this->db->where(['post_id'=>$id]);
		$this->db->delete('post');
		return true;				
	}
	//end post
	
	
	public function update_setting($data, $user_id){
		$this->db->where(['user_id'=>$user_id]);
		$this->db->update('user', $data);	
	    $this -> session -> set_userdata($data);
		return true;				
		
	}
	
	public function user_password_check($data){
		$LoginData = array(
		'user_email' => $this -> session -> userdata('user_email') ,
		'user_password' => base64_encode($data['old_password'].'emon#11march#1997!@$W@')
		);
		$result = $this -> db -> get_where('user', $LoginData);
		if ($result -> num_rows() == 1) {
			return TRUE;
		}
		else{ 
			return FALSE; 
		}
		
	}
	
	public function update_password($data, $user_id){
		$UserData = array(
   		'user_password' => base64_encode($data['new_password'].'emon#11march#1997!@$W@')
		);
			$this->db->where('user_id', $user_id);
			$this->db->update('user', $UserData);
		
	}
	
	
	
	
	

 }
?>