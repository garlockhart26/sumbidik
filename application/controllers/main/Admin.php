<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Call Model
        $this->load->model('DataModels');

        // Access Rights Limiter
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->load->view('main/admin/v_dashboard', $data);
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/main/admin.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/