<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main_control extends CI_Controller{
    public function __construct()
    {
        //default constructor
        parent :: __construct();

        //load database
        $this->load->database();

        //load session
        $this->load->library('session');

        //load validation lib
        $this->load->library('form_validation');

        //load model
        $this->load->model('main_model');
    }

    // public function index(){
    //     $this->load->view('index');
    // }

        //  public function savedata(){
                
        //     $this->form_validation->set_rules("name","name","required|alpha");
        //     $this->form_validation->set_rules("email","email","required|valid_email|is_unique[person_data.email]'");
        //     $this->form_validation->set_rules("mobile","mobile","required|min_length[10]|max_length[10]");
        //     $this->form_validation->set_rules("password","password","required|min_length[8]|alpha_numeric");

        //     if($this->form_validation->run() == false){

        //         $this->load->view('index');
        //     }

        //     else{

        //         if(isset($_POST['submit'])){

        //             $data['name'] = $this->input->post('name');
        //             $data['email'] = $this->input->post('email');
        //             $data['gender'] = $this->input->post('gender');
        //             $data['mobile'] = $this->input->post('mobile');
        //             $data['user'] = $this->input->post('user');
        //             $data['password'] = $this->input->post('password');

        //             $response = $this->main_model->saverecords($data);

        //                     if($response == true){
        //                        // echo "Records saved successfully..";
        //                        $this->session->set_flashdata('success','Registration Successfull..!! Now You Can <a href="login">Login</a>');
        //                        //redirect('main_control/savedata','refresh');
        //                        $this->load->view('index');
        //                     }
        //                     else{
        //                         $this->session->set_flashdata('error','Registration Failed');
        //                         $this->load->view('index');
        //                     }
        //         } 
        //         else{
        //             echo "Error";
        //         }
        //     }
        // }

        // public function login()
        // {

        //     $this->form_validation->set_rules("email","email","required");
        //     $this->form_validation->set_rules("password","password","required");


        //     if($this->form_validation->run() == false){

        //         $this->load->view('login');
                
        //     }

        //     else{

        //         if($this->input->post('signin')){

        //             $email = $this->input->post('email');
        //             $password = $this->input->post('password');
                   
        //            $row = $this->main_model->logged_in($email,$password);                

        //             if($row == true){
        //              $session_data = array(
        //                     'name' => $row['name'],
        //                     'email' => $row['email'],
        //                     'user' => $row['user'],                              
        //                 );
                   
        //             if($row['user'] == 'user'){
        //                 $this->session->set_userdata($session_data);
        //                 //$this->load->view('user_home');
        //                 redirect('main_control/user_data');
        //             }

        //             elseif($row['user'] == 'admin'){
        //                 $this->session->set_userdata($session_data);
        //                 //$this->load->view('user_home');
        //                 redirect('main_control/admin_data');

        //             } 
        //             else{
        //                 $this->session->set_flashdata('error','Invalid Email Id And Password');
        //                 //redirect('main_control/login');
        //                 $this->load->view('login');
        //             }
        //         }            
                        
        //             else{
        //                 $this->session->set_flashdata('error','Invalid Email Id And Password');
        //                 //redirect('main_control/login');
        //                 $this->load->view('login');
        //             }
        //         }

        //     }
        // }


    
    //     /*Display user_home*/
    // public function user_data()
    // {
        
    //     $result['data']=$this->main_model->display_records();
    //     $this->load->view('user_home',$result);
    // }
    //   /*Display admin_home*/
    //   public function admin_data()
    //   {
          
    //       $result['data']=$this->main_model->display_records();
    //       $this->load->view('admin_home',$result);
    //   }


    //   public function profile_update(){
    //       $this->load->view('profile_form');

    //   }

    //    public function edit_data(){
    //       $this->load->view('edit_form');

    //   }

    // public function delete_data(){

    // }

    // public function logout(){
    //     $this->session->sess_destroy();
    //     redirect(base_url('login/login_data'));
    //    }


      //     if($this->main_model->logged_in($email,$password))
                //    {
                //      $session_data = array(
                //             'email' => $email
                //         );
                //      $this->session->set_userdata($session_data);
                //      redirect('main_control/admin_data');
                //     }

    //   public function edit($userId){
    //       $user = $this->main_model->getUser($userId);
    //       $data = array();
    //       $data['id'] = $user;
    //       $this->load->view('edit_form');
    //   }

     

}
