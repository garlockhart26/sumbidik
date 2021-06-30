<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentification extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Call Model
        $this->load->model('LoginModels');
    }
    
    public function index()
    {
        // If you already have a Session
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('main/Administrator');
            } else {
                redirect('main/Operator');
            }
        }

        // Form Validation Username
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username harap diisi!'
        ]);

        // Form Validation Password
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harap diisi!'
        ]);

        // If the Form Validation is executed
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';

            $this->load->view('authentification/v_login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        // Input Data
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username LIKE binary' => $username])->row_array();

        // Check User Account
        if ($user) {
            $login_user = $this->db->get_where('user', array('username' => $username))->row();

            // Check if the User is Active
            if ($user['is_active'] == 'Y') {

                // Check Password
                if (password_verify($password, $login_user->password)) {
                    $data = array(
                        'user_id' => $login_user->user_id,
                        'status' => 'Login'
                    );

                    $this->LoginModels->input($data, 'log_history');
                    $last_insert_id = $this->db->insert_id();

                    $data_session = [
                        'user_id' => $login_user->user_id,
                        'username' => $login_user->username,
                        'password' => $login_user->password,
                        'role_id' => $login_user->role_id,
                        'log_id' => $last_insert_id
                    ];

                    $this->session->set_userdata($data_session);

                    $this->db->update('user', array('attempt' => '0'));

                    // Check what the User Role is .....
                    if ($login_user->role_id == 1) {
                        redirect('main/Administrator');
                    } else {
                        redirect('main/Operator');
                    }
                } else {
                    // Check if the User Login attempts are more than 3
                    if ($login_user->attempt >= 3) {
                        $data = array(
                            'is_active' => 'N'
                        );

                        $where = array(
                            'user_id' => $login_user->user_id
                        );

                        $this->LoginModels->update($where, $data, 'user');
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Failed! Your account has been blocked, please contact the admin to reactivate it!</div>');
                        redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        $data = array(
                            'attempt' => $login_user->attempt + 1
                        );

                        $where = array(
                            'user_id' => $login_user->user_id
                        );

                        $this->LoginModels->update($where, $data, 'user');
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your account is not yet active</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your account is not registered yet</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function logout()
    {
        $user_id = $this->session->userdata('user_id');
        $log_id = $this->session->userdata('log_id');

        $data = array(
            'user_id' => $user_id,
            'status' => 'Logout'
        );

        $where = array(
            'log_id' => $log_id
        );

        $this->LoginModels->update($where, $data, 'log_history');

        $this->session->sess_destroy();
        redirect('auth/auth_user');
    }

    public function blocked()
    {
    }
}

/* End of file authentification.php */
/* Location: ./application/controllers/authentification.php */

/*
Creator : Garly Nugraha
Year    : Februari 2021
App     : SPP App

Server 5th Generation
Software Engineering
SMK Negeri 1 Ciamis
*/