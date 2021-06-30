<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportModels extends CI_Model
{
    public function view_by_date($date)
    {
        $SQL = "SELECT * FROM transactions AS a JOIN student AS b ON a.nisn = b.nisn JOIN class AS c ON b.class_id = c.class_id JOIN spp AS d ON a.spp_id = d.spp_id WHERE DATE(payment_date)='$date' ";
        return $this->db->query($SQL)->result();
    }

    public function view_by_month($month, $year)
    {
        $SQL = "SELECT * FROM transactions AS a JOIN student AS b ON a.nisn = b.nisn JOIN class AS c ON b.class_id = c.class_id JOIN spp AS d ON a.spp_id = d.spp_id WHERE MONTH(payment_date)='$month' AND YEAR(payment_date)='$year'";
        return $this->db->query($SQL)->result();
    }

    public function view_by_year($year)
    {
        $SQL = "SELECT * FROM transactions AS a JOIN student AS b ON a.nisn = b.nisn JOIN class AS c ON b.class_id = c.class_id JOIN spp AS d ON a.spp_id = d.spp_id WHERE YEAR(payment_date)='$year'";
        return $this->db->query($SQL)->result();
    }

    public function view_all()
    {
        $SQL = "SELECT * FROM transactions AS a JOIN student AS b ON a.nisn = b.nisn JOIN class AS c ON b.class_id = c.class_id JOIN spp AS d ON a.spp_id = d.spp_id";
        return $this->db->query($SQL)->result();
    }

    public function option_year()
    {
        $this->db->select('YEAR(payment_date) AS year');
        $this->db->from('transactions');
        $this->db->order_by('YEAR(payment_date)');
        $this->db->group_by('YEAR(payment_date)');

        return $this->db->get()->result();
    }
}