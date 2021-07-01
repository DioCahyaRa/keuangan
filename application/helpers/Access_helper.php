<?php

// function is_logged_in(){
    
//     $ci = get_instance();
//     if (!$ci->session->userdata('username')) {
//         redirect('Login');
//     }else{
//         $role_id = $ci->session->userdata('role_id');
//         $menu = $ci->uri->segment(1);
//         $page = $ci->uri->segment(2);
//         $page_menu = $menu."/".$page;

//         $queryMenu = $ci->db->get_where('user_menu', ['nama_menu' => $page_menu])->row_Array();
//         $menu_id = $queryMenu['id'];

//         $userAccess = $ci->db->get_where('user_access_menu', [
//             'role_id' => $role_id,
//             'menu_id' => $menu_id
//             ]);

//         if ($userAccess->num_rows() < 1) {
//             redirect('Login');
//         }
//     }
// }


?>