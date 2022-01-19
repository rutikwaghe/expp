<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Edit_user extends CI_Controller
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

	public function edit()
	{
		$table['row'] = $this->main_model->profile();
		$this->load->view('edit_from', $table);
	}
	

	public function edit_user_data()
	{

		$res['row'] = $this->main_model->profile();
		$this->load->view('headerr', $res);

			$data['row'] = $this->main_model->getuserid();
			$this->load->view('edit_form', $data);

		$this->form_validation->set_rules("name", "name", "regex_match[/^([a-z ])+$/i]|required");
		$this->form_validation->set_rules("mobile", "mobile", "required|min_length[10]|max_length[10]");

		if ($this->form_validation->run() == false) {

			echo json_encode(array(
				'error' => true,
				'name_err' => form_error('name'),
				'mobile_err' => form_error('mobile')
			));

			// $data['row'] = $this->main_model->getuserid();
			// $this->load->view('edit_form', $data);
		} 
		
		else {
			$userid = $this->input->post('id');
			$userdata['name'] = $this->input->post('name');
			$userdata['mobile'] = $this->input->post('mobile');
			$userdata['gender'] = $this->input->post('gender');

			$res = $this->main_model->edit_users($userdata, $userid);

			if ($res == true) {
				echo json_encode(array(
					"status" => 200,
					"msg" => "Successfull..!!"
				));

				// $this->session->set_flashdata('success', '<div class="alert text-center alert-success " role="alert">
				// 		Data Updated Successfully !!</div>');
				// redirect("edit_user/edit?id=" . $_GET['id']);
			} else {
				echo json_encode(array(
					"status" => 500,
					"msg" => "Failed..!!"
				));

				// $this->session->set_flashdata('error', '<div class="alert text-center alert-danger " role="alert">
				// 		Failed to update data !!</div>');
				// redirect("edit_user/edit?id=" . $_GET['id']);
			}
		}
	}

	public function delete()
	{

		$userid = $_GET['id'];
		$delete_data = $this->main_model->delete_users($userid);

		
		if($delete_data ==true)
		{ 
		echo json_encode(array(
		"status"=>200,
		'msg'=>'
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Delete Successfully
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>',
		));
		}

		
		// $this->session->set_flashdata(
		// 	'success',
		// 	"<div class='alert alert-success' role='alert'>Record Delete Successfully</div>"
		// );
		 redirect("user_type_home/admin_data");
	}
}
