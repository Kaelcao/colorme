<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/5/2015
 * Time: 9:29 AM
 */
class Monhoc extends CI_Model
{

    var $id = 'id';
    var $created = 'created';
    var $updated = 'updated';
    var $userid = 'userid';
    var $name = 'name';
    var $duration = 'duration';
    var $description = 'description';
    var $detail = 'detail';
    var $category = 'category';
    var $price = 'price';
    var $chitieu = 'chitieu';
    var $mamau = 'mamau';


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //insert course
    function insert_course($data){
        return $this->db->insert('course', $data);
    }
    /**
     * lay tat ca du lieu monhoc
     * @return array mon hoc
     */
    function get_all()
    {
        $query = $this->db->get('course');
        return $query->result();
    }

    function get_entry($id)
    {
        return $this->db->get_where('course', array('id' => $id))->row_array();
    }

    function get_courseid_by_studentid($studentid)
    {
        return $this->db->query("
        select cm_course.id from cm_student
        join cm_regis on cm_regis.studentid = cm_student.id
        join cm_class on cm_class.id = cm_regis.classid
        join cm_course on cm_course.id = cm_class.courseid
        where cm_regis.studentid = $studentid
        ")->row_array()['id'];
    }

    function update_entry($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('cm_course', $data);
    }
}