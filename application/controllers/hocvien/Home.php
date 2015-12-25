<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CM_HocvienController
{
//    private $auth;

//    public function __construct()
//    {
//        parent::__construct();
//        $this->auth = $this->cm_auth->check();
//        if ($this->auth == NULL) {
//            $this->cm_string->php_redirect("backend/auth/login");
//        }
//        $data['user'] = $this->auth;
//    }

    public function index()
    {
        $this->load->model('survey');
        $this->load->model('hocvien');
        $this->data['complete_survey_one']=$this->survey->complete_survey_one($this->auth['id']);
        $this->data['linkbaigiuaki']=$this->hocvien->get_link_baigiuaki($this->auth['id']);
        $this->data['template'] = "hocvien/dashboard";
        $this->load->view('hocvien/layout/home', isset($this->data) ? $this->data : NULL);
    }

    public function danhsachbuoihoc()
    {
        $this->data['template'] = "hocvien/danhsachbuoihoc";
        $this->data['lectures'] = $this->lecture->get_lecture($this->auth['id']);

        $this->load->view('hocvien/layout/home', isset($this->data) ? $this->data : NULL);
    }

    public function chuyenbuoi($lectureid)
    {
        $this->load->model('lophoc');
        $this->load->model('quanlylophoc/monhoc');
        $this->load->model('quanlylophoc/attend');

        $this->data['template'] = 'hocvien/chuyenbuoi';
        $currentClassId = $this->attend->get_classid($this->auth['id'], $lectureid);
        $this->data['lectures'] = $this->lophoc->get_lop_theo_buoi($this->monhoc->get_courseid_by_studentid($this->auth['id']), $lectureid, $currentClassId);
        $this->load->view('hocvien/layout/home', isset($this->data) ? $this->data : NULL);
    }

    /*
     * doi buoi
     * 1 la chuyen toi
     * -1 la chuyen di
     */
    public function doibuoi($classid, $lectureid, $studentid)
    {
        $this->load->model('quanlylophoc/lecture');
        $this->lecture->chuyenbuoi($classid, $lectureid, $studentid, $this->auth['classid']);
        $this->cm_string->js_redirect('Đổi lớp thành công', 'hocvien/home/danhsachbuoihoc/');
    }

    public function receive_survey()
    {
        $this->load->model('survey');
        $this->survey->insert($this->input->post());
        echo "<div><h2 class='text-center'><i class='fa fa-check fa-4x'></i>Bạn đã hoàn thành survey, bấm <strong>next</strong> để nộp bài giữa kì</h2> </div>";
    }
    public function nop_baigiuaki(){
        $this->load->model('survey');
        $this->survey->nop_baigiuaki($this->input->post('baigiuaki'),$this->auth['id']);
        echo "<div class='alert alert-success text-center'><i class='fa fa-check'></i> Bạn đã nộp bài thành công</div>";
    }
    
}
