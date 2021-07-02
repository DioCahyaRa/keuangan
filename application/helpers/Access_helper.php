<?php

function Access_User(){
    $ci = get_instance();
    if($ci->session->userdata('role') != "user") {
        redirect('User/Dashboard_c');
    }
}

function Access_Admin(){
    $ci = get_instance();
    if($ci->session->userdata('role') != "admin") {
        redirect('User/Dashboard_c');
    }
}

?>