<?php

class Home extends CI_Controller
{
    public function index()
    {

        $data['page'] = "index";
        $this->load->view('frontend/home/index', $data);

    }

//    public function courses()
//    {
//        $data['page'] = "courses";
//        $this->load->view('frontend/layout/home',$data);
//    }
}