<?php

	class User_Model extends CI_Model {

		protected $currentUserID;
		
		public function __construct() {
			
			$this->load->database();	
			$this->currentUserID = 0;
			
		}
		
		public function create($email, $password) {
			
			$encryptPassword = encryptPassword($password);
			
			
			$data = array(
				"email" => $email,
				"password" => $encryptPassword['password'],
				"passwordkey" => $encryptPassword['salt']
			);
			
			$this->db->insert("user", $data);

			return ($this->db->affected_rows() == 1);
			
		}
		
		
		public function login($email, $password, $encryptedPW=false) {
			
			$loggedIn = false;
			
			$this->db->select("user_id, email, password, passwordkey");
			$query = $this->db->get_where("user", array("email" => $email));
			
			
			if($query->num_rows() == 1) {
				$result = $query->row_array();
				
				$checkPassword = $encryptedPW ? $password : crypt($password, $result['passwordkey']);
				
				if($result['password'] == $checkPassword) {

					$loggedIn = true;
					$this->currentUserID = $result['user_id'];
				}
				
			}
			
			return $loggedIn;
		}
		
		public function get_user_info() {

			if($this->currentUserID != 0) {
				
				$query = $this->db->get_where("user", array("user_id" => $this->currentUserID));
				
				return $query->row_array();
				
			}

			return array();
		}
		
		
	}

?>