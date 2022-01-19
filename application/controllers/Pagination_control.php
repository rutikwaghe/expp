<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_control extends CI_Controller {

    public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Pagination_model');
    }

    public function index() 
	{
        $config = array();
        $config["base_url"] = base_url() . "Pagination_control/index";
        $config["total_rows"] = $this->Pagination_model->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();

        $data['student'] = $this->Pagination_model->get_students($config["per_page"], $page);

        $this->load->view('pagination', $data);
    }
}
?>