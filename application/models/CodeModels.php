<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CodeModels extends CI_Model
{
    function create_code_user()
    {
        $this->db->select('RIGHT(user.user_id,2) as kode', FALSE); // membaca 2 karakter dari kanan
        $this->db->order_by('user_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user'); // cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) { // jika kode ternyata sudah ada. 

            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else { // jika kode belum ada 
            $kode = 1;
        }
        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 2 menunjukkan jumlah digit angka 0
        $kodejadi = "10081964" . $kodemax; // hasilnya 1008196401-dst.
        return $kodejadi;
    }

    function create_code_class()
    {
        $this->db->select('RIGHT(class.class_id,2) as kode', FALSE); // membaca 2 karakter dari kanan
        $this->db->order_by('class_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('class'); // cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) { // jika kode ternyata sudah ada. 

            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {      //jika kode belum ada 
            $kode = 1;
        }
        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 2 menunjukkan jumlah digit angka 0
        $kodejadi = "20211510" . $kodemax; // hasilnya 2021151001-dst.
        return $kodejadi;
    }


    function create_code_student()
    {
        $this->db->select('RIGHT(student.student_id,2) as kode', FALSE); // membaca 2 karakter dari kanan
        $this->db->order_by('student_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('student'); // cek dulu apakah sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) { // jika kode ternyata sudah ada. 

            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else { // jika kode belum ada 
            $kode = 1;
        }
        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 2 menunjukkan jumlah digit angka 0
        $kodejadi = "01032021" . $kodemax; // hasilnya 0103202101-dst.
        return $kodejadi;
    }
}