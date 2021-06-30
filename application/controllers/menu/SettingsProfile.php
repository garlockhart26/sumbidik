<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('DataModels');

        is_logged_in();
    }

    public function index()
    {
        // Form Validation Full Name
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|trim', [
            'required' => 'Nama Lengkap Harap diisi!'
        ]);

        // Form Validation Username
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Harap diisi!'
        ]);

        // Jika form validasi gagal
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil Saya';

            $this->load->view('menu/settings/v_profile', $data);
        } else {
            $this->_update();
        }
    }

    private function _update()
    {
        $user_id = $this->session->userdata('user_id');
        $_id = $this->db->get_where('user', ['user_id' => $user_id])->row();
        $full_name = $this->input->post('full_name');
        $username = $this->input->post('username');
        $image_files = $_FILES['image']['name'];

        if ($image_files) {
            $config['file_name'] = $user_id; // Ganti Nama Gambar yang ter-upload
            $config['allowed_types'] = 'jpg|jpeg|png'; // Type Gambar yang diijinkan
            $config['max_size']     = 5120; // Max size Gambar yang diunggah 5MB
            $config['upload_path'] = './assets/images/profile/'; // Upload Gambar kepenyimpanan	

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();

                // Compress & Resize Gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/profile/' . $image['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 512;
                $config['height'] = 512;
                $config['new_image'] = './assets/images/profile/' . $image['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $image_files = $image['file_name'];

                $where = array(
                    'user_id' => $user_id
                );

                $data = array(
                    'full_name' => $full_name,
                    'username' => $username,
                    'image_files' => "assets/images/profile/" . $image_files
                );

                $query = $this->db->update('user', $data, $where);

                // Perbarui file gambar
                if ($query) {
                    unlink($_id->image_files);
                }

                $this->session->set_flashdata('update', 'Profile Berhasil diperbarui!');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('failed', 'Format Gambar yang Anda unggah tidak diperbolehkan.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } elseif (empty($image_files)) {
            $where = array(
                'user_id' => $user_id
            );

            $data = array(
                'full_name' => $full_name,
                'username' => $username
            );

            $query = $this->DataModels->update($where, $data, 'user');

            $this->session->set_flashdata('update', 'Profile Berhasil Diupdate!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}

/* End of file settings.php */
/* Location: ./application/controllers/menu/settings.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/