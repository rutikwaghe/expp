<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Image_control extends CI_Controller
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
        $this->load->view('image_view',$table);
    }



}