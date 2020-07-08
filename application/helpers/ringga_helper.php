<?php

function is_logged_in()

{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth/login');
    }
    // else {
    //     $role_id = $ci->session->userdata('role_id');
    //     $menu = $ci->uri->segment(2);

    //     $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    //     $menu_id = $queryMenu['id'];

    //     $userAkses = $ci->db->get_where('user_akses_menu', [
    //         'role_id' => $role_id,
    //         'menu_id' => $menu_id
    //     ]);
    //     if ($userAkses->num_rows() == 0) {
    //         redirect('auth/blok');
    //     }
    // }
}
