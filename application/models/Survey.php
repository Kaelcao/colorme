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

    function nop_baigiuaki($baigiuaki, $studentid)
    {
        $data = array(
            'baigiuaki' => $baigiuaki,
        );
        $this->db->where('studentid', $studentid);
        $this->db->update('regis', $data);
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
        return $this->db->insert('cm_post', $post);
    }

    function get_all_post($studentid)
    {
        return $this->db->where('studentid', $studentid)->get('post')->result_array();
    }

}