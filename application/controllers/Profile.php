<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		//default constructor
		parent::__construct();

		//load database
		$this->load->database();

		//load session
		$this->load->library('session');

		//load validation lib
		$this->load->library('form_validation');

		//load model
		$this->load->model('main_model');
	}


	public function index()
	{

		$table['row'] = $this->main_model->profile();
		$this->load->view('profile_form', $table);
	}

	public function profile_data()
	{

		if (isset($_SESSION['email'])) {

			$config = [
				'upload_path' => './assets/image/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => rand(),
			];
			$this->load->library('upload', $config);


			$this->form_validation->set_rules("name", "name", "regex_match[/^([a-z ])+$/i]|required");
			$this->form_validation->set_rules("mobile", "mobile", "required|min_length[10]|max_length[10]");
			$this->form_validation->set_rules("password", "password", "required|min_length[8]|alpha_numeric");


			if ($this->form_validation->run() == false) {

				echo json_encode(array(
					'error' => true,
					'name_err' => form_error('name'),
					'mobile_err' => form_error('mobile'),
					'password_err' => form_error('password')
				));
			} else {

				$profile_data['name'] = $this->input->post('name');
				$profile_data['mobile'] = $this->input->post('mobile');
				$profile_data['password'] = $this->input->post('password');

				if ($this->upload->do_upload('image')) {
					$profile_data['profile'] = $this->upload->data('file_name');
					$upload_error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $upload_error);
				}

				$res = $this->main_model->profile_update_data($profile_data);

				if ($res == true) {
					echo json_encode(array(
						"status" => 200,
						"msg" => "Successfull..!!"
					));
				} else {
					echo json_encode(array(
						"status" => 500,
						"msg" => "Failed..!!"
					));
				}
			}
		}
	}




	public function back()
	{
		if ($_SESSION['user'] == "user") {
			redirect('user_type_home/user_data');
		} elseif ($_SESSION['user'] == "admin") {
			redirect('user_type_home/admin_data');
		} else {
			redirect('welcome');
		}
	}
}
