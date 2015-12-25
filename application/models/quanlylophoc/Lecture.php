<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/12/2015
 * Time: 9:26 PM
 */
class Lecture extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_lecture_by_id($id) {
        return $this->db->select("*")->from("cm_lecture")->where('id', $id)->get()->row_array();
    }

    function update_lecture($lectureid, $data) {

        $this->db->where('id', $lectureid);
        $this->db->update('lecture', $data);
    }

    function get_lecture_by_courseid($courseid) {
        return $this->db->where('courseid', $courseid)->order_by('order')->get('lecture')->result();
    }

    function get_lecture_by_class($classid) {
        return $this->db->select("cm_classstatus.day, cm_lecture.order,cm_lecture.name, cm_classstatus.students, cm_lecture.id")
                        ->from("lecture")
                        ->join("classstatus", "cm_lecture.id=cm_classstatus.lectureid")
                        ->where("cm_classstatus.classid", $classid)
                        ->order_by("cm_lecture.order")
                        ->get()->result();
    }

    function get_lecture($studentid) {
        $query_str = "select cm_attend.joined joined, c.studyday,cm_lecture.id lectureid, cm_class.gen, c.name classname, cm_lecture.linkanh, cm_lecture.description, cm_lecture.order ,cm_lecture.name name, cm_lecture.linkyoutube linkyoutube,cm_lecture.linkgiaotrinh linkgiaotrinh from cm_lecture
    join cm_course on cm_course.id = cm_lecture.courseid
    join cm_class on cm_class.courseid = cm_course.id
    join cm_regis on cm_regis.classid = cm_class.id
    join cm_attend on cm_attend.lectureid = cm_lecture.id
    join cm_class c on c.id = cm_attend.classid
    where cm_regis.studentid=$studentid and cm_attend.studentid=$studentid";
        return $this->db->query($query_str)->result();
    }

    function chuyenbuoi($classid, $lectureid, $studentid, $originClassId) {
        $data = array(
            'classid' => $classid,
            'lectureid' => $lectureid,
            'studentid' => $studentid,
            'status' => 1,
            'changetime' => $this->cm_string->get_current_time()
        );
        $this->db->insert('cm_changeclass', $data);
//    $this->db->set('students', 'students+1', FALSE)->where(array('classid'=>$classid,'lectureid'=>$lectureid))->update('classstatus');
//    $this->db->set('students', 'students-1', FALSE)->where(array('classid'=>$originClassId,'lectureid'=>$lectureid))->update('classstatus');
        $this->db->set('classid', $classid, FALSE)->where(array('studentid' => $studentid, 'lectureid' => $lectureid))->update('cm_attend');
        $this->db->query("update cm_classstatus set students=(select count(*) from cm_attend where cm_attend.classid=cm_classstatus.classid and cm_attend.lectureid=cm_classstatus.lectureid)");
    }

    function update_giaotrinh($giaotrinh, $lectureid) {
        $this->db->where('id', $lectureid);
        $this->db->update('lecture', array('giaotrinh' => $giaotrinh));
    }
    function update_giaotrinh_hocvien($giaotrinh, $lectureid) {
        $this->db->where('id', $lectureid);
        $this->db->update('lecture', array('giaotrinhhocvien' => $giaotrinh));
    }

}
