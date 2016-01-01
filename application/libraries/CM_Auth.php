<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CM_Auth
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /*
     *  transfer status
     * 0 Chờ xác nhận
     * 1 thành công
     *
     */

    public function check()
    {
        $_user_logged = get_cookie(md5(base_url()) . 'user_logged');
        if (isset($_user_logged) && !empty($_user_logged)) {
            $cookie = $this->CI->cm_string->decrypt_cookie($_user_logged);
            $cookie = json_decode($cookie, true);
            $user = $this->CI->db->select('mamau,id,username,password,salt,email,fullname,permission,money,avatar')->where(array('username' => $cookie['username']))->from('user')->get()->row_array();
            if (isset($user) && count($user)) {
                if ($cookie['username'] == $user['username'] && $cookie['password'] == $user['password'] && $cookie['salt'] == $user['salt']) {
                    set_cookie(md5(base_url()) . 'user_logged', $this->CI->cm_string->encrypt_cookie(json_encode($user)), time() + 7 * 24 * 3600);
                }
            }
            $users=$this->CI->db->select('mamau,fullname,id,email')->get('user')->result();
            $istransfering=$this->CI->db->where(array('fromid'=>$user['id'],'status'=>0))->from('transfer')->count_all_results();
            $incommingtransfers = $this->CI->db->select('cm_transfer.fromid fromid,transferedtime,fullname,amount')->where(array('toid'=>$user['id'],'status'=>0))->from('transfer')->join('user','cm_user.id=cm_transfer.fromid')->get()->result();

            return array(
                'id' => $user['id'],
                'fullname' => $user['fullname'],
                'username' => $user['username'],
                'email' => $user['email'],
                'fullname' => $user['fullname'],
                'permission'=>$user['permission'],
                'money'=>$user['money'],
                'mamau'=>$user['mamau'],
                'users'=>$users,
                'avatar'=>$user['avatar'],
                'istransfering'=>$istransfering,
                'incommingtransfers'=>$incommingtransfers
            );
        }
        return NULL;
    }

    public function check_hocvien()
    {
        $_user_logged = get_cookie(md5(base_url()) . 'hocvien_logged');
        if (isset($_user_logged) && !empty($_user_logged)) {
            $cookie = $this->CI->cm_string->decrypt_cookie($_user_logged);
            $cookie = json_decode($cookie, true);
            $user = $this->CI->db->select('id,realid,fullname,password,salt,email,cm_regis.classid')->where(array('realid' => $cookie['realid']))->from('student')->join('regis','cm_regis.studentid=cm_student.id')->get()->row_array();
            if (isset($user) && count($user)) {
                if ($cookie['realid'] == $user['realid'] && $cookie['password'] == $user['password'] && $cookie['salt'] == $user['salt']) {
                    set_cookie(md5(base_url()) . 'hocvien_logged', $this->CI->cm_string->encrypt_cookie(json_encode($user)), time() + 7 * 24 * 3600);
                }
            }

            return array(
                'id' => $user['id'],
                'fullname' => $user['fullname'],
                'realid' => $user['realid'],
                'email' => $user['email'],
                'fullname' => $user['fullname'],
                'classid' => $user['classid'],
            );
        }
        return NULL;
    }
}