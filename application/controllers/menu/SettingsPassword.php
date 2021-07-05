<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsPassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
    }

    public function index()
    {
        // Form Validation Old Password
        $this->form_validation->set_rules('old_password', 'Old Password', 'required|trim', [
            'required' => 'Password Lama Harap diisi!'
        ]);

        // Form Validation New Password
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]|matches[repeat_password]', [
            'required' => 'Password Baru Harap diisi!',
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password minimal 8 Karakter!'
        ]);

        // Form Validation Repeat Password
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|trim|min_length[8]|matches[new_password]');

        // Jika Form Validasi gagal
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';

            $this->load->view('menu/settings/v_password', $data);
        } else {
            $this->_update();
        }
    }

    private function _update()
    {
        $user_id = $this->session->userdata('user_id');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');

        // Cek apakah Password terverifikasi?
        if (!password_verify($old_password, $this->session->userdata('password'))) {
            $this->session->set_flashdata('error', 'Password Lama salah!');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // Cek Password Lama dan Password Baru (Password Baru tidak boleh sama dengan password lama)
            if ($old_password == $new_password) {
                $this->session->set_flashdata('error', 'Password Baru tidak boleh sama dengan Password Lama!');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $data = array(
                    'password' => $password_hash,
                );

                $where = array(
                    'user_id' => $user_id 
                );

                $this->db->update($where, $data, 'user');
                $this->session->set_flashdata('update', 'Password Berhasil Diperbarui!');
                redirect($_SERVER['HTTP_REFERER']);
            }
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