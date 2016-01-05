<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/5/2015
 * Time: 10:51 AM
 */
class Hocvien extends CI_Model
{
    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all()
    {
        return $this->db->get('student')->result();
    }

    function get_all_by_class($classid)
    {
        return $this->db->where(array('cm_regis.classid' => $classid, "paid>" => -1))->from("student")->join('regis', "cm_regis.studentid=cm_student.id")->get()->result();
    }

    function update_student_password_id($password, $id, $salt)
    {

        $this->db->where('id', $id)->update('student', array('password' => $password, 'salt' => $salt));
    }

    function update_student_password($password, $realid, $salt)
    {
        $this->db->where('realid', $realid)->update('student', array('password' => $password, 'salt' => $salt));
    }

    function get_entry($id)
    {
        return $this->db->where('id', $id)->from('student')->join('regis', 'cm_regis.studentid = cm_student.id')->get()->row_array();
    }

    function realid_to_id($realid)
    {
        return $this->db->query("select id from cm_student where realid = '$realid'")->row_array()['id'];
    }

    function get_entry_by_realid($realid)
    {
        return $this->db->select("cm_student.realid realid,fullname name,cm_class.name classname, cm_student.email,cm_student.workplace")->where('realid', $realid)->from('student')->join('regis', 'cm_regis.studentid = cm_student.id')->join('class', 'cm_class.id=cm_regis.classid')->get()->row_array();
    }

    function get_lecture_of_student($realid)
    {
        return $this->db->select("cm_attend.lectureid, cm_attend.hwdone hwdone,cm_attend.joined,cm_attend.checked_time checkedtime,cm_lecture.order")
            ->where('realid', $realid)
            ->from('student')
            ->join('attend', 'cm_attend.studentid=cm_student.id')
            ->join('lecture', 'cm_attend.lectureid=cm_lecture.id')
            ->join('regis', 'cm_regis.studentid = cm_student.id')
            ->get()->result();
    }

    function get_hocvien_chuagoi_vachuadongtien($courseid, $page, $row, $lastest_gen, $searchstr = "")
    {
//        if (!empty($searchstr))
//            $search = " AND MATCH (cm_student.fullname)AGAINST ('$searchstr' IN NATURAL LANGUAGE MODE)";
//        else {
//            $search = "";
//        }
//        $search = "and cm_student.fullname like '%$searchstr%'";
//        if (strlen($searchstr)>=4){
//            $search.= " AND MATCH (cm_student.fullname)AGAINST ('$searchstr' IN NATURAL LANGUAGE MODE)";
//        }
//        $query_str = "SELECT `cm_regis`.`notegoidien` `notegoidien`, `cm_regis`.`ngayhen` `ngayhen`, `cm_student`.`facebook` `facebook`, `cm_user`.`fullname` `caller`, `cm_user`.`id` `callerid`, `cm_regis`.`numberofcall`, `cm_regis`.`called`, `cm_regis`.`classid`, `cm_student`.`id`, `cm_student`.`email`, `cm_student`.`fullname`, `cm_student`.`dob`, `phone`, `cm_class`.`name` `classname`, `cm_class`.`studyday` FROM `cm_student` JOIN `cm_regis` ON `cm_regis`.`studentid`=`cm_student`.`id` JOIN `cm_class` ON `cm_class`.`id`=`cm_regis`.`classid` LEFT JOIN `cm_user` ON `cm_user`.`id`=`cm_regis`.`caller` WHERE `cm_regis`.`paid` = -1 AND `cm_class`.`gen` = '7' AND `cm_class`.`courseid` = 'C1'
//  $search ORDER BY `cm_student`.`created` DESC LIMIT $page, $row";
//        return $this->db->query($query_str)->result();
        return $this->db->select('cm_regis.notegoidien notegoidien, cm_regis.ngayhen ngayhen,cm_student.facebook facebook ,cm_user.fullname caller,cm_user.id callerid, cm_regis.numberofcall,cm_regis.called,cm_regis.classid,cm_student.id,cm_student.email,cm_student.fullname,cm_student.dob,phone,cm_class.name classname,cm_class.studyday')->from('cm_student')->join('cm_regis', 'cm_regis.studentid=cm_student.id')->join('cm_class', 'cm_class.id=cm_regis.classid')->join('cm_user', 'cm_user.id=cm_regis.caller', 'left')->where(array("cm_regis.paid" => -1, "cm_class.gen" => $lastest_gen, "cm_class.courseid" => $courseid))->limit($row, ($page - 1) * $row)->like('cm_student.fullname', $searchstr)->order_by("cm_student.created", "desc")->get()->result();
    }

    function get_lastest_realid()
    {
        return $this->db->query("select realid from cm_student join cm_regis on cm_regis.studentid = cm_student.id  ORDER BY  `cm_student`.`realid` DESC limit 0,1")->row_array()['realid'];
    }


    function hocviens_dong_tien($date)
    {
        return $this->db->select('cm_user.avatar, cm_regis.paidtime paidtime,cm_student.id id,cm_student.fullname fullname,cm_student.address address,cm_student.email email,cm_student.phone phone, cm_student.realid realid, cm_regis.paid paid,cm_regis.note note, cm_user.fullname tennguoithu')->from('cm_student')->join('regis', 'cm_regis.studentid=cm_student.id')->join('user', 'cm_user.id=cm_regis.userid', 'left')->where('date(paidtime)', $date)->order_by("cm_student.created", "desc")->get()->result();
    }

    function hocvien_dongtien_theogen($gen)
    {
        return $this->db->select('cm_class.courseid courseid, cm_class.id classid, cm_regis.paidtime paidtime,cm_student.id id,cm_student.fullname fullname,cm_student.address address,cm_student.email email,cm_student.phone phone, cm_student.realid realid, cm_regis.paid paid,cm_regis.note note, cm_user.fullname tennguoithu')->from('cm_student')->join('regis', 'cm_regis.studentid=cm_student.id')->join('user', 'cm_user.id=cm_regis.userid', 'left')->join('cm_class', 'cm_class.id=cm_regis.classid')->where(array('cm_class.gen' => $gen, 'cm_regis', 'cm_regis.paid!=' => -1))->order_by("cm_student.created", "desc")->get()->result();
    }


    function get_all_bai_tap($offset = 0, $total = 10)
    {
        return $this->db->select('cm_post.source source,fullname,name,gen,cm_post.date date,cm_post.id id')->from('post')
            ->join('regis', 'cm_regis.studentid=cm_post.studentid')
            ->join('student','cm_student.id = cm_post.studentid')
            ->join('class', 'cm_class.id=cm_regis.classid')->order_by('cm_post.date','desc')->limit($total,$offset)->get()->result_array();
    }
}