<?php

	class Dashboard extends CI_Controller {
		
		public function __construct() {

			parent::__construct();
			
			$this->load->library("session");
			$this->load->model("user_model");
			$this->load->model("photo_model");
			
			if(!$this->user_model->login($this->session->userdata("email"), $this->session->userdata("password"), true)) {
				redirect("");
			}
			
		}

		public function index() {
			
			$headerData['pageTitle'] = "Photo App - Dashboard";
			
			
			$userInfo = $this->user_model->get_user_info();
			
			$dashboardData['userEmail'] = $userInfo['email'];
			$dashboardData['photos'] = $this->photo_model->get_photos($userInfo['user_id']);
			$dashboardData['error'] = "";
			
			$this->load->view("include/header", $headerData);
			$this->load->view("dashboard_view", $dashboardData);
			$this->load->view("include/footer");
			
		}
		
		public function upload() {
			
			$headerData['pageTitle'] = "Photo App - Dashboard";
			$userInfo = $this->user_model->get_user_info();
			
			$config['upload_path'] = "./uploads/";
			$config['allowed_types'] = "gif|jpg|png|bmp";
			
			$this->load->library("upload", $config);
			
			if($this->input->post("submit") && $this->upload->do_upload("image")) {
				$photoInfo = $this->upload->data();
				$this->photo_model->add_photo($userInfo['user_id'], "uploads/".$photoInfo['file_name']);
				redirect("dashboard");
			}
			else {

				$dashboardData['userEmail'] = $userInfo['email'];
				
				$dashboardData['photos'] = $this->photo_model->get_photos($userInfo['user_id']);
				$dashboardData['error'] = $this->upload->display_errors("<li>", "</li>");
				
				$this->load->view("include/header", $headerData);
				$this->load->view("dashboard_view", $dashboardData);
				$this->load->view("include/footer");
				
			}
			
		}
		
	}

?>