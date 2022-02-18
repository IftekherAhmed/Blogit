<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user_login extends CI_Model {
	
	
	public function check_user_login($data){
		
		$LoginData = array(
		'user_email' => $data['user_email'] ,
		'user_password' => base64_encode($data['user_password'].'emon#11march#1997!@$W@')
		);
		
		/*$LoginData = array(
		'user_email' => $data['user_email'] ,
		'user_password' => $data['user_password']
		);*/
		
		$result = $this -> db -> get_where('user', $LoginData );
		if ($result -> num_rows() == 1) {
			$user_data = array(
				'user_id' => $result -> row(0) -> user_id , 
				'user_name' => $result -> row(0) -> user_name,
				'user_email' => $result -> row(0) -> user_email,
				'user_number' => $result -> row(0) -> user_number,
				'user_birthday' => $result -> row(0) -> user_birthday,
				'user_work' => $result -> row(0) -> user_work,
				'user_gender' => $result -> row(0) -> user_gender,
				'user_religion' => $result -> row(0) -> user_religion,
				'user_country' => $result -> row(0) -> user_country,
				'user_loves' => $result -> row(0) -> user_loves,
				'user_about' => $result -> row(0) -> user_about,
				'user_address' => $result -> row(0) -> user_address,
				'user_image_address' => $result -> row(0) -> user_image_address
			);		
			
			$this -> session -> set_userdata($user_data);
			return TRUE;
		}else{ 
			return FALSE; 
		}
	}
	
	

 }
?>