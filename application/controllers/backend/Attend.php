<?php

class Attend extends CI_Controller
{
    public function login()
    {
        header('Content-Type: application/json');
        if (!empty($_POST)) {
            $username = $this->input->post('username');
            $user = $this->db->select('id,username,password,salt,email,fullname')->where(array('username' => $username))->from('cm_user')->get()->row_array();
            $password = $this->cm_string->encrypt_password($username, $this->input->post('password'), $user['salt']);

            if ($password == $user['password']) {
                $token = bin2hex(mcrypt_create_iv(128, MCRYPT_DEV_URANDOM));
                $created = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
                $expired = gmdate('Y-m-d H:i:s', time() + 7 * 3600 + 7 * 24 * 3600);
                $data = array(
                    'token_key' => md5($token),
                    'expire_date' => $expired,
                    'created_date' => $created,
                    'userid' => $user['id']
                );
                $this->db->where('userid', $user['id'])->delete('cm_token');
                $this->db->insert('cm_token', $data);
                $return_data['token'] = $token;
                $return_data['status'] = "success";
                $return_data['user'] = $user;
            } else {
                $return_data['status'] = "wrong username or password";
            }
        } else {
            $return_data['status'] = "wrong sending method";
        }
        echo json_encode($return_data);
    }

    public function user($token)
    {
        header('Content-Type: application/json');
        $token_data = $this->db->from('cm_token')->where(array('token_key' => md5($token)))->get()->row_array();
        if ($token_data != NULL) {
            $current_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            if (strtotime($current_time) < strtotime($token_data['expire_date'])) {
                $user_data = $this->db->select('id, username, email, fullname')->from('cm_user')->where('id', $token_data['userid'])->get()->row_array();
                $return_data['status'] = "success";
                $return_data['user'] = $user_data;
                echo json_encode($return_data);
            } else {
                $message['message'] = 'Your Token has expired';
                $message['status'] = 'error';
                echo json_encode($message);
            }
        } else {
            $message['message'] = 'Wrong Access Token';
            $message['status'] = 'error';
            echo json_encode($message);
        }
    }

    public function courses($token)
    {
        header('Content-Type: application/json');
        $token_data = $this->db->from('cm_token')->where(array('token_key' => md5($token)))->get()->row_array();
        if ($token_data != NULL) {
            $current_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            if (strtotime($current_time) < strtotime($token_data['expire_date'])) {
                $course_data = $this->db->select('id, name, duration')->from('cm_course')->get()->result();
                $return_data['status'] = "success";
                $return_data['courses'] = $course_data;
                echo json_encode($return_data);
            } else {
                $message['message'] = 'Your Token has expired';
                $message['status'] = 'error';
                echo json_encode($message);
            }
        } else {
            $message['message'] = 'Wrong Access Token';
            $message['status'] = 'error';
            echo json_encode($message);
        }
    }

    public function studentinfo($studentid, $token)
    {
        $this->load->model("hocvien");
        header('Content-Type: application/json');
        $token_data = $this->db->from('cm_token')->where(array('token_key' => md5($token)))->get()->row_array();
        if ($token_data != NULL) {
            $current_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            if (strtotime($current_time) < strtotime($token_data['expire_date'])) {
                $lecture_data = $this->hocvien->get_lecture_of_student($studentid);
                $student_data = $this->hocvien->get_entry_by_realid($studentid);
                if ($student_data != null) {
                    $return_data['status'] = "success";
                    $return_data['personalinfo'] = $student_data;
                    $return_data['lectures'] = $lecture_data;
                    echo json_encode($return_data);
                } else {
                    $return_data['status'] = "error";
                    $return_data['message'] = "Không có học viên này";
                    echo json_encode($return_data);
                }

            } else {
                $message['message'] = 'Your Token has expired';
                $message['status'] = 'error';
                echo json_encode($message);
            }
        } else {
            $message['message'] = 'Wrong Access Token';
            $message['status'] = 'error';
            echo json_encode($message);
        }
    }
//
//    public function lectures($courseid = -1, $token = "")
//    {
//        header('Content-Type: application/json');
//        if ($courseid == -1) {
//            $message['message'] = 'Missing Course Id';
//            $message['status'] = 'error';
//            echo json_encode($message);
//        } else {
//            $token_data = $this->db->from('cm_token')->where(array('token_key' => md5($token)))->get()->row_array();
//            if ($token_data != NULL) {
//                $current_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
//                if (strtotime($current_time) < strtotime($token_data['expire_date'])) {
//                    $lecture_data = $this->db->get_where('cm_lecture', array('courseid' => $courseid))->result();
//                    if ($lecture_data != null) {
//                        $return_data['status'] = "success";
//                        $return_data['lectures'] = $lecture_data;
//                        echo json_encode($return_data);
//                    } else {
//                        $message['message'] = 'Wrong Course ID';
//                        $message['status'] = 'error';
//                        echo json_encode($message);
//                    }
//                } else {
//                    $message['message'] = 'Your Token has expired';
//                    $message['status'] = 'error';
//                    echo json_encode($message);
//                }
//            } else {
//                $message['message'] = 'Wrong Access Token';
//                $message['status'] = 'error';
//                echo json_encode($message);
//            }
//        }
//    }
//    public function temp(){
//        echo $this->cm_string->encrypt_password('hung','Hungkhi550623' ,'oo0BwSFVERhW2s3JIgIJUbXMUVnBmF9sfClYfuhQ4QWmv8R1ZUP8IX8qa0I31g9yKE86R');
//    }

    public function check_attend($joined, $hwdone, $studentid, $lectureid, $token = "")
    {
        header('Content-Type: application/json');
        $this->load->model('nhanvien');
        $this->load->model('hocvien');
        if (empty($studentid) || empty($lectureid)) {
            $message['message'] = 'Missing Course Id or Lecture Id';
            $message['status'] = 'error';
            echo json_encode($message);
        } else {
            $token_data = $this->db->from('cm_token')->where(array('token_key' => md5($token)))->get()->row_array();
            if ($token_data != NULL) {
                $current_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
                if (strtotime($current_time) < strtotime($token_data['expire_date'])) {
                    $id = $this->hocvien->realid_to_id($studentid);
                    $attend_data = array(
                        'studentid' => $id,
                        'lectureid' => $lectureid,
                        'hwdone' => $hwdone,
                        'joined' => $joined,
                        'checked_time' => $current_time,
                        'taid' => $this->nhanvien->get_nhanvienid_from_token($token)
                    );

                    $this->db->where(array('studentid' => $id, 'lectureid' => $lectureid))->update('cm_attend', $attend_data);
                    $afftectedRows = $this->db->affected_rows();


                    if ($afftectedRows > 0) {
                        $return_data['status'] = "success";
                        $return_data['lectures'] = $attend_data;
                        echo json_encode($return_data);
                    } else {
                        $message['message'] = 'Wrong Student ID';
                        $message['status'] = 'error';
                        echo json_encode($message);
                    }
                } else {
                    $message['message'] = 'Your Token has expired';
                    $message['status'] = 'error';
                    echo json_encode($message);
                }
            } else {
                $message['message'] = 'Wrong Access Token';
                $message['status'] = 'error';
                echo json_encode($message);
            }
        }
    }

//lay thong tin hoc vien

}