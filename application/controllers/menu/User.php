<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Call Model
        $this->load->model('DataModels');
        $this->load->model('UserModels');
        $this->load->model('CodeModels');

        // Access Rights Limiter
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'User';
        $data['code'] = $this->CodeModels->create_code_user(); // Call & Check Code from Model
        $data['role'] = $this->DataModels->get_one_table('role'); // Call Role Data from Model
        $data['users'] = $this->UserModels->get_one_table_user('user'); // Call User Data from Model

        $this->load->view('menu/user/v_user', $data);
    }

    // Function Creates User
    public function create()
    {
        // Input Data from View
        $user_id = $this->input->post('user_id');
        $username = htmlspecialchars($this->input->post('username')); 
        $password = password_hash('1234567890', PASSWORD_DEFAULT); // Enter the Default Password 1234567890
        $full_name = $this->input->post('full_name');
        $role_id = $this->input->post('role_id');
        $image_files = $_FILES['image']['name'];

        if ($image_files) {
            $config['file_name'] = $user_id; // Change the name of the uploaded Image
            $config['allowed_types'] = 'jpg|jpeg|png'; // Type Allowed Image
            $config['max_size']     = 5120; // The Maximum size of the Uploaded Image is 5MB
            $config['upload_path'] = './assets/images/profile/'; // Upload Image to Storage			

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();

                // Compress & Resize Image
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

                $data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'password' => $password,
                    'full_name' => $full_name,
                    'role_id' => $role_id,
                    'is_active' => 'Y',
                    'image_files' => "assets/images/profile/" . $image_files
                );

                $this->DataModels->create($data, 'user');
                $this->session->set_flashdata('create', 'User data has been added successfully!');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $errormessage = $this->upload->display_errors();
                $this->session->set_flashdata('failed', $errormessage);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    // Function Updating User
    public function update()
    {
        // Input Data from View
        $user_id = $this->input->post('user_id');
        $username = htmlspecialchars($this->input->post('username'));
        $full_name = $this->input->post('full_name');
        $role_id = $this->input->post('role_id');

        $where = array(
            'user_id' => $user_id
        );

        $data = array(
            'username' => $username,
            'full_name' => $full_name,
            'role_id' => $role_id
        );

        $query = $this->DataModels->update($where, $data, 'user');

        $this->session->set_flashdata('update', 'Data User berhasil diperbarui!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Function Updating Password User
    public function update_password()
    {
        // Input Data from View
        $user_id = $this->input->post('user_id');
        $new_password = $this->input->post('new_password');
        $repeat_password = $this->input->post('repeat_password');

        if ($new_password == $repeat_password) {
            $data = array(
                'password' => password_hash($new_password, PASSWORD_DEFAULT)
            );

            $this->DataModels->update(array('user_id' => $user_id), $data, 'user');
            $this->session->set_flashdata('update', 'Password User berhasil diperbarui!');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('failed', 'Password User gagal diperbarui!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // Function Updating Status Active
    public function update_is_active($user_id, $is_active)
    {
        // Check whether the User Account is Active or Not
        if ($is_active == 'N') {
            $is_active = 'Y';
        } else {
            $is_active = 'N';
        }

        $where = array(
            'user_id' => $user_id
        );

        $data = array(
            'is_active' => $is_active
        );

        $query = $this->DataModels->update($where, $data, 'user');

        $this->session->set_flashdata('update', 'User status updated successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Function Delete User
    public function delete($user_id)
    {
        $where = array('user_id' => $user_id);

        $_id = $this->db->get_where('user', $where)->row();
        $query = $this->DataModels->delete($where, 'user');

        if ($query) {
            unlink($_id->image_files);
        }

        $this->session->set_flashdata('delete', 'User data has been deleted successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file user.php */
/* Location: ./application/controllers/menu/user.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/