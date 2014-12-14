<?php

	class Photo_Model extends CI_Model {
		
		public function __construct() {

			$this->load->database();
			
		}
		
		
		public function add_photo($userID, $imageURL) {
			
			$data = array(
				"fileurl" => $imageURL,
				"uploadtime" => time(),
				"user_id" => $userID
			);
			
			return $this->db->insert("photo", $data);
			
		}
		
		public function get_photos($userID) {

			$this->db->order_by("uploadtime");
			$query = $this->db->get_where("photo", array("user_id" => $userID));
			
			return $query->result_array();
			
		}
		
	}

?>