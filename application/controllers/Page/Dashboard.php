<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile';
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Pages/Profile_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }
}