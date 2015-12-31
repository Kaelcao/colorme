<?php


class Dot_tuyen_sinh extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_all_dottuyensinh(){
        return $this->db->get('dot_tuyen_sinh')->result_array();
    }
    function insert_dot_tuyen_sinh($data){
        return $this->db->insert('dot_tuyen_sinh', $data);
    }

}