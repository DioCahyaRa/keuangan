<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        // var_dump($data['user_ses']['role'] == 'Kabag');die;
        $data['role'] = $data['user_ses']['role'];
        $data['title'] = 'Dashboard';
        // KABAG
        $data['alert_penerimaan'] = $this->MyModel->CountAlert();
        $data['alert_pembayaran'] = $this->MyModel->CountAlert2();
        $data['alert_count'] = $data['alert_penerimaan'] + $data['alert_pembayaran'];

        // KETUA
        $data['alert_penerimaan2'] = $this->MyModel->CountAlert_ketua();
        $data['alert_pembayaran2'] = $this->MyModel->CountAlert2_ketua();
        $data['alert_count2'] = $data['alert_penerimaan2'] + $data['alert_pembayaran2'];

        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Pages/Dashboard_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }
}