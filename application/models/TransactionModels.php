<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionModels extends CI_Model
{
    function check_nisn($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function transaction()
    {
        $SQL = "SELECT *, SUM( month_paid ) AS total_month FROM transactions AS a RIGHT JOIN student AS b ON a.nisn = b.nisn INNER JOIN class AS c ON b.class_id = c.class_id GROUP BY b.nisn ORDER BY b.nis ASC";
        return $this->db->query($SQL)->result();
    }

    function detail_transaction($nisn)
    {
        $SQL = "SELECT *, SUM( month_paid ) AS total_month FROM transactions WHERE nisn = '" . $nisn . "'";
        return $this->db->query($SQL);
    }

    function search_student($where, $table)
    {
        $this->db->select('student.*, class.*, spp.*');
        $this->db->join('class', 'student.class_id = class.class_id');
        $this->db->join('spp', 'student.spp_id = spp.spp_id');

        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
}