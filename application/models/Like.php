<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/5/2015
 * Time: 12:16 PM
 */
class Like extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insert_entry($data)
    {
        $this->db->insert('like', $data);
        return $this->db->insert_id();
    }

    function is_liked($studentid, $postid)
    {
        $data = array(
            'id' => $postid,
            'studentid' => $studentid
        );
        return $this->db->where($data)->count_all_results('post');
    }

}