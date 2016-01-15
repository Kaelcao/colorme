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

    function get_post_by_class($classid)
    {
        $data = array(
            "cm_regis.classid" => $classid
        );
        return $this->db->select("cm_student.facebook facebook, cm_student.fullname fullname,cm_post.date date,cm_post.lectureOrder, cm_post.source source")
            ->from('post')
            ->join('student', 'cm_student.id = cm_post.studentid')
            ->join('regis','cm_regis.studentid = cm_student.id')
            ->where($data)
            ->order_by("date","desc")
            ->get()
            ->result_array();
    }

    function get_all_post($studentid, $lectureOrder)
    {
        $data = array(
            'studentid' => $studentid,
            'lectureOrder' => $lectureOrder
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
        $like = $this->db->select('likes')->from('post')->where('id', $postid)->get()->row_array();
        return $like['likes'];
    }
}