<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cm_auth->check_hocvien();
    }

    public function logout()
    {
        delete_cookie(md5(base_url()) . 'hocvien_logged');
        $this->cm_string->php_redirect("hocvien");
    }

    public function login()
    {
        if ($this->auth != NULL) {
            $this->cm_string->php_redirect("hocvien");
        }

        if ($this->input->post('login')) {
            $post_data = $this->input->post();
            $data['post_data']['username'] = $post_data['username'];
            $data['post_data']['password'] = $post_data['password'];
            $this->form_validation->set_rules('username', 'Username', 'trim|required|regex_match[/^([a-z0-9_])+$/i]|callback__realid_check');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|callback__password_check[' . $post_data['username'] . ']');
            if ($this->form_validation->run() == TRUE) {
                $user = $this->db->select('realid,password,salt')->where(array('realid' => $post_data['username']))->from('student')->get()->row_array();
                set_cookie(md5(base_url()) . 'hocvien_logged', $this->cm_string->encrypt_cookie(json_encode($user)), time() + 7 * 24 * 3600);
                $data = array(
                    'logined' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
                    'ip_logging' => $_SERVER['SERVER_ADDR']
                );
                $this->db->where(array('realid' => $post_data['username']))->update('student', $data);
//                $this->cm_string->js_redirect('Login Success', base_url('backend/Auth/login'));
                $this->cm_string->php_redirect("hocvien/auth/login");
            }

        }

        $this->load->view('hocvien/auth/login', isset($data) ? $data : NULL);
    }

    public function _password_check($password, $realid)
    {
        if ($this->_realid_check($realid) == true) {
            $user = $this->db->select('realid,password,salt')->where(array('realid' => $realid))->from('student')->get()->row_array();
            $password = $this->cm_string->encrypt_password($realid, $password, $user['salt']);
            if ($user['password'] != $password) {
                $this->form_validation->set_message('_password_check', 'The %s is incorrect');
                return false;
            }
            return true;
        }
    }

    public function _realid_check($realid)
    {
        $count = $this->db->where(array('realid' => $realid))->from('student')->count_all_results();
        if ($count == 0) {
            $this->form_validation->set_message('_realid_check', 'The %s does not exist');
            return FALSE;
        } else return TRUE;
    }

    public function forgot()
    {
        echo 'Chức năng này hiện chưa làm';
    }

    public function generate_hocvien_account()
    {

    }

}
