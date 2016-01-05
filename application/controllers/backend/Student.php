<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 11/21/2015
 * Time: 4:30 PM
 */
class Student extends CM_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('hocvien');
        $this->load->model('quanlylophoc/lophoc');
    }

    public function show_all_students($page = 1, $delete = 0, $row = 10)
    {
        $data['delete_status'] = $delete;
        $row_count = $this->db->count_all_results('cm_student');
        $data['total'] = ceil($row_count / $row);
        $data['page'] = $page;

        $data['user'] = $this->auth;
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['seo']['description'] = 'Student Management';
        $data['courses'] = $this->courses;

        $data['current_page'] = 'Student';
        $data['template'] = 'backend/show_student';

        $data['data']['table_name'] = 'Students';
        $data['data']['table_description'] = "All Students's Data";
        $data['students'] = $this->db->from('cm_student')->limit($row, ($page - 1) * $row)->order_by("created", "desc")->get()->result();
        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }

    public function danhsachnoptien($page = 1, $row = 10)
    {
        $row_count = $this->db->count_all_results('cm_student');
        $data['total'] = ceil($row_count / $row);
        $data['page'] = $page;

        $data['user'] = $this->auth;
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['seo']['description'] = 'Student Management';
        $data['courses'] = $this->courses;
        $data['current_page'] = 'danhsachnoptien';

        $data['data']['table_name'] = 'Students';
        $data['data']['table_description'] = "All Students's Data";
        $data['template'] = "backend/noptien/danhsachnoptien";

        $data['students'] = $this->db->select('cm_student.id id,cm_student.fullname fullname,cm_student.address address,cm_student.email email,cm_student.phone phone, cm_student.realid realid, cm_regis.paid paid,cm_regis.note note, cm_user.fullname tennguoithu')->from('cm_student')->join('regis', 'cm_regis.studentid=cm_student.id')->join('user', 'cm_user.id=cm_regis.userid', 'left')->limit($row, ($page - 1) * $row)->order_by("cm_student.created", "desc")->get()->result();
        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }

    //ajax search o phan nop tien
    public function ajaxnoptien($searchstr = "", $page = 1, $row = 10)
    {
        $searchstr = urldecode($searchstr);
        $data['students'] = $this->db->from('cm_student')->join('regis', 'cm_regis.studentid=cm_student.id')->like('fullname', $searchstr)->or_like('email', $searchstr)->or_like('address', $searchstr)->or_like('phone', $searchstr)->or_like('position', $searchstr)->or_like('workplace', $searchstr)->limit($row, ($page - 1) * $row)->order_by("created", "desc")->get()->result();
//        $data['students'] = $this->db->from('cm_student')->limit($row, ($page - 1) * $row)->order_by("created", "desc")->get()->result();
        $row_count = $this->db->from('cm_student')->join('regis', 'cm_regis.studentid=cm_student.id')->like('fullname', $searchstr)->or_like('email', $searchstr)->or_like('address', $searchstr)->or_like('phone', $searchstr)->or_like('position', $searchstr)->or_like('workplace', $searchstr)->order_by("created", "desc")->count_all_results();
        $data['total'] = ceil($row_count / $row);
        $data['page'] = $page;
        $this->load->view("backend/noptien/ajaxnoptien", $data);
    }

    public function end_call($classid, $studentid)
    {
        $user = $this->auth;
        $this->db->where(array(
            "studentid" => $studentid,
            "classid" => $classid
        ))->update("regis", array('caller' => $user['id'], "called" => 0));
        $data['caller'] = $user['fullname'];
        $data['callestatus'] = "Chưa gọi";
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function add_call($classid, $studentid)
    {
        $numbercalls = $this->db->select('numberofcall')->from('regis')->where(array("classid" => $classid, "studentid" => $studentid, "called" => 0))->get()->row_array();
        $numbercalls = $numbercalls['numberofcall'];
        $numbercalls = $numbercalls + 1;
        $user = $this->auth;
        $this->db->where(array(
            "studentid" => $studentid,
            "classid" => $classid
        ))->update("regis", array("numberofcall" => $numbercalls, 'caller' => $user['id'], 'called' => 2));
        $data['numbercalls'] = $numbercalls;
        $data['caller'] = $user['fullname'];
        $data['called'] = "Đang gọi";
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function reloadstudent($courseid, $page = 1, $row = 10, $searchstr = "")
    {
        $searchstr = urldecode($searchstr);
        $data['numberpages'] = $page;
        $data['numberrows'] = $row;
        $data['courseid'] = $courseid;
        $lastest_gen = $this->lophoc->get_newest_gen();
        $data['user'] = $this->auth;
        $data['students'] = $this->hocvien->get_hocvien_chuagoi_vachuadongtien($courseid, $page, $row, $lastest_gen, $searchstr);

        $this->load->view("backend/telesale/ajaxstudent", $data);
    }

    public function confirm_call($classid, $studentid)
    {
        $numbercalls = $this->db->select('numberofcall')->from('regis')->where(array("classid" => $classid, "studentid" => $studentid, "called" => 0))->get()->row_array();
        $numbercalls = $numbercalls['numberofcall'];
        $data = array(
            "called" => 1,
        );
        if ($numbercalls == 0) {
            $data['numberofcall'] = 1;
        }
        $user = $this->auth;
        $data['caller'] = $user['id'];
        $this->db->where(array(
            "studentid" => $studentid,
            "classid" => $classid
        ))->update("regis", $data);
        echo "Đã gọi";
    }

    public function students_tele_sale($courseid, $page = 1, $row = 10)
    {
        $lastest_gen = $this->lophoc->get_newest_gen();
        $course = $this->db->where("id", $courseid)->from("course")->get()->row_array();
//        $data['students'] = $this->db->select('cm_regis.numberofcall,cm_regis.called,cm_regis.classid,cm_student.id,email,fullname,dob,phone')->from('cm_student')->join('cm_regis', 'cm_regis.studentid=cm_student.id')->join('cm_class', 'cm_class.id=cm_regis.classid')->join('cm_gen', 'cm_gen.id=cm_class.genid')->where(array("cm_gen.id" => $lastest_gen['id'], "cm_gen.courseid" => $courseid))->limit($row, ($page - 1) * $row)->order_by("created", "desc")->get()->result();
        $data['students'] = $this->hocvien->get_hocvien_chuagoi_vachuadongtien($courseid, $page, $row, $lastest_gen);
        $data['numberpages'] = $page;
        $data['numberrows'] = $row;
        $row_count = $this->db->select('cm_user.fullname caller,cm_user.id callerid, cm_regis.numberofcall,cm_regis.called,cm_regis.classid,cm_student.id,cm_student.email,cm_student.fullname,cm_student.dob,phone')->from('cm_student')->join('cm_regis', 'cm_regis.studentid=cm_student.id')->join('cm_class', 'cm_class.id=cm_regis.classid')->join('cm_user', 'cm_user.id=cm_regis.caller', 'left')->where(array("cm_regis.paid" => -1, "cm_class.gen" => $lastest_gen, "cm_class.courseid" => $courseid))->count_all_results();

        $data['total'] = ceil($row_count / $row) > 1 ? ceil($row_count / $row) : 1;
        $data['page'] = $page;
        $data['user'] = $this->auth;
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['seo']['description'] = 'Students show for tele sale';
        $data['current_page'] = 'Student Tele Sale';
        $data['template'] = 'backend/students_tele_sale';
        $data['courseid'] = $courseid;
        $data['courses'] = $this->courses;

        $data['data']['table_name'] = $course['name'];
        $data['data']['table_description'] = $course['description'];


        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }

    public function delete_student($id, $page = "")
    {
        $data['template'] = 'backend/show_student';
        if ($this->db->where("id", $id)->delete('cm_student')) {
            $this->db->where("studentid", $id)->delete('cm_regis');
            $this->cm_string->php_redirect("backend/student/show_all_students/" . $page . '/1');
        } else {
            $this->cm_string->php_redirect("backend/student/show_all_students/" . $page . '/2');
        }
    }

    public function add_student()
    {
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['seo']['description'] = 'Student Management';
        $data['current_page'] = 'Student';
        $data['courses'] = $this->courses;
        $data['template'] = 'backend/add_student';
        if (!empty($_POST)) {
            $created = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $post_data = array(
                'id' => $this->input->post('id'),
                'fullname' => $this->input->post('fullname'),
                'dob' => $this->input->post('dob'),
                'created' => $created,
                'email' => $this->input->post('email'),
                'workplace' => $this->input->post('workplace'),
                'position' => $this->input->post('position'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone')
            );
            $data['post_data'] = $post_data;
            $this->form_validation->set_rules('id', 'Student ID', 'trim|required');
            $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('workplace', 'Work Place/ University', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('position', 'Position', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $this->db->insert('cm_student', $post_data);
                $data['confirm'] = "Student Added Successfully";
            }
        }
        $data['user'] = $this->auth;


        $data['data']['table_name'] = 'Students';
        $data['data']['table_description'] = "Add New Student to Database";
        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }

    public function detail_student($id, $classid, $numberpages, $numberrows, $courseid)
    {
        if (empty($id)) {
            $this->cm_string->php_redirect("backend/student/show_all_students/");
        }
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['courses'] = $this->courses;

        $data['seo']['description'] = 'Student Management';
        $data['current_page'] = 'tele_student';
        $data['template'] = 'backend/student_detail';
        $data['user'] = $this->auth;
        $data['data']['table_name'] = 'Student Details';
        $data['data']['table_description'] = "Details of a Student";

        $data['student'] = $this->hocvien->get_entry($id);
        $classes = $this->db->select('*')->from('regis')->join('class', 'cm_regis.classid = cm_class.id')->join('course', 'cm_course.id = cm_class.courseid')->where('cm_regis.studentid', $data['student']['id'])->get()->result();
        $data['classes'] = $classes;
        $data['classid'] = $classid;
        if ($this->input->post()) {
            $ngayhen = $this->input->post('ngayhen');
            $notegoidien = trim($this->input->post('notegoidien'));
            $data['student']['ngayhen'] = $ngayhen;
            $data['student']['notegoidien'] = $notegoidien;
            $this->db->where(array('cm_regis.studentid' => $id, 'cm_regis.classid' => $classid))->update('regis', array('ngayhen' => $ngayhen, 'notegoidien' => $notegoidien));
            $this->cm_string->php_redirect('backend/student/students_tele_sale/' . $courseid . "/" . $numberpages . "/" . $numberrows);

        }
        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }

    public function update_student($id)
    {
        if (empty($id)) {
            $this->cm_string->php_redirect("backend/student/show_all_students/");
        }
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['seo']['description'] = 'Student Management';
        $data['courses'] = $this->courses;
        $data['current_page'] = 'Student';
        $data['template'] = 'backend/student_update';
        $data['user'] = $this->auth;
        $data['data']['table_name'] = 'Update Student';
        $data['data']['table_description'] = "Update Student Information";
        if (!empty($_POST)) {
            $this->form_validation->set_rules('id', 'Student ID', 'trim|required');
            $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('workplace', 'Work Place/ University', 'trim|required');
            $this->form_validation->set_rules('position', 'Position', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $post_data = array(
                    'id' => $this->input->post('id'),
                    'fullname' => $this->input->post('fullname'),
                    'dob' => $this->input->post('dob'),
                    'email' => $this->input->post('email'),
                    'workplace' => $this->input->post('workplace'),
                    'position' => $this->input->post('position'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone')
                );

                $this->db->where('id', $id);
                $this->db->update('cm_student', $post_data);
                $data['confirm'] = "Student Updated Successfully";
                $data['student'] = $post_data;
            }

        } else {
            $data['student'] = $this->db->from('cm_student')->where('id', $id)->get()->row_array();
        }
        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);

    }

    public function generate_all_student_accounts()
    {
        $students = $this->hocvien->get_all();

        foreach ($students as $s) {
            $salt = $this->cm_string->random(69, TRUE);
            $password = $this->cm_string->encrypt_password($s->realid, $s->email, $salt);
            $this->hocvien->update_student_password($password, $s->realid, $salt);
        }
    }

    public function test_mail()
    {
        $this->load->library('email');
        $test_config['protocol'] = 'smtp';
        $test_config['smtp_host'] = 'tls://email-smtp.us-west-2.amazonaws.com';
        $test_config['smtp_port'] = '465';
        $test_config['smtp_user'] = 'AKIAJEQT2NUMEUWI7NHA';
        $test_config['smtp_pass'] = 'AvKj5skO2nEUsLuKX21MB7QNvDRLp/3dORdayFlYN8iP';
        $test_config['newline']      = "\r\n";

        $this->email->initialize($test_config);

        $this->email->from('colorme.idea@gmail.com', 'From at colorme.idea@gmail.com');
        $this->email->to('aquancva@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        var_dump($this->email->send());
        $this->email->print_debugger();
    }
}