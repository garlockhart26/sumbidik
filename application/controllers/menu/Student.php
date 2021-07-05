<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Siswa';
        $data['code'] = $this->CodeModels->create_code_student();
        $data['student'] = $this->StudentModels->get_one_table_student('student');
        $data['class'] = $this->DataModels->get_one_table('class');
        $data['spp'] = $this->DataModels->get_one_table('spp');

        $this->load->view('menu/student/v_student', $data);
    }

    public function create()
    {
        $student_id = $this->input->post('student_id');
        $nisn = $this->input->post('nisn');
        $nis = $this->input->post('nis');
        $full_name = $this->input->post('full_name');
        $class_id = $this->input->post('class_id');
        $address = $this->input->post('address');
        $mobile_phone = $this->input->post('mobile_phone');
        $spp_id = $this->input->post('spp_id');

        $search = $this->db->get_where('spp', array('spp_id' => $spp_id))->row();
        $nominal = $search->nominal;
        $total = $nominal * 12;

        $image_files = $_FILES['image']['name'];

        if ($image_files) {
            $config['file_name'] = $nisn; // nama yang terupload nantinya
            $config['allowed_types'] = 'jpg|jpeg|png'; // type file gambar yang diijinkan
            $config['max_size']     = 5120; // max size file gambar yang diunggah 5mb
            $config['upload_path'] = './assets/images/student/'; // unggah file gambar kepenyimpanan			

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();

                // Compress & Resize Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/student/' . $image['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 512;
                $config['height'] = 512;
                $config['new_image'] = './assets/images/student/' . $image['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $image_files = $image['file_name'];

                $data = array(
                    'student_id' => $student_id,
                    'nisn' => $nisn,
                    'nis' => $nis,
                    'full_name' => $full_name,
                    'class_id' => $class_id,
                    'address' => $address,
                    'mobile_phone' => $mobile_phone,
                    'image_files' => "assets/images/student/" . $image_files,
                    'spp_id' => $spp_id,
                    'total' => $total
                );

                $this->DataModels->create($data, 'student');
                $this->session->set_flashdata('create', 'Data Siswa berhasil ditambahkan!');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $errormessage = $this->upload->display_errors();
                $this->session->set_flashdata('failed', $errormessage);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function update()
    {
        $student_id = $this->input->post('student_id');
        $_id = $this->db->get_where('student', ['student_id' => $student_id])->row();
        $nisn = $this->input->post('nisn');
        $nis = $this->input->post('nis');
        $full_name = $this->input->post('full_name');
        $class_id = $this->input->post('class_id');
        $address = $this->input->post('address');
        $mobile_phone = $this->input->post('mobile_phone');
        $spp_id = $this->input->post('spp_id');

        $search = $this->db->get_where('spp', array('spp_id' => $spp_id))->row();
        $nominal = $search->nominal;
        $total = $nominal * 12;

        $image_files = $_FILES['image']['name'];

        if ($image_files) {
            $config['file_name'] = $nisn; //nama yang terupload nantinya
            $config['allowed_types'] = 'jpg|jpeg|png'; //type file gambar yang diijinkan
            $config['max_size']     = 5120; //max size file gambar yang diunggah 1mb
            $config['upload_path'] = './assets/images/student/'; //unggah file gambar kepenyimpanan

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();

                // Compress & Resize Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/student/' . $image['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 512;
                $config['height'] = 512;
                $config['new_image'] = './assets/images/student/' . $image['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $image_files = $image['file_name'];

                $where = array('student_id' => $student_id);

                $data = array(
                    'nisn' => $nisn,
                    'nis' => $nis,
                    'full_name' => $full_name,
                    'class_id' => $class_id,
                    'address' => $address,
                    'mobile_phone' => $mobile_phone,
                    'image_files' => "assets/images/student/" . $image_files,
                    'spp_id' => $spp_id,
                    'total' => $total
                );

                $query = $this->db->update('student', $data, $where);

                // Perbarui file gambar
                if ($query) {
                    unlink($_id->image_files);
                }

                $this->session->set_flashdata('update', 'Profile Berhasil Diupdate!');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $errormessage = $this->upload->display_errors();
                $this->session->set_flashdata('failed', $errormessage);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } elseif (empty($image_files)) {
            $where = array('student_id' => $student_id);

            $data = array(
                'nisn' => $nisn,
                'nis' => $nis,
                'full_name' => $full_name,
                'class_id' => $class_id,
                'address' => $address,
                'mobile_phone' => $mobile_phone,
                'image_files' => "assets/images/student/" . $image_files,
                'spp_id' => $spp_id,
                'total' => $total
            );

            $query = $this->DataModels->update($where, $data, 'student');

            $this->session->set_flashdata('update', 'Profile Berhasil Diupdate!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($student_id)
    {
        $where = array('student_id' => $student_id);

        $this->db->delete('student', $where);
        $this->session->set_flashdata('delete', 'Data Siswa berhasil dihapus!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file student.php */
/* Location: ./application/controllers/menu/student.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/