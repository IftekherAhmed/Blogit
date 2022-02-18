<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('admin_md');
		$menu = $this->admin_md->category_list();
		$data['main_menu'] = $menu;	
		
		////slider	
		$this->load->model('admin_md');
		$slider = $this->admin_md->slider_list();
		$data['slider_list'] = $slider;
		
		///portfolio
		$this->load->model('admin_md');
		$portfolio = $this->admin_md->portfolio_list();
		$data['portfolio_list'] = $portfolio;
		
		///post
		$this->load->model('user_md');		
		$post = $this->user_md->slide_post_list();
		$data['slide_post_list'] = $post;
		
		
		$this->load->view('user/header', $data);
		$this->load->view('user/index',  $data);
		
	}
	
		
	public function post_count_by_category($category_id)
	{		
		$this->load->model('user_md');
		$query = $this->admin_md->count_post_by_category($category_id);
		return $query;
	}
	
	public function category_view($id){	
	
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('admin_md');
		$menu = $this->admin_md->category_list();
		$data['main_menu'] = $menu;			
		
		///top post
		$this->load->model('user_md');		
		$top_post = $this->user_md->top_post_list();
		$data['top_post_list'] = $top_post;
		
		
		///post pagination	
		
		$config = array(		
			'base_url' 		  => base_url('index.php/user/category_view/').$id,
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
		
		$this->load->model('user_md');		
		$post = $this->user_md->post_list_by_category($id,$limit,$offset);
		$data['post_list_by_category'] = $post;
		
		/*foreach($post as $pos){
			echo "<pre>";
			print_r($pos);
			echo "</pre>";
		}
		echo $this->pagination->create_links();*/
		
		//end pagination
		
		
		$this->load->model('user_md');
		$category = $this->user_md->category_view($id);
		$data['category_view'] = $category;
		
		$this->load->view('user/header', $data);
		$this->load->view('user/category_view', $data);
	}
	
	public function post_view($id){	
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('admin_md');
		$menu = $this->admin_md->category_list();
		$data['main_menu'] = $menu;	
		
		///top post
		$this->load->model('user_md');		
		$top_post = $this->user_md->top_post_list();
		$data['top_post_list'] = $top_post;
		
		///post
		$this->load->model('user_md');		
		$post = $this->user_md->post_view($id);
		$data['post_view'] = $post;
				
		$this->load->view('user/header', $data);
		$this->load->view('user/post_view', $data);	
			
	}
	
	public function search_post(){	
	
		$data = array();
		
		$key = $this->input->post('post_title');
		
		$security = $this->security->xss_clean($key );		
		$this->load->model('user_md');
		$post = $this->user_md->search_post($security);
		$data['search_post'] = $post;	
		$data['search_title'] = $security;	
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('admin_md');
		$menu = $this->admin_md->category_list();
		$data['main_menu'] = $menu;	
		
		///top post
		$this->load->model('user_md');		
		$top_post = $this->user_md->top_post_list();
		$data['top_post_list'] = $top_post;
		
		$this->load->view('user/header', $data);
		$this->load->view('user/search_post', $data);
		
	}
	
}
?>