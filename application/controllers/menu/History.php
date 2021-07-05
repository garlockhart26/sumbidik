<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'History Transaksi';

        $data['transactions'] = $this->TransactionModels->transaction('transactions'); // Call Transaction History Data from Model
        $this->load->view('menu/history/v_history', $data);
    }
}

/* End of file history.php */
/* Location: ./application/controllers/menu/history.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/