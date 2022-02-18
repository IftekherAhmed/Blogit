<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
	public function index(){
		
		if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_password'])){				
			// Verify user data
			$data = array();
			$data['user_email'] = $_COOKIE['user_email'];
			$data['user_password'] = $_COOKIE['user_password'];
			$this->load->model('user_login');
			$result = $this->user_login->check_user_login($data);			
			redirect('admin_ct/index');
		}else{
			///category
			$this->load->model('admin_md');
			$menu = $this->admin_md->category_list();
			$data['main_menu'] = $menu;	
			$this->load->view('user/login', $data);
		}
		
	}//end index
	
	
	public function check_user(){
		
		///category
		$this->load->model('admin_md');
		$menu = $this->admin_md->category_list();
		$data['main_menu'] = $menu;	
		
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('user/login');
		}else{			
			// Verify user data
			$data = $this->input->post();
			$this->load->model('user_login');
			$result = $this->user_login->check_user_login($data);
			
			if ($result) {
				$user_email = $data['user_email'];
				$user_password = $data['user_password'];
				setcookie('user_email', $user_email, time() + (86400 * 30), "/");
				setcookie('user_password', $user_password, time() + (86400 * 30), "/");
				redirect('admin_ct/index');
			}else{ 
			
				$this->session->set_flashdata('errors','Email or Password is Invalid');
				redirect('login/index', $data);
			}
			// ----------------------------------->
		}
	}//end login
	
}

?>