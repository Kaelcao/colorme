<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/23/2015
 * Time: 6:43 PM
 */
class Survey extends CI_Model
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

    function complete_survey_one($studentid)
    {
        return $this->db->from('surveyone')->where('studentid', $studentid)->count_all_results() > 0;
    }

    function complete_survey_ck($studentid)
    {
        return $this->db->from('survey')->where('studentid', $studentid)->count_all_results() > 0;
    }

    function insert_survey($survey)
    {
        $this->db->insert('cm_survey', $survey);
    }

    function get_gen_student($studentid)
    {
        return $this->db->select('gen')
            ->from('regis')
            ->join('class', 'cm_class.id = cm_regis.classid')
            ->where('studentid', $studentid)
            ->get()->row_array()['gen'];
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
}