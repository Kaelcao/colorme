<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cm_auth->check();
    }

    public function logout()
    {
        delete_cookie(md5(base_url()) . 'user_logged');
        $this->cm_string->php_redirect("backend");
    }

    public function login()
    {
        if ($this->auth != NULL) {
            $this->cm_string->php_redirect("backend");
        }
        if ($this->db->count_all_results('cm_user') == 0) {
            $this->cm_string->php_redirect("backend/auth/create_manager");
        }
        $data['seo']['title'] = 'Color ME Admin';
        $data['seo']['keywords'] = '';
        $data['seo']['description'] = 'Login System of Color ME';
        if ($this->input->post('login')) {
            $post_data = $this->input->post();
            $data['post_data']['username'] = $post_data['username'];
            $data['post_data']['password'] = $post_data['password'];
            $this->form_validation->set_rules('username', 'Username', 'trim|required|regex_match[/^([a-z0-9_])+$/i]|callback__username_check');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|callback__password_check[' . $post_data['username'] . ']');
            if ($this->form_validation->run() == TRUE) {
                $user = $this->db->select('username,password,salt')->where(array('username' => $post_data['username']))->from('user')->get()->row_array();
                set_cookie(md5(base_url()) . 'user_logged', $this->cm_string->encrypt_cookie(json_encode($user)), time() + 7 * 24 * 3600);
                $data = array(
                    'logined' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
                    'ip_logging' => $_SERVER['SERVER_ADDR']
                );
                $this->db->where(array('username' => $post_data['username']))->update('user', $data);
//                $this->cm_string->js_redirect('Login Success', base_url('backend/Auth/login'));
                $this->cm_string->php_redirect("backend/Auth/login");
            }

        }
        $data['template'] = 'backend/auth/login';
        $this->load->view('backend/layout/login', isset($data) ? $data : NULL);
    }

    public function _password_check($password, $username)
    {
        if ($this->_username_check($username) == true) {
            $user = $this->db->select('username,password,salt')->where(array('username' => $username))->from('user')->get()->row_array();
            $password = $this->cm_string->encrypt_password($username, $password, $user['salt']);
            if ($user['password'] != $password) {
                $this->form_validation->set_message('_password_check', 'The %s is incorrect');
                return false;
            }
            return true;
        }
    }

    public function _username_check($username)
    {
        $count = $this->db->where(array('username' => $username))->from('user')->count_all_results();
        if ($count == 0) {
            $this->form_validation->set_message('_username_check', 'The %s does not exist');
            return FALSE;
        } else return TRUE;
    }

    public function forgot()
    {
        echo 'forgot';
    }

    public function create_manager()
    {
        $count = $this->db->from('user')->count_all_results();
        if ($count >= 1) {
            $this->cm_string->php_redirect();
        }
        $data['seo']['title'] = "Create Manager Account";
        $data['template'] = 'backend/auth/create_manager';
        if ($this->input->post('create')) {
            $post_data = $this->input->post();
            $data['post_data']['fullname'] = $post_data['fullname'];
            $data['post_data']['username'] = $post_data['username'];
            $data['post_data']['password'] = $post_data['password'];
            $data['post_data']['email'] = $post_data['email'];
            $data['post_data']['confirmpassword'] = $post_data['confirmpassword'];
            $this->form_validation->set_rules('username', 'Username', 'trim|required|regex_match[/^([a-z0-9_])+$/i]');
            $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[8]|matches[password]');
            if ($this->form_validation->run() == TRUE) {
                $post_data = $this->cm_string->allow_post($post_data, array('username', 'password', 'email', 'fullname'));
                $post_data['salt'] = $this->cm_string->random(69, TRUE);;
                $post_data['password'] = $this->cm_string->encrypt_password($post_data['username'], $post_data['password'], $post_data['salt']);;
                $post_data['created'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
                $this->db->insert('user', $post_data);
                $this->cm_string->js_redirect('Create Manager Account Success', base_url('backend/Auth/login'));
            }

        }
        $this->load->view('backend/layout/login',$data);
    }

}
