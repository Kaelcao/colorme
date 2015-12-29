<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/5/2015
 * Time: 9:22 AM
 */
class Quanlylophoc extends CM_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('quanlylophoc/monhoc');
        $this->load->model('quanlylophoc/lophoc');
        $this->load->model('quanlylophoc/lecture');
        $this->load->model('nhanvien');
    }

    public function hienthilophoc()
    {
        if ($this->auth['permission'] == 0) {
            $this->cm_string->php_redirect("backend/Auth/login");
        }

        //view de hien thi
        $this->data['template'] = "backend/quanlylophoc/hienthilophoc";


        // Trang hien tai
        $this->data['current_page'] = "Quản lý lớp học";

        //lay du lieu
        $newestgen = $this->lophoc->get_newest_gen();
        $this->data['newestgen'] = $newestgen;
        $this->data['courses'] = $this->monhoc->get_all();
        $this->data['classes'] = $this->lophoc->get_thongtinchitietlophoc($newestgen);
        $this->data['gens'] = $this->lophoc->get_all_gens();

        $this->data['seo']['title'] = "Color ME CMS";
        $this->data['seo']['keywords'] = '';
        $this->data['seo']['description'] = 'Sua thong tin lop hoc';

        //load template
        $this->load->view("backend/layout/home", $this->data);
    }

    public function update_monhoc($courseid = "")
    {
        if ($this->auth['permission'] == 0) {
            $this->cm_string->php_redirect("backend/Auth/login");
        }

        //view de hien thi
        $this->data['template'] = "backend/quanlylophoc/update_monhoc";


        // Trang hien tai
        $this->data['current_page'] = "Quản lý lớp học";

        $this->data['seo']['title'] = "Color ME CMS";
        $this->data['seo']['keywords'] = '';
        $this->data['seo']['description'] = 'Sua thong tin lop hoc';


        if ($this->input->post()) {
            $post_data = array(
                'id' => trim($_POST['courseid']),
                'updated' => $this->cm_string->get_current_time(),
                'name' => trim($_POST['coursename']),
                'detail' => trim($_POST['detail']),
                'duration' => trim($_POST['duration']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'chitieu' => trim($_POST['chitieu']),
                'price' => trim($_POST['price']),
                'mamau' => trim($_POST['mamau']),
                'linkphanmemmac' => trim($_POST['linkphanmemmac']),
                'linkphanmemwindow' => trim($_POST['linkphanmemwindow']),
                'linktimeline' => trim($_POST['linktimeline']),
                'linknoiquy' => trim($_POST['linknoiquy']),
                'inRegister' => trim($_POST['inRegister'])

            );
            $this->data['confirm'] = "Chúc mừng bạn đã cập nhật thành công";
            $this->monhoc->update_entry($post_data);
        }
        $this->data['course'] = $this->monhoc->get_entry($courseid);
        $this->data['course']['nhanvien'] = $this->nhanvien->get_nhanvien($this->data['course']['userid']);
        $this->data['lectures'] = $this->lecture->get_lecture_by_courseid($courseid);
        //load template
        $this->load->view("backend/layout/home", $this->data);
    }

    public function update_day($classid)
    {
        $lectures = $this->lecture->get_lecture_by_class($classid);
        foreach ($lectures as $lect) {
            $data = array(
                "day" => $this->input->post($lect->id)
            );

            $this->db->where(array(
                "classid" => $classid,
                "lectureid" => $lect->id
            ));
            $this->db->update('classstatus', $data);

        }

        $link = "backend/quanlylophoc/update_lophoc/" . $classid . "/1/#lecture";
        $this->cm_string->php_redirect($link);
    }

    public function update_lophoc($id = "", $status = 0)
    {
        error_reporting(E_ERROR);
        if ($this->auth['permission'] == 0) {
            $this->cm_string->php_redirect("backend/Auth/login");
        }


        //view de hien thi
        $this->data['template'] = "backend/quanlylophoc/update_lophoc";


        // Trang hien tai
        $this->data['current_page'] = "Quản lý lớp học";

        $this->data['seo']['title'] = "Color ME CMS";
        $this->data['seo']['keywords'] = '';
        $this->data['seo']['description'] = 'Sua thong tin lop hoc';


        if ($this->input->post()) {
            $post_data = array(
                'id' => trim($_POST['id']),
                'updated' => $this->cm_string->get_current_time(),
                'studentnumbers' => trim($_POST['studentnumbers']),
                'name' => trim($_POST['name']),
                'room' => trim($_POST['room']),
                'startdate' => trim($_POST['startdate']),
                'gen' => trim($_POST['gen']),
                'studyday' => trim($_POST['studyday']),
                'courseid' => trim($_POST['courseid']),
                'userid' => trim($this->auth['id']),
                'lecturerid' => trim($_POST['lecturerid']),
                'taid' => trim($_POST['taid'])
            );
            $this->data['confirm'] = "Chúc mừng bạn đã cập nhật thành công";
            $this->lophoc->update_entry($post_data);
        }
        $this->data['class'] = $this->lophoc->get_entry($id);
        $this->data['courses'] = $this->monhoc->get_all();
        $this->data['nhanviens'] = $this->nhanvien->get_all();
        $this->data['class']['nhanvien'] = $this->nhanvien->get_nhanvien($this->data['class']['userid']);

        $this->data['classid'] = $id;
        $this->data['status'] = $status;

        //lay danh sach buoi hoc cua lop nay
        $this->data['lectures'] = $this->lecture->get_lecture_by_class($id);
        //load template
        $this->load->view("backend/layout/home", $this->data);
    }

    public function ajaxdongbatform($classid)
    {
        $isCheck = $this->lophoc->dong_mo_lop($classid);
        $isCheck = ($isCheck == 0) ? "true" : "false";
        echo $isCheck;
    }
    public function ajaxdongbatform_course($courseid)
    {
        $isCheck = $this->monhoc->dong_mo_couse($courseid);
        $isCheck = ($isCheck == 0) ? "true" : "false";
        echo $isCheck;
    }

    public function sendkichhoat($classid)
    {
        $this->load->model("hocvien");
        $students = $this->hocvien->get_all_by_class($classid);
        foreach ($students as $student) {
            $class = $this->db->select('cm_class.id classid, cm_course.linknoiquy linknoiquy,cm_course.linktimeline linktimeline,cm_course.linkphanmemmac linkphanmemmac,cm_course.linkphanmemwindow linkphanmemwindow,cm_course.id courseid, cm_class.gen number, cm_class.startdate startdate,cm_course.duration duration,cm_class.lecturerid lecturerid,cm_class.taid taid,cm_course.name coursename,cm_class.name classname,cm_class.studyday studyday, leadname, leadphone, cm_course.price')->from('regis')->join('class', 'cm_regis.classid = cm_class.id')->join('course', 'cm_course.id = cm_class.courseid')->where('cm_regis.studentid', $student->id)->get()->row_array();
            $this->cm_string->send_email_kichhoat((array)$student, $class);
        }
        $this->db->where('id', $classid)->update("class", array("activated" => 1));
        $this->cm_string->php_redirect('backend/quanlylophoc/hienthilophoc');
    }

    public function update_lecture($courseid = "", $lectureid = -1)
    {
        if ($lectureid == -1 || empty($courseid)) {
            $this->cm_string->php_redirect("backend/Auth/login");
        }

        if ($this->input->post("submit")) {
            $config['file_name'] = time() . $this->cm_string->random();
            $config['upload_path'] = './public/resources/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);

            if (!empty($_FILES['userfile']['name'])) {
                if (!$this->upload->do_upload()) {
                    $this->data['message'] = "<div class='alert alert-danger text-center'>" . $this->upload->display_errors() . "</div>";
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $data = array(
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('description'),
                        'linkgiaotrinh' => $this->input->post('linkgiaotrinh'),
                        'linkyoutube' => $this->input->post('linkyoutube'),
                        'linkanh' => "public/resources/images/" . $data['upload_data']['file_name'],
                        'order' => $this->input->post('order'),
                    );
                    $path = $this->db->select('linkanh')->from('lecture')->where('id', $lectureid)->get()->row_array()['linkanh'];
                    deleteFiles($path);
                    $this->lecture->update_lecture($lectureid, $data);
                    $this->data['message'] = "<div class='alert alert-success text-center'><p>Sửa thành công</p></div>";
                }
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'linkgiaotrinh' => $this->input->post('linkgiaotrinh'),
                    'linkyoutube' => $this->input->post('linkyoutube'),
                    'order' => $this->input->post('order'),
                );
                $this->lecture->update_lecture($lectureid, $data);
                $this->data['message'] = "<div class='alert alert-success text-center'><p>Sửa thành công</p></div>";
            }

        }
        $this->data['template'] = "backend/quanlylophoc/update_lecture";
        // Trang hien tai
        $this->data['current_page'] = "Sửa thông tin buổi học";

        $this->data['seo']['title'] = "Color ME CMS";
        $this->data['seo']['keywords'] = '';
        $this->data['seo']['description'] = 'Sua thong tin buoi hoc';
        $this->data['courseid'] = $courseid;

        $this->data['lecture'] = $this->lecture->get_lecture_by_id($lectureid);

        $this->load->view("backend/layout/home", $this->data);
    }

    public function ajax_update_giaotrinh()
    {
        $this->load->model('quanlylophoc/lecture');
        $lectureid = $this->input->post('lectureid');
        $giaotrinh = $this->input->post('giaotrinh');
        $this->lecture->update_giaotrinh($giaotrinh, $lectureid);
        echo "<div class='alert alert-success text-center'>Giáo trình đã được save thành công!</div>";
    }

    public function ajax_update_giaotrinh_hocvien()
    {
        $this->load->model('quanlylophoc/lecture');
        $lectureid = $this->input->post('lectureid');
        $giaotrinh = $this->input->post('giaotrinhhocvien');
        $this->lecture->update_giaotrinh_hocvien($giaotrinh, $lectureid);
        echo "<div class='alert alert-success text-center'>Giáo trình đã được save thành công!</div>";
    }

    //Create course
    public function create_course()
    {
        if ($this->input->post('submit')) {
            $post_data = $this->input->post();
            unset($post_data['submit']);
            if ($this->monhoc->insert_course($post_data)) {
                $this->lecture->create_empty_lecture($post_data['id'], $post_data['duration']);
                $this->cm_string->php_redirect('backend/quanlylophoc/hienthilophoc');
            }
        }
        $this->data['current_page'] = "Tạo Course";
        $this->data['template'] = 'backend/quanlylophoc/create_course';
        $this->load->view("backend/layout/home", $this->data);
    }

    public function create_class()
    {
        if ($this->input->post('submit')) {
            $post_data = $this->input->post();
            unset($post_data['submit']);
            if ($this->lophoc->insert_entry($post_data)) {
                $this->lecture->create_empty_lecture($post_data['id'], $post_data['duration']);
                $this->cm_string->php_redirect('backend/quanlylophoc/hienthilophoc');
            }
        }
        $this->data['courses'] = $this->monhoc->get_all();
        $this->data['nhanviens'] = $this->nhanvien->get_all();
        $this->data['current_page'] = "Tạo Lớp";
        $this->data['template'] = 'backend/quanlylophoc/create_class';
        $this->load->view("backend/layout/home", $this->data);
    }
}

