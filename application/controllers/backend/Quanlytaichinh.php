<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/7/2015
 * Time: 3:48 PM
 */
class Quanlytaichinh extends CM_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('quanlytaichinh/internal_transfer');
        $this->load->model('hocvien');
        $this->load->model('quanlylophoc/lophoc');

    }
    public function thuchi() {
        $this->data['template'] = 'backend/quanlytaichinh/thuchi';
        $this->data['current_page']="Giao dịch";
        $this->data['seo']['title']="Giao dịch";


        $this->load->view('backend/layout/home', isset($this->data) ? $this->data : NULL);
    }

    public function danhsachchuyentien(){

        $this->data['template'] = 'backend/quanlytaichinh/danhsachchuyentien';

        $this->data['current_page']="Danh sách chuyển tiền";
        $this->data['seo']['title']="Danh sách chuyển tiền";

        $this->data['transfers'] = $this->internal_transfer->get_all("", 0, 500);
        $this->load->view('backend/layout/home', isset($this->data) ? $this->data : NULL);
    }

    public function danhsachdanoptien(){

        $this->data['template'] = 'backend/quanlytaichinh/danhsachdanoptien';
        $this->data['user']=$this->auth;
        $this->data['current_page']="Danh sách học sinh nộp tiền khóa hiện tại";
        $this->data['seo']['title']="Danh sách học sinh nộp tiền khóa hiện tại";

        $this->data['hocviennoptien'] = $this->hocvien->hocvien_dongtien_theogen($this->lophoc->get_newest_gen());
        $this->load->view('backend/layout/home', isset($this->data) ? $this->data : NULL);
    }
}