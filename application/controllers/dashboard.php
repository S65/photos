<?php

	class Dashboard extends CI_Controller {
		
		public function __construct() {

			parent::__construct();
			
			$this->load->library("session");
			$this->load->model("user_model");
			
			if(!$this->user_model->login($this->session->userdata("email"), $this->session->userdata("password"), true)) {
				redirect("");
			}
			
		}

		public function index() {
			
			echo "Dashboard";
				
		}
		
	}

?>