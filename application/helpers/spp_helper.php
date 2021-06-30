<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect('Authentification');
    }
//     else {
//         $menu = $ci->uri->segment(2);

//         $where = array('name_menu' => $menu);

//         $queryMenu = $ci->db->get_where('menu', $where)->row_array();
//         $menu_id = $queryMenu->menu_id;

//         $userAccess = $ci->db->get_where('user_access', [
//             'role_id' => $ci->session->userdata('role_id'),
//             'menu_id' => $menu_id
//         ]);

//         if ($userAccess->num_rows() < 1) {
//             redirect('auth/auth_user/blocked');
//         }
//     }
}