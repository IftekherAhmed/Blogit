<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_ct extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//echo 'Your Name id: '  .  $this -> session -> userdata('full_name');
		if ($this->session->userdata('user_email')!=FALSE){			
		}else { 
			$this->session->set_flashdata('errors','You have logged in first.');
			redirect('login/index');
			 }
	}
	
		
	public function index()
	{	
		$data = array();
		$this->load->model('admin_md');
		
		$slide = $this->admin_md->total_slide();
		$data['total_slide'] = $slide;
		
		$portfolio = $this->admin_md->total_portfolio();
		$data['total_portfolio'] = $portfolio;
		
		$category = $this->admin_md->total_category();
		$data['total_category'] = $category;
		
		$post = $this->admin_md->total_post();
		$data['total_post'] = $post;
		
		$this->load->view('admin/index', $data);
	}
	
	
		
	public function slider()
	{		
		$this->load->model('admin_md');
		$query = $this->admin_md->slider_list();
		$data = array();
		$data['slider_list'] = $query;
		$data['controller'] = $this;
		$this->load->view('admin/slider', $data);
	}
	
	

	public function make_slider()
	{		
		$this->form_validation->set_rules('slider_title', 'Name', 'trim|required');
		$this->form_validation->set_rules('slider_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('slider_button', 'Link', 'trim');		
		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('admin/slider');
		}else{
			$data =$this -> input -> post();
			unset($data['submit']);
			$filename = md5(uniqid(rand(), true));
			$config = array(
				'upload_path' => 'assest/images/slider',
				'allowed_types' => "gif|jpg|png|jpeg",
				'file_name' => $filename
			);
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('slider_image_address'))
				{
				$file_data = $this->upload->data();
				$data['slider_image_address'] = $file_data['file_name'];
				$this->load->model('admin_md');
				$this->admin_md->add_slider($data);
				$this->session->set_flashdata('success', 'Successfully added slider');
				redirect('admin_ct/slider');
				}
				else
				{
				/*$error = $this->upload->display_errors();
				$data['errors'] = $error;
				$this->load->view('admin/photos_upload', $data);*/
				 echo "uploaded faild";
				}
			
		}//if form validation success
				
				
	}
			
	public function slider_list()
	{
		$this->load->model('admin_md');
		$query = $this->admin_md->slider_list();
		$data['slider_list'] = $query;
		$this->load->view('admin/slider', $data);
		//echo"<pre>";
		//print_r($slider_list_details);
		//echo"</pre>";
		
	}
	
	public function single_slide($id){		
		$this->load->model('admin_md');
		$single_slide = $this->admin_md->single_slide($id);	
		$data['slide_view'] = $single_slide;
		$this->load->view('admin/slider_view', $data);
	}
			
	public function update_slider($id)
	{	
	
	
		///if picture update/////////
		$image_set 		= $_FILES['slider_image_address'];
		$image_set_name = $image_set['name'];
		if(!empty($image_set_name)){
			///////previous image delete		
			$this->load->model('admin_md');
			$image_address = $this->admin_md->single_slide($id); 	
			$remove_image_address = $image_address->slider_image_address;
			//echo $remove_image_address;
			@unlink('assest/images/slider/'.$remove_image_address);			
			///////previous image delete	
		}else{}
			///////////////////
		
		$this->form_validation->set_rules('slider_title', 'Name', 'trim|required');
		$this->form_validation->set_rules('slider_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('slider_button', 'Link', 'trim');		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');
			redirect('admin_ct/slider');			
		}else{
			$data =$this -> input -> post();
			unset($data['update']);
					
			
			///if picture update/////////
			$image_set 		= $_FILES['slider_image_address'];
			$image_set_name = $image_set['name'];
			if(!empty($image_set_name)){
				
				$filename = md5(uniqid(rand(), true));
				$config = array(
					'upload_path' => 'assest/images/slider',
					'allowed_types' => "gif|jpg|png|jpeg",
					'file_name' => $filename
				);
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('slider_image_address'))
					{
					$file_data = $this->upload->data();
					$data['slider_image_address'] = $file_data['file_name'];
					$this->load->model('admin_md');
					$this->admin_md->update_slider($data, $id);
					$this->session->set_flashdata('success', 'Successfully updated slider');
					redirect('admin_ct/slider');
					}
					else
					{
					 echo "uploaded faild";
					}
			}else{
				$this->load->model('admin_md');
				$this->admin_md->update_slider($data, $id);
				$this->session->set_flashdata('success', 'Successfully updated slider');
				redirect('admin_ct/slider');			
				}
			///////////////////
			
		}//if form validation success
				
		
	}
			
	public function slider_delete($id)
	{
		///////previous image delete		
		$this->load->model('admin_md');
		$image_address = $this->admin_md->single_slide($id);
		$remove_image_address = $image_address->slider_image_address;
		//echo $remove_image_address;
		@unlink('assest/images/slider/'.$remove_image_address);						
		///////previous image delete		
		
		$query = $this->admin_md->delete_slider($id);
		$this->session->set_flashdata('errors', 'Successfully delete slider');
		redirect('admin_ct/slider');
	}
	//end slider
		
		
		
		
	public function portfolio()
	{
		$this->load->model('admin_md');
		$query = $this->admin_md->portfolio_list();
		$data['portfolio_list'] = $query;
		$this->load->view('admin/portfolio', $data);
	}	

	public function make_portfolio()
	{		
		$this->form_validation->set_rules('portfolio_title', 'Name', 'trim|required');
		$this->form_validation->set_rules('portfolio_description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->model('admin_md');
			$query = $this->admin_md->portfolio_list();
			$data['portfolio_list'] = $query;
			$this->load->view('admin/portfolio', $data);
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
		}else{
			$data =$this -> input -> post();
			unset($data['submit']);
			$filename = md5(uniqid(rand(), true));
			$config = array(
				'upload_path' => 'assest/images/portfolio',
				'allowed_types' => "gif|jpg|png|jpeg",
				'file_name' => $filename
			);
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('portfolio_image_address'))
				{
				$file_data = $this->upload->data();
				$data['portfolio_image_address'] = $file_data['file_name'];
				$this->load->model('admin_md');
				$this->admin_md->add_portfolio($data);
				$this->session->set_flashdata('success', 'Successfully added portfolio');
				
				$query = $this->admin_md->portfolio_list();
				$data['portfolio_list'] = $query;
				$this->load->view('admin/portfolio', $data);
				$this->session->set_flashdata('success','successfully added portfolio');			
				}
				else
				{
				 echo "uploaded faild";
				}
			
		}//if form validation success		
	}
			
	public function portfolio_list()
	{
		$this->load->model('admin_md');
		$query = $this->admin_md->portfolio_list();
		$data['portfolio_list'] = $query;
		$this->load->view('admin/portfolio', $data);
		
	}
	
	public function single_portfolio($id){		
		$this->load->model('admin_md');
		$single_portfolio = $this->admin_md->single_portfolio($id);	
		$data['portfolio_view'] = $single_portfolio;
		$this->load->view('admin/portfolio_view', $data);
	}
			
	public function update_portfolio($id)
	{		
		///if picture update/////////
		$image_set 		= $_FILES['portfolio_image_address'];
		$image_set_name = $image_set['name'];
		if(!empty($image_set_name)){			
			///////previous image delete		
			$this->load->model('admin_md');
			$image_address = $this->admin_md->single_portfolio($id); 
			$remove_image_address = $image_address->portfolio_image_address;
			//echo $remove_image_address;
			@unlink('assest/images/portfolio/'.$remove_image_address);	
			///////previous image delete
		}else{}
			///////////////////
		
		$this->form_validation->set_rules('portfolio_title', 'Name', 'trim|required');
		$this->form_validation->set_rules('portfolio_description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->model('admin_md');
			$query = $this->admin_md->portfolio_list();
			$data['portfolio_list'] = $query;
			$this->load->view('admin/portfolio', $data);
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
		}else{
			$data =$this -> input -> post();
			unset($data['update']);
			
			///if picture update/////////
			$image_set 		= $_FILES['portfolio_image_address'];
			$image_set_name = $image_set['name'];
			if(!empty($image_set_name)){			
				$filename = md5(uniqid(rand(), true));
				$config = array(
					'upload_path' => 'assest/images/portfolio',
					'allowed_types' => "gif|jpg|png|jpeg",
					'file_name' => $filename
				);
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('portfolio_image_address'))
					{
					$file_data = $this->upload->data();
					$data['portfolio_image_address'] = $file_data['file_name'];
					$this->load->model('admin_md');
					$this->admin_md->update_portfolio($data, $id);
					$this->session->set_flashdata('success', 'Successfully updated portfolio');
					redirect('admin_ct/portfolio');	
					}
					else
					{
					 echo "uploaded faild";
					}
			}else{
				$this->load->model('admin_md');			
				$this->admin_md->update_portfolio($data, $id);
				$this->session->set_flashdata('success', 'Successfully updated portfolio');
				redirect('admin_ct/portfolio');	
				}
			///////////////////
			
		}//if form validation success		
		
	}
			
	public function portfolio_delete($id)
	{
		///////previous image delete		
		$this->load->model('admin_md');
		$image_address = $this->admin_md->single_portfolio($id); 
		$remove_image_address = $image_address->portfolio_image_address;
		//echo $remove_image_address;
		@unlink('assest/images/portfolio/'.$remove_image_address);				
		///////previous image delete		
		
		$query = $this->admin_md->delete_portfolio($id);
		$this->session->set_flashdata('errors', 'Successfully delete portfolio');
		redirect('admin_ct/portfolio');				
	}
	
	//end add portfolio
	
	
	
	
	
		
	public function category()
	{
		$data = array();
		
		$this->load->model('admin_md');
		$query = $this->admin_md->category_list();
		$data['category_list'] = $query;
		
		$data['controller'] = $this;
		
		$this->load->view('admin/category', $data);
	}
	
		
	public function post_count_by_category($category_id)
	{		
		$this->load->model('admin_md');
		$query = $this->admin_md->count_post_by_category($category_id);
		return $query;
	}
	
	
	public function make_category()
	{		
		$this->form_validation->set_rules('category_title', 'Name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){

			$data = array();
			
			$this->load->model('admin_md');
			$query = $this->admin_md->category_list();
			$data['category_list'] = $query;
			
			$data['controller'] = $this;
			
			$this->load->view('admin/category', $data);
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
		}else{
			$data =$this -> input -> post();
			unset($data['submit']);
			$this->load->model('admin_md');
			$this->admin_md->add_category($data);
			$this->session->set_flashdata('success', 'Successfully added category');
			redirect('admin_ct/category');	
		}
	}
			
	public function category_list()
	{
		$this->load->model('admin_md');
		$query = $this->admin_md->category_list();
		$data['category_list'] = $query;
		$this->load->view('admin/category', $data);
		
	}
	
	public function category_view($id){	
	
		$data = array();	
	
		///post pagination	
		$this->load->model('user_md');
		$config = array(		
			'base_url' 		  => base_url('index.php/admin_ct/category_view/').$id,
			'per_page' 		  => 10,
			'total_rows' 	  => $this->user_md->count_post_by_category($id),
			'full_tag_open'   => '<ul class="pagination">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="active"><a href="#">',
			'cur_tag_close'   => '</a></li>'
		);
		$limit = $config['per_page'];
		$offset = $this->uri->segment(4);		
		$this->pagination->initialize($config);	
		
		
		///post
		$this->load->model('admin_md');		
		$post = $this->admin_md->post_list_by_category($id,$limit,$offset);
		$data['post_list_by_category'] = $post;
		
		$category = $this->admin_md->category_view($id);
		$data['category_view'] = $category;		
		
		$this->load->view('admin/category_view', $data);
	}
	
	
	public function update_category($id)
	{		
		$this->form_validation->set_rules('category_title', 'Name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){

			$data = array();
			
			$this->load->model('admin_md');
			$query = $this->admin_md->category_list();
			$data['category_list'] = $query;
			
			$data['controller'] = $this;
			
			$this->load->view('admin/category', $data);
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
		}else{
			$data =$this -> input -> post();
			unset($data['update']);
			$this->load->model('admin_md');
			$this->admin_md->update_category($data, $id);
			$this->session->set_flashdata('success', 'Successfully updated category');
			redirect('admin_ct/category');	
		}
	}
	
	public function category_delete($id){		
		///post
		$this->load->model('admin_md');		
		$post = $this->admin_md->post_list_by_category($id);
		
		//echo "<pre>";
		//print_r($post);
		//echo "</pre>";
		if(count($post)){
			foreach($post as $delete_post){
				//echo $delete_post->post_id;		
				$post_id = array();
				$post_id = $delete_post->post_id;
				$post_image_address = array();
				$post_image_address = $delete_post->post_image_address;
				///////previous image delete		
				$this->load->model('admin_md');
				$remove_image_address = $post_image_address;
				//echo $remove_image_address;
				@unlink('assest/images/post/'.$remove_image_address);
				///////previous image delete		
				
				$query = $this->admin_md->delete_post($post_id);
			}
		}		
		$this->load->model('admin_md');	
		$query2 = $this->admin_md->delete_category($id);
		$this->session->set_flashdata('errors','Successfully delete category and post of this category.');		
		redirect('admin_ct/category');			
		
		
	}
	
	//end add category
	
	
	


	
	public function post()
	{
		$this->load->model('admin_md');
		$query = $this->admin_md->category_list();		
		$query2 = $this->admin_md->post_list();
		$data = array();
		$data['category_list'] = $query;
		$data['post_list'] = $query2;
		$this->load->view('admin/post', $data);
	}

	public function make_post()
	{												
		
		$category_id = $this->input->post('category_id');
		$this->load->model('admin_md');				
		$category_title = $this->admin_md->category_name_for_post($category_id);			
		//echo "<pre>";
		//print_r($category_title);
		//echo "</pre>";		
		$category_name = $category_title['category_title'];
		
		
		$user_data = $this->session->userdata();
		$user_id = $user_data['user_id'];
		$user_name = $user_data['user_name'];	
				
		//$post_date = $this -> input -> post('post_date');
	
		$this->form_validation->set_rules('post_title', 'Name', 'trim|required');
		$this->form_validation->set_rules('category_id', 'category_id');
		$this->form_validation->set_rules('user_id', 'user_id');
		$this->form_validation->set_rules('user_name', 'user_name');
		$this->form_validation->set_rules('post_description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->model('admin_md');
			$query = $this->admin_md->category_list();		
			$query2 = $this->admin_md->post_list();
			$data = array();
			$data['category_list'] = $query;
			$data['post_list'] = $query2;
			$this->load->view('admin/post', $data);
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
		}else{
			$data =$this -> input -> post();
			$data['user_id'] = $user_id;			
			$data['user_name'] = $user_name;			
			$data['category_title'] = $category_name;			
			unset($data['submit']);
			
			$filename = md5(uniqid(rand(), true));
			$config = array(
				'upload_path' => 'assest/images/post',
				'allowed_types' => "gif|jpg|png|jpeg",
				'file_name' => $filename
			);
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('post_image_address'))
				{
				$file_data = $this->upload->data();
				$data['post_image_address'] = $file_data['file_name'];		
				$this->load->model('admin_md');
				$this->admin_md->add_post($data);
				$this->session->set_flashdata('success', 'Successfully added post');
				redirect('admin_ct/post');	
				}
				else
				{
				/*$error = $this->upload->display_errors();
				$data['errors'] = $error;
				$this->load->view('admin/photos_upload', $data);*/
				 echo "uploaded faild";
				}
			
		}//if form validation success		
	}
			
	public function post_list()
	{
		$this->load->model('admin_md');
		$query = $this->admin_md->category_list();		
		$query2 = $this->admin_md->post_list();
		$data = array();
		$data['category_list'] = $query;
		$data['post_list'] = $query2;
		$this->load->view('admin/post', $data);
		
	}
	
	public function single_post($id){		
		$this->load->model('admin_md');
		$single_post = $this->admin_md->single_post($id);	
		$data['post_view'] = $single_post;
		$this->load->view('admin/post_view', $data);
	}
			
	public function update_post($id)
	{
		
		$image_set 		= $_FILES['post_image_address'];
		$image_set_name = $image_set['name'];
		if(!empty($image_set_name)){
			//print_r($image_set['name']);
			///////previous image delete		
			$this->load->model('admin_md');
			$image_address = $this->admin_md->single_post($id); 
			$remove_image_address = $image_address->post_image_address;
			//echo $remove_image_address;
			@unlink('assest/images/post/'.$remove_image_address);	
			///////previous image delete	
		}else{}					
		
		$category_id = $this->input->post('category_id');
		$this->load->model('admin_md');				
		$category_title = $this->admin_md->category_name_for_post($category_id);			
		//echo "<pre>";
		//print_r($category_title);
		//echo "</pre>";		
		$category_name = $category_title['category_title'];
		
		
		$user_data = $this->session->userdata();
		$user_id = $user_data['user_id'];
		$user_name = $user_data['user_name'];	
				
		//$post_date = $this -> input -> post('post_date');
	
		$this->form_validation->set_rules('post_title', 'Name', 'trim|required');
		$this->form_validation->set_rules('category_id', 'category_id');
		$this->form_validation->set_rules('user_id', 'user_id');
		$this->form_validation->set_rules('user_name', 'user_name');
		$this->form_validation->set_rules('post_description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->model('admin_md');
			$query = $this->admin_md->category_list();		
			$query2 = $this->admin_md->post_list();
			$data = array();
			$data['category_list'] = $query;
			$data['post_list'] = $query2;
			$this->load->view('admin/post', $data);
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
		}else{
			$data =$this -> input -> post();
			$data['user_id'] = $user_id;			
			$data['user_name'] = $user_name;			
			$data['category_title'] = $category_name;			
			unset($data['update']);
			
			
			///if picture update/////////
			$image_set 		= $_FILES['post_image_address'];
			$image_set_name = $image_set['name'];
			if(!empty($image_set_name)){
				$filename = md5(uniqid(rand(), true));
				$config = array(
					'upload_path' => 'assest/images/post',
					'allowed_types' => "gif|jpg|png|jpeg",
					'file_name' => $filename
				);
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('post_image_address'))
					{
					$file_data = $this->upload->data();
					$data['post_image_address'] = $file_data['file_name'];		
					$this->load->model('admin_md');
					$this->admin_md->update_post($data, $id);
					$this->session->set_flashdata('success', 'Successfully updated post');
					redirect('admin_ct/post');	
					}
					else
					{
					 echo "uploaded faild";
					}
			}else{		
					$this->load->model('admin_md');
					$this->admin_md->update_post($data, $id);
					$this->session->set_flashdata('success', 'Successfully updated post');
					redirect('admin_ct/post');					
			}
			///////////////////
			
			
			
		}//if form validation success
			
	}
			
	public function post_delete($id)
	{
		///////previous image delete		
		$this->load->model('admin_md');
		$image_address = $this->admin_md->single_post($id); 
		$remove_image_address = $image_address->post_image_address;
		//echo $remove_image_address;
		@unlink('assest/images/post/'.$remove_image_address);
		///////previous image delete		
		
		$query = $this->admin_md->delete_post($id);
		redirect('admin_ct/post');			
	}
	//end post
	
	
	
		
	public function profile_view()
	{
		$this->load->view('admin/user_view');
	}	
		
	public function profile_setting()
	{
		$this->load->view('admin/user_setting');
	}		
		
	public function update_setting($user_id)
	{		
		///if picture update/////////
		$image_set 		= $_FILES['user_image_address'];
		$image_set_name = $image_set['name'];
		if(!empty($image_set_name)){
			///////previous image delete
			$image_address = $this->session->userdata();		 
			$remove_image_address = $image_address['user_image_address'];
			//$remove_image = base_url('assest/images/user/').$remove_image_address;
			@unlink('assest/images/user/'.$remove_image_address);		
			///////previous image delete		
		}else{}
		///////////////////
			
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('user_number', 'Number', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('user_email', 'Mail', 'trim|required|min_length[1]');		 
		$this->form_validation->set_rules('user_work', 'Work', 'trim|required|min_length[1]');		 
		$this->form_validation->set_rules('user_gender', 'Gender', 'trim|required|min_length[1]');		 
		$this->form_validation->set_rules('user_religion', 'Religion', 'trim|required|min_length[1]');		 
		$this->form_validation->set_rules('user_country', 'Country', 'trim|required|min_length[1]');		 
		$this->form_validation->set_rules('user_loves', 'Loves', 'trim|required|min_length[1]');		 
		$this->form_validation->set_rules('user_about', 'about', 'trim|required|min_length[1]');		 
		$this->form_validation->set_rules('user_address', 'Address', 'trim|required|min_length[4]');	
		
		$d_o_b = $this->input->post('user_dob_date') . $this->input->post('user_dob_month') . $this->input->post('user_dob_year');
		
		
		if ($this->form_validation->run() == FALSE){	
			$this->load->view('admin/user_setting');
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
		}else{
			$data =$this -> input -> post();			
			unset($data['user_dob_date']);
			unset($data['user_dob_month']);
			unset($data['user_dob_year']);
			$data['user_birthday'] = $d_o_b;
			unset($data['submit']);
			
			///if picture update/////////
			$image_set 		= $_FILES['user_image_address'];
			$image_set_name = $image_set['name'];
			if(!empty($image_set_name)){
			$filename = md5(uniqid(rand(), true));
			$config = array(
				'upload_path' => 'assest/images/user',
				'allowed_types' => "gif|jpg|png|jpeg",
				'file_name' => $filename
			);
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('user_image_address'))
				{
				$file_data = $this->upload->data();
				$data['user_image_address'] = $file_data['file_name'];		
				$this->load->model('admin_md');
				$this->admin_md->update_setting($data, $user_id);
				$this->session->set_flashdata('success', 'Successfully updated');
				redirect('admin_ct/profile_setting');	
				}
				else
				{
				 echo "updated faild";
				}
			}else{	
				$this->load->model('admin_md');
				$this->admin_md->update_setting($data, $user_id);
				$this->session->set_flashdata('success', 'Successfully updated');
				redirect('admin_ct/profile_setting');				
			}
			///////////////////
			
		}//if form validation success		
	
				
	}

	
	public function change_password(){		
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[5]|matches[re_password]');
		$this->form_validation->set_rules('re_password', 'Re Password', 'trim|required');	
		
		if ($this->form_validation->run() == FALSE){
			$this -> load -> view('admin/user_setting');
			$this->session->set_flashdata('errors','validation faild');
		}
		else{ 
			// Verify current password 
			$data =$this -> input -> post();
			$this->load->model('admin_md');
			$result = $this-> admin_md -> user_password_check($data);
			if ($result) {
				$data =$this -> input -> post();
				unset($data['submit']);
				$this->load->model('admin_md');
				$user_id = $this->session->userdata('user_id');
				$this->admin_md->update_password($data, $user_id);
				$this->session->set_flashdata('success','Password changed successfully');
				redirect('admin_ct/profile_setting');
			}else{
				$this->session->set_flashdata('errors','Current password does not match.');
				redirect('admin_ct/profile_setting');
			}
		 }	 
	}
	
		
	public function logout()
	{			
		setcookie('user_email', "", 0, "/");
		setcookie('user_password', "", 0, "/");
		$this->session->unset_userdata('user_email');
		$this->session->set_flashdata('success','You have successfully logged out.');
		redirect('login/index');
	}
}
?>