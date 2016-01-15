<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/5/2015
 * Time: 12:16 PM
 */
class Nhanvien extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     *
     *
     * Lay thong tin cua nhan vien
     * @param $id
     * @return array thongtin nhan vien
     */
    function get_nhanvien($id)
    {
        $query = $this->db->where('id', $id)->get('user');
        return $query->row_array();
    }

    function get_nhanvienid_from_token($token)
    {
        $encrypted_token = $this->cm_string->ecrypt_token($token);
        return $this->db->query("select userid from cm_token where token_key='$encrypted_token'")->row_array()['userid'];
    }

    function get_all()
    {
        $query = $this->db->get('user');
        return $query->result();
    }
    function get_user_by_role($role) {
      $query_str = " SELECT fullname,facebook,avatar FROM cm_user
      join cm_role_assign on cm_role_assign.user_id = cm_user.id
      join cm_role on cm_role.id = cm_role_assign.role_id
      where cm_role.title='".$role."'";
      return $this->db->query($query_str)->result_array();
    }
}
