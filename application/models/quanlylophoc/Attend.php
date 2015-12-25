<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/12/2015
 * Time: 9:26 PM
 */
class Attend extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_classid($studentid,$lectureid) {
        return $this->db->select("classid")
            ->from("attend")
            ->where(array("studentid"=>$studentid,"lectureid"=>$lectureid))
            ->get()->row_array()['classid'];
    }


}
