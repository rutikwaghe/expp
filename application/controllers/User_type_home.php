<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_type_home extends CI_Controller
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

        $this->load->library("pagination");
    }

    /*Display user_home*/
    public function user_data()
    {
        if (isset($_SESSION['email'])) {
            //data fetch for header
            $res['row'] = $this->main_model->profile();
            $this->load->view('headerr', $res);

            //data for main page
            $result['data'] = $this->main_model->user_table();
            $this->load->view('user_home', $result);
        } else {
            redirect('welcome');
        }
    }

    /*Display admin_home*/
    public function admin_data()
    {
        if (isset($_SESSION['email'])) {
            //data fetch for header
            $res['row'] = $this->main_model->profile();
            $this->load->view('headerr', $res);

            //data for main page
            $result['data'] = $this->main_model->admin_table();
            $this->load->view('admin_home', $result);
        } else {
            redirect('welcome');
        }
    }
}
