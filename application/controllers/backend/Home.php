<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CM_Controller
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
        $this->load->model('quanlytaichinh/internal_transfer');
        $this->load->model('hocvien');

        $data['user'] = $this->auth;
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['courses'] = $this->courses;
        $data['seo']['description'] = 'CMS of Color ME';
        $data['template'] = 'backend/dashboard';
        $data['current_page'] = 'Dashboard';
        $today = gmdate('Y-m-d', time() + 7 * 3600);
        $user = $this->auth;

        $data['solangoi'] = $this->db->where(array('caller' => $user['id'], 'called' => 1))->count_all_results('regis');
        $data['songuoidathu'] = $this->db->where(array('userid' => $user['id'], 'paid >=' => 0))->count_all_results('regis');


        $data['tongsotien'] = $this->db->where(array('userid' => $user['id']))->select_sum('paid')->from('regis')->get()->row_array()['paid'];
        $data['nguoichuagoi'] = $this->db->where(array('called' => 0,'paid'=>-1))->count_all_results('regis');
        $data['songuoichuadongtien'] = $this->db->where(array('called' => 1, 'paid' => -1))->count_all_results('regis');
        $data['tienthuhomnay'] = $this->db->where(array('userid' => $user['id'], 'date(paidtime)' => $today))->select_sum('paid')->from('regis')->get()->row_array()['paid'];
        $data['tiendangcam'] = $this->db->where(array('id' => $user['id']))->select('money')->from('cm_user')->get()->row_array()['money'];

        $data['songuoidangky'] = $this->cm_string->songuoidangkymoi();
        $data['days'] = $this->db->query("select date(registime) regisdate, count(*) number from cm_regis group by date(registime)")->result();

        //thong ke thoi gian dang ky
        $temp = $this->db->query("SELECT HOUR( registime ) regishour, COUNT( * ) number FROM cm_regis GROUP BY HOUR( registime )")->result();

        $hours = array_fill(0, 24, 0);

        foreach ($temp as $hour) {
                $hours[$hour->regishour]+=$hour->number;
        }
        $data['hours'] = $hours;

        $data['transfers'] = $this->internal_transfer->get_all("", 0, 10);
        $data['hocviennoptienhomnay'] = $this->hocvien->hocviens_dong_tien(date('Y-m-d'));

        if (empty($data['tienthuhomnay'])) {
            $data['tienthuhomnay'] = 0;
        }

        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }

}
