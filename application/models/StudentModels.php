<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModels extends CI_Model
{
    function get_one_table_student($table)
    {
        $this->db->select('student.*, class.*');
        $this->db->join('class', 'student.class_id = class.class_id');

        $query = $this->db->get_where($table);
        return $query->result();
    }

    function get_student_by_nis($nis)
    {
        $SQL = "SELECT * FROM student as a JOIN class as b on a.class_id = b.class_id JOIN spp as c on a.spp_id = c.spp_id where nis = '$nis';";
        return $this->db->query($SQL)->result();
    }
}