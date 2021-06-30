<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModels extends CI_Model
{

    function login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function input($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}