<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Thongke extends CM_Controller {
    public function dangky(){
        $this->data['seo']['title'] = "Color ME CMS";
        $this->data['seo']['keywords'] = '';
        $this->data['courses'] = $this->courses;
        $this->data['seo']['description'] = 'Student Management';
        $this->data['current_page'] = 'Thống kê';
        $this->data['template'] = 'backend/thongke/chart';
        $this->data['days'] =$this->db->query("select date(registime) regisdate, count(*) number from cm_regis group by date(registime)")->result();
        $this->data['hours'] =$this->db->query("select regisdate,max(regishour) maxhour from (select date(registime) regisdate, hour(registime) regishour, count(*) number from cm_regis group by hour(registime)) as t group by regisdate")->result();
        $this->load->view('backend/layout/home', isset($this->data) ? $this->data : NULL);

    }
}