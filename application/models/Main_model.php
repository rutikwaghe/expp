<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

  //index page
  function saverecords($data)
  {

    $this->db->insert('person_ajax', $data);
    return true;
  }

  //login page
  function logged_in($email, $password)
  {
    //$query=$this->db->query("select * from person_ajax where email = '$email' and password = '$password'");

    $query = $this->db->get_where('person_ajax', array('email' => $email, 'password' => $password));
    if ($query->num_rows() > 0) {
      return $query->row_array();
    }
  }

  //Display data table on user page
  function user_table()
  {
    //$query=$this->db->query("select * from person_ajax where email != '".$_SESSION['email']."' ");

    $query = $this->db->where('email != ', $_SESSION['email'])
      ->get('person_ajax');
    return $query->result_array();
  }

  //Display data table on admin page
  function admin_table()
  {
    $query = $this->db->where('email != ', $_SESSION['email'])
      ->get('person_ajax');
    return $query->result_array();
  }



  public function profile()
  {
    //$query=$this->db->query("select * from person_ajax where email = '".$_SESSION['email']."' ");

    $query = $this->db->where("email = '" . $_SESSION['email'] . "' ")
      ->get('person_ajax');
    return $query->row_array();
  }


  public function profile_update_data($profile_data)
  {
    $this->db->set($profile_data)
      ->where("email = '" . $_SESSION['email'] . "' ")
      ->update("person_ajax");
    return true;
  }



  public function getuserid()
  {

    $query = $this->db->where("id = '" . $_GET['id'] . "' ")
      ->get("person_ajax");
    return $query->row_array();
  }

  public function edit_users($userdata, $userid)
  {
    $this->db->set($userdata)
      ->where('id', $userid)
      ->update("person_ajax");
    return true;
  }

  public function delete_users($userid)
  {

    $this->db->where('id', $userid)
      ->delete('person_ajax');
    return true;
  }

  public function get_count() 
	{
       return  $this->db->count_all("person_ajax");

    }

    public function get_data($limit, $start) 
	{
        $this->db->limit($limit, $start);
        $this->db->where('email != ', $_SESSION['email']);
        $query = $this->db->get("person_ajax");
        return $query->result_array();
    }



}
