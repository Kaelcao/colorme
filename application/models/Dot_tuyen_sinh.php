<?php


class Dot_tuyen_sinh extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_dottuyensinh()
    {
        return $this->db->get('dot_tuyen_sinh')->result_array();
    }

    function insert_dot_tuyen_sinh($data)
    {
        $this->db->insert('dot_tuyen_sinh', $data);
        return $this->db->insert_id();
    }

    function insert_luot_truc($data)
    {
        return $this->db->insert('luot_truc', $data);
    }

    function insert_ca_truc($data)
    {
        return $this->db->insert('ca_truc', $data);
    }


    function get_all_luot_truc()
    {
        return $this->db->from('luot_truc')->join('ca_truc', 'cm_ca_truc.catrucid=cm_luot_truc.catrucid')->join('user','cm_user.id=cm_luot_truc.nguoitrucid','left')->get()->result_array();
    }

    function get_all_ngay_truc($dot_tuyen_sinh_id)
    {
        $this->db->distinct();
        return $this->db->select('ngaytruc')->from('luot_truc')->where('dot_tuyen_sinh_id', $dot_tuyen_sinh_id)->get()->result_array();
    }

    function del_ca_truc($id)
    {
        $this->db->where('catrucid', $id);
        return $this->db->delete('ca_truc');
    }

}