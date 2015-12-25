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
    function insert($survey){
        $this->db->insert('cm_surveyone', $survey);
    }
    function nop_baigiuaki($baigiuaki,$studentid){
        $data = array(
            'baigiuaki' => $baigiuaki,
        );
        $this->db->where('studentid', $studentid);
        $this->db->update('regis', $data);
    }
    function complete_survey_one($studentid){
        return $this->db->from('surveyone')->where('studentid',$studentid)->count_all_results()>0;
    }

}