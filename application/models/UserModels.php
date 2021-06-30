<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModels extends CI_Model
{
    function get_one_table_user($table)
    {
        $this->db->select('user.*, role.*');
        $this->db->join('role', 'user.role_id = role.role_id');

        $query = $this->db->get_where($table);
        return $query->result();
    }
}