<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 11/5/2015
 * Time: 10:20 PM
 */
class StaffModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_staffs()
    {
        $query = $this -> db -> get('cm_staff');
        return $query->result_array();
    }
}