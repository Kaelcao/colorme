<?php

class Course extends CM_Controller
{
    public function add_course(){
        $data['seo']['title'] = "Color ME CMS";
        $data['seo']['keywords'] = '';
        $data['seo']['description'] = 'Course Management';
        $data['current_page'] = 'Course';
        $data['template'] = 'backend/add_course';
        $data['table_name'] = 'Courses';
        $data['table_description'] = "Add New Course to Database";
        $data['user'] = $this->auth;

        if (!empty($_POST)){
            $created = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $post_data = array(
                'id' => $this->input->post('id'),
                'userid' => $this->auth['id'],
                'created' => $created,
                'name' => $this->input->post('name'),
                'duration' => $this->input->post('duration'),
                'level' => $this->input->post('level'),
                'description' => $this->input->post('description'),
                'detail' => $this->input->post('detail')
            );
            $data['post_data'] = $post_data;
            $this->form_validation->set_rules('id', 'Course ID', 'trim|required');
            $this->form_validation->set_rules('name', 'Course Name', 'trim|required');
            $this->form_validation->set_rules('duration', 'Course Duration', 'trim|required');
            $this->form_validation->set_rules('level', 'Course Level', 'trim|required');
            $this->form_validation->set_rules('description', 'Course Description', 'trim|required');
            $this->form_validation->set_rules('detail', 'Course Detail', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $this->db->insert('cm_course', $post_data);
                $data['confirm'] = "Course Added Successfully";
            }
        }


        $this->load->view('backend/layout/home', isset($data) ? $data : NULL);
    }
}
