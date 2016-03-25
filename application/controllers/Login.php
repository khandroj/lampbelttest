<?php
	class Login extends CI_Model
	{

	public function process_login()
	{		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|md5");
		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect("/");
		}
		else
		{
			$this->load->model("belt_model");							   
			$get_user = $this->belt_model->get_user($this->input->post());

			if ($get_user)
			{
				$this->session->set_userdata("user_session", $get_user);
				redirect(("/login/profile"));
			}
			else
			{
				$this->session->set_flashdata("login_errors", "Invalid email and/or password");
				redirect("/");
			}
		}
	}
	public function process_registration()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("alias", "Alias", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");
		$this->form_validation->set_rules("confirm", "Confirm PW", "trim|required|md5");
		$this->form_validation->set_rules("date of birth", "Date of Birth", "trim|required");

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("registration_errors", validation_errors());
			redirect("/");
		}
		else
		{
			$this->load->model("belt_model");
			$user_input = $this->input->post();			
			$insert_user = $this->belt_model->insert_user($user_input);
			
			if($insert_user)
			{				
				$this->session->set_userdata("user_session", $user_input);
				redirect(base_url("login/profile"));
			}
			else
			{
				$this->session->set_flashdata("registration_errors", "Sorry but your info were not registered please try again.");
				redirect("/");
			}
		}
		public function logout()
	{
		$user_session_data = $this->session->all_userdata();
		
		foreach($user_session_data as $key)
		{
			$this->session->unset_userdata($key);
		}
		
		$this->session->sess_destroy();
		redirect("/");
	}
	}
	}
	