<?php
if (!define('BASEPATH')) exit("No direct script access allowed");

class Staffs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StaffModel');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['staffs'] = $this->StaffModel->get_staffs();
    }

    public function view(){
        $data['staff_list'] = $this->StaffModel->get_staffs();
    }

}