<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Call Model
        $this->load->model('DataModels');
        $this->load->model('CodeModels');

        // Access Rights Limiter
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Class';
        $data['code'] = $this->CodeModels->create_code_class(); // Call & Check Code from Model
        $data['class'] = $this->DataModels->get_one_table('class'); // Call Class Data from Model

        $this->load->view('menu/class/v_class', $data);
    }

    // Function Creates Class Data
    public function create()
    {
        // Input Data from View
        $class_id = $this->input->post('class_id');
        $class_name = $this->input->post('class_name');
        $skill_competence = $this->input->post('skill_competence');

        $data = array(
            'class_id' => $class_id,
            'class_name' => $class_name,
            'skill_competence' => $skill_competence
        );

        $this->DataModels->create($data, 'class');
        $this->session->set_flashdata('create', 'Data Kelas Berhasil Ditambahkan!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Function Updating Class Data
    public function update()
    {
        // Input Data from View
        $class_id = $this->input->post('class_id');
        $class_name = $this->input->post('class_name');
        $skill_competence = $this->input->post('skill_competence');

        $where = array('class_id' => $class_id);
        
        $data = array(
            'class_name' => $class_name,
            'skill_competence' => $skill_competence
        );

        $this->DataModels->update($where, $data, 'class');
        $this->session->set_flashdata('update', 'Data Kelas Berhasil Diperbarui!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Function Delete Class Data
    public function delete($class_id)
    {
        $where = array('class_id' => $class_id);

        $this->DataModels->delete($where, 'class');
        $this->session->set_flashdata('delete', 'Data Kelas Berhasil Dihapus!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file classs.php */
/* Location: ./application/controllers/menu/classs.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/