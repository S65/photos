<?php

	class Login extends CI_Controller {
		
		public function __construct() {
			
			parent::__construct();

			$this->load->library("form_validation");
			$this->load->library("session");
			
			$this->load->model("user_model");
			
		}
		
		public function index() {
			
			
			if($this->session->userdata("email")
				&& $this->session->userdata("password") 
				&& $this->user_model->login($this->session->userdata("email"), $this->session->userdata("password"), true)) {
				
				redirect("dashboard");	
				
			}
			else {
				
				$data['pageTitle'] = "Photo App - Login";
				
				$this->load->view("include/header", $data);

				$this->form_validation->set_rules("submit", "login", "callback_verify_login");
				
				if($this->form_validation->run() == false) {
									
					if($this->input->post("submit")) {
						$loginData['error']['showError'] = "block";
					}
					else {
						$loginData['error']['showError'] = "none";
					}
					
					
					$this->load->view("login_view", $loginData);
					
				}
				else {
					redirect("dashboard");					
				}
				
				$this->load->view("include/footer");
				
			}
			
		}
		
		public function verify_login() {

			if($this->user_model->login($this->input->post("email"), $this->input->post("password"))) {
				
				$userInfo = $this->user_model->get_user_info();
				$userData = array(
					"email" => $this->input->post("email"),
					"password" => $userInfo['password']
				);
				
				$this->session->set_userdata($userData);
				
				
				return true;
			}
			else {
				$this->form_validation->set_message("verify_login", "Invalid email/password combination!");
				return false;
			}
			
		}
		
		
		
	}

?>