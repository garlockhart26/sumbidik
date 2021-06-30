<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Model
        $this->load->model('DataModels');
        $this->load->model('TransactionModels');

        // Pembatas Hak Akses
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Entri Transaksi';

        $data['transactions'] = $this->TransactionModels->transaction('transactions'); // Ambil Data History Transaksi dari Model
        $this->load->view('menu/transaction/v_transaction', $data);
    }

    public function detail_transaction($nisn)
    {
        $where = array(
            'nisn' => $nisn
        );

        $check_nisn = $this->TransactionModels->check_nisn('student', $where)->num_rows();

        if ($check_nisn > 0) {
            $check = $this->db->get_where('student', array('nisn' => $nisn))->row();

            $data['title'] = 'Entri Transaksi';

            $data['student'] = $this->TransactionModels->search_student($where, 'student');
            $data['month'] = $this->DataModels->get_one_table('month');
            $data['months'] = $this->TransactionModels->detail_transaction($check->nisn)->result();

            $this->load->view('menu/transaction/v_detail_transaction', $data);
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
 
    public function action()
    {
        $nisn = $this->input->get('nisn');
        $detail_transaction = $this->db->get_where('student', array('nisn' => $nisn))->row();

        $spp_id = $detail_transaction->spp_id;
        $search_spp = $this->db->get_where('spp', array('spp_id' => $spp_id))->row();

        $user_id = $this->session->userdata('user_id');

        $payment_date = date('Y-m-d');
        $month_paid = 1;
        $year_paid = $search_spp->year;
        $amount_paid = $search_spp->nominal * $month_paid;

        $data = array(
            'user_id' => $user_id,
            'nisn' => $nisn,
            'payment_date' => $payment_date,
            'month_paid' => $month_paid,
            'year_paid' => $year_paid,
            'spp_id' => $spp_id,
            'amount_paid' => $amount_paid
        );

        $this->DataModels->create($data, 'transactions');
        redirect('menu/transaction/detail_transaction/' . $nisn . '');
    }
}

/* End of file transaction.php */
/* Location: ./application/controllers/menu/transaction.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/