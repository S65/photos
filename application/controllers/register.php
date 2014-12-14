<?php

	class Register extends CI_Controller {
		
		public function __construct() {

			parent::__construct();
			
			$this->load->model("user_model");
			$this->load->library("form_validation");
			
		}
		
		public function index() {

			$data['pageTitle'] = "Photo App - Register";
			
			$this->load->view("include/header", $data);
			
			// Validation Rules
			
			$this->form_validation->set_message("is_unique", "The %s you entered is already registered!");
			
			$this->form_validation->set_rules("email", "Email Address", "required|is_unique[user.email]");
			$this->form_validation->set_rules("password", "Password", "required|matches[confirmpassword]|min_length[4]");
			$this->form_validation->set_rules("confirmpassword", "Confirm Password", "required");
			
			if($this->form_validation->run() == false) {
				
				if($this->input->post("submit")) {
					$registerData['error']['showError'] = "block";	
				}
				else {
					$registerData['error']['showError'] = "none";	
				}
				
				$this->load->view("register_view", $registerData);
			}
			else {
				$this->register_user();
			}
			
			
			$this->load->view("include/footer");
			
		}
		
		
		private function register_user() {
			

			if($this->user_model->create($this->input->post("email"), $this->input->post("password"))) {

				$this->load->view("register_complete");
				
			}
			else {
				// Add fail state here
				
			}
			
			
		}
		
	}

?>