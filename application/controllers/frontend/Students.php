<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller
{

    public function choose_course(){
        $this->load->model('quanlylophoc/monhoc');
        $this->data['courses'] = $this->monhoc->get_all();
        $this->load->view("frontend/regis/choose_course", isset($this->data) ? $this->data : NULL);
    }

    public function regis($courseid = "C1")
    {
        $this->load->model('quanlylophoc/lophoc');
        $lastest_gen = $this->lophoc->get_newest_gen();

        if ($this->input->post('submit')) {
            $post_data = $this->input->post();
            $student_data['fullname'] = $post_data['fullname'];
            $student_data['dob'] = $post_data['dob'];
            $student_data['email'] = $post_data['email'];
            $student_data['workplace'] = $post_data['workplace'];
            $student_data['address'] = $post_data['address'];
            $student_data['position'] = isset($post_data['position']) ? $post_data['position'] : "";
            $student_data['phone'] = $post_data['phone'];
            $student_data['gender'] = isset($post_data['gender']) ? $post_data['gender'] : "";
            $student_data['howknow'] = isset($post_data['howknow']) ? $post_data['howknow'] : "";
            $student_data['facebook'] = $post_data['facebook'];
            $post_data['position'] = $student_data['position'];
            $post_data['gender'] = $student_data['gender'];
            $post_data['howknow'] = $student_data['howknow'];


            $this->form_validation->set_rules('fullname', 'Họ và Tên', 'trim|required');
            $this->form_validation->set_rules('dob', 'Ngày Sinh', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('workplace', 'Nơi Làm Việc/Học', 'trim|required');
            $this->form_validation->set_rules('address', 'Địa chỉ hiện tại', 'trim|required');
            $this->form_validation->set_rules('position', 'Bạn đang là?', 'trim|required');
            $this->form_validation->set_rules('classregis', 'Lớp học còn trống?', 'trim|required');
            $this->form_validation->set_rules('phone', 'Số Điện Thoại', 'trim|required');
            $this->form_validation->set_rules('gender', 'Giới tính', 'trim|required');
            $this->form_validation->set_rules('facebook', 'Link Facebook của bạn', 'trim|required');
            $this->form_validation->set_rules('howknow', 'Bạn biết đến lớp học qua kênh nào?', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $classregis = $this->db->select('cm_course.name as name,cm_class.studyday as studyday')->where('cm_class.id', $post_data['classregis'])->from('class')->join('course', 'course.id = class.courseid')->get()->row_array();
                $this->cm_string->send_email($student_data, $classregis, $post_data['leadname']);

                $student_data['created'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
                $this->db->insert('student', $student_data);
                $insert_id = $this->db->insert_id();


                $regis_data = array(
                    "studentid" => $insert_id,
                    "classid" => $post_data['classregis'],
                    "registime" => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
                    "paid" => -1,
                    "note" => "",
                    "leadname" => isset($post_data["leadname"]) ? $post_data['leadname'] : "",
                    'leadphone' => isset($post_data["leadname"]) ? $post_data['leadname'] : "",
                    'userid' => -1
                );
                $this->db->insert('regis', $regis_data);

                $post_data['confirm'] = "Xin Chúc Mừng! Bạn Đã Đăng Kí Công, Chào Mừng Bạn <b>" . $student_data['fullname'] . "</b> đến với Color ME";
            }
        }
        $temps = $this->db->select('classid, COUNT(classid) as total')->group_by('classid')->get('regis')->result();

        foreach ($temps as $temp) {
            $total[$temp->classid] = $temp->total;
        }

        $post_data['total'] = isset($total) ? $total : "";
        $post_data['classes'] = $this->db->from('class')->where(array('gen'=> $this->lophoc->get_newest_gen(),'courseid'=>$courseid ))->get()->result();
        $post_data['course'] = $this->db->where('id', $courseid)->get('course')->row_array();
        $this->load->view("frontend/regis/regis_course", isset($post_data) ? $post_data : NULL);
    }


}