<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Model
        $this->load->model('DataModels');

        // Pembatas Hak Akses
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Data SPP';
        $data['spp'] = $this->DataModels->get_one_table('spp'); // Ambil Data SPP dari Model

        $this->load->view('menu/spp/v_spp', $data);
    }

    public function create()
    {
        $year = $this->input->post('year');
        $nominal = $this->input->post('nominal');

        $data = array(
            'year' => $year,
            'nominal' => $nominal
        );

        $this->DataModels->create($data, 'spp');
        $this->session->set_flashdata('create', 'Data SPP Berhasil Ditambahkan!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update()
    {
        $spp_id = $this->input->post('spp_id');
        $year = $this->input->post('year');
        $nominal = $this->input->post('nominal');

        $where = array('spp_id' => $spp_id);

        $data = array(
            'year' => $year,
            'nominal' => $nominal
        );

        $this->DataModels->update($where, $data, 'spp');
        $this->session->set_flashdata('update', 'Data SPP Berhasil Diperbarui!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($spp_id)
    {
        $where = array('spp_id' => $spp_id);

        $this->DataModels->delete($where, 'spp');
        $this->session->set_flashdata('delete', 'Data SPP Berhasil Dihapus!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file spp.php */
/* Location: ./application/controllers/menu/spp.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/