<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Registration extends CI_Controller
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

    public function index(){
        $this->load->view('index');
    }

    public function register_data()
    {

        $this->form_validation->set_rules("name", "name", "regex_match[/^([a-z ])+$/i]|required");
        $this->form_validation->set_rules("email", "email", "required|valid_email|is_unique[person_ajax.email]'");
        $this->form_validation->set_rules("mobile", "mobile", "required|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("password", "password", "required|min_length[8]|alpha_numeric");

        if ($this->form_validation->run() == false) {            
            //$this->load->view('index');

            echo json_encode(array(
                'error' => true,
                'name_err' => form_error('name'),
                'email_err' => form_error('email'),
                'mobile_err' => form_error('mobile'),
                'password_err' => form_error('password')
            ));
             
           
        } else {

                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['gender'] = $this->input->post('gender');
                $data['mobile'] = $this->input->post('mobile');
                $data['user'] = $this->input->post('user');
                $data['password'] = $this->input->post('password');

                $res = $this->main_model->saverecords($data);

                if ($res == true) {

                    echo json_encode(array(
                        "status" => 200,
                        "msg" => "Successfull..!!"
                    ));
                    
                 } 
        }
    }
}
