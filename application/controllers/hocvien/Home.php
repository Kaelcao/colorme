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
        $this->data['complete_survey_one'] = $this->survey->complete_survey_one($this->auth['id']);
        $this->data['linkbaigiuaki'] = $this->hocvien->get_link_baigiuaki($this->auth['id']);
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

    public function nop_baigiuaki()
    {
        error_reporting(E_ERROR | E_PARSE);
        $this->load->model('survey');
//        dd($targetPath = getcwd() . '/public/resources/baitaphocvien/');
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = time() . $this->cm_string->random() . $_FILES['file']['name'];
            $targetPath = getcwd() . '/public/resources/baitaphocvien/';
            $targetFile = $targetPath . $fileName;
            $path = $this->db->select('baigiuaki')->from('regis')->where('studentid', $this->auth['id'])->get()->row_array()['baigiuaki'];
            deleteFiles($path);
            move_uploaded_file($tempFile, $targetFile);
            $this->survey->nop_baigiuaki('/public/resources/baitaphocvien/' . $fileName, $this->auth['id']);
            //Image Resizing
            $config['source_image'] = $targetFile;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 1000;
            $config['height'] = 1000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            echo  '<img src="'.base_url('/public/resources/baitaphocvien/' . $fileName).'" style="width:100%"/>';

// if you want to save in db,where here
// with out model just for example
// $this->load->database(); // load database
// $this->db->insert('file_table',array('file_name' => $fileName));
        }
    }

//        $message = "Wrong method request";
//        if ($this->input->post('submit')) {
//
//
//            $this->load->model('survey');
//            $config['file_name'] = time() . $this->cm_string->random();
//            $config['upload_path'] = './public/resources/baitaphocvien';
//            $config['allowed_types'] = 'gif|jpg|png';
////            $config['max_size'] = '5120';
//
//            $config['remove_spaces'] = TRUE;
//            $this->load->library('upload', $config);
//
//            if (!empty($_FILES['userfile']['name'])) {
//                if (!$this->upload->do_upload()) {
//                    $message = "<div class='alert alert-danger text-center'>" . $this->upload->display_errors() . "</div>";
//                } else {
//
//                    $data = array('upload_data' => $this->upload->data());
//                    $baigiuaki="public/resources/baitaphocvien/" . $data['upload_data']['file_name'];
//
//                    $path = $this->db->select('baigiuaki')->from('regis')->where('studentid', $this->auth['id'])->get()->row_array()['baigiuaki'];
//                    deleteFiles($path);
//                    //Image Resizing
//                    $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
//                    $config['maintain_ratio'] = TRUE;
//                    $config['width'] = 1000;
//                    $config['height'] = 1000;
//
//                    $this->load->library('image_lib', $config);
//
//                    $this->image_lib->resize();
//
//                    $this->survey->nop_baigiuaki($baigiuaki, $this->auth['id']);
//                    $message = "<div class='alert alert-success text-center'><p>Nộp bài thành công</p></div>";
//                    $message.="<div><img src='$baigiuaki' style='width: 75%;'/></div>";
//                }
//            } else {
//                $message = "<div class='alert alert-danger text-center'>Bạn chưa chọn ảnh để up lên</div>";
//            }
//        }
//        echo $message;

}
