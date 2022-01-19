<?php
class Pagination_model extends CI_Model 
{

    public function get_count() 
	{
        return $this->db->count_all("person_data");
    }

    public function get_students($limit, $start) 
	{
        $this->db->limit($limit, $start);
        $query = $this->db->get("person_data");
        return $query->result();
    }
}
?>