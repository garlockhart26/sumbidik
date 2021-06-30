<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataModels extends CI_Model
{
    function get_one_table($table)
    {
        $query = $this->db->get_where($table);
        return $query->result();
    }

    function get_where_table($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
    
    function create($data, $table)
    {
        $this->db->insert($table, $data);
    }
    
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}