<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 11/21/2015
 * Time: 4:43 PM
 */
class CM_Controller extends CI_Controller
{
    protected $auth;
    protected $courses;
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cm_auth->check();
        if ($this->auth == NULL) {
            $this->cm_string->php_redirect("backend/auth/login");
        }
        $this->data['user'] = $this->auth;
        $this->courses=$this->db->from("course")->get()->result();
        $this->data['courses']=$this->courses;

        $this->data['seo']['title'] = "Color ME CMS";
        $this->data['seo']['keywords'] = '';
        $this->data['seo']['description'] = 'Students show for tele sale';
    }
}
class CM_HocvienController extends  CI_Controller
{
    protected $auth;
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cm_auth->check_hocvien();
        if ($this->auth == NULL) {
            $this->cm_string->php_redirect("hocvien/auth/login");
        }
        $this->data['user']=$this->auth;
        $this->load->model('quanlylophoc/lecture');
    }
}