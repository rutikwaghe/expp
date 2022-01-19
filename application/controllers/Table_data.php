<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Table_data extends CI_Controller
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
    $result['data'] = $this->main_model->admin_table();
    $this->load->view('table_view',$result);
}















}

