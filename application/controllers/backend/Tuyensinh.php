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

    // status = 0, chua co ng truc
    // status = 1, da co ng truc
    public function index()
    {
        if ($this->input->post('submit')) {
            $post_data = $this->input->post();
            unset($post_data['submit']);

            $insertedid = $this->dot_tuyen_sinh->insert_dot_tuyen_sinh($post_data);
            if ($insertedid > -1) {
                $startdate = $post_data['startdate'];
                $enddate = $post_data['enddate'];
                $begin = new DateTime($startdate);
                $end = new DateTime($enddate);
                $end = $end->modify('+1 day');

                $interval = new DateInterval('P1D');
                $daterange = new DatePeriod($begin, $interval, $end);

                $ca_trucs = $this->dot_tuyen_sinh->get_all_ca_truc();
                foreach ($daterange as $date) {
                    foreach ($ca_trucs as $ca_truc) {
                        $data = array(
                            'catrucid' => $ca_truc['catrucid'],
                            'ngaytruc' => $date->format("Y-m-d H:i:s"),
                            'nguoitrucid' => -1,
                            'gen' => $post_data['gen'],
                            'status' => 0,
                            'dot_tuyen_sinh_id' => $insertedid
                        );
                        $this->dot_tuyen_sinh->insert_luot_truc($data);
                    }
                }
                $this->data['insert_status'] = "<div class='alert alert-success text-center'>Thêm đợt tuyển sinh thành công</div>";

            } else {
                $this->data['insert_status'] = "<div class='alert alert-error text-center'>Thêm đợt tuyển sinh thất bại</div>";
            }
        }
        $this->data['current_page'] = 'Quản lý tuyển sinh';
        $this->data['template'] = 'backend/tuyensinh/tuyen_sinh';

        //lay du lieu tu database
        $this->data['dot_tuyen_sinhs'] = $this->dot_tuyen_sinh->get_all_dottuyensinh();

        $this->load->view("backend/layout/home", $this->data);
    }

    public function ca_truc()
    {
        if ($delid = $this->input->get('id')) {
            if ($this->dot_tuyen_sinh->del_ca_truc($delid)) {
                $this->data['insert_status'] = "<div class='alert alert-success text-center'>Xóa ca trực thành công</div>";

            } else {
                $this->data['insert_status'] = "<div class='alert alert-danger text-center'>Không tồn tại ca trực này</div>";
            }
        }
        if ($this->input->post('submit')) {
            $post_data = $this->input->post();
            unset($post_data['submit']);
            if ($this->dot_tuyen_sinh->insert_ca_truc($post_data)) {
                $this->data['insert_status'] = "<div class='alert alert-success text-center'>Thêm ca trực thành công</div>";

            } else {
                $this->data['insert_status'] = "<div class='alert alert-danger text-center'>Thêm ca trực thất bại</div>";
            }
        }
        $this->data['current_page'] = 'Quản lý ca trực';
        $this->data['template'] = 'backend/tuyensinh/ca_truc';

        //lay du lieu tu database
        $this->data['ca_trucs'] = $this->dot_tuyen_sinh->get_all_ca_truc();

        $this->load->view("backend/layout/home", $this->data);
    }

    public function phan_cong_truc()
    {
        if ($luot_truc_id = $this->input->get('luot_truc_id')) {
            if ($this->dot_tuyen_sinh->can_regis($luot_truc_id)) {
                $this->dot_tuyen_sinh->update_luot_truc($luot_truc_id, $this->auth['id']);
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Đăng kí thành công</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Đã có người đăng kí</div>');
            }
        }
        $this->data['current_page'] = 'Phân công trực';
        $this->data['template'] = 'backend/tuyensinh/phan_cong_truc';

        //lay du lieu tu database
        $this->data['dot_tuyen_sinhs'] = $this->dot_tuyen_sinh->get_all_dottuyensinh();
        if ($dot_tuyen_sinh_id = $this->input->get('dot_tuyen_sinh')) {
            $this->data['current_url'] = 'backend/tuyensinh/phan_cong_truc?dot_tuyen_sinh=' . $dot_tuyen_sinh_id;

            $this->data['luot_trucs'] = $this->dot_tuyen_sinh->get_all_luot_truc($dot_tuyen_sinh_id);
            $this->data['dot_tuyen_sinh_id'] = $dot_tuyen_sinh_id;
            $this->data['ngay_trucs'] = $this->dot_tuyen_sinh->get_all_ngay_truc($dot_tuyen_sinh_id);
        }
        $this->load->view("backend/layout/home", $this->data);
    }
}