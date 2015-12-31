<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/31/2015
 * Time: 10:05 PM
 */
class Tuyensinh extends CM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dot_tuyen_sinh');
    }

    public function index()
    {
        if ($this->input->post('submit')) {
            $post_data = $this->input->post();
            unset($post_data['submit']);
            if ($this->dot_tuyen_sinh->insert_dot_tuyen_sinh($post_data)) {
                $this->data['insert_status']="<div class='alert alert-success text-center'>Thêm đợt tuyển sinh thành công</div>";;
            }else{
                $this->data['insert_status']="<div class='alert alert-error text-center'>Thêm đợt tuyển sinh thất bại</div>";
            }
        }
        $this->data['current_page'] = 'Quản lý tuyển sinh';
        $this->data['template'] = 'backend/tuyensinh/tuyen_sinh';

        //lay du lieu tu database
        $this->data['dot_tuyen_sinhs'] = $this->dot_tuyen_sinh->get_all_dottuyensinh();

        $this->load->view("backend/layout/home", $this->data);
    }
}