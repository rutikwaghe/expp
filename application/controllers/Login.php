<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
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
        $this->load->view('login');
    }


    public function login_data()
    {

        $this->form_validation->set_rules("email", "email", "required");
        $this->form_validation->set_rules("password", "password", "required");


        if ($this->form_validation->run() == false) {

            echo json_encode(array(
                'error' => true,
                'email_err' => form_error('email'),
                'password_err' => form_error('password')
            ));
        } 
        
        else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $row = $this->main_model->logged_in($email, $password);

            if ($row == true) {
                $session_data = array(
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'user' => $row['user']
                );

                if ($row['user'] == 'user') {
                    $this->session->set_userdata($session_data);

                    echo json_encode(array(
                        "status" => 200,
                        "user" => "user"
                    ));
                   // redirect('user_type_home/user_data');
                } elseif ($row['user'] == 'admin') {
                    $this->session->set_userdata($session_data);

                    echo json_encode(array(
                        "status" => 200,
                        "user" => "admin"
                    ));
                    //redirect('user_type_home/admin_data');
                } 
                else {
                    echo json_encode(array(
                        "status" => 500,
                        "msg" => "Invalid Email Id And Password"
                    ));
                }
                


            } else {
                echo json_encode(array(
                    "status" => 500,
                    "msg" => "Invalid Email Id And Password"
                ));
            }
        }
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
