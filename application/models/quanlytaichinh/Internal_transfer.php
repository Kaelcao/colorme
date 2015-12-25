<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 12/6/2015
 * Time: 6:24 PM
 */
class Internal_transfer extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all($search = "", $offset = 0, $row = 10)
    {
        $query_str = "SELECT u1.avatar fromavatar,u2.avatar toavatar, u1.fullname fromname, u2.fullname toname, amount, transferedtime
FROM cm_transfer
JOIN cm_user u1 ON u1.id = cm_transfer.fromid
JOIN cm_user u2 ON u2.id = cm_transfer.toid
WHERE u1.fullname LIKE  '%$search%'
OR u2.fullname LIKE  '%$search%'
OR amount LIKE  '%$search%'
order by transferedtime desc
LIMIT $offset , $row
";
        $query = $this->db->query($query_str)->result();
        return $query;
    }
}

