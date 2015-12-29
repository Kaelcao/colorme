<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/5/2015
 * Time: 9:27 AM
 */
class Lophoc extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * lay tat ca du lieu lop hoc
     * @return array lop hoc
     */
    function get_all()
    {
        $query = $this->db->get('class');
        return $query->result();
    }

    function get_class_by_genid($gen)
    {
        $query = $this->db->where('gen', $gen)->get('class');
        return $query->result();
    }

    function get_newest_gen()
    {
        $query = $this->db->query('select max(gen) number from cm_class')->row_array();
        return $query['number'];
    }

    function get_all_gens()
    {
        $query = $this->db->query('select DISTINCT gen from cm_class')->result();
        return $query;
    }

    function get_entry($id)
    {
        $data = $this->db->get_where('class', array('id' => $id))->row_array();
        return $data;
    }

    function get_thongtinchitietlophoc($gen)
    {
        $query = $this->db->query('select cm_class.activated activated, cm_course.mamau mamau, cm_class.isopen isopen,cm_class.id classid, cm_class.gen gen, cm_course.name coursename, t.songuoinoptien, count(cm_regis.studentid) songuoidangky, cm_course.chitieu, cm_class.name,cm_class.studyday, cm_user.fullname lecturername,t.fullname taname
from cm_class left join cm_user on cm_user.id = cm_class.lecturerid
left join cm_user t on t.id = cm_class.taid
left join cm_course on cm_course.id = cm_class.courseid
left join cm_regis on cm_regis.classid = cm_class.id
left join (select cm_regis.classid, count(*) songuoinoptien from cm_regis where paid!=-1 group by cm_regis.classid) t
on cm_class.id = t.classid
where cm_class.gen=' . $gen . '
group by cm_class.id');
        return $query->result();
    }

    function dong_mo_lop($classid)
    {
        $checked = $this->get_open_status($classid);
        $checked = ($checked == 0) ? 1 : 0;
        $this->db->where('class.id', $classid)->update('class', array('isopen' => $checked));
        return $checked;
    }

    function get_open_status($id)
    {
        return $this->db->query('select isopen from cm_class where id= ' . $id)->row_array()['isopen'];
    }

    function update_entry($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('class', $data);
    }

    function get_lop_theo_buoi($courseid, $lectureid,$currentClassId)
    {
        $query_str = "select cm_classstatus.day, cm_classstatus.classid,cm_classstatus.lectureid , cm_class.studyday, cm_class.gen, cm_class.name classname,t1.fullname lecturername, t2.fullname taname
from cm_class
join cm_course on cm_course.id = cm_class.courseid
join cm_classstatus on cm_class.id = cm_classstatus.classid
join cm_user t1 on t1.id = cm_class.lecturerid
join cm_user t2 on t2.id = cm_class.taid
where cm_classstatus.classid!=$currentClassId and cm_classstatus.lectureid = $lectureid and cm_course.id = '$courseid' and chitieu > cm_classstatus.students";
        return $this->db->query($query_str)->result();
    }
    //insert class
    function insert_entry($data){
        return $this->db->insert('class', $data);
    }
}