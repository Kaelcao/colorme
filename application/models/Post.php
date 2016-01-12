<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/23/2015
 * Time: 6:43 PM
 */
class Post extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insert($survey)
    {
        $this->db->insert('cm_surveyone', $survey);
    }

    function nop_baigiuaki($data)
    {
        $this->db->insert('cm_post', $data);
        return $this->db->insert_id();
    }



    function insert_post($post)
    {
        $this->db->insert('cm_post', $post);
        return $this->db->insert_id();
    }

    function get_all_post($studentid,$lectureOrder)
    {
        $data = array(
            'studentid'=> $studentid,
            'lectureOrder'=>$lectureOrder
        );
        return $this->db->where($data)->get('post')->result_array();
    }

    function get_post($id)
    {
        return $this->db->where('id', $id)->get('post')->row_array();
    }

    function delete_post($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('post');

    }
    function add_post_like($postid)
    {
        $this->db->set('likes', 'likes+1', FALSE);
        $this->db->where('id', $postid);
        $this->db->update('post');
        $like = $this->db->select('likes')->from('post')->where('id',$postid)->get()->row_array();
        return $like['likes'];
    }
}