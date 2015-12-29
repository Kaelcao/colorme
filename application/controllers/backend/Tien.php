<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 11/21/2015
 * Time: 4:30 PM
 */
class Tien extends CM_Controller
{
    /*
     *  transfer status
     * 0 Chờ xác nhận
     * 1 thành công
     *
     */
    public function ajaxnhantien($id, $money)
    {
        $this->db->where(array('fromid' => $id, 'toid' => $this->auth['id']))->update('transfer', array('status' => 1));
        $this->db->where('id', $this->auth['id'])
            ->set('money', 'money+' . $money, FALSE)
            ->update('user');
        $this->db->where('id', $id)
            ->set('money', 0, FALSE)
            ->update('user');
        echo "Đã nhận tiền";
    }

    public function ajaxhuynhantien($id)
    {
        $this->db->delete('transfer', array('fromid' => $id, 'toid' => $this->auth['id']));
        echo "Đã hủy";
    }

    public function ajaxchuyentien($id, $money)
    {
        $transferdata = array(
            "fromid" => $this->auth['id'],
            "toid" => $id,
            "amount" => $money,
            "transferedtime" => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
            "status" => 0
        );
        $this->db->insert('transfer', $transferdata);
        echo "Chờ xác nhận";
    }

    public function thutien($id)
    {
        $this->load->model('hocvien');
        $data['user'] = $this->auth;
        if (empty($id)) {
            $this->cm_string->php_redirect("backend/student/show_all_students/");
        }

        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['courses'] = $this->courses;
        $data['seo']['description'] = 'Student Management';
        $data['current_page'] = 'tele_student';
        $data['template'] = 'backend/noptien/noptien';

        $data['data']['table_name'] = 'Student Details';
        $data['data']['table_description'] = "Details of a Student";
        $data['paid'] = $this->db->from('regis')->where('studentid', $id)->get()->row_array()['paid'];
        $data['lastestrealid'] = $this->hocvien->get_lastest_realid();

        $data['student'] = $this->db->from('cm_student')->where('id', $id)->get()->row_array();
        $class = $this->db->select('cm_class.id classid, cm_course.linknoiquy linknoiquy,cm_course.linktimeline linktimeline,cm_course.linkphanmemmac linkphanmemmac,cm_course.linkphanmemwindow linkphanmemwindow,cm_course.id courseid, cm_class.gen number, cm_class.startdate startdate,cm_course.duration duration,cm_class.lecturerid lecturerid,cm_class.taid taid,cm_course.name coursename,cm_class.name classname,cm_class.studyday studyday, leadname, leadphone, cm_course.price')->from('regis')->join('class', 'cm_regis.classid = cm_class.id')->join('course', 'cm_course.id = cm_class.courseid')->where('cm_regis.studentid', $data['student']['id'])->get()->row_array();

        $data['class'] = $class;
        if ($this->input->post('btnxacnhan')) {


            $masinhvien = trim($this->input->post('masinhvien'));
            $somadatontai = $this->db->from('student')->where('realid', $masinhvien)->count_all_results();
            if ($somadatontai == 0) {
                $note = trim($this->input->post('note'));
                $tien = keep_only_number($this->input->post('hocphi'));
                if (empty($tien)) {
                    $tien = 0;
                }

                $this->db->where('id', $this->auth['id'])
                    ->set('money', 'money+' . $tien, FALSE)
                    ->update('user');

                $this->db->query("INSERT INTO `cm_attend`(`studentid`, `lectureid`, `hwdone`, `taid`,`classid`)
select $id, cm_classstatus.lectureid,0, -1, ".$class['classid']."
from cm_classstatus
where cm_classstatus.classid=".$class['classid']);
                $class['lecturername'] = $this->db->select("fullname")->from('user')->where('id', $class['lecturerid'])->get()->row_array()['fullname'];
                $class['taname'] = $this->db->select("fullname")->from('user')->where('id', $class['taid'])->get()->row_array()['fullname'];

                $data['student']['realid'] = $masinhvien;
                $data['student']['tiennop'] = $tien;
                $data['student']['paidtime'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

                //Tao tai khoan cho hoc vien
                $salt = $this->cm_string->random(69, TRUE);

                $password = $this->cm_string->encrypt_password($data['student']['realid'], $data['student']['email'], $salt);
                $this->hocvien->update_student_password_id($password,$id,$salt);

                $this->db->where('studentid', $id)->update('regis', array('note' => $note, 'userid' => $this->auth['id'], 'paid' => $tien, 'paidtime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)));
                $this->db->where('id', $id)->update('student', array('realid' => $masinhvien));
                $data['confirm'] = "<div class='alert alert-success text-center text-capitalize text-success'>Nộp tiền thành công</div>";
                $this->cm_string->send_email_noptien($data['student'], $class);
            } else {
                $data['confirm'] = "<div class='alert alert-danger text-center text-capitalize text-danger'>Mã học viên bị trùng lặp</div>";
            }


        }
        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }


}